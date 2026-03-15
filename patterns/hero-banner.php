<?php
/**
 * Title: Hero Banner
 * Slug: nest/hero-banner
 * Categories: nest
 * Keywords: hero, banner, cta, cover, full-width
 * Block Types: core/cover
 * Description: Full-width hero with heading, description, and primary + secondary CTAs. Swap the cover background for an image or color in the editor.
 */
?>
<!-- wp:cover {"overlayColor":"neutral-dark","isUserOverlayColor":true,"minHeight":600,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl-4","bottom":"var:preset|spacing|xl-4","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--xl-4);padding-bottom:var(--wp--preset--spacing--xl-4);padding-left:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-dark-background-color has-background-dim-100 has-background-dim"></span>
<div class="wp-block-cover__inner-container">

<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"blockGap":"var:preset|spacing|lg"}}} -->
<div class="wp-block-group">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"surface"} -->
<h2 class="wp-block-heading has-text-align-center has-surface-color has-text-color">Your Compelling Headline Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"surface","fontSize":"lg"} -->
<p class="has-text-align-center has-surface-color has-text-color has-lg-font-size">A short description that supports your headline and guides visitors toward the next action they should take.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
<div class="wp-block-buttons">

<!-- wp:button {"backgroundColor":"primary","textColor":"surface"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-surface-text-color has-text-color has-background wp-element-button">Get Started</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"surface","style":{"border":{"color":"var:preset|color|surface","width":"2px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-surface-text-color has-text-color wp-element-button" style="border-color:var(--wp--preset--color--surface);border-width:2px">Learn More</a></div>
<!-- /wp:button -->

</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

</div>
</div>
<!-- /wp:cover -->
