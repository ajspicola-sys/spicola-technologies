<?php
/**
 * Routing helpers: legacy-path redirects and the blog feature flag.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Whether the blog is enabled. Controlled by (in order):
 *   1. SPICOLA_BLOG_ENABLED constant (e.g. in wp-config.php) — env-var style
 *   2. Customizer toggle "Enable blog"
 * Defaults to true.
 *
 * @return bool
 */
function spicola_blog_enabled() {
	if ( defined( 'SPICOLA_BLOG_ENABLED' ) ) {
		return (bool) SPICOLA_BLOG_ENABLED;
	}
	// Off by default: brand-new site with no posts yet. Flip the "Enable blog"
	// toggle (Customize → Site Features) when there's content to publish.
	return (bool) get_theme_mod( 'spicola_blog_enabled', false );
}

/**
 * Map of legacy standalone paths to their homepage anchors. These paths 404 on
 * their own (the content lives in sections of the front page), so we 301 them
 * to the matching anchor. Only applied when the request would otherwise 404,
 * so a real Page created at one of these slugs later still wins.
 *
 * @return array<string,string>
 */
function spicola_legacy_redirects() {
	return array(
		'about'    => '/#about',
		'contact'  => '/#contact',
		'products' => '/#products',
		'product'  => '/#products',
		'services' => '/#services',
		'service'  => '/#services',
		'demo'     => '/#contact',
		// While the blog is off, send any stray /blog hit home instead of 404.
		'blog'     => '/',
	);
}

/**
 * Redirect legacy paths to anchors, and (when the blog is disabled) keep the
 * blog index out of reach by sending it home.
 */
function spicola_handle_redirects() {
	// Blog disabled: keep the post index / single posts out of reach.
	// IMPORTANT: never redirect the front page itself. If the site's front page
	// is set to "Your latest posts", the home page is also is_home(), and
	// redirecting it home would loop forever (ERR_TOO_MANY_REDIRECTS). The
	// is_front_page() guard prevents that — the landing page renders normally.
	if ( ! spicola_blog_enabled() && ! is_front_page() && ( is_home() || is_singular( 'post' ) || is_post_type_archive( 'post' ) || is_category() || is_tag() ) ) {
		wp_safe_redirect( home_url( '/' ), 302 );
		exit;
	}

	if ( ! is_404() ) {
		return;
	}

	$path = trim( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( '' === $path ) {
		return;
	}

	$map = spicola_legacy_redirects();
	if ( isset( $map[ $path ] ) ) {
		wp_safe_redirect( home_url( $map[ $path ] ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'spicola_handle_redirects' );

/**
 * Customizer: blog on/off toggle.
 */
function spicola_routing_customize( $wp_customize ) {
	$wp_customize->add_section( 'spicola_features', array(
		'title'    => __( 'Site Features', 'spicola' ),
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'spicola_blog_enabled', array(
		'default'           => false,
		'sanitize_callback' => 'wp_validate_boolean',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'spicola_blog_enabled', array(
		'label'       => __( 'Enable blog', 'spicola' ),
		'description' => __( 'When off, the Blog link is hidden from the nav and footer and /blog redirects home. (Can also be set via the SPICOLA_BLOG_ENABLED constant.)', 'spicola' ),
		'section'     => 'spicola_features',
		'type'        => 'checkbox',
	) );
}
add_action( 'customize_register', 'spicola_routing_customize' );
