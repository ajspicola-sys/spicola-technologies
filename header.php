<?php
/**
 * Header: opening <html>, <head>, and the site nav.
 *
 * @package spicola
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container nav">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
				<span class="mark"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.4 4.6 2.4 6.6 7 7-4.6.4-6.6 2.4-7 7-.4-4.6-2.4-6.6-7-7 4.6-.4 6.6-2.4 7-7z"/></svg></span>
				<span><?php bloginfo( 'name' ); ?></span>
			<?php endif; ?>
		</a>

		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav-menu',
				'depth'          => 1,
			) );
		} else {
			spicola_default_menu();
		}
		?>

		<a class="btn btn--primary nav-cta" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Get in touch</a>
	</div>
</header>

<main id="content">
