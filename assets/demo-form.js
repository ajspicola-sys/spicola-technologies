/**
 * Demo request form — progressive enhancement.
 *
 * Without this script the form posts normally (admin-post.php) and the page
 * reloads with a status banner. With it, the form submits via fetch and shows
 * inline loading / success / error states plus accessible field-level errors,
 * with no reload. Respects the no-JS fallback entirely — if anything throws we
 * let the native submit happen.
 */
(function () {
	var form = document.querySelector('[data-demo-form]');
	if (!form || !window.fetch || !window.FormData) { return; }

	var mode = form.getAttribute('data-mode'); // 'internal' (JSON) | 'external'
	var url = form.getAttribute('data-ajax-url') || form.action;
	var statusEl = form.querySelector('[data-form-status]');
	var submitBtn = form.querySelector('[data-submit]');
	var submitLabel = form.querySelector('[data-submit-label]');

	function setStatus(state, message) {
		if (!statusEl) { return; }
		if (state) { statusEl.setAttribute('data-state', state); }
		else { statusEl.removeAttribute('data-state'); }
		statusEl.textContent = message || '';
	}

	function clearErrors() {
		form.querySelectorAll('.field__error').forEach(function (el) { el.textContent = ''; });
		form.querySelectorAll('[aria-invalid="true"]').forEach(function (el) {
			el.removeAttribute('aria-invalid');
		});
	}

	function showFieldError(name, message) {
		var input = form.querySelector('[name="' + name + '"]');
		if (!input) { return; }
		input.setAttribute('aria-invalid', 'true');
		var box = document.getElementById(input.getAttribute('aria-describedby'));
		if (box) { box.textContent = message; }
	}

	// Client-side validation mirroring the server rules.
	function validate() {
		clearErrors();
		var ok = true;
		var required = { name: 'Please enter your name.', email: 'Please enter a valid work email.' };
		Object.keys(required).forEach(function (key) {
			var input = form.querySelector('[name="' + key + '"]');
			if (!input) { return; }
			var val = input.value.trim();
			var bad = !val || (key === 'email' && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(val));
			if (bad) { showFieldError(key, required[key]); ok = false; }
		});
		return ok;
	}

	function setLoading(on) {
		if (!submitBtn) { return; }
		submitBtn.disabled = on;
		form.setAttribute('data-loading', on ? 'true' : 'false');
		if (submitLabel) { submitLabel.textContent = on ? 'Sending…' : 'Book a demo'; }
	}

	form.addEventListener('submit', function (e) {
		// Honeypot filled => let it submit normally and be dropped server-side.
		var hp = form.querySelector('[name="company_url"]');
		if (hp && hp.value) { return; }

		if (!validate()) {
			e.preventDefault();
			setStatus('error', 'Please fix the highlighted fields.');
			var firstBad = form.querySelector('[aria-invalid="true"]');
			if (firstBad) { firstBad.focus(); }
			return;
		}

		e.preventDefault();
		setLoading(true);
		setStatus('', '');

		var opts = { method: 'POST', body: new FormData(form) };
		// External endpoints (Formspree etc.) expect an Accept: JSON hint.
		if (mode === 'external') { opts.headers = { Accept: 'application/json' }; }

		fetch(url, opts).then(function (res) {
			var ct = res.headers.get('content-type') || '';
			if (ct.indexOf('application/json') !== -1) {
				return res.json().then(function (body) { return { res: res, body: body }; });
			}
			return { res: res, body: null };
		}).then(function (r) {
			setLoading(false);
			var success = r.res.ok && (!r.body || r.body.success !== false);
			if (success) {
				form.reset();
				clearErrors();
				setStatus('success', (r.body && r.body.data && r.body.data.message) || "Thanks — we'll be in touch shortly.");
				if (statusEl) { statusEl.focus && statusEl.focus(); }
				return;
			}
			// Field-level errors from the internal JSON handler.
			var data = r.body && r.body.data ? r.body.data : {};
			if (data.fields) {
				Object.keys(data.fields).forEach(function (k) { showFieldError(k, data.fields[k]); });
			}
			setStatus('error', data.message || 'Something went wrong. Please try again or email us.');
		}).catch(function () {
			// Network failure: fall back to a normal submit so the lead isn't lost.
			setLoading(false);
			setStatus('error', 'Network error — submitting the usual way…');
			form.submit();
		});
	});
})();
