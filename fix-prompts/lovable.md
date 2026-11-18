# Lovable: SEO fix prompts
Site: https://starstell.com  |  Open your project in Lovable and paste each prompt into the chat, one at a time.

## Prompt 1 of 5

````text
I ran an SEO audit on my site https://starstell.com. Please make these critical and high priority SEO fixes (part 1 of 5). Do not change the design, layout or copy beyond what each item asks. After the changes, tell me which pages you edited.

1. Most sitemap URLs redirect to the homepage or /talk-to-astrologer
   Where: https://starstell.com/horoscopes/daily/leo-free-horoscope, https://starstell.com/best-astrologer/acharya-pooja, https://starstell.com/item-detail/ruby-manik-5.5-ratti-fine
   Change: Find out why these routes redirect (a login or session gate, or a retired route map). Serve real 200 pages with unique content, or remove dead URLs from the sitemap. Daily horoscope pages are the biggest organic opportunity.
   Check: Re-fetch 20 sitemap URLs per section and expect HTTP 200 with a self-referencing canonical.

2. Homepage canonical, og:url and schema point to www, but www 301s to the non-www site
   Where: https://starstell.com/, https://starstell.com/about
   Change: Pick one host (non-www is already in the sitemap). Make every canonical, og:url, JSON-LD URL and internal link use it, and 301 the other host everywhere, including /about, /blog and /get-your-free-kundali.
   Check: View source on the homepage and /about: the canonical host equals the URL in the address bar.

3. Cloudflare returns 403 to ClaudeBot and PerplexityBot
   Where: the whole site
   Change: In Cloudflare, check Bot Fight Mode and AI Crawl Control and allow the AI crawlers you want, or state the block in robots.txt so policy and behaviour agree.
   Check: Re-run the request with each bot user agent and expect 200.

4. Homepage has no H1
   Where: https://starstell.com/
   Change: Add one H1 that states the offer, for example 'Talk to Astrologers Online 24x7 in Hindi, Tamil and English'. Promote the section headings to H2.
   Check: Exactly one H1 on the page.

When you are done, publish a preview and list the pages you changed.
````

## Prompt 2 of 5

````text
I ran an SEO audit on my site https://starstell.com. Please make these critical and high priority SEO fixes (part 2 of 5). Do not change the design, layout or copy beyond what each item asks. After the changes, tell me which pages you edited.

1. Missing pages return a 302 redirect, not a 404
   Where: the whole site
   Change: Return a true 404 status with a helpful page for unknown routes. Stop redirecting unknown paths to /talk-to-astrologer.
   Check: An unknown URL returns HTTP 404.

When you are done, publish a preview and list the pages you changed.
````

## Prompt 3 of 5

````text
I ran an SEO audit on my site https://starstell.com. Please make these medium priority SEO fixes (part 3 of 5). Do not change the design, layout or copy beyond what each item asks. After the changes, tell me which pages you edited.

1. Thin trust and expertise signals for an advice-style topic
   Where: the whole site
   Change: Publish daily and weekly horoscope pages with unique text, author bylines with credentials, an editorial policy, a clear disclaimer, and a working blog.

2. Homepage has no meta description; other pages have none or an empty one
   Where: the whole site
   Change: Add unique 140 to 160 character descriptions to the homepage, astrologer profiles, tarot, numerology and policy pages.

3. Some titles are wrong or inconsistent
   Where: https://starstell.com/policies/privacy-policy
   Change: Write unique titles per page (primary keyword first, brand last) and use one brand spelling.

4. Many pages have no canonical tag
   Where: the whole site
   Change: Add self-referencing canonicals site-wide and remove the ?spl= URLs from the sitemap.

When you are done, publish a preview and list the pages you changed.
````

## Prompt 4 of 5

````text
I ran an SEO audit on my site https://starstell.com. Please make these medium priority SEO fixes (part 4 of 5). Do not change the design, layout or copy beyond what each item asks. After the changes, tell me which pages you edited.

1. Slow server response and a heavy homepage load (lab sample, not field data)
   Where: https://starstell.com/
   Change: Cache the HTML at Cloudflare where safe (the response is cache-control: no-cache, private and cf-cache-status DYNAMIC), defer the Facebook pixel and utils.js, replace the loading.gif, and serve images in WebP or AVIF. Then re-measure with PageSpeed Insights using an API key.
   Check: Run PageSpeed Insights mobile and check LCP under 2.5 s, INP under 200 ms, CLS under 0.1.

2. Basic Organization schema only on the homepage
   Where: the whole site
   Change: Use https://schema.org, fix the logo URL, add WebSite with SearchAction, ProfessionalService and Person for astrologers, Product and Offer for gemstones and reports, and FAQPage where real FAQs exist.

When you are done, publish a preview and list the pages you changed.
````

## Prompt 5 of 5

````text
I ran an SEO audit on my site https://starstell.com. Please make these low priority SEO fixes (part 5 of 5). Do not change the design, layout or copy beyond what each item asks. After the changes, tell me which pages you edited.

1. 15 of 68 homepage images have no alt text
   Where: the whole site
   Change: Add descriptive alt text (astrologer name and specialty) and use alt="" for decorative images.

2. Missing security headers
   Where: the whole site
   Change: Add CSP, frame-ancestors, Referrer-Policy and Permissions-Policy via Cloudflare or the app.

3. robots.txt has no Sitemap line and sitemap dates are stale
   Where: the whole site
   Change: Add 'Sitemap: https://starstell.com/sitemap.xml', generate the sitemap automatically and keep lastmod accurate.

When you are done, publish a preview and list the pages you changed.
````

## Extra prompt: astrologer profile SEO

````text
Please add SEO components and structured data to the astrologer profile pages of my site https://starstell.com. Do not change the design beyond the components listed. After the changes, tell me which pages you edited.

Goal: make every astrologer profile page (https://starstell.com/best-astrologer/{slug}) indexable and eligible for rich results in Google and Bing.
Reference kit with ready-made files: https://github.com/ankushpanday33/starstell-seo-audit/tree/main/astrologer-profile
(template JSON-LD, a Laravel builder class, head and body Blade partials, sitemap route). Adapt it to this codebase if the stack differs.

Do these in order:

1. Make /best-astrologer/{slug} return a real HTTP 200 page for every active astrologer. Today most of these URLs redirect to /talk-to-astrologer. Do not redirect them.

2. In <head>, server-render for each profile:
   - a unique <title>: "{Name} | Online Astrologer for {main speciality} | StarsTell"
   - a unique meta description of 120 to 155 characters built from the bio (never empty)
   - an absolute self-referencing canonical on https://starstell.com (non-www, no /public/ in the path)
   - Open Graph (type profile, title, description, url, image) and Twitter card tags, with an absolute image URL that points to a real file
   - robots: index,follow,max-image-preview:large

3. Add one JSON-LD script with an @graph, built from the astrologer record (use https://schema.org, not http):
   - Organization (https://starstell.com/#organization)
   - ProfilePage whose mainEntity is the Person, with dateModified
   - Person: name, url, image, description (under 160 characters), jobTitle "Astrologer", knowsAbout (specialities), knowsLanguage, worksFor the Organization
   - ProfessionalService: provider is the Person, areaServed India, availableLanguage, offers with UnitPriceSpecification in INR per minute (unitCode MIN)
   - aggregateRating and review ONLY when real reviews exist (count above 0). Never invent or round up ratings. Omit both when there are none.
   - BreadcrumbList: Home, Talk to Astrologer, astrologer name
   - FAQPage with 4 to 6 questions. The same questions and answers must be visible on the page.
   Drop any empty field instead of printing an empty string. Encode with JSON_HEX_TAG so text can never break out of the script tag.

4. Add these visible page components, server-rendered, in this order:
   breadcrumb; hero with exactly one H1 ("{Name}: Online {speciality} Astrologer"), photo with real alt text, price and a call-to-action button; quick facts table (specialities, languages, experience, modes, price per minute); an About section of 150 to 300 unique words; qualifications and verification (only what StarsTell has verified); topics the astrologer covers, each linking to a service page; ratings and reviews (real ones only, same data as the schema); FAQ; 6 to 8 crawlable links to similar astrologers; and a short disclaimer that astrology is guidance and not medical, legal or financial advice.

5. Add /sitemap-astrologers.xml listing every active profile with an accurate lastmod. Reference it from sitemap.xml and add "Sitemap: https://starstell.com/sitemap-astrologers.xml" to robots.txt.

6. Send new and changed profile URLs to Bing with IndexNow.

Rules: mark up only what is visible on the page. Do not change unrelated pages or the visual design beyond these components. If a data field is missing in the database, say so and leave that part out instead of guessing.

Done when: ten sample profiles return HTTP 200 with the tags above in the raw HTML (no JavaScript needed), pass https://search.google.com/test/rich-results and https://validator.schema.org with no errors, and the sitemap lists them.
````
