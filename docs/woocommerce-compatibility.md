# WooCommerce Compatibility Plan

**Theme:** The Nest
**Status:** Planned
**WooCommerce target:** 8.x+ (HPOS-compatible, block cart/checkout)

---

## Overview

Adding WooCommerce support to The Nest involves five distinct phases, ordered by dependency. Phases 1–2 are required before the store is functional at all. Phases 3–5 bring it to a polished, on-brand experience.

---

## Phase 1 — Foundation (Required First)

**Goal:** Make WordPress + WooCommerce aware that this theme supports the plugin. Without this, WooCommerce falls back to its own unstyled templates and ignores your header/footer.

### Tasks

- [ ] Add `add_theme_support( 'woocommerce' )` and gallery support flags to `functions.php`
- [ ] Wrap all WooCommerce hooks in `class_exists( 'WooCommerce' )` checks so the theme degrades gracefully if WC is not installed
- [ ] Confirm WooCommerce's built-in block templates load correctly after declaration (shop page, single product, cart, checkout, account)

### Code

```php
// functions.php — inside after_setup_theme
if ( class_exists( 'WooCommerce' ) ) {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
```

### Files changed
- `functions.php`

---

## Phase 2 — Block Templates

**Goal:** Override WooCommerce's default FSE templates with custom versions that use The Nest's header/footer parts and match the site's layout conventions.

WooCommerce automatically injects its own block templates into FSE themes. Placing files in `templates/` with the matching slug takes priority.

### Templates to create

| File | Covers |
|---|---|
| `templates/single-product.html` | Individual product page |
| `templates/archive-product.html` | Shop / category listing pages |
| `templates/page-cart.html` | Cart page |
| `templates/page-checkout.html` | Checkout page |
| `templates/page-account.html` | My Account page |

### Structure convention (each template)

```
header part
  └── wp:template-part {"slug":"header"}
content area (constrained, 1600px max)
  └── WooCommerce block(s) for this page
footer part
  └── wp:template-part {"slug":"footer"}
```

### Key WooCommerce blocks

- `wp:woocommerce/product-template` — product card grid (shop/archive)
- `wp:woocommerce/single-product` — full product detail
- `wp:woocommerce/cart` — cart block
- `wp:woocommerce/checkout` — checkout block
- `wp:woocommerce/customer-account` — account block

### Files changed
- `templates/single-product.html` (new)
- `templates/archive-product.html` (new)
- `templates/page-cart.html` (new)
- `templates/page-checkout.html` (new)
- `templates/page-account.html` (new)

---

## Phase 3 — Header Integration

**Goal:** Wire the existing shopping bag icon in the header topbar to the live WooCommerce cart URL and show a cart item count badge.

Currently the topbar link is static HTML in `parts/header.html` pointing to `#`. It needs to become dynamic.

### Approach

Replace the static `<a href="#">` in the topbar with a shortcode, following the same pattern used for `[nest_biz_header_phone]`.

### Shortcode: `[nest_header_cart]`

```php
add_shortcode( 'nest_header_cart', function() {
    if ( ! class_exists( 'WooCommerce' ) ) return '';

    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $url   = wc_get_cart_url();

    $badge = $count
        ? '<span class="nest-cart-count" aria-label="' . $count . ' items in cart">' . $count . '</span>'
        : '';

    return sprintf(
        '<a href="%s" class="site-header__topbar-link">
            <i data-lucide="shopping-bag" aria-hidden="true"></i>
            Online Store%s
        </a>',
        esc_url( $url ),
        $badge
    );
} );
```

### Cart count badge styles (style.css)

```css
.nest-cart-count {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 1.25rem;
  height: 1.25rem;
  padding: 0 0.25rem;
  border-radius: 999px;
  background: var(--wp--preset--color--primary);
  color: #fff;
  font-size: 0.6875rem;
  font-weight: 600;
  line-height: 1;
  margin-left: 0.25rem;
}
```

### Cart count AJAX refresh

WooCommerce fires a `wc_fragments_refreshed` JS event when the cart updates. Hook into it to update the badge without a page reload:

```js
// theme.js addition
jQuery( document.body ).on( 'wc_fragments_refreshed', function () {
    // WC updates fragments automatically if you use the shortcode
    // approach and return it as a fragment key. See WC docs on
    // `woocommerce_add_to_cart_fragments` filter.
} );
```

> **Note:** For fully automatic live updates, register the shortcode output as a WooCommerce cart fragment via the `woocommerce_add_to_cart_fragments` filter. This is optional for launch but recommended for a smooth UX.

### Files changed
- `functions.php` — new shortcode
- `parts/header.html` — replace static link with `[nest_header_cart]`
- `style.css` — badge styles

---

## Phase 4 — CSS Styling

**Goal:** Make all WooCommerce UI components match The Nest's design tokens (colors, typography, spacing, border-radius).

This is the largest phase by volume of work. WooCommerce injects `woocommerce.css` which sets its own defaults; our overrides go in `style.css`.

### Areas to style

#### Buttons
WC uses `.button`, `.wc-block-components-button`, `.wp-block-button__link` interchangeably.

```css
/* Match primary CTA style */
.woocommerce .button,
.wc-block-components-button {
  background: var(--wp--preset--color--primary);
  color: #fff;
  border-radius: 6px;
  font-weight: 600;
  /* ... */
}
```

#### Product Cards (shop grid)
- Image aspect ratio (recommend 4:3 or 1:1, consistent)
- Product title font/size
- Price color (use `--wp--preset--color--accent` for sale price)
- Add to cart button placement

#### Sale / Badge Labels
- `.woocommerce-badge`, `.wc-block-components-product-sale-badge`
- Use `--wp--preset--color--accent` background

#### Cart & Checkout Blocks
- `.wc-block-cart`, `.wc-block-checkout`
- Form field border-radius, focus ring color
- Step indicator / progress bar colors
- Order summary background (use `surface` token)

#### Notices / Alerts
- `.woocommerce-message`, `.woocommerce-error`, `.woocommerce-info`
- Consider integrating with the existing `.nest-alerts-bar` component visually

#### Star Ratings
- `.star-rating span` — color with `--wp--preset--color--accent`

#### Quantity Steppers
- `.wc-block-components-quantity-stepper`
- Match border and button style

### Files changed
- `style.css` — new `/* === WooCommerce ==== */` section

---

## Phase 5 — Business Info Integration

**Goal:** Surface relevant Business Info CMS fields in WooCommerce contexts where they add value.

### Opportunities

| Location | Data |
|---|---|
| Checkout sidebar | Business phone (for order questions) |
| Order confirmation email | Business email |
| My Account page | Business hours (support availability) |

These can be added via WooCommerce action hooks (`woocommerce_checkout_after_order_review`, `woocommerce_email_footer`, etc.) in `functions.php`, pulling from the existing `nest_get_business_info()` helper.

### Files changed
- `functions.php` — new action hook callbacks

---

## Implementation Order

```
Phase 1  →  Phase 2  →  Phase 3  →  Phase 4  →  Phase 5
 ~30 min     ~2–3 hrs    ~1 hr       ~4–6 hrs     ~1 hr
```

Total estimated effort: **8–12 hours** for a fully polished integration.

Phases 1 and 2 alone are enough to have a functional store. Phases 3–5 are about quality and brand consistency.

---

## Open Questions

- [ ] What products will the store sell? (Physical, digital, or subscriptions — affects which WC extensions are needed)
- [ ] Will checkout be WooCommerce's block checkout or classic shortcode checkout?
- [ ] Is a mini-cart (slide-out drawer) wanted, or just the full cart page?
- [ ] Should product archive pages use the standard WC grid or a custom layout?
