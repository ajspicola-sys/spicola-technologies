/**
 * Scroll-driven hero reveal.
 *
 * The .hero is taller than the viewport; its inner .hero-stage is sticky
 * (pinned) for the duration. As you scroll through the hero, a 0->1 progress
 * value scrubs the animation:
 *   - the headline rises and fades out,
 *   - the central placeholder grows and rises into focus.
 *
 * Works with Lenis (reads real scroll position). Honors reduced-motion by
 * showing a sensible static state instead of scrubbing.
 */
(function () {
	var hero = document.querySelector('.hero');
	if (!hero) { return; }
	var content = hero.querySelector('.hero-content');
	var reveal  = hero.querySelector('.hero-reveal');

	function clamp( v, a, b ) { return Math.max( a, Math.min( b, v ) ); }

	function update() {
		var total = hero.offsetHeight - window.innerHeight;
		if ( total <= 0 ) { total = 1; }
		var p = clamp( -hero.getBoundingClientRect().top / total, 0, 1 );

		// Headline: rises + fades across the first 60% of the scroll.
		var hp = clamp( p / 0.6, 0, 1 );
		if ( content ) {
			content.style.transform = 'translateY(' + ( -hp * 150 ) + 'px)';
			content.style.opacity = String( 1 - hp * 0.92 );
		}

		// Central element: grows from small/low to large/high across the scroll.
		if ( reveal ) {
			var scale = 0.62 + p * 0.5;        // 0.62 -> 1.12
			var ty    = 210 - p * 320;         // +210px (peeking) -> -110px (risen)
			reveal.style.transform = 'translateY(' + ty + 'px) scale(' + scale + ')';
		}
	}

	var reduce = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	if ( reduce ) {
		// No scrubbing: show headline normally and the element at full size.
		if ( reveal ) { reveal.style.transform = 'translateY(0) scale(1)'; }
		return;
	}

	update();
	window.addEventListener( 'scroll', update, { passive: true } );
	window.addEventListener( 'resize', update );
})();
