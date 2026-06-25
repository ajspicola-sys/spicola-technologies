<?php
/**
 * Footer: closes <main>, renders the site footer (big CTA + columns) over a
 * decorative 3D glass-sphere WebGL canvas, then wp_footer().
 *
 * @package spicola
 */
?>
</main><!-- #content -->

<footer class="site-footer">
	<div class="container">

		<div class="footer-cta">
			<h2>Let&rsquo;s build something.<br><span class="grad-word">Start the conversation today.</span></h2>
			<div class="footer-cta__actions">
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">
					Get in touch
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</a>
				<a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/#products' ) ); ?>">Explore Limitless</a>
			</div>
		</div>

		<div class="footer-panel">
		<div class="footer-grid">
			<div class="footer-brand">
				<a class="brand brand--wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>">SPICOLA TECHNOLOGIES</a>
				<p><?php bloginfo( 'description' ); ?></p>
				<p><a href="mailto:joseph@spicolatechnologies.com">joseph@spicolatechnologies.com</a></p>
			</div>

			<div class="footer-col">
				<h4>Product</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#products' ) ); ?>">Limitless</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a></li>
				</ul>
			</div>

			<div class="footer-col">
				<h4>Company</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a></li>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. &middot; Built without limits.
		</div>
		</div><!-- .footer-panel -->
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
