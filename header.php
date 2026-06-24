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
	<script>document.documentElement.classList.add('js');</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container nav">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
				<img class="site-logo site-logo--light" src="https://spicolatechnologies.com/wp-content/uploads/2026/06/Spicola-tech-White-scaled.png" alt="<?php bloginfo( 'name' ); ?>" height="40">
				<img class="site-logo site-logo--dark" src="https://spicolatechnologies.com/wp-content/uploads/2026/06/image_2026-06-24_144638294.png" alt="<?php bloginfo( 'name' ); ?>" height="40">
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
