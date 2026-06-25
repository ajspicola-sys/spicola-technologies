<?php
/**
 * Social-proof strip (logos + stats) shown directly below the hero.
 *
 * CONDITIONAL RENDER (honest proof only): the whole strip is skipped unless
 * there is at least one REAL logo or REAL stat in inc/site-data.php. While the
 * arrays hold only TODO placeholders, nothing renders — we never ship an empty
 * or fabricated "trusted by" band. Add real entries to spicola_logos() /
 * spicola_stats() to reveal it.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

$spicola_logos = spicola_real_logos();
$spicola_stats = spicola_real_stats();

if ( empty( $spicola_logos ) && empty( $spicola_stats ) ) {
	return;
}
?>
<section class="section section--soft social-proof" aria-label="Social proof">
	<div class="container">
		<?php if ( ! empty( $spicola_logos ) ) : ?>
		<p class="social-proof__eyebrow">Trusted by growing businesses</p>
		<ul class="social-proof__logos">
			<?php foreach ( $spicola_logos as $logo ) : ?>
			<li><img src="<?php echo esc_url( $logo['src'] ); ?>" alt="<?php echo esc_attr( $logo['name'] ); ?>" height="28" loading="lazy"></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>

		<?php if ( ! empty( $spicola_stats ) ) : ?>
		<dl class="social-proof__stats">
			<?php foreach ( $spicola_stats as $stat ) : ?>
			<div class="social-proof__stat">
				<dt class="social-proof__value"><?php echo esc_html( $stat['value'] ); ?></dt>
				<dd class="social-proof__label"><?php echo esc_html( $stat['label'] ); ?></dd>
			</div>
			<?php endforeach; ?>
		</dl>
		<?php endif; ?>
	</div>
</section>
