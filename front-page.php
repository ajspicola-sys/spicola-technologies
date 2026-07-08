<?php
/**
 * Front page: the marketing landing page for Spicola Technologies.
 *
 * Structure: white hero, then consistently dark sections all the way down.
 * Every media slot renders a "DEMO" placeholder box (.demo-box) until real
 * screenshots / logos / quotes exist — swap the box for the asset, keep the
 * surrounding markup.
 *
 * @package spicola
 */

get_header();
?>

<!-- ===================== 1. HERO (white — the only light section) ===================== -->
<section class="hero">
	<div class="container">
		<p class="pill-label">Software Company</p>
		<h1>Software that helps your business run <span class="accent-line">without limits.</span></h1>
		<p class="lead">Spicola Technologies builds custom software for growing businesses — including <strong>Limitless</strong>, our all-in-one B2B platform that runs your bookings, payments, messaging and reporting in one place.</p>
		<div class="hero-actions">
			<a class="btn btn--primary" href="#contact">Request a demo</a>
			<a class="btn btn--secondary" href="#contact">Talk to us</a>
		</div>

		<!-- Product mockup slot: browser-framed DEMO box. Replace the
		     .browser-frame__body contents with a real screenshot later. -->
		<div class="hero-mockup">
			<div class="browser-frame">
				<div class="browser-frame__bar" aria-hidden="true"><i></i><i></i><i></i></div>
				<div class="demo-box browser-frame__body"><span>Demo</span></div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== 2. LOGO CLOUD (dark) ===================== -->
<section class="logo-cloud">
	<div class="container">
		<p class="logo-cloud__label">Trusted by teams who run their business on Spicola</p>
		<div class="logo-cloud__row">
			<?php for ( $spicola_i = 0; $spicola_i < 6; $spicola_i++ ) : ?>
			<div class="demo-box demo-box--sm"><span>Demo</span></div>
			<?php endfor; ?>
		</div>
	</div>
</section>

<!-- ===================== 3. METRICS BAND (dark) ===================== -->
<section class="metrics">
	<div class="container">
		<div class="metrics__grid">
			<div class="metric">
				<div class="metric__value">DEMO</div>
				<div class="metric__label">Businesses running on Limitless</div>
			</div>
			<div class="metric">
				<div class="metric__value">DEMO</div>
				<div class="metric__label">Uptime</div>
			</div>
			<div class="metric">
				<div class="metric__value">DEMO</div>
				<div class="metric__label">Hours saved per week</div>
			</div>
			<div class="metric">
				<div class="metric__value">DEMO</div>
				<div class="metric__label">Integrations supported</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== 4. WHAT WE DO ===================== -->
<section class="section" id="services">
	<div class="container">
		<div class="section-head">
			<p class="eyebrow"><span class="marker">01</span>What we do</p>
			<h2>Thoughtful tools, <span class="accent-line">built to last.</span></h2>
			<p class="lead">We take the unglamorous problems that slow businesses down and turn them into clean, reliable software your team can depend on every single day.</p>
		</div>
		<div class="services-list">
			<div class="service-item">
				<span class="service-item__num" aria-hidden="true">01</span>
				<div class="chip" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
				</div>
				<div class="service-item__body">
					<h3>Product development</h3>
					<p>End-to-end web applications — from idea to a deployed, maintainable product your team relies on daily.</p>
				</div>
				<a class="learn-more" href="#contact">Learn more
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</a>
			</div>
			<div class="service-item">
				<span class="service-item__num" aria-hidden="true">02</span>
				<div class="chip" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
				</div>
				<div class="service-item__body">
					<h3>Integrations &amp; automation</h3>
					<p>Payments, messaging, scheduling and reviews connected into one workflow — no manual hand-offs.</p>
				</div>
				<a class="learn-more" href="#contact">Learn more
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</a>
			</div>
			<div class="service-item">
				<span class="service-item__num" aria-hidden="true">03</span>
				<div class="chip" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
				</div>
				<div class="service-item__body">
					<h3>Ongoing support</h3>
					<p>Software that stays fast, secure and up to date — with a real person to call when you need one.</p>
				</div>
				<a class="learn-more" href="#contact">Learn more
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- ===================== 5. FLAGSHIP PRODUCT: LIMITLESS ===================== -->
<section class="section section--tint" id="products">
	<div class="container">
		<div class="flagship">
			<div>
				<p class="eyebrow"><span class="marker">02</span>Our flagship product</p>
				<h2>Everything your business needs, <span class="accent-line">in one place.</span></h2>
				<p class="lead">Limitless is the all-in-one B2B platform built for growing businesses — replacing the patchwork of tools with a single, connected system your whole team can actually use.</p>
				<div class="feature-grid">
					<div class="feature-card">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
						<h3>Online booking &amp; scheduling</h3>
						<p>Clients book themselves around the clock — no phone tag, no double-bookings.</p>
					</div>
					<div class="feature-card">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
						<h3>Payments, invoices &amp; memberships</h3>
						<p>Get paid faster with cards, recurring billing and memberships in one flow.</p>
					</div>
					<div class="feature-card">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<h3>Review aggregation &amp; AI replies</h3>
						<p>Every review in one place, with AI-drafted replies ready in seconds.</p>
					</div>
					<div class="feature-card">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
						<h3>SMS, email &amp; AI messaging</h3>
						<p>Reach customers where they are — AI handles the routine back-and-forth.</p>
					</div>
					<div class="feature-card">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
						<h3>Marketing &amp; customer loyalty</h3>
						<p>Turn one-time buyers into regulars with built-in campaigns and loyalty.</p>
					</div>
					<div class="feature-card">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
						<h3>Real-time reporting &amp; analytics</h3>
						<p>Live numbers on how the business is doing — not month-old guesses.</p>
					</div>
				</div>
				<a class="btn btn--primary" href="#contact">Request a demo</a>
			</div>
			<!-- Dashboard slot: becomes an animated product screenshot later. -->
			<div class="flagship__visual">
				<div class="demo-box"><span>Demo</span></div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== 6. GETTING STARTED (dark) ===================== -->
<section class="section" id="how-it-works">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow"><span class="marker">03</span>Getting started</p>
			<h2>Up and running in days, <span class="accent-line">not months.</span></h2>
			<p class="lead">No lengthy onboarding. No technical team required. We handle the setup so you can focus on your business.</p>
		</div>
		<div class="steps">
			<div class="step">
				<span class="step__num" aria-hidden="true">01</span>
				<h3>We build it for you</h3>
				<p>Tell us how your business works. We configure Limitless — or build the custom tool — so it fits from day one.</p>
				<div class="demo-box demo-box--sm"><span>Demo</span></div>
			</div>
			<div class="step">
				<span class="step__num" aria-hidden="true">02</span>
				<h3>We set it up to match your business</h3>
				<p>Your services, pricing, branding and team — all in place before you ever touch it.</p>
				<div class="demo-box demo-box--sm"><span>Demo</span></div>
			</div>
			<div class="step">
				<span class="step__num" aria-hidden="true">03</span>
				<h3>Go live with confidence</h3>
				<p>A hands-on walkthrough for your team, then launch with support from day one.</p>
				<div class="demo-box demo-box--sm"><span>Demo</span></div>
			</div>
		</div>
		<div class="steps-cta">
			<a class="btn btn--secondary" href="#contact">Talk to us</a>
		</div>
	</div>
</section>

<!-- ===================== 7. BUILT FOR YOUR TEAM — persona tabs ===================== -->
<section class="section section--tint" id="who-we-serve">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow">Built for your team</p>
			<h2>Built for the people <span class="accent-line">who run the business.</span></h2>
			<p class="lead">Limitless adapts to every role on your team — giving each person exactly the tools and clarity they need.</p>
		</div>

		<?php
		$spicola_personas = array(
			array(
				'name' => 'Owners &amp; Executives',
				'desc' => 'See the whole business at a glance: revenue, bookings and reviews on one live dashboard — so you can make the call without chasing five different tools.',
			),
			array(
				'name' => 'Operations &amp; Managers',
				'desc' => 'Keep every job, shift and hand-off on track with shared schedules and real-time status — so nothing slips and no one has to ask who\'s doing what.',
			),
			array(
				'name' => 'Accountants',
				'desc' => 'Close the books faster: payments, invoices and job costing reconcile automatically in one connected ledger — no exports, no end-of-month scramble.',
			),
		);
		?>

		<div class="personas-card" data-personas>
			<div class="personas-glow" aria-hidden="true"></div>

			<div class="persona-dots" aria-hidden="true">
				<?php foreach ( $spicola_personas as $spicola_j => $spicola_unused ) : ?>
				<span class="<?php echo 0 === $spicola_j ? 'is-on' : ''; ?>"></span>
				<?php endforeach; ?>
			</div>

			<div class="personas-stage">
				<?php foreach ( $spicola_personas as $spicola_i => $spicola_persona ) : ?>
				<article class="persona<?php echo 0 === $spicola_i ? ' is-active' : ''; ?>" id="persona-<?php echo (int) $spicola_i; ?>" role="tabpanel" aria-hidden="<?php echo 0 === $spicola_i ? 'false' : 'true'; ?>">
					<div class="persona-info">
						<h3 class="persona-name"><?php echo wp_kses_post( $spicola_persona['name'] ); ?></h3>
						<p class="persona-desc"><?php echo esc_html( $spicola_persona['desc'] ); ?></p>
					</div>
					<div class="persona-visual">
						<div class="demo-box"><span>Demo</span></div>
					</div>
				</article>
				<?php endforeach; ?>
			</div>

			<div class="personas-foot">
				<div class="personas-tabs" role="tablist" aria-label="Built for your team">
					<?php foreach ( $spicola_personas as $spicola_i => $spicola_persona ) : ?>
					<button type="button" class="persona-tab<?php echo 0 === $spicola_i ? ' is-active' : ''; ?>" data-index="<?php echo (int) $spicola_i; ?>" role="tab" aria-controls="persona-<?php echo (int) $spicola_i; ?>" aria-selected="<?php echo 0 === $spicola_i ? 'true' : 'false'; ?>"><?php echo wp_kses_post( $spicola_persona['name'] ); ?></button>
					<?php endforeach; ?>
				</div>
				<div class="personas-nav">
					<button type="button" class="persona-arrow" data-dir="-1" aria-label="Previous">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
					</button>
					<button type="button" class="persona-arrow" data-dir="1" aria-label="Next">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== 8. ABOUT ===================== -->
<section class="section" id="about">
	<div class="container">
		<div class="about-layout">
			<div class="about-text">
				<p class="eyebrow">About us</p>
				<h2>A focused software company</h2>
				<p>Spicola Technologies builds tools that remove friction for growing businesses. We believe good software should feel obvious — fast, reliable, and completely out of the way.</p>
				<p>We build our own products, like Limitless, and partner with businesses who want software that actually fits how they work — not the other way around.</p>
			</div>
			<div class="about-cards">
				<div class="card">
					<div class="chip" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c.4 4.6 2.4 6.6 7 7-4.6.4-6.6 2.4-7 7-.4-4.6-2.4-6.6-7-7 4.6-.4 6.6-2.4 7-7z"/></svg>
					</div>
					<h3>Why we exist</h3>
					<p>Too many businesses are held back by clunky, disconnected tools. We bring those pieces together so owners can spend less time fighting their software and more time growing.</p>
				</div>
				<div class="card">
					<div class="chip" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
					</div>
					<h3>How we build</h3>
					<p>Every decision is deliberate. Good software should feel invisible — fast when you need it, quiet when you don't, and built to last as your business scales.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== 9. TESTIMONIALS (placeholder structure) =====================
     Real quotes drop in per card: quote text in .testimonial__quote, photo in
     the avatar slot, Name / Title / Company in .testimonial__meta. -->
<section class="section section--tint" id="testimonials">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow">What clients say</p>
			<h2>Trusted by teams, <span class="accent-line">from day one.</span></h2>
		</div>
		<div class="testimonials-grid">
			<?php for ( $spicola_i = 0; $spicola_i < 3; $spicola_i++ ) : ?>
			<figure class="testimonial" style="margin:0;">
				<blockquote class="testimonial__quote" style="margin:0;">DEMO</blockquote>
				<figcaption class="testimonial__person">
					<div class="demo-box demo-box--avatar demo-box--xs"><span>D</span></div>
					<div class="testimonial__meta">
						<span class="testimonial__name">DEMO</span>
						<span class="testimonial__role">DEMO &middot; DEMO</span>
					</div>
				</figcaption>
			</figure>
			<?php endfor; ?>
		</div>
	</div>
</section>

<!-- ===================== 10. CTA / CONTACT (demo request form — kept from v3) ===================== -->
<section class="section cta-section" id="contact">
	<div class="container">
		<div class="cta-inner cta-inner--form">
			<div class="cta-glow" aria-hidden="true"></div>
			<div class="cta-copy">
				<p class="eyebrow">Get started</p>
				<h2>Ready to run your business<br><span class="grad-word">without limits?</span></h2>
				<p>Whether you're exploring Limitless or need a custom build, tell us a little about your business and we'll be in touch.</p>
			</div>
			<div class="cta-form">
				<?php get_template_part( 'template-parts/demo-form' ); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
