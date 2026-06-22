/**
 * Footer 3D background — translucent "glass" spheres that drift while you
 * scroll and rest when you stop. Built for speed first:
 *
 *  - Lazy-init: Three.js is only imported once the footer nears the viewport
 *    (IntersectionObserver), so initial page load pays nothing.
 *  - On-demand rendering: the render loop runs ONLY while the scene is moving,
 *    then sleeps — the GPU is idle when you're not scrolling.
 *  - Capped devicePixelRatio, canvas sized to the footer (not full-screen).
 *  - Fallbacks: prefers-reduced-motion renders a single static frame; no WebGL
 *    or small screens leave the CSS gradient (.site-footer::before) in place.
 *
 * The scene geometry lives in one place — buildModel() — so it can later be
 * swapped for a loaded .glb without touching the render/scroll plumbing.
 */
(function () {
	var footer = document.querySelector('.site-footer');
	var canvas = footer && footer.querySelector('.footer-canvas');
	if (!footer || !canvas) { return; }

	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	// Skip WebGL on small screens (costly, barely visible) — gradient remains.
	if (window.innerWidth < 640) { return; }

	function hasWebGL() {
		try {
			var c = document.createElement('canvas');
			return !!(window.WebGLRenderingContext && (c.getContext('webgl') || c.getContext('experimental-webgl')));
		} catch (e) { return false; }
	}
	if (!hasWebGL()) { return; }

	var started = false;
	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting && !started) {
				started = true;
				io.disconnect();
				import('https://cdn.jsdelivr.net/npm/three@0.161.0/+esm')
					.then(setup)
					.catch(function () { /* leave the gradient fallback */ });
			}
		});
	}, { rootMargin: '300px 0px' });
	io.observe(footer);

	function setup(THREE) {
		var renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true, powerPreference: 'high-performance' });
		renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
		renderer.toneMapping = THREE.ACESFilmicToneMapping;
		renderer.toneMappingExposure = 1.05;

		var scene = new THREE.Scene();
		var camera = new THREE.PerspectiveCamera(45, 1, 0.1, 100);
		camera.position.set(0, 0, 9);

		// Environment map (a vertical dark→cyan gradient) — this is what gives the
		// glass its reflections/refraction without downloading a heavy HDR.
		var pmrem = new THREE.PMREMGenerator(renderer);
		scene.environment = pmrem.fromEquirectangular(gradientTexture(THREE)).texture;

		// A little direct light for crisp highlights on top of the IBL.
		scene.add(new THREE.AmbientLight(0x2a3742, 1.0));
		var key = new THREE.PointLight(0x5FD6E8, 90, 0, 2); key.position.set(6, 4, 6); scene.add(key);
		var fill = new THREE.PointLight(0xffffff, 45, 0, 2); fill.position.set(-6, -3, 5); scene.add(fill);

		var group = buildModel(THREE);
		scene.add(group);
		var spheres = group.children;

		/* ---- on-demand render loop ---- */
		var target = 0, current = 0, raf = null, pending = true;

		function progress() {
			var r = footer.getBoundingClientRect();
			var vh = window.innerHeight || 1;
			return Math.max(0, Math.min(1, 1 - (r.top / (vh + r.height))));
		}

		function frame() {
			current += (target - current) * 0.08;
			var moving = Math.abs(target - current) > 0.0008;

			group.rotation.y = current * 0.9 - 0.3;
			group.rotation.x = current * 0.22;
			group.position.y = current * 1.4 - 0.5;
			for (var i = 0; i < spheres.length; i++) {
				spheres[i].position.y = spheres[i].userData.baseY + Math.sin(current * Math.PI + i) * 0.14;
			}

			renderer.render(scene, camera);

			if (moving || pending) { pending = false; raf = requestAnimationFrame(frame); }
			else { raf = null; }
		}
		function kick() { if (!raf) { raf = requestAnimationFrame(frame); } }

		function resize() {
			var w = footer.clientWidth, h = footer.clientHeight;
			renderer.setSize(w, h, false);
			camera.aspect = w / h;
			camera.updateProjectionMatrix();
			pending = true; kick();
		}
		resize();
		window.addEventListener('resize', debounce(resize, 200));

		if (reduce) {
			// One static, settled frame — no scroll listener, no animation.
			target = current = progress();
			renderer.render(scene, camera);
		} else {
			target = current = progress();
			window.addEventListener('scroll', function () { target = progress(); pending = true; kick(); }, { passive: true });
			pending = true; kick();
		}
	}

	/**
	 * Build the 3D content. Swap this out later to load a custom .glb model
	 * (GLTFLoader) — the render loop above only needs a THREE.Group back whose
	 * children carry userData.baseY.
	 */
	function buildModel(THREE) {
		var group = new THREE.Group();
		var glass = new THREE.MeshPhysicalMaterial({
			transmission: 1, thickness: 1.2, ior: 1.45, roughness: 0.07, metalness: 0,
			clearcoat: 1, clearcoatRoughness: 0.22, transparent: true,
			color: new THREE.Color(0xbfeef5),
			attenuationColor: new THREE.Color(0x2FA3B6), attenuationDistance: 3.0,
			envMapIntensity: 1.25
		});
		var geo = new THREE.SphereGeometry(1, 32, 32);
		// [x, y, z, scale]
		var specs = [
			[-3.4, 1.1, 0.0, 1.05], [-1.3, -1.4, 1.4, 0.7], [1.1, 1.6, -1.0, 1.3],
			[3.2, -0.5, 0.4, 0.95], [0.2, 0.2, 2.0, 0.55], [-2.1, -0.3, -2.0, 0.8],
			[2.4, 1.0, 1.8, 0.5], [-0.5, -1.8, -1.0, 0.62]
		];
		specs.forEach(function (s) {
			var m = new THREE.Mesh(geo, glass);
			m.position.set(s[0], s[1], s[2]);
			m.scale.setScalar(s[3]);
			m.userData.baseY = s[1];
			group.add(m);
		});
		return group;
	}

	function gradientTexture(THREE) {
		var c = document.createElement('canvas');
		c.width = 16; c.height = 256;
		var g = c.getContext('2d');
		var grad = g.createLinearGradient(0, 0, 0, 256);
		grad.addColorStop(0.0, '#0A0A0D');
		grad.addColorStop(0.55, '#103039');
		grad.addColorStop(1.0, '#5FD6E8');
		g.fillStyle = grad; g.fillRect(0, 0, 16, 256);
		var tex = new THREE.CanvasTexture(c);
		tex.mapping = THREE.EquirectangularReflectionMapping;
		return tex;
	}

	function debounce(fn, ms) {
		var id;
		return function () { clearTimeout(id); id = setTimeout(fn, ms); };
	}
})();
