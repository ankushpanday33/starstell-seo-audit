# Claude Code: SEO fix prompts
Site: https://starstell.com  |  Open a terminal in your project folder, run `claude`, and paste each prompt.

## Prompt 1 of 3

````text
You are fixing SEO issues found by an audit of https://starstell.com (part 1 of 3, critical and high priority).
Tech stack: Framework: Laravel (csrf-token and session cookie, likely PHP); Hosting: Cloudflare; CMS: Custom
Work in this repository. Read the relevant files before editing.

Rules:
- Fix only the items below. Do not refactor unrelated code or change visible design.
- Server-render every SEO tag (title, meta, canonical, JSON-LD) so it is in the HTML without JavaScript.
- Keep structured data truthful: JSON-LD must match what is visible on the page.
- If an item does not apply to this codebase, say so instead of guessing.
- Using Claude Code: when done, list every file changed and how you verified each item.

### 1. [Critical] Most sitemap URLs redirect to the homepage or /talk-to-astrologer (TECH-001)
Problem: Of 236 sitemap URLs, every section sampled (horoscopes, best-astrologer, item-detail, online-puja-detail, report-detail-new, products, shop, pranic-healing, astrological-reports, online-puja, ask-a-question) answers with a 301 or 302 to / or /talk-to-astrologer. These sections make up about 190 of the 236 URLs. Google ignores redirecting URLs in a sitemap, so the astrologer, horoscope and product pages cannot rank.
Evidence from the live site: curl without cookies: /horoscopes/daily/leo-free-horoscope 301 to /; /best-astrologer/acharya-pooja 302 to /talk-to-astrologer; /item-detail/ruby-manik-5.5-ratti-fine 302 to /talk-to-astrologer. A Googlebot user agent gets the same 301 on the horoscope URL.
Affected URLs: https://starstell.com/horoscopes/daily/leo-free-horoscope, https://starstell.com/best-astrologer/acharya-pooja, https://starstell.com/item-detail/ruby-manik-5.5-ratti-fine
Required change: Find out why these routes redirect (a login or session gate, or a retired route map). Serve real 200 pages with unique content, or remove dead URLs from the sitemap. Daily horoscope pages are the biggest organic opportunity.
Done when: Re-fetch 20 sitemap URLs per section and expect HTTP 200 with a self-referencing canonical.

### 2. [Critical] Homepage canonical, og:url and schema point to www, but www 301s to the non-www site (TECH-002)
Problem: The homepage canonical is https://www.starstell.com/ while www redirects to https://starstell.com/. Google receives a canonical that points at a redirecting URL and has to guess the preferred host. The sitemap and most inner pages use non-www, while /about and /get-your-free-kundali canonicalise to www.
Evidence from the live site: Homepage: canonical https://www.starstell.com/, og:url https://www.starstell.com, JSON-LD url and logo on www. curl -I https://www.starstell.com returns 301 to https://starstell.com/. /about returns 301 to https://www.starstell.com/about.
Affected URLs: https://starstell.com/, https://starstell.com/about
Required change: Pick one host (non-www is already in the sitemap). Make every canonical, og:url, JSON-LD URL and internal link use it, and 301 the other host everywhere, including /about, /blog and /get-your-free-kundali.
Done when: View source on the homepage and /about: the canonical host equals the URL in the address bar.

### 3. [High] Cloudflare returns 403 to ClaudeBot and PerplexityBot (GEO-001)
Problem: GPTBot and Google-Extended get 200, but ClaudeBot and PerplexityBot are blocked with 403 although robots.txt allows everything. If you want citations from Claude and Perplexity, they cannot read the site today. This may be deliberate, so confirm the intent.
Evidence from the live site: User agent ClaudeBot returned 403; PerplexityBot 403; GPTBot 200; Google-Extended 200.
Required change: In Cloudflare, check Bot Fight Mode and AI Crawl Control and allow the AI crawlers you want, or state the block in robots.txt so policy and behaviour agree.
Done when: Re-run the request with each bot user agent and expect 200.

### 4. [High] Homepage has no H1 (ONP-001)
Problem: The homepage has zero H1 tags and a single H2 ('OUR ASTROLOGERS'). The main topic is not marked up.
Evidence from the live site: Homepage HTML: 0 h1, 1 h2, 12 h3.
Affected URLs: https://starstell.com/
Required change: Add one H1 that states the offer, for example 'Talk to Astrologers Online 24x7 in Hindi, Tamil and English'. Promote the section headings to H2.
Done when: Exactly one H1 on the page.

### 5. [High] Missing pages return a 302 redirect, not a 404 (TECH-003)
Problem: A made-up URL answers 302 instead of 404, and /llms.txt does too. Crawlers cannot tell real pages from missing ones, which creates soft-404 and crawl-waste problems.
Evidence from the live site: A request to /this-page-xyz-404 returned 302; /llms.txt returned 302.
Required change: Return a true 404 status with a helpful page for unknown routes. Stop redirecting unknown paths to /talk-to-astrologer.
Done when: An unknown URL returns HTTP 404.

Verification after all items:
1. Build the project and fix any build or type errors.
2. Fetch the built pages without JavaScript (for example `curl -sL https://starstell.com`) and confirm each new tag is in the raw HTML.
3. Validate any JSON-LD at https://validator.schema.org and https://search.google.com/test/rich-results.
4. Re-run `/seo audit` (Claude SEO Master Skills) and confirm these finding IDs no longer appear.
````

## Prompt 2 of 3

````text
You are fixing SEO issues found by an audit of https://starstell.com (part 2 of 3, medium priority).
Tech stack: Framework: Laravel (csrf-token and session cookie, likely PHP); Hosting: Cloudflare; CMS: Custom
Work in this repository. Read the relevant files before editing.

Rules:
- Fix only the items below. Do not refactor unrelated code or change visible design.
- Server-render every SEO tag (title, meta, canonical, JSON-LD) so it is in the HTML without JavaScript.
- Keep structured data truthful: JSON-LD must match what is visible on the page.
- If an item does not apply to this codebase, say so instead of guessing.
- Using Claude Code: when done, list every file changed and how you verified each item.

### 1. [Medium] Thin trust and expertise signals for an advice-style topic (CNT-001)
Problem: Astrology is advice content, so credibility matters. The homepage holds about 1,650 words, mostly navigation and testimonials. No blog content was found (/blog/ serves the homepage). Astrologer bios exist but the list pages redirect.
Evidence from the live site: /blog/ returns the homepage title and canonical; /best-astrologer/* redirect.
Required change: Publish daily and weekly horoscope pages with unique text, author bylines with credentials, an editorial policy, a clear disclaimer, and a working blog.

### 2. [Medium] Homepage has no meta description; other pages have none or an empty one (ONP-002)
Problem: The homepage has no meta description (only og:description). /best-astrologer has an empty description and the policy pages have none, so Google writes its own snippet.
Evidence from the live site: Homepage head has og:description only; astrologer profile description is empty; policy pages lack it.
Required change: Add unique 140 to 160 character descriptions to the homepage, astrologer profiles, tarot, numerology and policy pages.

### 3. [Medium] Some titles are wrong or inconsistent (ONP-003)
Problem: The privacy policy page is titled 'Disclaimer- StarsTell'. Brand spelling alternates between 'Starstell' and 'StarsTell'.
Evidence from the live site: /policies/privacy-policy title is 'Disclaimer- StarsTell'.
Affected URLs: https://starstell.com/policies/privacy-policy
Required change: Write unique titles per page (primary keyword first, brand last) and use one brand spelling.

### 4. [Medium] Many pages have no canonical tag (ONP-004)
Problem: Tarot, numerology, contact, policy, jio-tv and other pages have no canonical. The talk-to-astrologer filter URLs (?spl=...) canonicalise to the base page, which is correct, but they are still listed in the sitemap.
Evidence from the live site: Sampled /tarot, /numerology, /contact, /jio-tv: no rel=canonical.
Required change: Add self-referencing canonicals site-wide and remove the ?spl= URLs from the sitemap.

### 5. [Medium] Slow server response and a heavy homepage load (lab sample, not field data) (CWV-001)
Problem: In a single desktop-browser load, the server took about 980 ms to start responding, DOMContentLoaded was about 2.4 s and the full load about 4.5 s. The page makes 103 requests and transfers about 904 KB, of which about 495 KB is JavaScript. The Facebook pixel alone is 97 KB. A 44 KB loading.gif and a login-background image are also loaded on the homepage. LCP and CLS could not be captured because the browser pane was in the background.
Evidence from the live site: Navigation Timing: responseStart 980 ms, DCL 2373 ms, load 4543 ms; Resource Timing: 103 requests, 904 KB total, 495 KB script. PageSpeed Insights API returned 429 (free quota exhausted).
Affected URLs: https://starstell.com/
Required change: Cache the HTML at Cloudflare where safe (the response is cache-control: no-cache, private and cf-cache-status DYNAMIC), defer the Facebook pixel and utils.js, replace the loading.gif, and serve images in WebP or AVIF. Then re-measure with PageSpeed Insights using an API key.
Done when: Run PageSpeed Insights mobile and check LCP under 2.5 s, INP under 200 ms, CLS under 0.1.

### 6. [Medium] Basic Organization schema only on the homepage (SCH-001)
Problem: The homepage has one Organization block using http://schema.org, with logo URLs on www under /img/logo.png while og:image uses /assets/images/logo.png. Astrologer profiles carry 5 JSON-LD blocks, which is good. No Product, Offer or FAQPage markup was seen on service pages.
Evidence from the live site: Homepage JSON-LD: Organization only; logo https://www.starstell.com/img/logo.png.
Required change: Use https://schema.org, fix the logo URL, add WebSite with SearchAction, ProfessionalService and Person for astrologers, Product and Offer for gemstones and reports, and FAQPage where real FAQs exist.

Verification after all items:
1. Build the project and fix any build or type errors.
2. Fetch the built pages without JavaScript (for example `curl -sL https://starstell.com`) and confirm each new tag is in the raw HTML.
3. Validate any JSON-LD at https://validator.schema.org and https://search.google.com/test/rich-results.
4. Re-run `/seo audit` (Claude SEO Master Skills) and confirm these finding IDs no longer appear.
````

## Prompt 3 of 3

````text
You are fixing SEO issues found by an audit of https://starstell.com (part 3 of 3, low priority).
Tech stack: Framework: Laravel (csrf-token and session cookie, likely PHP); Hosting: Cloudflare; CMS: Custom
Work in this repository. Read the relevant files before editing.

Rules:
- Fix only the items below. Do not refactor unrelated code or change visible design.
- Server-render every SEO tag (title, meta, canonical, JSON-LD) so it is in the HTML without JavaScript.
- Keep structured data truthful: JSON-LD must match what is visible on the page.
- If an item does not apply to this codebase, say so instead of guessing.
- Using Claude Code: when done, list every file changed and how you verified each item.

### 1. [Low] 15 of 68 homepage images have no alt text (IMG-001)
Problem: About 22% of images have missing or empty alt text. 40 are lazy-loaded, which is good.
Evidence from the live site: Homepage HTML: 68 img tags, 15 without alt text.
Required change: Add descriptive alt text (astrologer name and specialty) and use alt="" for decorative images.

### 2. [Low] Missing security headers (TECH-004)
Problem: Only HSTS and X-Content-Type-Options are present. No Content-Security-Policy, X-Frame-Options or frame-ancestors, Referrer-Policy or Permissions-Policy. HSTS max-age is about 180 days without includeSubDomains.
Evidence from the live site: Response headers on https://starstell.com.
Required change: Add CSP, frame-ancestors, Referrer-Policy and Permissions-Policy via Cloudflare or the app.

### 3. [Low] robots.txt has no Sitemap line and sitemap dates are stale (TECH-005)
Problem: robots.txt only says 'User-agent: *' and 'Disallow:'. The sitemap exists at /sitemap.xml but all lastmod dates are 2024-12 and the file was last modified on 29/12/2025.
Evidence from the live site: robots.txt content; sitemap lastmod values.
Required change: Add 'Sitemap: https://starstell.com/sitemap.xml', generate the sitemap automatically and keep lastmod accurate.

Verification after all items:
1. Build the project and fix any build or type errors.
2. Fetch the built pages without JavaScript (for example `curl -sL https://starstell.com`) and confirm each new tag is in the raw HTML.
3. Validate any JSON-LD at https://validator.schema.org and https://search.google.com/test/rich-results.
4. Re-run `/seo audit` (Claude SEO Master Skills) and confirm these finding IDs no longer appear.
````

## Extra prompt: astrologer profile SEO

````text
You are adding SEO components and structured data to the astrologer profile pages of https://starstell.com.
Work in this repository. Read the relevant files before editing. When done, list every file changed and how you verified each step.

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
