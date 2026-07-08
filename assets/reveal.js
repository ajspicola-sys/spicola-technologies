/**
 * Fast fade/slide-in on scroll.
 * Content is fully present in the DOM at all times — this only toggles a
 * visual reveal class, quickly (≈300ms) and almost as soon as an element
 * enters the viewport, so text is never left ghosted mid-scroll.
 * Respects prefers-reduced-motion (everything shown, no animation).
 */
(function () {
	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	var selectors = [
		'.hero .container > *',
		'.logo-cloud .container > *',
		'.metric',
		'.section-head > *',
		'.service-item',
		'.feature-card',
		'.flagship__visual',
		'.step',
		'.personas-card',
		'.about-text',
		'.about-cards .card',
		'.testimonial',
		'.cta-copy',
		'.cta-form',
		'.footer-cta > *',
		'.post-card',
	];

	var nodes = [];
	selectors.forEach(function (sel) {
		document.querySelectorAll(sel).forEach(function (el) {
			if (nodes.indexOf(el) === -1) { nodes.push(el); }
		});
	});

	if (reduce || !('IntersectionObserver' in window)) { return; }

	nodes.forEach(function (el, i) {
		el.classList.add('reveal');
		// Tiny stagger within a group; capped so nothing waits long.
		el.style.transitionDelay = (Math.min(i % 4, 3) * 45) + 'ms';
	});

	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				io.unobserve(entry.target);
			}
		});
	}, { threshold: 0.05, rootMargin: '0px 0px -4% 0px' });

	nodes.forEach(function (el) {
		// Anything already in view on load shows immediately, no animation lag.
		var rect = el.getBoundingClientRect();
		if (rect.top < window.innerHeight * 0.9) {
			el.classList.add('is-visible');
		} else {
			io.observe(el);
		}
	});
})();
