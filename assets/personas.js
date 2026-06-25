/**
 * Who-we-serve persona switcher.
 *
 * A single card shows one persona at a time (info on the left, photo on the
 * right). Bottom tabs and the prev/next arrows swap which one is active.
 * Server-rendered with the first persona active, so it reads fine with JS off.
 */
(function () {
	function initRoot(root) {
		var panels = Array.prototype.slice.call(root.querySelectorAll('.persona'));
		var tabs   = Array.prototype.slice.call(root.querySelectorAll('.persona-tab'));
		var arrows = Array.prototype.slice.call(root.querySelectorAll('.persona-arrow'));
		var dots   = Array.prototype.slice.call(root.querySelectorAll('.persona-dots span'));
		if (!panels.length) { return; }

		var current = 0;

		function show(i) {
			i = (i + panels.length) % panels.length;
			panels.forEach(function (p, idx) {
				var on = idx === i;
				p.classList.toggle('is-active', on);
				p.setAttribute('aria-hidden', on ? 'false' : 'true');
			});
			tabs.forEach(function (t, idx) {
				var on = idx === i;
				t.classList.toggle('is-active', on);
				t.setAttribute('aria-selected', on ? 'true' : 'false');
			});
			dots.forEach(function (d, idx) {
				d.classList.toggle('is-on', idx === i);
			});
			current = i;
		}

		tabs.forEach(function (t) {
			t.addEventListener('click', function () { show(parseInt(t.getAttribute('data-index'), 10) || 0); });
		});
		arrows.forEach(function (a) {
			a.addEventListener('click', function () { show(current + (parseInt(a.getAttribute('data-dir'), 10) || 1)); });
		});

		// Left/right arrow keys when a tab has focus.
		root.addEventListener('keydown', function (e) {
			if (e.key === 'ArrowRight') { show(current + 1); }
			else if (e.key === 'ArrowLeft') { show(current - 1); }
		});
	}

	document.querySelectorAll('[data-personas]').forEach(initRoot);
})();
