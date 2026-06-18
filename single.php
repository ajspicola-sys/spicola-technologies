<?php
/**
 * Single blog post.
 *
 * @package spicola
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<article class="single-post">
		<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" style="font-weight:600;">&larr; Back to blog</a>
		<h1 style="margin-top:1rem;"><?php the_title(); ?></h1>
		<div class="post-meta"><?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?></div>

		<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>
