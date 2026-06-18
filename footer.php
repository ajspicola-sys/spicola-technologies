<?php
/**
 * Footer: closes <main>, renders the site footer, and wp_footer().
 *
 * @package spicola
 */
?>
</main><!-- #content -->

<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div class="footer-brand">
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="margin-bottom:14px;">
					<span class="mark"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.4 4.6 2.4 6.6 7 7-4.6.4-6.6 2.4-7 7-.4-4.6-2.4-6.6-7-7 4.6-.4 6.6-2.4 7-7z"/></svg></span>
					<span><?php bloginfo( 'name' ); ?></span>
				</a>
				<p><?php bloginfo( 'description' ); ?></p>
			</div>

			<div class="footer-col">
				<h4>Company</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a></li>
				</ul>
			</div>

			<div class="footer-col">
				<h4>Products</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#products' ) ); ?>">Limitless</a></li>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
