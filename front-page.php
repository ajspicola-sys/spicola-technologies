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
	<div class="container center">
		<p class="eyebrow">Software Studio</p>
		<h1>We build software that helps<br>businesses run without limits.</h1>
		<p class="lead">Spicola Technologies designs and develops practical, modern software for service businesses — including <strong>Limitless</strong>, our all-in-one platform for med spas and wellness clinics.</p>
		<div class="hero-actions">
			<a class="btn btn--primary" href="#products">Explore our products</a>
			<a class="btn btn--ghost" href="#contact">Talk to us</a>
		</div>
	</div>
</section>

<!-- ===================== WHAT WE DO ===================== -->
<section class="section" id="services">
	<div class="container">
		<div class="center" style="margin-bottom:48px;">
			<p class="eyebrow">What we do</p>
			<h2>Thoughtful tools, built to last</h2>
			<p class="lead">We focus on the unglamorous problems that slow businesses down, and turn them into clean, reliable software.</p>
		</div>
		<div class="grid grid-3">
			<div class="card">
				<div class="icon">⚡</div>
				<h3>Product Development</h3>
				<p>End-to-end web applications — from idea to a deployed, maintainable product your team can rely on every day.</p>
			</div>
			<div class="card">
				<div class="icon">🔗</div>
				<h3>Integrations &amp; Automation</h3>
				<p>We connect the tools businesses already use — payments, messaging, scheduling, reviews — into one seamless workflow.</p>
			</div>
			<div class="card">
				<div class="icon">🤖</div>
				<h3>AI-Powered Features</h3>
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
				<span class="badge">Our flagship product</span>
				<h2>Limitless</h2>
				<p class="lead">The all-in-one operating system for med spas and wellness clinics — bookings, payments, patient records, marketing, and reputation in a single dashboard.</p>
				<ul>
					<li>Online booking &amp; calendar management</li>
					<li>Payments, invoices &amp; memberships</li>
					<li>Google review aggregation &amp; AI replies</li>
					<li>SMS, email &amp; AI-assisted patient messaging</li>
					<li>Marketing, loyalty &amp; patient reactivation</li>
				</ul>
				<a class="btn btn--primary" href="#contact">Request a demo</a>
			</div>
			<div class="feature-visual">Limitless</div>
		</div>
	</div>
</section>

<!-- ===================== ABOUT ===================== -->
<section class="section" id="about">
	<div class="container">
		<div class="grid grid-2" style="align-items:center; gap:56px;">
			<div>
				<p class="eyebrow">About us</p>
				<h2>A focused software company</h2>
				<p>Spicola Technologies is a software studio building tools that remove friction for service businesses. We believe good software should feel obvious — fast, reliable, and out of the way.</p>
				<p>We build our own products, like Limitless, and partner with businesses who want software that actually fits how they work.</p>
			</div>
			<div class="card" style="background:var(--bg-soft);">
				<h3 style="margin-bottom:1rem;">Why we exist</h3>
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
			<p>Interested in our products or a custom build? We'd love to hear from you.</p>
			<a class="btn btn--primary" href="mailto:joseph@spicolatechnologies.com">joseph@spicolatechnologies.com</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
