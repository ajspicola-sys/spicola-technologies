<?php
/**
 * Generic page template (About, Privacy, Terms, etc.).
 *
 * @package spicola
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<article class="page-content">
		<h1><?php the_title(); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>
