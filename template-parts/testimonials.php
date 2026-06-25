<?php
/**
 * Client stories (testimonials).
 *
 * Data-driven from spicola_testimonials() in inc/site-data.php.
 *
 * CONDITIONAL RENDER: this section renders ONLY when at least one testimonial
 * is real (name + quote filled in, with no "TODO" marker). While every entry
 * is still a placeholder, the entire <section> is skipped — so no
 * "Replace with real name" / fake quote can ever reach production. To make the
 * section appear, edit the array in inc/site-data.php with real, attributable
 * quotes.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

$spicola_reviews = spicola_real_testimonials();

// Nothing real yet — render nothing at all.
if ( empty( $spicola_reviews ) ) {
	return;
}
?>
<section class="section section--gray" id="testimonials">
	<div class="container">
		<div class="center" style="margin-bottom:56px;">
			<p class="eyebrow">Client stories</p>
			<h2>Trusted by growing businesses</h2>
		</div>
		<div class="testimonials">
			<?php foreach ( $spicola_reviews as $review ) : ?>
			<figure class="testimonial">
				<div class="testimonial__stars" aria-label="5 out of 5 stars">
					<?php for ( $s = 0; $s < 5; $s++ ) : ?>
					<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<?php endfor; ?>
				</div>
				<blockquote class="testimonial__quote"><?php echo esc_html( $review['quote'] ); ?></blockquote>
				<figcaption class="testimonial__author">
					<?php if ( ! spicola_is_todo( $review['avatar'] ) ) : ?>
					<img class="testimonial__avatar" src="<?php echo esc_url( $review['avatar'] ); ?>" alt="<?php echo esc_attr( $review['name'] ); ?>" width="40" height="40" loading="lazy">
					<?php endif; ?>
					<span class="testimonial__author-text">
						<strong class="testimonial__name"><?php echo esc_html( $review['name'] ); ?></strong>
						<span class="testimonial__role"><?php
							$bits = array_filter( array( $review['role'], $review['company'] ), function ( $b ) { return ! spicola_is_todo( $b ); } );
							echo esc_html( implode( ', ', $bits ) );
						?></span>
					</span>
				</figcaption>
			</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
