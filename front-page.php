<?php
/**
 * Front page: the marketing landing page for Spicola Technologies.
 * Used automatically when a static front page is set (Settings → Reading).
 *
 * @package spicola
 */

get_header();
?>

<!-- ===================== HERO ===================== -->
<section class="hero">
	<div class="hero-bg" aria-hidden="true">
		<svg viewBox="0 0 1200 480" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
			<!-- Spica constellation: thin connecting lines + faint dots -->
			<line class="spica-line" x1="180" y1="90"  x2="320" y2="150" />
			<line class="spica-line" x1="320" y1="150" x2="430" y2="80"  />
			<line class="spica-line" x1="900" y1="120" x2="1010" y2="200" />
			<line class="spica-line" x1="1010" y1="200" x2="940" y2="300" />
			<line class="spica-line" x1="600" y1="60"  x2="720" y2="40"  />
			<circle class="spica-dot" cx="180"  cy="90"  r="2.5" />
			<circle class="spica-dot" cx="320"  cy="150" r="3" />
			<circle class="spica-dot" cx="430"  cy="80"  r="2" />
			<circle class="spica-dot" cx="600"  cy="60"  r="2.5" />
			<circle class="spica-dot" cx="720"  cy="40"  r="2" />
			<circle class="spica-dot" cx="900"  cy="120" r="2.5" />
			<circle class="spica-dot" cx="1010" cy="200" r="3" />
			<circle class="spica-dot" cx="940"  cy="300" r="2" />
			<!-- The bright star: gradient 4-point sparkle -->
			<defs>
				<linearGradient id="spica-grad" x1="0" y1="0" x2="1" y2="1">
					<stop offset="0%" stop-color="#9491CD" />
					<stop offset="100%" stop-color="#88C8D2" />
				</linearGradient>
			</defs>
			<path d="M1010 200c.9 9.5 4.9 13.5 14 14-9.1.9-13.1 4.9-14 14-.9-9.1-4.9-13.1-14-14 9.1-.9 13.1-4.5 14-14z" fill="url(#spica-grad)" />
		</svg>
	</div>
	<div class="container center">
		<p class="eyebrow">Software company</p>
		<h1>Software that helps your business run <span class="grad-word">without limits.</span></h1>
		<p class="lead">Spicola Technologies builds practical, modern software for growing businesses — including <strong>Limitless</strong>, our all-in-one B2B platform that brings your operations into a single place.</p>
		<div class="hero-actions">
			<a class="btn btn--primary" href="#products">Explore Limitless</a>
			<a class="btn btn--secondary" href="#contact">Talk to us</a>
		</div>
	</div>
</section>

<!-- ===================== WHAT WE DO ===================== -->
<section class="section section--light" id="services">
	<div class="container">
		<div class="center" style="margin-bottom:48px;">
			<p class="eyebrow">What we do</p>
			<h2>Thoughtful tools, built to last</h2>
			<p class="lead">We focus on the unglamorous problems that slow businesses down, and turn them into clean, reliable software.</p>
		</div>
		<div class="grid grid-3">
			<div class="card">
				<div class="chip chip--peri">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
				</div>
				<h3>Product development</h3>
				<p>End-to-end web applications — from idea to a deployed, maintainable product your team can rely on every day.</p>
			</div>
			<div class="card">
				<div class="chip chip--cyan">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
				</div>
				<h3>Integrations &amp; automation</h3>
				<p>We connect the tools businesses already use — payments, messaging, scheduling, reviews — into one seamless workflow.</p>
			</div>
			<div class="card">
				<div class="chip chip--peri">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg>
				</div>
				<h3>AI-powered features</h3>
				<p>Practical AI that does real work: answering customers, drafting content, and surfacing the insights that matter.</p>
			</div>
		</div>
	</div>
</section>

<!-- ===================== PRODUCT: LIMITLESS ===================== -->
<section class="section section--soft" id="products">
	<div class="container">
		<div class="feature">
			<div>
				<p class="eyebrow">Our flagship product</p>
				<h2>Limitless</h2>
				<p class="lead">The all-in-one platform that grows with you — bookings, payments, records, marketing, and reputation in a single dashboard.</p>
				<ul>
					<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>Online booking &amp; calendar management</li>
					<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>Payments, invoices &amp; memberships</li>
					<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>Review aggregation &amp; AI replies</li>
					<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>SMS, email &amp; AI-assisted messaging</li>
					<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>Marketing, loyalty &amp; customer reactivation</li>
				</ul>
				<a class="btn btn--primary" href="#contact">Request a demo</a>
			</div>
			<div class="feature-visual"><span>Limitless</span></div>
		</div>
	</div>
</section>

<!-- ===================== STATS BAND ===================== -->
<section class="section" id="stats">
	<div class="container">
		<div class="stats-band">
			<div class="stat">
				<div class="num">All-in-one</div>
				<div class="label">One platform, no patchwork of tools</div>
			</div>
			<div class="stat">
				<div class="num">Grows with you</div>
				<div class="label">From your first hire to your hundredth</div>
			</div>
			<div class="stat">
				<div class="num">No limits</div>
				<div class="label">Built to scale as fast as you do</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== ABOUT ===================== -->
<section class="section section--light" id="about">
	<div class="container">
		<div class="grid grid-2" style="align-items:center; gap:56px;">
			<div>
				<p class="eyebrow">About us</p>
				<h2>A focused software company</h2>
				<p>Spicola Technologies builds tools that remove friction for growing businesses. We believe good software should feel obvious — fast, reliable, and out of the way.</p>
				<p>We build our own products, like Limitless, and partner with businesses who want software that actually fits how they work.</p>
			</div>
			<div class="card">
				<div class="chip chip--cyan">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2c.4 4.6 2.4 6.6 7 7-4.6.4-6.6 2.4-7 7-.4-4.6-2.4-6.6-7-7 4.6-.4 6.6-2.4 7-7z"/></svg>
				</div>
				<h3>Why we exist</h3>
				<p>Too many businesses are held back by clunky, disconnected tools. We bring those pieces together so owners can spend less time fighting their software and more time growing.</p>
			</div>
		</div>
	</div>
</section>

<!-- ===================== CTA / CONTACT ===================== -->
<section class="section" id="contact">
	<div class="container">
		<div class="cta-band">
			<h2>Let's build something.</h2>
			<p>Interested in Limitless or a custom build? We'd love to hear from you.</p>
			<a class="btn btn--secondary" href="mailto:joseph@spicolatechnologies.com">joseph@spicolatechnologies.com</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
