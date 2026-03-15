<?php
/**
 * The Nest — Theme Functions
 */

defined( 'ABSPATH' ) || exit;

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
}
add_action( 'init', 'nest_register_patterns', 1 );
