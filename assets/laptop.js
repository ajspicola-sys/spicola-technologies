/**
 * Rotate the 3D laptop on scroll.
 * Maps the product section's progress through the viewport to a rotateY
 * angle, written to the --ry custom property. Respects reduced motion and
 * skips on small screens (where a static angle is used via CSS media query).
 */
(function () {
	var laptop = document.querySelector('.laptop');
	if (!laptop) { return; }

	var section = laptop.closest('section') || laptop.parentElement;
	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	// Sweep range, in degrees, from when the section enters to when it leaves.
	var FROM = -42, TO = 30;

	if (reduce) {
		laptop.style.setProperty('--ry', '-20deg');
		return;
	}

	var ticking = false;

	function update() {
		ticking = false;
		// Skip the scroll effect on narrow screens (CSS sets a fixed transform).
		if (window.innerWidth <= 900) { return; }

		var rect = section.getBoundingClientRect();
		var vh = window.innerHeight || document.documentElement.clientHeight;
		// progress: 0 as the section enters the bottom, 1 as it exits the top.
		var progress = (vh - rect.top) / (vh + rect.height);
		progress = Math.max(0, Math.min(1, progress));
		var ry = FROM + (TO - FROM) * progress;
		laptop.style.setProperty('--ry', ry.toFixed(2) + 'deg');
	}

	function onScroll() {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(update);
		}
	}

	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll, { passive: true });
	update();
})();
