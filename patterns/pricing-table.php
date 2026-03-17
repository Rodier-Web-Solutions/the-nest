<?php
/**
 * Title: Pricing Table
 * Slug: nest/pricing-table
 * Categories: nest
 * Keywords: pricing, plans, table, cards
 * Description: Three-tier pricing table with feature lists and CTA buttons. Middle card is highlighted as the recommended plan. Edit plan names, prices, and features directly in the editor.
 */
?>
<!-- wp:group {"align":"full","className":"nest-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl-3","bottom":"var:preset|spacing|xl-3"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull nest-section">

<!-- Intro -->
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group">

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase","fontSize":"0.8125rem"},"color":{"text":"var(--wp--preset--color--accent)"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-color has-text-align-center" style="color:var(--wp--preset--color--accent);font-size:0.8125rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;margin-top:0;margin-bottom:0">Pricing Plans</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|md"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--md)">Simple, Transparent Pricing</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-color has-text-align-center" style="color:var(--wp--preset--color--neutral-medium);margin-top:0;margin-bottom:0">No hidden fees. No surprises. Cancel any time.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- Cards grid -->
<!-- wp:group {"className":"services-grid nest-pricing-grid","style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group services-grid nest-pricing-grid">

<!-- ===================== CARD 1: Basic (light) ===================== -->
<!-- wp:group {"backgroundColor":"surface","className":"nest-pricing-card","style":{"border":{"radius":"1rem","color":"#e5e7eb","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background nest-pricing-card" style="border-radius:1rem;border:1px solid #e5e7eb">

<!-- Plan tier label -->
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","fontSize":"0.75rem"},"color":{"text":"var(--wp--preset--color--accent)"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--accent);font-size:0.75rem;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Starter</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","fontSize":"var:preset|font-size|xl-2"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|md"}}}} -->
<h3 class="wp-block-heading" style="font-weight:700;font-size:var(--wp--preset--font-size--xl-2);margin-top:0;margin-bottom:var(--wp--preset--spacing--md)">Basic</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"800","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0.25rem"}}}} -->
<p style="font-size:3rem;font-weight:800;line-height:1;margin-top:0;margin-bottom:0.25rem">$29</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)">per month, billed annually</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.9375rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.9375rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)">Great for freelancers and individuals getting started.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"style":{"color":{"background":"#e5e7eb"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity" style="background-color:#e5e7eb;color:#e5e7eb;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"nest-pricing-features","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|xl"}}}} -->
<ul class="nest-pricing-features wp-block-list" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:list-item --><li>5 projects</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>10 GB storage</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Basic analytics</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Email support</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>API access</li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"width":100,"style":{"border":{"radius":"0.5rem"},"typography":{"fontWeight":"600"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:0.5rem;font-weight:600">Get Started</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- ===================== CARD 2: Pro (highlighted, primary bg) ===================== -->
<!-- wp:group {"backgroundColor":"primary","className":"nest-pricing-card","style":{"border":{"radius":"1rem"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-primary-background-color has-background nest-pricing-card" style="border-radius:1rem">

<!-- Most Popular badge -->
<!-- wp:group {"style":{"border":{"radius":"9999px","color":"rgba(255,255,255,0.25)","style":"solid","width":"1px"},"spacing":{"padding":{"top":"0.3rem","bottom":"0.3rem","left":"0.875rem","right":"0.875rem"},"margin":{"top":"0","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group" style="border-radius:9999px;border:1px solid rgba(255,255,255,0.25);padding:0.3rem 0.875rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--md);display:inline-flex;justify-content:center">
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","fontSize":"0.75rem"},"color":{"text":"#ffffff"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-color" style="color:#ffffff;font-size:0.75rem;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;margin-top:0;margin-bottom:0">⭐ Most Popular</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- Plan tier label -->
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","fontSize":"0.75rem"},"color":{"text":"rgba(255,255,255,0.65)"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.65);font-size:0.75rem;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Professional</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"},"typography":{"fontWeight":"700","fontSize":"var:preset|font-size|xl-2"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|md"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#ffffff;font-weight:700;font-size:var(--wp--preset--font-size--xl-2);margin-top:0;margin-bottom:var(--wp--preset--spacing--md)">Pro</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"3rem","fontWeight":"800","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0.25rem"}}}} -->
<p class="has-text-color" style="color:#ffffff;font-size:3rem;font-weight:800;line-height:1;margin-top:0;margin-bottom:0.25rem">$79</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.6)"},"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.6);font-size:0.875rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)">per month, billed annually</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.85)"},"typography":{"fontSize":"0.9375rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.85);font-size:0.9375rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)">Perfect for growing teams and businesses scaling up.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"style":{"color":{"background":"rgba(255,255,255,0.15)"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity" style="background-color:rgba(255,255,255,0.15);color:rgba(255,255,255,0.15);margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"nest-pricing-features","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|xl"}}}} -->
<ul class="nest-pricing-features wp-block-list" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:list-item --><li>Unlimited projects</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>100 GB storage</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Advanced analytics</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Priority email &amp; chat</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>API access</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Custom integrations</li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"surface","textColor":"primary","width":100,"style":{"border":{"radius":"0.5rem"},"typography":{"fontWeight":"700"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-surface-background-color has-primary-text-color has-text-color has-background wp-element-button" style="border-radius:0.5rem;font-weight:700">Get Started Free</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- ===================== CARD 3: Business (light) ===================== -->
<!-- wp:group {"backgroundColor":"surface","className":"nest-pricing-card","style":{"border":{"radius":"1rem","color":"#e5e7eb","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background nest-pricing-card" style="border-radius:1rem;border:1px solid #e5e7eb">

<!-- Plan tier label -->
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","fontSize":"0.75rem"},"color":{"text":"var(--wp--preset--color--accent)"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--accent);font-size:0.75rem;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Enterprise</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","fontSize":"var:preset|font-size|xl-2"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|md"}}}} -->
<h3 class="wp-block-heading" style="font-weight:700;font-size:var(--wp--preset--font-size--xl-2);margin-top:0;margin-bottom:var(--wp--preset--spacing--md)">Business</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"800","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0.25rem"}}}} -->
<p style="font-size:3rem;font-weight:800;line-height:1;margin-top:0;margin-bottom:0.25rem">$149</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)">per month, billed annually</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.9375rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.9375rem;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)">For large teams that need advanced controls and support.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"style":{"color":{"background":"#e5e7eb"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity" style="background-color:#e5e7eb;color:#e5e7eb;margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"nest-pricing-features","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|xl"}}}} -->
<ul class="nest-pricing-features wp-block-list" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:list-item --><li>Unlimited projects</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>1 TB storage</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Enterprise analytics</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>24/7 dedicated support</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>API access</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Custom integrations</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>SSO &amp; advanced security</li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"width":100,"style":{"border":{"radius":"0.5rem"},"typography":{"fontWeight":"600"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:0.5rem;font-weight:600">Contact Sales</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
