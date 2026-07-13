<?php
/**
 * 404 — full-viewport takeover page (Earth-from-space video, glowing 404,
 * liquid-glass button), branded for Spicola Technologies.
 *
 * Standalone template: does NOT use get_header()/get_footer(). The design is a
 * single-viewport dark page (background video, own nav, hero 404, footer) that
 * shares nothing with the site chrome, so it ships its own <head> with the
 * Tailwind CDN and the Helvetica Now Var webfont.
 *
 * Note: legacy paths (/about, /contact, /products, /services) are 301-redirected
 * to their homepage anchors before this template renders — see inc/routing.php.
 * This page is the fallback for genuinely unknown URLs.
 *
 * @package spicola
 */

// Same items as the site nav (see spicola_default_menu in functions.php).
$spicola_nav_links = array(
	'Products' => home_url( '/#products' ),
	'About'    => home_url( '/#about' ),
);
if ( function_exists( 'spicola_blog_enabled' ) && spicola_blog_enabled() ) {
	$spicola_nav_links['Blog'] = home_url( '/blog' );
}
$spicola_nav_links['Contact'] = home_url( '/#contact' );

// Same links as the site footer (footer.php).
$spicola_footer_columns = array(
	'PRODUCT' => array(
		'Limitless' => home_url( '/#products' ),
		'Services'  => home_url( '/#services' ),
	),
	'COMPANY' => array(
		'About'   => home_url( '/#about' ),
		'Contact' => home_url( '/#contact' ),
	),
);
if ( function_exists( 'spicola_blog_enabled' ) && spicola_blog_enabled() ) {
	$spicola_footer_columns['COMPANY'] = array(
		'About'   => home_url( '/#about' ),
		'Blog'    => home_url( '/blog' ),
		'Contact' => home_url( '/#contact' ),
	);
}

// Lucide icons (24x24, stroke-based). Inlined so no icon library is loaded.
$spicola_social_icons = array(
	'Facebook'  => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
	'Twitter'   => '<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>',
	'Dribbble'  => '<circle cx="12" cy="12" r="10"/><path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"/><path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"/><path d="M8.56 2.75c4.37 6 6 9.42 8 17.72"/>',
	'Youtube'   => '<path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/>',
	'Linkedin'  => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>',
	'Instagram' => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
	<title><?php echo esc_html( wp_get_document_title() ); ?></title>
	<link href="https://db.onlinewebfonts.com/c/e66905e07608167a84e6ad52f638c3c6?family=Helvetica+Now+Var" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: { extend: { screens: { xs: '480px' } } }
		};
	</script>
	<style>
		.four-oh-four {
			text-shadow: 0 0 80px rgba(255,255,255,0.3), 0 0 160px rgba(255,255,255,0.1);
		}
		.liquid-glass {
			background: rgba(255, 255, 255, 0.01);
			background-blend-mode: luminosity;
			backdrop-filter: blur(4px);
			-webkit-backdrop-filter: blur(4px);
			border: none;
			box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.1);
			position: relative;
			overflow: hidden;
		}
		.liquid-glass::before {
			content: '';
			position: absolute;
			inset: 0;
			border-radius: inherit;
			padding: 1.4px;
			background: linear-gradient(180deg,
				rgba(255,255,255,0.45) 0%, rgba(255,255,255,0.15) 20%,
				rgba(255,255,255,0) 40%, rgba(255,255,255,0) 60%,
				rgba(255,255,255,0.15) 80%, rgba(255,255,255,0.45) 100%);
			-webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
			-webkit-mask-composite: xor;
			mask-composite: exclude;
			pointer-events: none;
		}
	</style>
</head>
<body class="bg-black">

<div class="relative min-h-screen flex flex-col" style="font-family: &quot;Helvetica Now Var&quot;, Helvetica, Arial, sans-serif;">

	<video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
		<source src="https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260613_180732_a54afbf6-b30d-470e-861f-669871f09f67.mp4" type="video/mp4">
	</video>

	<div class="relative z-10 flex flex-col min-h-screen">

		<nav class="flex items-center justify-between px-6 md:px-12 lg:px-16 py-5">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white text-base sm:text-xl font-bold tracking-wider whitespace-nowrap">SPICOLA TECHNOLOGIES</a>

			<div class="hidden lg:flex items-center gap-8">
				<?php foreach ( $spicola_nav_links as $spicola_label => $spicola_url ) : ?>
					<a href="<?php echo esc_url( $spicola_url ); ?>" class="text-white/80 hover:text-white text-sm tracking-wide transition-colors duration-200"><?php echo esc_html( $spicola_label ); ?></a>
				<?php endforeach; ?>
			</div>

			<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="hidden lg:inline-flex items-center gap-2 bg-gradient-to-r from-emerald-400 to-cyan-500 text-white text-sm font-semibold px-6 py-2.5 rounded-full">
				GET IN TOUCH
				<svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
			</a>

			<button id="menu-toggle" type="button" class="lg:hidden relative z-[60] w-8 h-8 text-white" aria-label="Toggle menu" aria-expanded="false">
				<svg id="icon-menu" viewBox="0 0 24 24" class="absolute inset-0 m-auto w-7 h-7 transition-all duration-300 opacity-100 rotate-0 scale-100" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
				<svg id="icon-close" viewBox="0 0 24 24" class="absolute inset-0 m-auto w-7 h-7 transition-all duration-300 opacity-0 -rotate-90 scale-75" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
			</button>
		</nav>

		<div id="menu-backdrop" class="hidden fixed inset-0 z-40 bg-black/40 backdrop-blur-md transition-opacity duration-[400ms] opacity-0"></div>

		<div id="menu-panel" class="hidden absolute left-0 right-0 top-[68px] z-50">
			<div class="absolute inset-0 backdrop-blur-xl rounded-b-2xl" aria-hidden="true"></div>
			<div class="relative z-10 flex flex-col items-center gap-6 px-6 pt-6 pb-10">
				<?php foreach ( $spicola_nav_links as $spicola_label => $spicola_url ) : ?>
					<a href="<?php echo esc_url( $spicola_url ); ?>" data-menu-item class="text-center text-lg sm:text-xl font-light tracking-[0.08em] text-white/80 hover:text-white transition-all duration-[400ms] ease-out opacity-0 translate-y-3"><?php echo esc_html( $spicola_label ); ?></a>
				<?php endforeach; ?>
				<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" data-menu-item class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-400 to-cyan-500 text-white text-sm font-semibold px-6 py-2.5 rounded-full transition-all duration-[400ms] ease-out opacity-0 translate-y-3">
					GET IN TOUCH
					<svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
				</a>
			</div>
		</div>

		<main class="flex-1 flex flex-col items-center justify-center text-center px-4 sm:px-6 py-12 sm:py-16 md:py-0">
			<h1 class="text-white/80 text-lg xs:text-2xl sm:text-3xl md:text-5xl font-light leading-snug tracking-tight mb-1 sm:mb-2">This page seems to have</h1>
			<h1 class="text-white/80 text-lg xs:text-2xl sm:text-3xl md:text-5xl font-light leading-snug tracking-tight mb-8 sm:mb-12">slipped beyond our reach :/</h1>

			<div class="relative mb-8 sm:mb-12 w-full flex justify-center overflow-visible">
				<span class="four-oh-four text-[80px] xs:text-[100px] sm:text-[140px] md:text-[200px] lg:text-[260px] font-black text-white leading-none tracking-tighter select-none">404</span>
			</div>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="liquid-glass text-white text-[10px] xs:text-xs sm:text-sm tracking-[0.15em] sm:tracking-[0.2em] font-medium px-6 sm:px-8 py-3 sm:py-3.5 rounded-full uppercase">Return to Main Page</a>
		</main>

		<footer class="relative z-10 px-4 sm:px-6 md:px-12 lg:px-16 pb-8 sm:pb-10 pt-10 sm:pt-16">
			<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 sm:gap-8 lg:gap-6">

				<div class="col-span-2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white text-sm font-bold tracking-wider">SPICOLA TECHNOLOGIES</a>
					<p class="text-white/50 text-[10px] sm:text-xs mt-3 max-w-xs"><?php bloginfo( 'description' ); ?></p>
					<p class="mt-2"><a href="mailto:joseph@spicolatechnologies.com" class="text-white/50 hover:text-white/80 text-[10px] sm:text-xs transition-colors duration-200">joseph@spicolatechnologies.com</a></p>
				</div>

				<?php foreach ( $spicola_footer_columns as $spicola_title => $spicola_links ) : ?>
					<div>
						<h3 class="text-white text-[10px] sm:text-xs font-bold tracking-[0.15em] mb-3 sm:mb-4"><?php echo esc_html( $spicola_title ); ?></h3>
						<ul class="space-y-2 sm:space-y-2.5">
							<?php foreach ( $spicola_links as $spicola_label => $spicola_url ) : ?>
								<li><a href="<?php echo esc_url( $spicola_url ); ?>" class="text-white/50 hover:text-white/80 text-[10px] sm:text-xs transition-colors duration-200"><?php echo esc_html( $spicola_label ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>

				<div class="col-span-2 lg:col-span-2">
					<h3 class="text-white text-[10px] sm:text-xs font-bold tracking-[0.15em] mb-3 sm:mb-4">START THE CONVERSATION</h3>
					<form class="flex max-w-sm" action="<?php echo esc_url( home_url( '/#contact' ) ); ?>" method="get">
						<input type="email" placeholder="Type your email — we’ll reach out" class="min-w-0 flex-1 bg-white text-black text-xs px-3 py-2.5 rounded-l-md focus:outline-none">
						<button type="submit" class="bg-gradient-to-r from-emerald-400 to-cyan-500 text-white text-xs font-bold tracking-wider px-4 py-2.5 rounded-r-md whitespace-nowrap">SEND IT</button>
					</form>

					<h3 class="text-white text-[10px] sm:text-xs font-bold tracking-[0.15em] mt-5 sm:mt-6 mb-3">CONNECT</h3>
					<div class="flex items-center gap-3">
						<?php foreach ( $spicola_social_icons as $spicola_name => $spicola_paths ) : ?>
							<a href="#" class="text-white/50 hover:text-white transition-colors duration-200" aria-label="<?php echo esc_attr( $spicola_name ); ?>">
								<svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $spicola_paths; // phpcs:ignore WordPress.Security.EscapeOutput -- static SVG markup defined above. ?></svg>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
			<div class="mt-8 sm:mt-10 text-center text-white/40 text-[10px] sm:text-xs">&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. &middot; Built without limits.</div>
		</footer>

	</div>
</div>

<script>
(function () {
	'use strict';

	var toggle    = document.getElementById('menu-toggle');
	var backdrop  = document.getElementById('menu-backdrop');
	var panel     = document.getElementById('menu-panel');
	var iconMenu  = document.getElementById('icon-menu');
	var iconClose = document.getElementById('icon-close');
	var items     = panel.querySelectorAll('[data-menu-item]');

	var isOpen = false;
	var closeTimer = null;

	function setIcon(open) {
		iconMenu.classList.toggle('opacity-100', !open);
		iconMenu.classList.toggle('rotate-0', !open);
		iconMenu.classList.toggle('scale-100', !open);
		iconMenu.classList.toggle('opacity-0', open);
		iconMenu.classList.toggle('rotate-90', open);
		iconMenu.classList.toggle('scale-75', open);

		iconClose.classList.toggle('opacity-100', open);
		iconClose.classList.toggle('rotate-0', open);
		iconClose.classList.toggle('scale-100', open);
		iconClose.classList.toggle('opacity-0', !open);
		iconClose.classList.toggle('-rotate-90', !open);
		iconClose.classList.toggle('scale-75', !open);
	}

	function openMenu() {
		if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
		isOpen = true;
		toggle.setAttribute('aria-expanded', 'true');
		setIcon(true);
		backdrop.classList.remove('hidden');
		panel.classList.remove('hidden');
		// Force a style flush so the browser registers the mounted (hidden)
		// state before the visible classes land — otherwise the transitions
		// are skipped. A synchronous reflow is used instead of rAF because
		// rAF is throttled in background tabs.
		void panel.offsetHeight;
		backdrop.classList.remove('opacity-0');
		backdrop.classList.add('opacity-100');
		items.forEach(function (el, i) {
			el.style.transitionDelay = (350 + i * 50) + 'ms';
			el.classList.remove('opacity-0', 'translate-y-3');
			el.classList.add('opacity-100', 'translate-y-0');
		});
	}

	function closeMenu() {
		isOpen = false;
		toggle.setAttribute('aria-expanded', 'false');
		setIcon(false);
		backdrop.classList.remove('opacity-100');
		backdrop.classList.add('opacity-0');
		items.forEach(function (el) {
			el.style.transitionDelay = '0ms';
			el.classList.remove('opacity-100', 'translate-y-0');
			el.classList.add('opacity-0', 'translate-y-3');
		});
		closeTimer = setTimeout(function () {
			backdrop.classList.add('hidden');
			panel.classList.add('hidden');
			closeTimer = null;
		}, 500);
	}

	toggle.addEventListener('click', function () {
		if (isOpen) { closeMenu(); } else { openMenu(); }
	});
	backdrop.addEventListener('click', closeMenu);
})();
</script>

</body>
</html>
