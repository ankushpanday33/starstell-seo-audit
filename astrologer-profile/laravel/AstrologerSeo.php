<?php

namespace App\Support;

/**
 * Builds the JSON-LD graph for one astrologer profile page.
 * Put this file in app/Support/AstrologerSeo.php.
 *
 * Rules built in:
 *  - Empty fields are dropped, so Google never sees "description": "".
 *  - AggregateRating and Review are emitted only when real ratings exist.
 *  - Every URL is absolute and uses the non-www host (https://starstell.com).
 *  - FAQ entries must be the same text that is visible on the page.
 */
class AstrologerSeo
{
    private const HOST = 'https://starstell.com';

    /**
     * @param array $a        name, slug, photo, bio, languages[], specialities[],
     *                        price_per_min, rating_value, rating_count, updated_at
     * @param array $reviews  each: first_name, rating, text, date (Y-m-d)
     * @param array $faqs     each: q, a
     */
    public static function graph(array $a, array $reviews = [], array $faqs = []): array
    {
        $url = self::HOST . '/best-astrologer/' . $a['slug'];
        $org = self::HOST . '/#organization';
        $person = $url . '#person';

        $graph = [
            [
                '@type' => 'ProfilePage',
                '@id' => $url . '#profilepage',
                'url' => $url,
                'name' => $a['name'] . ' | Online Astrologer | StarsTell',
                'inLanguage' => 'en-IN',
                'dateModified' => isset($a['updated_at']) ? date('c', strtotime($a['updated_at'])) : null,
                'mainEntity' => ['@id' => $person],
                'breadcrumb' => ['@id' => $url . '#breadcrumb'],
            ],
            [
                '@type' => 'Person',
                '@id' => $person,
                'name' => $a['name'],
                'url' => $url,
                'image' => self::absolute($a['photo'] ?? null),
                'description' => self::clip($a['bio'] ?? '', 160),
                'jobTitle' => 'Astrologer',
                'knowsAbout' => $a['specialities'] ?? [],
                'knowsLanguage' => $a['languages'] ?? [],
                'worksFor' => ['@id' => $org],
            ],
            self::service($a, $url, $person, $reviews),
            [
                '@type' => 'BreadcrumbList',
                '@id' => $url . '#breadcrumb',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => self::HOST . '/'],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Talk to Astrologer', 'item' => self::HOST . '/talk-to-astrologer'],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $a['name'], 'item' => $url],
                ],
            ],
        ];

        if ($faqs) {
            $graph[] = [
                '@type' => 'FAQPage',
                '@id' => $url . '#faq',
                'mainEntity' => array_map(fn ($f) => [
                    '@type' => 'Question',
                    'name' => $f['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
                ], $faqs),
            ];
        }

        return self::clean(['@context' => 'https://schema.org', '@graph' => $graph]);
    }

    private static function service(array $a, string $url, string $person, array $reviews): array
    {
        $svc = [
            '@type' => 'ProfessionalService',
            '@id' => $url . '#service',
            'name' => 'Online astrology consultation with ' . $a['name'],
            'serviceType' => 'Astrology consultation',
            'provider' => ['@id' => $person],
            'areaServed' => ['@type' => 'Country', 'name' => 'India'],
            'availableLanguage' => $a['languages'] ?? [],
            'url' => $url,
        ];

        if (!empty($a['price_per_min'])) {
            $svc['offers'] = [
                '@type' => 'Offer',
                'priceCurrency' => 'INR',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'price' => (string) $a['price_per_min'],
                    'priceCurrency' => 'INR',
                    'unitCode' => 'MIN',
                ],
                'availability' => 'https://schema.org/InStock',
                'url' => self::HOST . '/talk-to-astrologer',
            ];
        }

        // Ratings only when there are real reviews. Never invent or round up.
        if (($a['rating_count'] ?? 0) > 0 && ($a['rating_value'] ?? 0) > 0) {
            $svc['aggregateRating'] = [
                '@type' => 'AggregateRating',
                'ratingValue' => (string) $a['rating_value'],
                'reviewCount' => (string) $a['rating_count'],
                'bestRating' => '5',
                'worstRating' => '1',
            ];
            $svc['review'] = array_map(fn ($r) => [
                '@type' => 'Review',
                'author' => ['@type' => 'Person', 'name' => $r['first_name']],
                'datePublished' => $r['date'],
                'reviewRating' => ['@type' => 'Rating', 'ratingValue' => (string) $r['rating'], 'bestRating' => '5'],
                'reviewBody' => $r['text'],
            ], array_slice($reviews, 0, 5));
        }

        return $svc;
    }

    private static function absolute(?string $path): ?string
    {
        if (!$path) {
            return null;
        }
        return preg_match('#^https?://#', $path) ? $path : self::HOST . '/' . ltrim($path, '/');
    }

    private static function clip(string $text, int $max): ?string
    {
        $text = trim(strip_tags($text));
        if ($text === '') {
            return null;
        }
        return mb_strlen($text) > $max ? rtrim(mb_substr($text, 0, $max - 1)) . '…' : $text;
    }

    /** Removes null, empty strings and empty arrays recursively. */
    private static function clean(array $data): array
    {
        // array_is_list needs PHP 8.1 or newer. Checked before removals so a
        // list stays a JSON array even after empty items are dropped.
        $wasList = array_is_list($data);
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                $data[$k] = self::clean($v);
            }
            if ($data[$k] === null || $data[$k] === '' || $data[$k] === []) {
                unset($data[$k]);
            }
        }
        return $wasList ? array_values($data) : $data;
    }
}
