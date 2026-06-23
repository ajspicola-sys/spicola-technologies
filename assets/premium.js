/**
 * Premium micro-interactions:
 *  - Magnetic buttons: buttons lean slightly toward the cursor.
 *
 * Enabled only on fine-pointer (mouse) devices and disabled under
 * prefers-reduced-motion, so touch users and motion-sensitive users are
 * unaffected. No dependencies — matches the vanilla IIFE style of reveal.js.
 */
(function () {
	var mq = window.matchMedia;
	var reduce = mq && mq('(prefers-reduced-motion: reduce)').matches;
	var fine   = mq && mq('(hover: hover) and (pointer: fine)').matches;
	if (reduce || !fine) { return; }

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
