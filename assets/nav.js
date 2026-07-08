/**
 * Sticky nav: transparent at the top of the page, solid dark once scrolled.
 * On the front page this also flips the nav text from dark (over the white
 * hero) to light — handled in CSS via the .is-scrolled class.
 */
(function () {
	var header = document.querySelector('.site-header');
	if (!header) { return; }

	var ticking = false;

	function update() {
		header.classList.toggle('is-scrolled', window.scrollY > 12);
		ticking = false;
	}

	window.addEventListener('scroll', function () {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(update);
		}
	}, { passive: true });

	update();
})();
