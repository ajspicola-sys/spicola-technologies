<?php
/**
 * 404 — page not found.
 *
 * Note: legacy paths (/about, /contact, /products, /services) are 301-redirected
 * to their homepage anchors before this template renders — see inc/routing.php.
 * This page is the fallback for genuinely unknown URLs.
 *
 * @package spicola
 */

get_header();
?>

<section class="section error-404">
	<div class="container center">
		<p class="eyebrow">Error 404</p>
		<h1>This page took a wrong turn.</h1>
		<p class="lead">The page you&rsquo;re looking for doesn&rsquo;t exist or has moved. Let&rsquo;s get you back on track.</p>
		<div class="hero-actions" style="justify-content:center;">
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a>
			<a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Talk to us</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
