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
