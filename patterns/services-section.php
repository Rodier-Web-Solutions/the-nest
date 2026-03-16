<?php
/**
 * Title: Services Section
 * Slug: nest/services-section
 * Categories: nest
 * Keywords: services, features, cards, grid
 * Description: 3-column feature card grid with eyebrow label, heading, and 6 cards. Dark/highlighted/light card variants. Add more cards to the grid as needed.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl-3","bottom":"var:preset|spacing|xl-3","right":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull">

<!-- Eyebrow + heading -->
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
<div class="wp-block-group">

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase","fontSize":"0.8125rem"},"color":{"text":"var(--wp--preset--color--accent)"}}} -->
<p class="has-text-color has-text-align-center" style="color:var(--wp--preset--color--accent);font-size:0.8125rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Our Services</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:0">Our Mission Is To Make Your Business Better Through Technology</h2>
<!-- /wp:heading -->

</div>
<!-- /wp:group -->

<!-- Cards grid — add more wp:group cards inside to extend beyond 6 -->
<!-- wp:group {"className":"services-grid","style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group services-grid">

<!-- Card 1: Dark -->
<!-- wp:group {"backgroundColor":"neutral-dark","style":{"border":{"radius":"0.75rem"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-neutral-dark-background-color has-background" style="border-radius:0.75rem">

<!-- wp:group {"className":"feature-icon feature-icon--dark","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-icon feature-icon--dark">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">🛡️</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"var:preset|font-size|xl"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#ffffff;font-size:var(--wp--preset--font-size--xl);margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Cyber Security</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.7)"},"typography":{"fontSize":"0.875rem"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.7);font-size:0.875rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- Card 2: Highlighted (primary) -->
<!-- wp:group {"backgroundColor":"primary","style":{"border":{"radius":"0.75rem"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:0.75rem">

<!-- wp:group {"className":"feature-icon feature-icon--accent","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-icon feature-icon--accent">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">🖥️</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"var:preset|font-size|xl"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#ffffff;font-size:var(--wp--preset--font-size--xl);margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">IT Management</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.85)"},"typography":{"fontSize":"0.875rem"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.85);font-size:0.875rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- Card 3: Dark -->
<!-- wp:group {"backgroundColor":"neutral-dark","style":{"border":{"radius":"0.75rem"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-neutral-dark-background-color has-background" style="border-radius:0.75rem">

<!-- wp:group {"className":"feature-icon feature-icon--dark","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-icon feature-icon--dark">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">🤝</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"var:preset|font-size|xl"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#ffffff;font-size:var(--wp--preset--font-size--xl);margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">IT Consultancy</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.7)"},"typography":{"fontSize":"0.875rem"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.7);font-size:0.875rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- Card 4: Light -->
<!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"0.75rem","color":"#e5e7eb","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:0.75rem;border:1px solid #e5e7eb">

<!-- wp:group {"className":"feature-icon feature-icon--light","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-icon feature-icon--light">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">☁️</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xl"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--xl);margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Cloud Computing</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.875rem"}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- Card 5: Light -->
<!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"0.75rem","color":"#e5e7eb","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:0.75rem;border:1px solid #e5e7eb">

<!-- wp:group {"className":"feature-icon feature-icon--light","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-icon feature-icon--light">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">💻</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xl"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--xl);margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Software Developer</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.875rem"}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- Card 6: Light -->
<!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"0.75rem","color":"#e5e7eb","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:0.75rem;border:1px solid #e5e7eb">

<!-- wp:group {"className":"feature-icon feature-icon--light","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-icon feature-icon--light">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">📈</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xl"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--xl);margin-top:0;margin-bottom:var(--wp--preset--spacing--sm)">Marketing Strategy</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--neutral-medium)"},"typography":{"fontSize":"0.875rem"}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
