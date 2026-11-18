# StarsTell SEO Audit

SEO audit of https://starstell.com, run on 17/11/2026.

**Overall SEO health score: 51/100** (14 findings)

## Summary

StarsTell is indexable and not blocked, but its structure leaks value. About 190 of 236 sitemap URLs redirect to the homepage or /talk-to-astrologer, and the homepage canonical points at a host (www) that redirects away.

## Top issues

- **Critical:** Most sitemap URLs (horoscopes, astrologer profiles, products) redirect instead of returning real pages.
- **Critical:** Homepage canonical, og:url and schema use www, but www 301s to the non-www site.
- **High:** Missing pages return a 302 instead of a 404.
- **High:** Cloudflare returns 403 to ClaudeBot and PerplexityBot.
- **High:** Homepage has no H1.

## Files

| File | What it is |
|---|---|
| [FULL-AUDIT-REPORT.md](FULL-AUDIT-REPORT.md) | Complete findings with evidence |
| [ACTION-PLAN.md](ACTION-PLAN.md) | Prioritised fixes and 30-day plan |
| [FIX-PROMPTS.md](FIX-PROMPTS.md) | Copy-paste prompts for all tools |
| [fix-prompts/claude-code.md](fix-prompts/claude-code.md) | Prompt for Claude Code |
| [fix-prompts/cursor.md](fix-prompts/cursor.md) | Prompt for Cursor |
| [fix-prompts/antigravity.md](fix-prompts/antigravity.md) | Prompt for Antigravity |
| [fix-prompts/lovable.md](fix-prompts/lovable.md) | Prompt for Lovable |
| [astrologer-profile/](astrologer-profile/README.md) | Components and JSON-LD kit for astrologer profile pages |

## Limits of this audit

Search Console, backlink and field Core Web Vitals data were not collected. Performance comes from a single browser load. Sitemap sections were sampled, not fully crawled. Scores are judgement-based estimates.

Confidential | Hungama Digital Media Entertainment Pvt. Ltd.
