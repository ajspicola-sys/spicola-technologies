<?php
/**
 * SEO, metadata, social sharing and structured data.
 *
 * - Document <title> per context
 * - <meta name="description">
 * - Open Graph + Twitter Card tags (with a configurable share image)
 * - JSON-LD: Organization + SoftwareApplication (Limitless)
 * - Favicon / web manifest references
 * - robots.txt sitemap hint (WordPress core already serves wp-sitemap.xml)
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Marketing description used for the home page <meta description> and OG tags.
 * ~160 chars. Truthful to an early-stage company building one product + custom
 * work.
 */
function spicola_home_description() {
	return 'Spicola Technologies builds practical software for growing businesses — including Limitless, our all-in-one B2B platform for booking, payments, messaging and reporting.';
}

/**
 * Best description for the current context.
 *
 * @return string
 */
function spicola_meta_description() {
	if ( is_front_page() ) {
		return spicola_home_description();
	}
	if ( is_home() ) {
		return 'News, ideas and product notes from the Spicola Technologies team.';
	}
	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post ) {
			$excerpt = $post->post_excerpt
				? $post->post_excerpt
				: wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ), 28, '…' );
			if ( $excerpt ) {
				return $excerpt;
			}
		}
	}
	$tagline = get_bloginfo( 'description', 'display' );
	return $tagline ? $tagline : spicola_home_description();
}

/**
 * Explicit document titles for the key pages (Priority 2.3).
 * Returning '' lets WordPress compute the title normally for everything else.
 *
 * @param string $title Incoming (usually empty) title.
 * @return string
 */
function spicola_document_title( $title ) {
	if ( is_front_page() ) {
		return 'Spicola Technologies — Custom Software & the Limitless Platform';
	}
	if ( is_home() ) {
		return 'Blog — Spicola Technologies';
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'spicola_document_title' );

/**
 * The social-share / OG image URL, in priority order:
 *   1. Customizer "Social share image" (the dedicated 1200×630 OG image)
 *   2. Site Icon (Appearance → Customize → Site Identity)
 *   3. Custom logo
 * Returns '' when none is set — OG image tags are then omitted (never faked).
 *
 * @return string
 */
function spicola_share_image() {
	$og = get_theme_mod( 'spicola_og_image', '' );
	if ( $og ) {
		return $og;
	}
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
		return get_site_icon_url( 1200 );
	}
	if ( has_custom_logo() ) {
		$img = wp_get_attachment_image_src( (int) get_theme_mod( 'custom_logo' ), 'full' );
		if ( $img ) {
			return $img[0];
		}
	}
	return '';
}

/**
 * Head: meta description, Open Graph, Twitter Card, favicon/manifest.
 * Replaces the previous inline implementation in functions.php.
 */
function spicola_head_meta() {
	if ( is_admin() ) {
		return;
	}

	$title = wp_get_document_title();
	$name  = get_bloginfo( 'name', 'display' );
	$desc  = spicola_meta_description();
	$image = spicola_share_image();

	if ( is_singular() ) {
		$url  = get_permalink( get_queried_object() );
		$type = 'article';
	} else {
		$url  = is_home() ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' );
		$type = 'website';
	}
	if ( ! $url ) {
		$url = home_url( '/' );
	}

	echo "\n";
	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );

	printf( '<meta property="og:type" content="%s">' . "\n", esc_attr( $type ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( $name ) );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );

	// Twitter falls back to a plain summary card until a real share image exists.
	printf( '<meta name="twitter:card" content="%s">' . "\n", $image ? 'summary_large_image' : 'summary' );
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $desc ) );

	if ( $image ) {
		printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
		// Only declare 1200×630 for the dedicated share image; a Site Icon
		// fallback is square, so don't mis-state its dimensions.
		if ( get_theme_mod( 'spicola_og_image', '' ) ) {
			echo '<meta property="og:image:width" content="1200">' . "\n";
			echo '<meta property="og:image:height" content="630">' . "\n";
		}
		printf( '<meta name="twitter:image" content="%s">' . "\n", esc_url( $image ) );
	} else {
		// TODO (owner): upload a 1200×630 social-share image under
		// Appearance → Customize → Front Page Media → "Social share image"
		// so links unfurl with a branded card. Until then no og:image is sent.
		echo "<!-- TODO: set a 1200x630 social share image (Customize → Front Page Media) -->\n";
	}

	// ---- Favicons / web manifest ----------------------------------------
	echo '<meta name="theme-color" content="#0A0A0D">' . "\n";
	printf( '<link rel="manifest" href="%s">' . "\n", esc_url( get_template_directory_uri() . '/assets/favicons/site.webmanifest' ) );

	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
		// WordPress emits the full favicon/apple-touch-icon set automatically
		// from the uploaded Site Icon — nothing more to do here.
		return;
	}

	// No Site Icon uploaded yet: ship a branded inline SVG so the tab is never
	// blank. TODO (owner): upload a 512×512 Site Icon under
	// Appearance → Customize → Site Identity to generate the full branded set
	// (favicon.ico, apple-touch-icon, 16/32px PNGs) automatically.
	$svg = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><rect width='24' height='24' rx='6' fill='#0A0A0D'/><path d='M12 5c.3 3.3 1.7 4.7 5 5-3.3.3-4.7 1.7-5 5-.3-3.3-1.7-4.7-5-5 3.3-.3 4.7-1.7 5-5z' fill='#5FD6E8'/></svg>";
	echo '<link rel="icon" href="data:image/svg+xml,' . rawurlencode( $svg ) . '">' . "\n";
	echo "<!-- TODO: upload a 512x512 Site Icon (Customize → Site Identity) for the full branded favicon set -->\n";
}
add_action( 'wp_head', 'spicola_head_meta', 5 );

/**
 * JSON-LD structured data: Organization (site-wide) + SoftwareApplication for
 * Limitless (front page only). sameAs is left as a TODO until real social
 * profiles exist — empty profiles are omitted, never faked.
 */
function spicola_structured_data() {
	if ( is_admin() ) {
		return;
	}

	$logo = spicola_share_image();

	// TODO (owner): add real social profile URLs here once they exist
	// (LinkedIn, X/Twitter, etc.). Left empty so nothing fake is published.
	$same_as = array_filter( array(
		// 'https://www.linkedin.com/company/…',
		// 'https://x.com/…',
	) );

	$org = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => 'Spicola Technologies',
		'url'      => home_url( '/' ),
		'email'    => 'joseph@spicolatechnologies.com',
	);
	if ( $logo ) {
		$org['logo'] = $logo;
	}
	if ( $same_as ) {
		$org['sameAs'] = array_values( $same_as );
	}

	$graph = array( $org );

	if ( is_front_page() ) {
		$graph[] = array(
			'@context'            => 'https://schema.org',
			'@type'               => 'SoftwareApplication',
			'name'                => 'Limitless',
			'applicationCategory' => 'BusinessApplication',
			'operatingSystem'     => 'Web',
			'url'                 => home_url( '/#products' ),
			'description'         => 'Limitless is an all-in-one B2B platform for growing businesses — online booking & scheduling, payments, invoices & memberships, review aggregation with AI replies, SMS/email/AI messaging, marketing & loyalty, and real-time reporting.',
			'publisher'           => array(
				'@type' => 'Organization',
				'name'  => 'Spicola Technologies',
				'url'   => home_url( '/' ),
			),
			// No aggregateRating / price: would require real, verifiable data.
		);
	}

	echo "\n" . '<script type="application/ld+json">'
		. wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
		. '</script>' . "\n";
}
add_action( 'wp_head', 'spicola_structured_data', 6 );

/**
 * Point robots.txt at the core-generated sitemap. WordPress already serves a
 * virtual robots.txt and wp-sitemap.xml (since 5.5); this just advertises it.
 *
 * @param string $output Existing robots.txt body.
 * @param string $public Whether the site is set to be indexed.
 * @return string
 */
function spicola_robots_txt( $output, $public ) {
	if ( '1' === (string) $public ) {
		$output .= 'Sitemap: ' . esc_url( home_url( '/wp-sitemap.xml' ) ) . "\n";
	}
	return $output;
}
add_filter( 'robots_txt', 'spicola_robots_txt', 10, 2 );

/**
 * Customizer: the dedicated social-share (OG) image.
 */
function spicola_seo_customize( $wp_customize ) {
	// Reuse the existing "Front Page Media" section if present, else create it.
	if ( ! $wp_customize->get_section( 'spicola_media' ) ) {
		$wp_customize->add_section( 'spicola_media', array(
			'title'    => __( 'Front Page Media', 'spicola' ),
			'priority' => 30,
		) );
	}

	$wp_customize->add_setting( 'spicola_og_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'spicola_og_image', array(
		'label'       => __( 'Social share image (1200×630)', 'spicola' ),
		'description' => __( 'Shown when the site is shared on social/messaging. Use a 1200×630 image. Falls back to the Site Icon if empty.', 'spicola' ),
		'section'     => 'spicola_media',
	) ) );
}
add_action( 'customize_register', 'spicola_seo_customize' );
