<?php
/**
 * Title: Reviews Carousel
 * Slug: nest/reviews-carousel
 * Categories: nest
 * Keywords: reviews, testimonials, carousel, slider
 * Description: Auto-advancing reviews carousel. Add reviews via Appearance > Reviews in the admin.
 */
?>
<!-- wp:group {"align":"full","className":"nest-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl-3","bottom":"var:preset|spacing|xl-3"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull nest-section">

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"620px"}} -->
<div class="wp-block-group">

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase","fontSize":"0.8125rem"},"color":{"text":"var(--wp--preset--color--accent)"}}} -->
<p class="has-text-color has-text-align-center" style="color:var(--wp--preset--color--accent);font-size:0.8125rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">What Our Clients Say</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:0">Trusted by Businesses Like Yours</h2>
<!-- /wp:heading -->

</div>
<!-- /wp:group -->

<!-- wp:shortcode -->
[nest_reviews]
<!-- /wp:shortcode -->

</div>
<!-- /wp:group -->
