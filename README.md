# Spicola Technologies — WordPress Theme

A clean, lightweight custom theme for the Spicola Technologies corporate site.
Includes a marketing landing page (hero, services, the **Limitless** product
section, about, contact) and a blog.

## Files

| File | Purpose |
|------|---------|
| `style.css` | Theme header (required by WordPress) + all styling |
| `functions.php` | Theme setup: menus, logo, featured images, asset loading |
| `header.php` / `footer.php` | Shared chrome (nav + footer) |
| `front-page.php` | The landing page (used when a static front page is set) |
| `index.php` | Blog post index / archives |
| `single.php` | Individual blog post |
| `page.php` | Generic pages (About, Privacy, etc.) |

## Install on Hostinger WordPress

1. **Zip the folder.** Select all files *inside* `spicola-technologies-theme`
   and create `spicola-technologies-theme.zip`. (The zip must contain
   `style.css` at its top level — not a nested extra folder.)
2. In WordPress admin: **Appearance → Themes → Add New → Upload Theme** →
   choose the zip → **Install** → **Activate**.

## One-time configuration (5 minutes)

1. **Make the landing page the home page**
   - Create a Page named **Home** (leave it blank — `front-page.php` handles it).
   - Create a Page named **Blog** (blank).
   - **Settings → Reading → Your homepage displays → A static page** →
     Homepage = **Home**, Posts page = **Blog**.
2. **Set the menu (optional)**
   - **Appearance → Menus** → create a menu, add links (Products, About, Blog,
     Contact), assign it to **Primary Menu**.
   - If you skip this, a sensible default menu shows automatically.
3. **Logo & name**
   - **Appearance → Customize → Site Identity** → set Site Title to
     *Spicola Technologies*, add a tagline, optionally upload a logo.
4. **SEO** (recommended)
   - Install the **Rank Math** or **Yoast SEO** plugin so the blog earns search traffic.

## Connecting it to your domain / GBP

- Point your registered domain (e.g. `spicolatechnologies.com`) at this
  Hostinger WordPress site.
- In your **Google Business Profile**, set the website field to that exact URL.
- The site mentions **Limitless** as a product on the landing page — this keeps
  the GBP, website, and applicant coherent for the Business Profile API review.

## Editing content

- **Landing copy:** edit `front-page.php` (plain HTML between the PHP tags).
- **Contact email:** search `front-page.php` and `footer.php` for
  `hello@spicolatechnologies.com` and replace.
- **Brand color:** change `--brand` in `style.css` (top, under "Design tokens").
- **Blog posts:** add them normally via **Posts → Add New** (no code needed).

## Note on the theme screenshot

WordPress shows a `screenshot.png` (1200×900) as the theme thumbnail in the
admin. It's optional — the theme works without it. Drop one into this folder if
you want a preview image in **Appearance → Themes**.
