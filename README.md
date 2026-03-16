# The Nest

A lightweight hybrid WordPress block theme — Full Site Editing (FSE) with a classic `functions.php` for PHP-side logic.

**Requires:** WordPress 6.4+, PHP 8.1+

---

## Table of Contents

- [What This Is](#what-this-is)
- [Local Development Setup](#local-development-setup)
- [Build Commands](#build-commands)
- [Forking This Theme](#forking-this-theme)
- [Designer's Guide](#designers-guide)
- [File Structure](#file-structure)
- [Keeping This README Current](#keeping-this-readme-current)

---

## What This Is

The Nest is a custom block theme built for Full Site Editing. It uses `theme.json` as the source of truth for design tokens (colors, type scale, spacing) and block templates written in HTML for page structure. There is no page builder — layouts are composed entirely from WordPress core blocks.

It is "hybrid" because `functions.php` still handles things that block themes can't: registering nav menus, enqueuing Google Fonts, registering block pattern categories, and declaring theme supports.

---

## Local Development Setup

This project is built and tested with [Local by Flywheel](https://localwp.com/).

1. **Clone the repo** into the theme directory of a Local WordPress site:
   ```
   wp-content/themes/the-nest/
   ```

2. **Install Node dependencies** (one-time):
   ```bash
   npm install
   ```

3. **Activate the theme** in WordPress Admin → Appearance → Themes.

4. **Start the dev watcher:**
   ```bash
   npm start
   ```
   This watches `src/` for JS/CSS changes and compiles to `build/`. If you're only editing PHP, `theme.json`, or template HTML files, no build step is needed — WordPress reads those directly.

### WordPress Admin areas you'll use regularly

| Area | Path | Purpose |
|---|---|---|
| Site Editor | Appearance → Editor | Edit templates, template parts, styles |
| Patterns | Appearance → Editor → Patterns | View/edit registered block patterns |
| Menus | Appearance → Editor → Navigation | Assign pages to primary/footer nav |
| Customizer | N/A | Not used — FSE replaces it |

---

## Build Commands

| Command | What it does |
|---|---|
| `npm start` | Dev mode — watches `src/`, rebuilds on change |
| `npm run build` | Production build — minified output to `build/` |
| `npm run lint:css` | Lint CSS files with WordPress coding standards |
| `npm run lint:js` | Lint JS files with WordPress coding standards |
| `npm run format` | Auto-format JS/CSS files |

> **Note:** There are no custom blocks yet and `src/` is not scaffolded. The build toolchain (`@wordpress/scripts ^30`) is in place for when that changes.

---

## Forking This Theme

If you're starting a new project from this theme:

### 1. Rename the theme

- In `style.css`: update `Theme Name`, `Theme URI`, `Author`, `Author URI`, `Description`, `Version`, and `Text Domain`.
- In `functions.php`: replace every instance of `nest` (the text domain) and `nest_` (the function prefix) with your own.
- In `theme.json`: no renaming needed, but update `customTemplates` or `templateParts` if you rename files.
- In `package.json`: update `name` and `description`.

### 2. Update the text domain

The text domain is `nest`. It appears in:
- `style.css` header (`Text Domain: nest`)
- Every `__( 'String', 'nest' )` call in `functions.php`
- Any pattern PHP files in `patterns/`

Search for `'nest'` (with quotes) to find all instances.

### 3. Regenerate slugs if you change the color/spacing/type scales

WordPress derives CSS custom properties directly from `theme.json` slugs. If you rename a slug, every block or template that references the old CSS variable (`var(--wp--preset--color--primary)`) will break. Rename slugs carefully and do a project-wide search for the old variable name.

**Slug naming rules** (WordPress will silently drop slugs that break these):
- Must not start with a digit (`xl-2` ✓, `2xl` ✗)
- Must be kebab-case for multi-word slugs

### 4. Register your nav menus

Menu locations are registered in `functions.php → nest_setup()`. The theme currently registers:
- `primary` — main header navigation
- `footer` — footer navigation

Add or rename these if your design needs different locations. Assign pages to menus in **Appearance → Editor → Navigation**.

### 5. Patterns

Block patterns live in `patterns/` as PHP files and are registered in `functions.php → nest_register_patterns()`. To add a new pattern:

1. Create `patterns/your-pattern-name.php` with block markup.
2. Register it in `nest_register_patterns()` using `register_block_pattern()`.
3. It will appear in the editor under the **The Nest** pattern category.

---

## Designer's Guide

This section is for designers working in the WordPress Site Editor without touching code.

### How styles work

Design tokens (colors, fonts, font sizes, spacing) are defined in `theme.json`. The Site Editor exposes these as the options you see in block sidebars. **Do not try to override these by adding inline styles in the editor** — edit `theme.json` instead and those changes cascade everywhere.

### Colors

The theme palette is available in every block's color picker:

| Name | Hex | Use |
|---|---|---|
| Primary | `#2563eb` | Buttons, links, accents |
| Accent | `#14b8a6` | Hover states, secondary highlights |
| Neutral Dark | `#111827` | Headings |
| Neutral Medium | `#374151` | Body text |
| Background | `#f9fafb` | Page background |
| Surface | `#ffffff` | Cards, panels |

### Typography

- **Headings:** Plus Jakarta Sans (Google Fonts) — weights 400–800
- **Body:** Inter (Google Fonts) — weights 300–700

Font sizes available in the editor range from `sm` (0.875rem) to `xl-6` (3.75rem). The scale is set in `theme.json` — do not add custom font sizes via inline styles as they won't be consistent.

### Layout widths

- **Content width:** 760px — default block width
- **Wide alignment:** 1200px — for blocks set to "Wide width"
- **Full width:** 100vw — for blocks set to "Full width"

Use wide/full alignment for hero sections, image banners, and backgrounds that should bleed to the edges.

### Templates vs. Template Parts

- **Templates** (`templates/`) define the full page layout for different content types (blog index, single post, page, 404).
- **Template Parts** (`parts/`) are reusable sections embedded in templates — currently `header.html` and `footer.html`.

Edit these in **Appearance → Editor → Templates** or **→ Template Parts**. Changes saved there are stored in the database as customizations. To reset to theme defaults, click the three-dot menu → **Clear customizations**.

### Block Patterns

Pre-built layout sections are available under **The Nest** category in the block inserter (`/` key or the `+` button). Currently available:

- **Hero Banner** — full-width hero with heading, description, and primary + secondary CTA buttons.

Patterns are a starting point — once inserted, every block in a pattern is independently editable.

### Navigation menus

Assign pages to menus in **Appearance → Editor → Navigation**. The theme has two menu locations:

- **Primary Navigation** — displayed in the header
- **Footer Navigation** — displayed in the footer

---

## File Structure

```
/
├── style.css           # Theme header (required by WP) + base CSS resets
├── functions.php       # Theme setup, nav menus, Google Fonts, block patterns
├── theme.json          # Design tokens: colors, type scale, spacing, shadows
├── index.php           # Required fallback (intentionally empty)
├── package.json        # @wordpress/scripts build toolchain
├── patterns/
│   └── hero-banner.php # Hero block pattern markup
├── templates/
│   ├── index.html      # Blog index (wp:query loop)
│   ├── single.html     # Single post + comments
│   ├── page.html       # Static page
│   └── 404.html        # 404 not found
└── parts/
    ├── header.html     # Site logo + primary navigation
    └── footer.html     # Site title + copyright + footer nav
```

---

## Keeping This README Current

**Rule: update this README whenever any of the following change:**

- A new template or template part is added to `templates/` or `parts/`
- A new block pattern is registered
- A color, font, font size, or spacing token is added, renamed, or removed in `theme.json`
- A new nav menu location is registered in `functions.php`
- A new `npm` script is added to `package.json`
- The WordPress or PHP minimum version requirements change
- A custom block is scaffolded under `src/`

The sections most likely to go stale are **File Structure**, **Block Patterns**, **Colors**, and **Build Commands**. Check those first.
