/**
 * Smooth "glide" scrolling via Lenis (loaded from CDN as a global).
 *
 *  - Adds momentum so the page eases to a stop instead of stopping dead.
 *  - Respects prefers-reduced-motion: bails out and leaves native scroll.
 *  - In-page anchor links (#contact, etc.) glide to their target too.
 */
(function () {
	// Accessibility: never override scrolling for reduced-motion users.
	if ( window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}
	// Bail if the library failed to load (e.g. CDN blocked) — native scroll stays.
	if ( typeof Lenis === 'undefined' ) {
		return;
	}

	var lenis = new Lenis( {
		duration: 1.1,                                   // higher = longer glide
		easing: function ( t ) { return Math.min( 1, 1.001 - Math.pow( 2, -10 * t ) ); },
		smoothWheel: true,
		touchMultiplier: 1.5
	} );

	function raf( time ) {
		lenis.raf( time );
		requestAnimationFrame( raf );
	}
	requestAnimationFrame( raf );

	// Make same-page anchor links glide instead of jumping.
	document.addEventListener( 'click', function ( e ) {
		var link = e.target.closest ? e.target.closest( 'a[href^="#"]' ) : null;
		if ( ! link ) { return; }
		var hash = link.getAttribute( 'href' );
		if ( ! hash || hash.length < 2 ) { return; }
		var target = document.querySelector( hash );
		if ( ! target ) { return; }
		e.preventDefault();
		lenis.scrollTo( target );
	} );
})();
