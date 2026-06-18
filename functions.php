<?php
/**
 * Spicola Technologies theme functions.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'spicola_setup' ) ) :
	function spicola_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Featured images for blog posts.
		add_theme_support( 'post-thumbnails' );

		// Custom logo support (Appearance → Customize → Site Identity).
		add_theme_support( 'custom-logo', array(
			'height'      => 48,
			'width'       => 48,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		// HTML5 markup + responsive embeds.
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'automatic-feed-links' );

		// Navigation menus.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'spicola' ),
			'footer'  => __( 'Footer Menu', 'spicola' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'spicola_setup' );

/**
 * Enqueue the theme stylesheet.
 */
function spicola_assets() {
	// Google Fonts: Space Grotesk (display) + Inter (body/UI).
	wp_enqueue_style(
		'spicola-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'spicola-style', get_stylesheet_uri(), array( 'spicola-fonts' ), wp_get_theme()->get( 'Version' ) );

	// Scroll reveal (blur fade-in). Loaded in the footer, deferred.
	wp_enqueue_script(
		'spicola-reveal',
		get_template_directory_uri() . '/assets/reveal.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// 3D laptop scroll rotation.
	wp_enqueue_script(
		'spicola-laptop',
		get_template_directory_uri() . '/assets/laptop.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}

/**
 * Preconnect to Google Fonts for faster font loading.
 */
function spicola_resource_hints( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'spicola_resource_hints', 10, 2 );
add_action( 'wp_enqueue_scripts', 'spicola_assets' );

/**
 * Set a sensible content width.
 */
function spicola_content_width() {
	$GLOBALS['content_width'] = 760;
}
add_action( 'after_setup_theme', 'spicola_content_width', 0 );

/**
 * Excerpt length + "read more".
 */
function spicola_excerpt_length( $length ) { return 22; }
add_filter( 'excerpt_length', 'spicola_excerpt_length' );

function spicola_excerpt_more( $more ) { return '…'; }
add_filter( 'excerpt_more', 'spicola_excerpt_more' );

/**
 * Customizer: a setting for the product/Limitless showcase video URL.
 * Paste a Media Library video URL in Appearance → Customize → Limitless Video.
 * When set, it replaces the CSS 3D laptop in the product section.
 */
function spicola_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'spicola_media', array(
		'title'    => __( 'Limitless Video', 'spicola' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'spicola_product_video', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'spicola_product_video', array(
		'label'       => __( 'Product video URL (.mp4)', 'spicola' ),
		'description' => __( 'Upload a video to the Media Library, copy its URL, and paste it here. Replaces the 3D laptop on the front page.', 'spicola' ),
		'section'     => 'spicola_media',
		'type'        => 'url',
	) );

	$wp_customize->add_setting( 'spicola_product_poster', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'spicola_product_poster', array(
		'label'       => __( 'Video poster image URL (optional)', 'spicola' ),
		'description' => __( 'Shown before the video loads / on reduced-motion.', 'spicola' ),
		'section'     => 'spicola_media',
		'type'        => 'url',
	) );
}
add_action( 'customize_register', 'spicola_customize_register' );

/**
 * Fallback menu when no primary menu is assigned, so the nav is never empty.
 */
function spicola_default_menu() {
	echo '<ul class="nav-menu">';
	echo '<li><a href="' . esc_url( home_url( '/#products' ) ) . '">Products</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#about' ) ) . '">About</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/blog' ) ) . '">Blog</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#contact' ) ) . '">Contact</a></li>';
	echo '</ul>';
}
