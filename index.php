<?php
/**
 * Main template — used for the blog (post index), archives, and as the
 * ultimate fallback. Renders a grid of post cards.
 *
 * @package spicola
 */

get_header();
?>

<section class="page-head">
	<div class="container center">
		<p class="eyebrow">Blog</p>
		<h1><?php echo is_home() ? 'Insights &amp; Updates' : wp_kses_post( get_the_archive_title() ); ?></h1>
		<p class="lead">News, ideas, and notes from the Spicola Technologies team.</p>
	</div>
</section>

<section class="section" style="padding-top:24px;">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="posts">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="post-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a>
						<?php endif; ?>
						<div class="body">
							<div class="post-meta"><?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?></div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php echo paginate_links( array( 'mid_size' => 1 ) ); ?>
			</div>
		<?php else : ?>
			<div class="center blog-empty">
				<div class="chip chip--cyan" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v12H5.17L4 17.17V4z"/><line x1="8" y1="9" x2="16" y2="9"/><line x1="8" y1="12" x2="13" y2="12"/></svg>
				</div>
				<h2>No posts yet — but they&rsquo;re coming.</h2>
				<p class="lead">We&rsquo;re putting together notes on building Limitless, the tools we use, and what we&rsquo;re learning. Want to know when the first one lands?</p>

				<?php $spicola_subscribed = isset( $_GET['subscribed'] ) ? sanitize_key( wp_unslash( $_GET['subscribed'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<?php if ( '1' === $spicola_subscribed ) : ?>
					<p class="subscribe__done" role="status">Thanks — we&rsquo;ll email you when we publish.</p>
				<?php else : ?>
					<form class="subscribe" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
						<?php wp_nonce_field( 'spicola_subscribe', 'spicola_sub_nonce' ); ?>
						<input type="hidden" name="action" value="spicola_subscribe">
						<div class="subscribe__hp" aria-hidden="true">
							<label for="sub-company-url">Company website</label>
							<input type="text" id="sub-company-url" name="company_url" tabindex="-1" autocomplete="off">
						</div>
						<label class="screen-reader-text" for="sub-email">Your email address</label>
						<input type="email" id="sub-email" name="email" placeholder="you@company.com" autocomplete="email" required>
						<button type="submit" class="btn btn--primary">Notify me</button>
						<?php if ( '0' === $spicola_subscribed ) : ?>
						<p class="subscribe__error" role="alert">Please enter a valid email address.</p>
						<?php endif; ?>
					</form>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
