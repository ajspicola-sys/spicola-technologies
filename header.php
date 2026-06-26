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
		<a class="brand brand--wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>">SPICOLA TECHNOLOGIES</a>

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

		<a class="btn btn--primary nav-cta" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Book a demo</a>
	</div>
</header>

<main id="content">
