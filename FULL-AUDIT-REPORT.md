# SEO Audit: starstell.com

Audit date: 17/11/2026 | Business type: Consumer service: astrology and wellness marketplace (India) | Method: Crawler-eye smoke test, homepage and 4 template checks, sitemap of 236 URLs parsed with 1 to 2 URLs sampled per section (about 45 fetched), AI crawler matrix. Run inline, no subagents.

## SEO Health Score: 51 / 100

| Category | Weight | Score | Weighted |
|---|---|---|---|
| Technical SEO | 22% | 45 | 9.9 |
| Content Quality | 23% | 50 | 11.5 |
| On-Page SEO | 20% | 55 | 11.0 |
| Schema / Structured Data | 10% | 50 | 5.0 |
| Performance (CWV) | 10% | 55 | 5.5 |
| AI Search Readiness | 10% | 40 | 4.0 |
| Images | 5% | 75 | 3.8 |
| **Total** | | | **51** |

## Executive Summary

StarsTell is indexable and not blocked, but its structure leaks value: about 190 of 236 sitemap URLs redirect to two pages, and the homepage canonical points at a host that redirects away. Fixing routes and the canonical host is the largest win because it makes the astrologer, horoscope and product pages indexable.

The score is held down by one root problem: **Routes and canonical hosts are not aligned. The sitemap lists pages the app redirects away, and canonicals reference the www host while the site lives on non-www.**

Findings: 2 critical, 3 high, 6 medium, 3 low.

### Top 5 critical issues
1. **Most sitemap URLs redirect to the homepage or /talk-to-astrologer.** Of 236 sitemap URLs, every section sampled (horoscopes, best-astrologer, item-detail, online-puja-detail, report-detail-new, products, shop, pranic-healing, astrological-reports, online-puja, ask-a-question) answers with a 301 or 302 to / or /talk-to-astrologer.
2. **Homepage canonical, og:url and schema point to www, but www 301s to the non-www site.** The homepage canonical is https://www.starstell.com/ while www redirects to https://starstell.com/.
3. **Cloudflare returns 403 to ClaudeBot and PerplexityBot.** GPTBot and Google-Extended get 200, but ClaudeBot and PerplexityBot are blocked with 403 although robots.txt allows everything.
4. **Homepage has no H1.** The homepage has zero H1 tags and a single H2 ('OUR ASTROLOGERS').
5. **Missing pages return a 302 redirect, not a 404.** A made-up URL answers 302 instead of 404, and /llms.txt does too.

### Top 5 quick wins
1. **Homepage canonical, og:url and schema point to www, but www 301s to the non-www site.** Pick one host (non-www is already in the sitemap).
2. **Cloudflare returns 403 to ClaudeBot and PerplexityBot.** In Cloudflare, check Bot Fight Mode and AI Crawl Control and allow the AI crawlers you want, or state the block in robots.txt so policy and behaviour agree.
3. **Homepage has no H1.** Add one H1 that states the offer, for example 'Talk to Astrologers Online 24x7 in Hindi, Tamil and English'.
4. **Missing pages return a 302 redirect, not a 404.** Return a true 404 status with a helpful page for unknown routes.

### Key metrics

| Metric | Value |
|---|---|
| Sitemap URLs | 236 |
| Homepage images | 68 |
| Images missing alt | 15 |
| Homepage words | 1,654 |

## Technical SEO (45)

Redirect-heavy sitemap, canonical host conflict, soft 404s.

| Finding | Severity | Fix |
|---|---|---|
| Most sitemap URLs redirect to the homepage or /talk-to-astrologer (TECH-001) | Critical | Find out why these routes redirect (a login or session gate, or a retired route map). |
| Homepage canonical, og:url and schema point to www, but www 301s to the non-www site (TECH-002) | Critical | Pick one host (non-www is already in the sitemap). |
| Missing pages return a 302 redirect, not a 404 (TECH-003) | High | Return a true 404 status with a helpful page for unknown routes. |
| Missing security headers (TECH-004) | Low | Add CSP, frame-ancestors, Referrer-Policy and Permissions-Policy via Cloudflare or the app. |
| robots.txt has no Sitemap line and sitemap dates are stale (TECH-005) | Low | Add 'Sitemap: https://starstell.com/sitemap.xml', generate the sitemap automatically and keep lastmod accurate. |

## Content Quality (50)

Existing pages are decent; most content sections are unreachable.

| Finding | Severity | Fix |
|---|---|---|
| Thin trust and expertise signals for an advice-style topic (CNT-001) | Medium | Publish daily and weekly horoscope pages with unique text, author bylines with credentials, an editorial policy, a clear disclaimer, and a working blog. |

## On-Page SEO (55)

No homepage H1 or description, some wrong titles.

| Finding | Severity | Fix |
|---|---|---|
| Homepage has no H1 (ONP-001) | High | Add one H1 that states the offer, for example 'Talk to Astrologers Online 24x7 in Hindi, Tamil and English'. |
| Homepage has no meta description; other pages have none or an empty one (ONP-002) | Medium | Add unique 140 to 160 character descriptions to the homepage, astrologer profiles, tarot, numerology and policy pages. |
| Some titles are wrong or inconsistent (ONP-003) | Medium | Write unique titles per page (primary keyword first, brand last) and use one brand spelling. |
| Many pages have no canonical tag (ONP-004) | Medium | Add self-referencing canonicals site-wide and remove the ?spl= URLs from the sitemap. |

## Schema / Structured Data (50)

Organization only on the homepage.

| Finding | Severity | Fix |
|---|---|---|
| Basic Organization schema only on the homepage (SCH-001) | Medium | Use https://schema.org, fix the logo URL, add WebSite with SearchAction, ProfessionalService and Person for astrologers, Product and Offer for gemstones and reports, and FAQPage where real FAQs exist. |

## Performance (CWV) (55)

Slow TTFB and heavy JS; LCP, INP and CLS not captured.

| Finding | Severity | Fix |
|---|---|---|
| Slow server response and a heavy homepage load (lab sample, not field data) (CWV-001) | Medium | Cache the HTML at Cloudflare where safe (the response is cache-control: no-cache, private and cf-cache-status DYNAMIC), defer the Facebook pixel and utils.js, replace the loading.gif, and serve images in WebP or AVIF. |

## AI Search Readiness (40)

Claude and Perplexity are blocked; no llms.txt.

| Finding | Severity | Fix |
|---|---|---|
| Cloudflare returns 403 to ClaudeBot and PerplexityBot (GEO-001) | High | In Cloudflare, check Bot Fight Mode and AI Crawl Control and allow the AI crawlers you want, or state the block in robots.txt so policy and behaviour agree. |

## Images (75)

Lazy loading in place; 22% missing alt text.

| Finding | Severity | Fix |
|---|---|---|
| 15 of 68 homepage images have no alt text (IMG-001) | Low | Add descriptive alt text (astrologer name and specialty) and use alt="" for decorative images. |

## Limitations

- L
- C
- P
- ,
-  
- I
- N
- P
- ,
-  
- C
- L
- S
- ,
-  
- L
- i
- g
- h
- t
- h
- o
- u
- s
- e
- ,
-  
- s
- c
- r
- e
- e
- n
- s
- h
- o
- t
- s
- ,
-  
- S
- e
- a
- r
- c
- h
-  
- C
- o
- n
- s
- o
- l
- e
-  
- a
- n
- d
-  
- b
- a
- c
- k
- l
- i
- n
- k
-  
- d
- a
- t
- a
-  
- w
- e
- r
- e
-  
- n
- o
- t
-  
- c
- o
- l
- l
- e
- c
- t
- e
- d
-  
- (
- P
- a
- g
- e
- S
- p
- e
- e
- d
-  
- A
- P
- I
-  
- q
- u
- o
- t
- a
-  
- e
- x
- h
- a
- u
- s
- t
- e
- d
- ;
-  
- p
- e
- r
- f
- o
- r
- m
- a
- n
- c
- e
-  
- i
- s
-  
- f
- r
- o
- m
-  
- o
- n
- e
-  
- b
- r
- o
- w
- s
- e
- r
-  
- l
- o
- a
- d
- )
- .
-  
- S
- c
- o
- r
- e
- s
-  
- a
- r
- e
-  
- j
- u
- d
- g
- e
- m
- e
- n
- t
- -
- b
- a
- s
- e
- d
-  
- e
- s
- t
- i
- m
- a
- t
- e
- s
- .
-  
- S
- i
- t
- e
- m
- a
- p
-  
- s
- e
- c
- t
- i
- o
- n
- s
-  
- w
- e
- r
- e
-  
- s
- a
- m
- p
- l
- e
- d
- ,
-  
- n
- o
- t
-  
- f
- u
- l
- l
- y
-  
- c
- r
- a
- w
- l
- e
- d
- .
-  
- R
- e
- d
- i
- r
- e
- c
- t
- s
-  
- w
- e
- r
- e
-  
- s
- e
- e
- n
-  
- w
- i
- t
- h
- o
- u
- t
-  
- c
- o
- o
- k
- i
- e
- s
-  
- a
- n
- d
-  
- c
- o
- u
- l
- d
-  
- d
- i
- f
- f
- e
- r
-  
- f
- o
- r
-  
- l
- o
- g
- g
- e
- d
- -
- i
- n
-  
- u
- s
- e
- r
- s
- .

Evidence, code and checks for every finding: `SEO-Report.pdf`. Fix prompts: `FIX-PROMPTS.md`.
