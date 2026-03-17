<?php
/**
 * The Nest — Theme Functions
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'show_admin_bar', '__return_false' );

// -------------------------------------------------------------------------
// Theme Setup
// -------------------------------------------------------------------------

function nest_setup(): void {
	load_theme_textdomain( 'nest', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	] );

	register_nav_menus( [
		'primary' => __( 'Primary Navigation', 'nest' ),
		'footer'  => __( 'Footer Navigation', 'nest' ),
	] );
}
add_action( 'after_setup_theme', 'nest_setup' );

// -------------------------------------------------------------------------
// Editor Styles
// -------------------------------------------------------------------------

function nest_editor_styles(): void {
	add_editor_style( [
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
		'style.css',
	] );
}
add_action( 'after_setup_theme', 'nest_editor_styles' );

// -------------------------------------------------------------------------
// Enqueue Assets
// -------------------------------------------------------------------------

function nest_enqueue_assets(): void {
	wp_enqueue_script(
		'lucide',
		'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js',
		[],
		null,
		true
	);

	wp_enqueue_script(
		'nest-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		[ 'lucide' ],
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_style(
		'nest-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'nest-style',
		get_stylesheet_uri(),
		[ 'nest-google-fonts' ],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'nest_enqueue_assets' );

// -------------------------------------------------------------------------
// Block Patterns
// -------------------------------------------------------------------------

function nest_register_patterns(): void {
	register_block_pattern_category( 'nest', [
		'label' => __( 'The Nest', 'nest' ),
	] );

	ob_start();
	include get_template_directory() . '/patterns/hero-banner.php';
	$hero_banner = ob_get_clean();

	register_block_pattern( 'nest/hero-banner', [
		'title'       => __( 'Hero Banner', 'nest' ),
		'categories'  => [ 'nest' ],
		'description' => __( 'Full-width hero with heading, description, and primary + secondary CTAs.', 'nest' ),
		'content'     => $hero_banner,
	] );

	ob_start();
	include get_template_directory() . '/patterns/services-section.php';
	$services_section = ob_get_clean();

	register_block_pattern( 'nest/services-section', [
		'title'       => __( 'Services Section', 'nest' ),
		'categories'  => [ 'nest' ],
		'description' => __( '3-column feature card grid with eyebrow label, heading, and 6 cards. Add more cards to the grid as needed.', 'nest' ),
		'content'     => $services_section,
	] );

	ob_start();
	include get_template_directory() . '/patterns/cta-banner.php';
	$cta_banner = ob_get_clean();

	register_block_pattern( 'nest/cta-banner', [
		'title'       => __( 'CTA Banner', 'nest' ),
		'categories'  => [ 'nest' ],
		'description' => __( 'Full-width call-to-action banner with headline, supporting text, and two buttons.', 'nest' ),
		'content'     => $cta_banner,
	] );

	ob_start();
	include get_template_directory() . '/patterns/reviews-carousel.php';
	$reviews_carousel = ob_get_clean();

	register_block_pattern( 'nest/reviews-carousel', [
		'title'       => __( 'Reviews Carousel', 'nest' ),
		'categories'  => [ 'nest' ],
		'description' => __( 'Auto-advancing testimonials carousel pulling from the Reviews post type.', 'nest' ),
		'content'     => $reviews_carousel,
	] );

	ob_start();
	include get_template_directory() . '/patterns/pricing-table.php';
	$pricing_table = ob_get_clean();

	register_block_pattern( 'nest/pricing-table', [
		'title'       => __( 'Pricing Table', 'nest' ),
		'categories'  => [ 'nest' ],
		'description' => __( 'Three-tier pricing table with feature lists and CTA buttons. Middle card is highlighted as the recommended plan.', 'nest' ),
		'content'     => $pricing_table,
	] );
}
add_action( 'init', 'nest_register_patterns', 1 );

// -------------------------------------------------------------------------
// Reviews Custom Post Type
// -------------------------------------------------------------------------

function nest_register_review_cpt(): void {
	register_post_type( 'nest_review', [
		'labels' => [
			'name'               => __( 'Reviews', 'nest' ),
			'singular_name'      => __( 'Review', 'nest' ),
			'add_new_item'       => __( 'Add New Review', 'nest' ),
			'edit_item'          => __( 'Edit Review', 'nest' ),
			'new_item'           => __( 'New Review', 'nest' ),
			'not_found'          => __( 'No reviews found.', 'nest' ),
			'not_found_in_trash' => __( 'No reviews in trash.', 'nest' ),
		],
		'public'        => false,
		'show_ui'       => true,
		'show_in_menu'  => true,
		'show_in_rest'  => true,
		'supports'      => [ 'title', 'editor', 'thumbnail', 'page-attributes' ],
		'menu_icon'     => 'dashicons-star-filled',
		'rewrite'       => false,
	] );
}
add_action( 'init', 'nest_register_review_cpt' );

// -------------------------------------------------------------------------
// Reviews Meta Box
// -------------------------------------------------------------------------

function nest_add_review_meta_box(): void {
	add_meta_box(
		'nest_review_details',
		__( 'Review Details', 'nest' ),
		'nest_render_review_meta_box',
		'nest_review',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'nest_add_review_meta_box' );

function nest_render_review_meta_box( WP_Post $post ): void {
	wp_nonce_field( 'nest_save_review_meta', 'nest_review_nonce' );

	$rating    = get_post_meta( $post->ID, '_nest_rating', true ) ?: '5';
	$is_google = get_post_meta( $post->ID, '_nest_is_google', true );
	$position  = get_post_meta( $post->ID, '_nest_position', true );
	?>
	<table class="form-table" role="presentation">
		<tr>
			<th scope="row"><label for="nest_position"><?php esc_html_e( 'Position / Company', 'nest' ); ?></label></th>
			<td><input type="text" id="nest_position" name="nest_position" value="<?php echo esc_attr( $position ); ?>" class="regular-text" placeholder="e.g. CEO, Acme Corp"></td>
		</tr>
		<tr>
			<th scope="row"><label for="nest_rating"><?php esc_html_e( 'Star Rating', 'nest' ); ?></label></th>
			<td>
				<select id="nest_rating" name="nest_rating">
					<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
						<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $rating, (string) $i ); ?>>
							<?php echo esc_html( $i . ' ' . _n( 'star', 'stars', $i, 'nest' ) ); ?>
						</option>
					<?php endfor; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php esc_html_e( 'Google Review', 'nest' ); ?></th>
			<td>
				<label>
					<input type="checkbox" name="nest_is_google" value="1" <?php checked( $is_google, '1' ); ?>>
					<?php esc_html_e( 'Mark as a Google Review (shows Google badge on card)', 'nest' ); ?>
				</label>
			</td>
		</tr>
	</table>
	<p class="description" style="margin-top:1em">
		<?php esc_html_e( 'Reviewer name = post title. Review text = post body. Reviewer photo = featured image.', 'nest' ); ?>
	</p>
	<?php
}

function nest_save_review_meta( int $post_id ): void {
	if ( ! isset( $_POST['nest_review_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['nest_review_nonce'], 'nest_save_review_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['nest_rating'] ) ) {
		update_post_meta( $post_id, '_nest_rating', absint( $_POST['nest_rating'] ) );
	}

	update_post_meta( $post_id, '_nest_is_google', isset( $_POST['nest_is_google'] ) ? '1' : '' );

	if ( isset( $_POST['nest_position'] ) ) {
		update_post_meta( $post_id, '_nest_position', sanitize_text_field( wp_unslash( $_POST['nest_position'] ) ) );
	}
}
add_action( 'save_post_nest_review', 'nest_save_review_meta' );

// -------------------------------------------------------------------------
// Reviews Carousel Shortcode
// -------------------------------------------------------------------------

function nest_reviews_shortcode(): string {
	$reviews = get_posts( [
		'post_type'      => 'nest_review',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	] );

	if ( empty( $reviews ) ) {
		return '';
	}

	$google_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true" focusable="false"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>';

	ob_start();
	?>
	<div class="nest-reviews" data-interval="3000" role="region" aria-label="<?php esc_attr_e( 'Customer Reviews', 'nest' ); ?>">
		<div class="nest-reviews__viewport">
			<div class="nest-reviews__track">
				<?php foreach ( $reviews as $review ) :
					$rating    = absint( get_post_meta( $review->ID, '_nest_rating', true ) ?: 5 );
					$is_google = get_post_meta( $review->ID, '_nest_is_google', true );
					$position  = get_post_meta( $review->ID, '_nest_position', true );
					$photo_url = get_the_post_thumbnail_url( $review->ID, 'thumbnail' );
					$initial   = mb_strtoupper( mb_substr( $review->post_title, 0, 1 ) );
					$rating    = max( 1, min( 5, $rating ) );
					?>
					<article class="nest-reviews__card" aria-label="<?php echo esc_attr( sprintf( __( 'Review by %s', 'nest' ), $review->post_title ) ); ?>">

						<?php if ( $is_google ) : ?>
						<div class="nest-reviews__google-badge" title="<?php esc_attr_e( 'Google Review', 'nest' ); ?>">
							<?php echo $google_svg; // phpcs:ignore ?>
						</div>
						<?php endif; ?>

						<div class="nest-reviews__stars" aria-label="<?php echo esc_attr( sprintf( _n( '%d star out of 5', '%d stars out of 5', $rating, 'nest' ), $rating ) ); ?>">
							<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
								<span aria-hidden="true"><?php echo $i <= $rating ? '★' : '☆'; ?></span>
							<?php endfor; ?>
						</div>

						<blockquote class="nest-reviews__text">
							<?php echo wp_kses_post( wpautop( $review->post_content ) ); ?>
						</blockquote>

						<footer class="nest-reviews__author">
							<?php if ( $photo_url ) : ?>
								<img class="nest-reviews__photo" src="<?php echo esc_url( $photo_url ); ?>" alt="" width="48" height="48" loading="lazy">
							<?php else : ?>
								<div class="nest-reviews__photo nest-reviews__photo--initials" aria-hidden="true"><?php echo esc_html( $initial ); ?></div>
							<?php endif; ?>
							<div class="nest-reviews__author-info">
								<cite class="nest-reviews__name"><?php echo esc_html( $review->post_title ); ?></cite>
								<?php if ( $position ) : ?>
									<span class="nest-reviews__position"><?php echo esc_html( $position ); ?></span>
								<?php endif; ?>
							</div>
						</footer>

					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="nest-reviews__controls">
			<button class="nest-reviews__btn nest-reviews__btn--prev" aria-label="<?php esc_attr_e( 'Previous review', 'nest' ); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
			</button>
			<div class="nest-reviews__dots" role="tablist" aria-label="<?php esc_attr_e( 'Go to review', 'nest' ); ?>"></div>
			<button class="nest-reviews__btn nest-reviews__btn--next" aria-label="<?php esc_attr_e( 'Next review', 'nest' ); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
			</button>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'nest_reviews', 'nest_reviews_shortcode' );

// -------------------------------------------------------------------------
// Carousel Assets
// -------------------------------------------------------------------------

function nest_enqueue_carousel_assets(): void {
	wp_enqueue_script(
		'nest-reviews-carousel',
		get_template_directory_uri() . '/assets/js/reviews-carousel.js',
		[],
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'nest_enqueue_carousel_assets' );

// -------------------------------------------------------------------------
// Alerts Custom Post Type
// -------------------------------------------------------------------------

function nest_register_alert_cpt(): void {
	register_post_type( 'nest_alert', [
		'labels' => [
			'name'               => __( 'Alerts', 'nest' ),
			'singular_name'      => __( 'Alert', 'nest' ),
			'add_new_item'       => __( 'Add New Alert', 'nest' ),
			'edit_item'          => __( 'Edit Alert', 'nest' ),
			'new_item'           => __( 'New Alert', 'nest' ),
			'not_found'          => __( 'No alerts found.', 'nest' ),
			'not_found_in_trash' => __( 'No alerts in trash.', 'nest' ),
		],
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor' ],
		'menu_icon'    => 'dashicons-megaphone',
		'rewrite'      => false,
	] );
}
add_action( 'init', 'nest_register_alert_cpt' );

// -------------------------------------------------------------------------
// Alerts Meta Box
// -------------------------------------------------------------------------

function nest_add_alert_meta_box(): void {
	add_meta_box(
		'nest_alert_settings',
		__( 'Alert Settings', 'nest' ),
		'nest_render_alert_meta_box',
		'nest_alert',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'nest_add_alert_meta_box' );

function nest_render_alert_meta_box( WP_Post $post ): void {
	wp_nonce_field( 'nest_save_alert_meta', 'nest_alert_nonce' );

	$dismissable = get_post_meta( $post->ID, '_nest_alert_dismissable', true );
	$expiration  = get_post_meta( $post->ID, '_nest_alert_expiration', true );
	?>
	<p style="margin-bottom:0.75em;color:#666;font-size:12px">
		<?php esc_html_e( 'The alert title is for your reference only — only the body content is shown on the frontend.', 'nest' ); ?>
	</p>
	<p>
		<label style="display:flex;align-items:center;gap:0.5em;font-weight:600">
			<input type="checkbox" name="nest_alert_dismissable" value="1" <?php checked( $dismissable, '1' ); ?>>
			<?php esc_html_e( 'Dismissable by visitors', 'nest' ); ?>
		</label>
		<span style="display:block;margin-top:0.4em;color:#666;font-size:12px">
			<?php esc_html_e( 'Shows an × button. Dismissed state is remembered per browser.', 'nest' ); ?>
		</span>
	</p>
	<p>
		<label for="nest_alert_expiration" style="display:block;font-weight:600;margin-bottom:0.35em">
			<?php esc_html_e( 'Expiration date', 'nest' ); ?>
		</label>
		<input
			type="date"
			id="nest_alert_expiration"
			name="nest_alert_expiration"
			value="<?php echo esc_attr( $expiration ); ?>"
			style="width:100%"
		>
		<span style="display:block;margin-top:0.4em;color:#666;font-size:12px">
			<?php esc_html_e( 'Alert hides automatically after this date. Leave blank for no expiry.', 'nest' ); ?>
		</span>
	</p>
	<?php
}

function nest_save_alert_meta( int $post_id ): void {
	if ( ! isset( $_POST['nest_alert_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['nest_alert_nonce'], 'nest_save_alert_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	update_post_meta( $post_id, '_nest_alert_dismissable', isset( $_POST['nest_alert_dismissable'] ) ? '1' : '' );

	$expiration = isset( $_POST['nest_alert_expiration'] )
		? sanitize_text_field( wp_unslash( $_POST['nest_alert_expiration'] ) )
		: '';

	// Validate that it's a real date in Y-m-d format, or store empty
	if ( $expiration && ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $expiration ) ) {
		$expiration = '';
	}

	update_post_meta( $post_id, '_nest_alert_expiration', $expiration );
}
add_action( 'save_post_nest_alert', 'nest_save_alert_meta' );

// -------------------------------------------------------------------------
// Alerts Frontend Render
// -------------------------------------------------------------------------

function nest_render_alerts(): void {
	$all_alerts = get_posts( [
		'post_type'      => 'nest_alert',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	] );

	if ( empty( $all_alerts ) ) {
		return;
	}

	// Filter out expired alerts (compare Y-m-d strings; empty expiration = never expires)
	$today  = current_time( 'Y-m-d' );
	$alerts = array_filter( $all_alerts, function ( WP_Post $post ) use ( $today ): bool {
		$exp = get_post_meta( $post->ID, '_nest_alert_expiration', true );
		return empty( $exp ) || $exp >= $today;
	} );

	if ( empty( $alerts ) ) {
		return;
	}
	?>
	<div class="nest-alerts-bar" role="region" aria-label="<?php esc_attr_e( 'Site alerts', 'nest' ); ?>">
		<?php foreach ( $alerts as $alert ) :
			$dismissable = get_post_meta( $alert->ID, '_nest_alert_dismissable', true );
			?>
			<div
				class="nest-alert<?php echo $dismissable ? ' nest-alert--dismissable' : ''; ?>"
				data-alert-id="<?php echo esc_attr( $alert->ID ); ?>"
				role="alert"
			>
				<div class="nest-alert__content">
					<?php echo wp_kses_post( wpautop( $alert->post_content ) ); ?>
				</div>
				<?php if ( $dismissable ) : ?>
					<button class="nest-alert__dismiss" aria-label="<?php esc_attr_e( 'Dismiss this alert', 'nest' ); ?>">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
					</button>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}
add_action( 'wp_body_open', 'nest_render_alerts', 1 );

// -------------------------------------------------------------------------
// Business Info Settings Page
// -------------------------------------------------------------------------

function nest_register_business_info_page(): void {
	add_menu_page(
		__( 'Business Info', 'nest' ),
		__( 'Business Info', 'nest' ),
		'manage_options',
		'nest-business-info',
		'nest_render_business_info_page',
		'dashicons-building',
		3
	);
}
add_action( 'admin_menu', 'nest_register_business_info_page' );

function nest_register_business_info_settings(): void {
	register_setting(
		'nest_business_info',
		'nest_business_info',
		[ 'sanitize_callback' => 'nest_sanitize_business_info', 'default' => [] ]
	);

	add_settings_section( 'nest_biz_section', '', '__return_null', 'nest-business-info' );

	add_settings_field( 'nest_biz_hours', __( 'Business Hours', 'nest' ),  'nest_field_biz_hours',  'nest-business-info', 'nest_biz_section' );
	add_settings_field( 'nest_biz_phone', __( 'Phone Number',   'nest' ),  'nest_field_biz_phone',  'nest-business-info', 'nest_biz_section' );
	add_settings_field( 'nest_biz_email', __( 'Email Address',  'nest' ),  'nest_field_biz_email',  'nest-business-info', 'nest_biz_section' );
	add_settings_field( 'nest_biz_about', __( 'About',          'nest' ),  'nest_field_biz_about',  'nest-business-info', 'nest_biz_section' );
}
add_action( 'admin_init', 'nest_register_business_info_settings' );

function nest_sanitize_business_info( mixed $input ): array {
	$input = is_array( $input ) ? $input : [];
	return [
		'hours' => sanitize_textarea_field( wp_unslash( $input['hours'] ?? '' ) ),
		'phone' => sanitize_text_field( wp_unslash( $input['phone'] ?? '' ) ),
		'email' => sanitize_email( wp_unslash( $input['email'] ?? '' ) ),
		'about' => sanitize_textarea_field( wp_unslash( $input['about'] ?? '' ) ),
	];
}

function nest_field_biz_hours(): void {
	$v = nest_get_business_info()['hours'];
	echo '<textarea id="nest_biz_hours" name="nest_business_info[hours]" rows="5" class="large-text" placeholder="Mon–Fri: 9:00 am – 5:00 pm&#10;Sat: 10:00 am – 3:00 pm&#10;Sun: Closed">' . esc_textarea( $v ) . '</textarea>';
	echo '<p class="description">' . esc_html__( 'One line per entry, e.g. Mon–Fri: 9 am–5 pm.', 'nest' ) . '</p>';
}

function nest_field_biz_phone(): void {
	$v = nest_get_business_info()['phone'];
	echo '<input type="tel" id="nest_biz_phone" name="nest_business_info[phone]" value="' . esc_attr( $v ) . '" class="regular-text" placeholder="+1 (012) 345-6789">';
}

function nest_field_biz_email(): void {
	$v = nest_get_business_info()['email'];
	echo '<input type="email" id="nest_biz_email" name="nest_business_info[email]" value="' . esc_attr( $v ) . '" class="regular-text" placeholder="hello@example.com">';
}

function nest_field_biz_about(): void {
	$v = nest_get_business_info()['about'];
	echo '<textarea id="nest_biz_about" name="nest_business_info[about]" rows="6" class="large-text" placeholder="' . esc_attr__( 'Tell visitors a bit about your business…', 'nest' ) . '">' . esc_textarea( $v ) . '</textarea>';
}

function nest_render_business_info_page(): void {
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'nest_business_info' );
			do_settings_sections( 'nest-business-info' );
			submit_button( __( 'Save Business Info', 'nest' ) );
			?>
		</form>
	</div>
	<?php
}

/**
 * Helper — retrieve all business info fields in one call.
 *
 * @return array{hours: string, phone: string, email: string, about: string}
 */
function nest_get_business_info(): array {
	return wp_parse_args(
		get_option( 'nest_business_info', [] ),
		[ 'hours' => '', 'phone' => '', 'email' => '', 'about' => '' ]
	);
}

// -------------------------------------------------------------------------
// Business Info Shortcodes
// -------------------------------------------------------------------------

/**
 * [nest_biz_about] — About text in the footer.
 */
function nest_shortcode_biz_about(): string {
	$about = nest_get_business_info()['about'];
	if ( ! $about ) return '';
	return '<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem">'
		. nl2br( esc_html( $about ) )
		. '</p>';
}
add_shortcode( 'nest_biz_about', 'nest_shortcode_biz_about' );

/**
 * [nest_biz_footer_phone] — Phone paragraph in the footer Contact column.
 */
function nest_shortcode_biz_footer_phone(): string {
	$phone = nest_get_business_info()['phone'];
	if ( ! $phone ) return '';
	return '<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem">'
		. '<strong>' . esc_html__( 'Call:', 'nest' ) . '</strong> '
		. esc_html( $phone )
		. '</p>';
}
add_shortcode( 'nest_biz_footer_phone', 'nest_shortcode_biz_footer_phone' );

/**
 * [nest_biz_footer_email] — Email paragraph in the footer Contact column.
 */
function nest_shortcode_biz_footer_email(): string {
	$email = nest_get_business_info()['email'];
	if ( ! $email ) return '';
	return '<p class="has-text-color" style="color:var(--wp--preset--color--neutral-medium);font-size:0.875rem;margin-bottom:var(--wp--preset--spacing--md)">'
		. '<strong>' . esc_html__( 'Email:', 'nest' ) . '</strong> '
		. esc_html( $email )
		. '</p>';
}
add_shortcode( 'nest_biz_footer_email', 'nest_shortcode_biz_footer_email' );

/**
 * [nest_biz_header_phone] — Phone link in the top utility bar.
 */
function nest_shortcode_biz_header_phone(): string {
	$phone = nest_get_business_info()['phone'];
	if ( ! $phone ) return '';
	$digits = preg_replace( '/[^\d+]/', '', $phone );
	return '<a href="tel:' . esc_attr( $digits ) . '" class="site-header__topbar-link">'
		. '<i data-lucide="phone" aria-hidden="true"></i>'
		. esc_html( $phone )
		. '</a>';
}
add_shortcode( 'nest_biz_header_phone', 'nest_shortcode_biz_header_phone' );
