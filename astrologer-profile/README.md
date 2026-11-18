# Astrologer profile SEO kit

Components and JSON-LD for `https://starstell.com/best-astrologer/{slug}` so each astrologer can rank in Google and Bing.

Stack assumed from the audit: Laravel (Blade) behind Cloudflare.

## Why this is needed

Findings from the live audit (see [FULL-AUDIT-REPORT.md](../FULL-AUDIT-REPORT.md)):

- The profile page carries a single `Service` block with an empty description ("... problems related to ") and an image URL that points to a folder (`/public/assets/images/astrologers`), not a file.
- The URL used in the schema is `/public/best-astrologer`, which has no astrologer slug.
- The review section shows `0.0` and an empty review list.
- Most of the 38 profile URLs in the sitemap redirect to `/talk-to-astrologer`, so they are not indexable at all.
- Descriptions are empty and there is no canonical for the profile template.

## What is in this kit

| File | Purpose |
|---|---|
| [schema/astrologer-profile.template.jsonld.json](schema/astrologer-profile.template.jsonld.json) | JSON-LD template with `{{placeholders}}`: Organization, ProfilePage, Person, ProfessionalService, BreadcrumbList, FAQPage |
| [schema/example-astrologer.jsonld.json](schema/example-astrologer.jsonld.json) | Filled example with obviously fake sample data, valid JSON |
| [laravel/AstrologerSeo.php](laravel/AstrologerSeo.php) | Builds the graph from your astrologer record and drops empty fields |
| [laravel/astrologer-head.blade.php](laravel/astrologer-head.blade.php) | Title, description, canonical, Open Graph, Twitter and JSON-LD in `<head>` |
| [laravel/astrologer-body.blade.php](laravel/astrologer-body.blade.php) | Nine visible page components |
| [laravel/sitemap-astrologers.php](laravel/sitemap-astrologers.php) | Route for a dedicated astrologer sitemap |

## Page components (top to bottom)

1. Breadcrumb (matches BreadcrumbList).
2. Hero with one H1: name plus main speciality, photo with real alt text, price, call to action.
3. Quick facts table: specialities, languages, experience, modes, price.
4. About text, 150 to 300 unique words per astrologer.
5. Qualifications and verification, only what StarsTell has checked.
6. Topics the astrologer covers, each linking to a service page (internal links).
7. Ratings and reviews, real ones only.
8. FAQ, 4 to 6 questions per astrologer.
9. Similar astrologers, 6 to 8 crawlable links, plus a disclaimer.

## Rules that keep the markup safe

- Mark up only what is visible on the page. Rating, price, languages and FAQ in the JSON must match the text shown.
- Never output `aggregateRating` or `review` without real reviews. The builder skips them when the count is 0.
- Use one host: `https://starstell.com`, no `www`, no `/public/` in URLs.
- Use `https://schema.org`, not `http://schema.org`.
- Medical, legal and financial claims should not be written into bios.

## Rollout checklist

1. Make `/best-astrologer/{slug}` return a real 200 page. Today most profile URLs redirect (finding TECH-001).
2. Copy `AstrologerSeo.php` to `app/Support/`, the two Blade files to `resources/views/partials/`.
3. Include `astrologer-head` inside `<head>` and `astrologer-body` in the page.
4. Add the sitemap route, list it in `sitemap.xml`, and add the `Sitemap:` line to `robots.txt`.
5. Set a unique title and description per astrologer. The head partial builds defaults from the bio.
6. Test 10 profiles in the Google Rich Results Test and the Schema Markup Validator (validator.schema.org).
7. Submit the astrologer sitemap in Google Search Console and Bing Webmaster Tools.
8. Notify Bing and others of new or changed profiles with IndexNow (`https://api.indexnow.org/indexnow?url=...&key=...`).
9. Check again in 2 to 4 weeks: indexed profile count, impressions per profile, rich result reports.

## What to expect

This makes each profile eligible to be indexed and shown with richer results. It does not guarantee rankings. Rankings also depend on unique content, reviews, internal links and the site's overall authority.

Confidential | Hungama Digital Media Entertainment Pvt. Ltd.
