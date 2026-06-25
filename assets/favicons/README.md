# Favicons / app icons

The manifest (`site.webmanifest`) references `icon-192.png` and `icon-512.png`,
which are **not yet in the repo** — they're TODO brand assets.

## Easiest path (recommended)

Upload a single **512×512 Site Icon** in WordPress:
**Appearance → Customize → Site Identity → Site Icon**.

WordPress then auto-generates and wires up `favicon.ico`, `apple-touch-icon`,
and the 16/32px PNGs for you — no files needed here. The theme detects the Site
Icon and stops emitting the inline-SVG fallback automatically
(see `inc/seo.php`).

## If you also want the PWA manifest icons

Drop these PNGs into this folder so `site.webmanifest` resolves cleanly:

- `icon-192.png` — 192×192
- `icon-512.png` — 512×512

Generate them from the brand mark with any favicon tool (e.g. realfavicongenerator.net).

> Until the Site Icon is set, the tab shows a branded inline-SVG fallback so it
> is never blank.
