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
			<div class="center">
				<p class="lead">No posts yet — check back soon.</p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
