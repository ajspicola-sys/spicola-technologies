/**
 * Premium micro-interactions:
 *  - Cursor spotlight: a soft cyan glow that follows the pointer with inertia.
 *  - Magnetic buttons: buttons lean slightly toward the cursor.
 *
 * Both are enabled only on fine-pointer (mouse) devices and disabled under
 * prefers-reduced-motion, so touch users and motion-sensitive users are
 * unaffected. No dependencies — matches the vanilla IIFE style of reveal.js.
 */
(function () {
	var mq = window.matchMedia;
	var reduce = mq && mq('(prefers-reduced-motion: reduce)').matches;
	var fine   = mq && mq('(hover: hover) and (pointer: fine)').matches;
	if (reduce || !fine) { return; }

	/* ---- Cursor spotlight ---- */
	var glow = document.createElement('div');
	glow.className = 'cursor-glow';
	glow.setAttribute('aria-hidden', 'true');
	document.body.appendChild(glow);

	var gx = window.innerWidth / 2, gy = window.innerHeight / 2;
	var tx = gx, ty = gy, raf = null, shown = false;

	function render() {
		gx += (tx - gx) * 0.16;
		gy += (ty - gy) * 0.16;
		glow.style.transform = 'translate3d(' + gx + 'px,' + gy + 'px,0)';
		if (Math.abs(tx - gx) > 0.5 || Math.abs(ty - gy) > 0.5) {
			raf = requestAnimationFrame(render);
		} else {
			raf = null;
		}
	}

	window.addEventListener('mousemove', function (e) {
		tx = e.clientX; ty = e.clientY;
		if (!shown) { glow.classList.add('is-on'); shown = true; }
		if (!raf) { raf = requestAnimationFrame(render); }
	}, { passive: true });

	// Hide when the pointer leaves the window entirely.
	window.addEventListener('mouseout', function (e) {
		if (!e.relatedTarget) { glow.classList.remove('is-on'); shown = false; }
	});

	/* ---- Magnetic buttons ---- */
	var strength = 12; // max px of lean
	document.querySelectorAll('.btn').forEach(function (btn) {
		btn.addEventListener('mousemove', function (e) {
			var r = btn.getBoundingClientRect();
			var mx = (e.clientX - (r.left + r.width / 2)) / r.width;
			var my = (e.clientY - (r.top + r.height / 2)) / r.height;
			btn.style.transform = 'translate(' + (mx * strength) + 'px,' + (my * strength - 1) + 'px)';
		});
		btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
	});
})();
