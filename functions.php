<?php
/**
 * Spicola Technologies theme functions.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Load split-out theme modules. Keeps functions.php focused on setup while
 * editable content (inc/site-data.php) and feature logic live in their own
 * files. Markup lives in template-parts/.
 */
require get_template_directory() . '/inc/site-data.php';
require get_template_directory() . '/inc/seo.php';
require get_template_directory() . '/inc/form.php';
require get_template_directory() . '/inc/routing.php';

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

	// Scroll reveal (fast fade/slide-in). Loaded in the footer, deferred.
	wp_enqueue_script(
		'spicola-reveal',
		get_template_directory_uri() . '/assets/reveal.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Front page only: scroll-driven hero reveal, persona tab switcher,
	// and demo request form enhancement.
	if ( is_front_page() ) {
		wp_enqueue_script(
			'spicola-hero-scroll',
			get_template_directory_uri() . '/assets/hero-scroll.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script(
			'spicola-personas',
			get_template_directory_uri() . '/assets/personas.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
		wp_enqueue_script(
			'spicola-demo-form',
			get_template_directory_uri() . '/assets/demo-form.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
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
 * SEO, Open Graph, JSON-LD, favicons and robots live in inc/seo.php.
 */

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
 * Customizer: the hero mockup image shown at the bottom of the hero card.
 * Appearance → Customize → Front Page Media. Clearing the URL falls back to
 * the HTML/CSS Limitless dashboard mockup in front-page.php.
 */
function spicola_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'spicola_media', array(
		'title'    => __( 'Front Page Media', 'spicola' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'spicola_hero_mockup', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'spicola_hero_mockup', array(
		'label'       => __( 'Hero mockup image', 'spicola' ),
		'description' => __( 'Upload the product image shown at the bottom of the hero. Falls back to the bundled image if empty.', 'spicola' ),
		'section'     => 'spicola_media',
	) ) );
}
add_action( 'customize_register', 'spicola_customize_register' );

/**
 * Fallback menu when no primary menu is assigned, so the nav is never empty.
 */
function spicola_default_menu() {
	echo '<ul class="nav-menu">';
	echo '<li><a href="' . esc_url( home_url( '/#products' ) ) . '">Products</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#about' ) ) . '">About</a></li>';
	if ( spicola_blog_enabled() ) {
		echo '<li><a href="' . esc_url( home_url( '/blog' ) ) . '">Blog</a></li>';
	}
	echo '<li><a href="' . esc_url( home_url( '/#contact' ) ) . '">Contact</a></li>';
	echo '</ul>';
}
