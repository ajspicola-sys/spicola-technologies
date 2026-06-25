/**
 * Blur fade-in on scroll.
 * Adds a reveal class to key elements, then unblurs/fades them in as they
 * enter the viewport. Respects prefers-reduced-motion (shows everything,
 * no animation).
 */
(function () {
	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	// Elements to animate. Direct children of sections + common blocks.
	var selectors = [
		'.hero .container > *',
		'.section .center > *',
		'.card',
		'.feature > div',
		'.feature-visual',
		'.cta-inner > *:not(.cta-glow)',
		'.post-card',
		'.section .grid-2 > *',
		'.services-intro > *',
		'.service-item',
		'.step',
		'.testimonial',
		'.about-layout > *',
		'.persona-info',
	];

	var nodes = [];
	selectors.forEach(function (sel) {
		document.querySelectorAll(sel).forEach(function (el) {
			if (nodes.indexOf(el) === -1) { nodes.push(el); }
		});
	});

	if (reduce || !('IntersectionObserver' in window)) {
		nodes.forEach(function (el) { el.classList.add('is-visible'); });
		return;
	}

	nodes.forEach(function (el, i) {
		el.classList.add('reveal');
		// Small stagger within a group for a nicer cascade.
		el.style.transitionDelay = (Math.min(i % 6, 5) * 60) + 'ms';
	});

	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				io.unobserve(entry.target);
			}
		});
	}, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

	nodes.forEach(function (el) { io.observe(el); });
})();
