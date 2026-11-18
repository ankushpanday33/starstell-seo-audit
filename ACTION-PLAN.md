# Action Plan: starstell.com

SEO Health Score: 51/100 (17/11/2026).

Each action lists what it unblocks or depends on, how you would know it failed, and a leading indicator to watch.

## Phase 1: Remove risk (week 1)

| # | Action | Unblocks / depends on | Failure check | Leading indicator |
|---|---|---|---|---|
| 1 | **Most sitemap URLs redirect to the homepage or /talk-to-astrologer** (TECH-001). Find out why these routes redirect (a login or session gate, or a retired route map). Serve real 200 pages with unique content, or remove dead URLs from the sitemap. Daily horoscope pages are the biggest organic opportunity. | Unlocks about 190 indexable landing pages (44 horoscope, 38 astrologer profiles, 84 products). | Re-fetch 20 sitemap URLs per section and expect HTTP 200 with a self-referencing canonical. | - |
| 2 | **Homepage canonical, og:url and schema point to www, but www 301s to the non-www site** (TECH-002). Pick one host (non-www is already in the sitemap). Make every canonical, og:url, JSON-LD URL and internal link use it, and 301 the other host everywhere, including /about, /blog and /get-your-free-kundali. | Consolidates link signals and removes host ambiguity on the most important page. | View source on the homepage and /about: the canonical host equals the URL in the address bar. | - |
| 3 | **Homepage has no H1** (ONP-001). Add one H1 that states the offer, for example 'Talk to Astrologers Online 24x7 in Hindi, Tamil and English'. Promote the section headings to H2. | Clearer topic signal for search engines and AI summarisers. | Exactly one H1 on the page. | - |
| 4 | **Missing pages return a 302 redirect, not a 404** (TECH-003). Return a true 404 status with a helpful page for unknown routes. Stop redirecting unknown paths to /talk-to-astrologer. | Cleaner index and no soft-404 flags. | An unknown URL returns HTTP 404. | - |

## Phase 2: Earn rankings (weeks 2 to 3)

| # | Action | Unblocks / depends on | Failure check | Leading indicator |
|---|---|---|---|---|
| 5 | **Cloudflare returns 403 to ClaudeBot and PerplexityBot** (GEO-001). In Cloudflare, check Bot Fight Mode and AI Crawl Control and allow the AI crawlers you want, or state the block in robots.txt so policy and behaviour agree. | Makes the site eligible for Claude and Perplexity answers. | Re-run the request with each bot user agent and expect 200. | - |
| 6 | **Homepage has no meta description; other pages have none or an empty one** (ONP-002). Add unique 140 to 160 character descriptions to the homepage, astrologer profiles, tarot, numerology and policy pages. | Better click-through from controlled snippets. |  | - |
| 7 | **Some titles are wrong or inconsistent** (ONP-003). Write unique titles per page (primary keyword first, brand last) and use one brand spelling. | Higher relevance and click-through. |  | - |
| 8 | **Many pages have no canonical tag** (ONP-004). Add self-referencing canonicals site-wide and remove the ?spl= URLs from the sitemap. | Prevents duplicate-URL dilution. |  | - |
| 9 | **Slow server response and a heavy homepage load (lab sample, not field data)** (CWV-001). Cache the HTML at Cloudflare where safe (the response is cache-control: no-cache, private and cf-cache-status DYNAMIC), defer the Facebook pixel and utils.js, replace the loading.gif, and serve images in WebP or AVIF. Then re-measure with PageSpeed Insights using an API key. | Faster LCP and lower bounce on mobile traffic. | Run PageSpeed Insights mobile and check LCP under 2.5 s, INP under 200 ms, CLS under 0.1. | - |

## Phase 3: Authority and coverage (month 2)

| # | Action | Unblocks / depends on | Failure check | Leading indicator |
|---|---|---|---|---|
| 10 | **Thin trust and expertise signals for an advice-style topic** (CNT-001). Publish daily and weekly horoscope pages with unique text, author bylines with credentials, an editorial policy, a clear disclaimer, and a working blog. | E-E-A-T and long-tail traffic. |  | - |
| 11 | **Basic Organization schema only on the homepage** (SCH-001). Use https://schema.org, fix the logo URL, add WebSite with SearchAction, ProfessionalService and Person for astrologers, Product and Offer for gemstones and reports, and FAQPage where real FAQs exist. | Rich-result eligibility and clearer entity signals. |  | - |

## Phase 4: Hygiene and monitoring (ongoing)

| # | Action | Unblocks / depends on | Failure check | Leading indicator |
|---|---|---|---|---|
| 12 | **15 of 68 homepage images have no alt text** (IMG-001). Add descriptive alt text (astrologer name and specialty) and use alt="" for decorative images. | Accessibility and image search. |  | - |
| 13 | **Missing security headers** (TECH-004). Add CSP, frame-ancestors, Referrer-Policy and Permissions-Policy via Cloudflare or the app. | Hardening and trust signals. |  | - |
| 14 | **robots.txt has no Sitemap line and sitemap dates are stale** (TECH-005). Add 'Sitemap: https://starstell.com/sitemap.xml', generate the sitemap automatically and keep lastmod accurate. | Faster discovery of new pages. |  | - |

