/**
 * Scroll-driven hero: a dark card on a white page expands to full-bleed.
 *
 * A lerp-smoothed 0->1 scroll progress scrubs:
 *   - the card growing from a centered rounded box to full width/height,
 *   - the headline + buttons blurring / fading / rising away,
 *   - the site header fading + blurring out, then back in once full-bleed.
 *
 * The placeholder device is intentionally static. Only runs where a .hero
 * exists (the front page), so other pages' header is untouched. Honors
 * prefers-reduced-motion with a static, readable hero.
 */
(function () {
	var hero = document.querySelector('.hero');
	if (!hero) { return; }
	var card = hero.querySelector('.hero-card');
	var content = hero.querySelector('.hero-content');
	var header = document.querySelector('.site-header');

	function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }
	function easeInOut(t) { return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2; }
	function range(p, a, b) { return clamp((p - a) / (b - a), 0, 1); }

	function readProgress() {
		var total = hero.offsetHeight - window.innerHeight;
		if (total <= 0) { total = 1; }
		return clamp(-hero.getBoundingClientRect().top / total, 0, 1);
	}

	function apply(p) {
		// Card finishes expanding at 78% of the scroll, leaving a little more
		// scroll before the header returns.
		var ce = easeInOut(clamp(p / 0.78, 0, 1));
		if (card) {
			card.style.width = (70 + ce * 30) + '%';
			card.style.height = (98 + ce * 2) + '%';
			var r = (30 * (1 - ce));
			card.style.borderRadius = r + 'px ' + r + 'px 0 0';
			card.style.boxShadow = '0 50px 120px rgba(8,20,30,' + (0.22 * (1 - ce)) + ')';
		}

		// Headline + buttons: the more you scroll, the more they blur/fade/rise
		// (reverses as you scroll back). Scrubbed across [0.02, 0.45].
		if (content) {
			var co = range(p, 0.02, 0.45);
			content.style.opacity = String(1 - co);
			content.style.filter = 'blur(' + (co * 12) + 'px)';
			content.style.transform = 'translateY(' + (-co * 80) + 'px) scale(' + (1 - co * 0.03) + ')';
		}

		// Site header: scrubs out across [0.03, 0.30], then back in across
		// [0.88, 1] once the card is full-width.
		if (header) {
			var hv = clamp(1 - range(p, 0.03, 0.30) + range(p, 0.88, 1), 0, 1);
			header.style.opacity = String(hv);
			header.style.filter = 'blur(' + ((1 - hv) * 8) + 'px)';
			header.style.transform = 'translateY(' + (-(1 - hv) * 22) + 'px)';
			header.style.pointerEvents = hv < 0.5 ? 'none' : 'auto';

			// First appearance (over the white hero) is see-through with black
			// text; the second appearance (over the dark full-bleed card) is the
			// standard dark bar. Swap happens past the midpoint, while the header
			// is faded out, so there's no visible flash.
			header.classList.toggle('is-dark', p >= 0.5);
		}
	}

	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	if (reduce) {
		hero.style.height = '100vh';   // no long empty scroll
		apply(0);
		return;
	}

	// Smoothing: lerp the applied progress toward the scroll target each frame.
	var target = readProgress(), current = target, rafId = null;
	function tick() {
		current += (target - current) * 0.12;
		if (Math.abs(target - current) < 0.0005) { current = target; apply(current); rafId = null; return; }
		apply(current);
		rafId = requestAnimationFrame(tick);
	}
	function onScroll() {
		target = readProgress();
		if (rafId === null) { rafId = requestAnimationFrame(tick); }
	}

	apply(current);
	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll);
})();
