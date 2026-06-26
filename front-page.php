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
	<div class="hero-stage">
		<div class="hero-card">
			<div class="hero-bg" aria-hidden="true"></div>
			<div class="hero-content">
				<p class="eyebrow">Built for salons, spas, studios &amp; clinics</p>
				<h1>One app to book clients, take payment, and <span class="grad-word">keep them coming back.</span></h1>
				<p class="lead">Limitless replaces your booking tool, card reader, reminder texts, and review chasing with one system built for appointment-based businesses.</p>
				<div class="hero-actions">
					<a class="btn btn--primary" href="#contact">Book a demo</a>
					<a class="btn btn--secondary" href="#products">See how it works</a>
				</div>
			</div>
			<!-- Product mockup hugging the bottom of the card.
			     Default is the clean HTML/CSS Limitless dashboard below (no "DEMO"
			     watermark). To show a REAL product screenshot instead, set its URL at
			     Appearance → Customize → Front Page Media → "Hero mockup image".
			     SCREENSHOT SPEC: a Limitless dashboard, 1600×1000px (16:10), PNG,
			     dark UI to match the card. It sits flush to the card's bottom edge. -->
			<?php $spicola_hero_mockup = get_theme_mod( 'spicola_hero_mockup', '' ); ?>
			<?php if ( $spicola_hero_mockup ) : ?>
			<div class="hero-placeholder is-loading">
				<img
					src="<?php echo esc_url( $spicola_hero_mockup ); ?>"
					alt="Limitless dashboard showing bookings, invoicing and reporting"
					width="1600" height="1000"
					loading="lazy" decoding="async"
					onload="this.parentNode.classList.remove('is-loading')">
			</div>
			<?php else : ?>
			<div class="hero-placeholder hero-placeholder--app" role="img" aria-label="Limitless dashboard showing today's bookings, a payment received, and a new five-star review">
				<div class="app" aria-hidden="true">
					<aside class="app__side">
						<div class="app__brand"><span class="app__brand-dot"></span>Limitless</div>
						<nav class="app__nav">
							<span class="app__nav-item is-active"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/></svg><span>Dashboard</span></span>
							<span class="app__nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Bookings</span></span>
							<span class="app__nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg><span>Payments</span></span>
							<span class="app__nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.1 8.3 22 9.3 17 14.1 18.2 21 12 17.8 5.8 21 7 14.1 2 9.3 8.9 8.3 12 2"/></svg><span>Reviews</span></span>
							<span class="app__nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><span>Messages</span></span>
							<span class="app__nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg><span>Reports</span></span>
						</nav>
					</aside>
					<section class="app__main">
						<header class="app__bar">
							<div class="app__hello">Good morning, Joseph</div>
							<div class="app__bar-right"><span class="app__search"></span><span class="app__avatar">JS</span></div>
						</header>
						<div class="app__kpis">
							<div class="app__kpi"><span class="app__kpi-label">Today's bookings</span><span class="app__kpi-value">24</span><span class="app__kpi-trend">+12%</span></div>
							<div class="app__kpi"><span class="app__kpi-label">Revenue</span><span class="app__kpi-value">$3,180</span><span class="app__kpi-trend">+8%</span></div>
							<div class="app__kpi"><span class="app__kpi-label">Avg. rating</span><span class="app__kpi-value">4.9</span><span class="app__kpi-trend">★</span></div>
						</div>
						<div class="app__grid">
							<article class="app__card app__card--booking">
								<div class="app__card-head"><span class="app__tag">Next booking</span><span class="app__time">2:30 PM</span></div>
								<div class="app__card-title">Consultation — Acme Studio</div>
								<div class="app__card-meta">45 min · In person</div>
								<div class="app__status"><span class="app__dot"></span>Confirmed</div>
							</article>
							<article class="app__card app__card--pay">
								<div class="app__card-head"><span class="app__tag">Payment received</span></div>
								<div class="app__amount">$1,240<span>.00</span></div>
								<div class="app__chart"><span style="height:42%"></span><span style="height:66%"></span><span style="height:50%"></span><span style="height:82%"></span><span style="height:60%"></span><span style="height:94%"></span><span style="height:74%"></span></div>
							</article>
							<article class="app__card app__card--review">
								<div class="app__card-head"><span class="app__tag">New review</span><span class="app__stars">★★★★★</span></div>
								<p class="app__quote">“Booking was effortless and the reminders were spot on.”</p>
								<span class="app__ai"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M3 12h18"/></svg>AI reply drafted</span>
							</article>
						</div>
					</section>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- ===================== SOCIAL PROOF (conditional) =====================
     Renders only when real logos/stats exist — see template-parts/social-proof.php. -->
<?php get_template_part( 'template-parts/social-proof' ); ?>

<!-- ===================== WHAT WE DO ===================== -->
<section class="section section--light" id="services">
	<div class="container">
		<div class="services-intro">
			<div>
				<div class="section-num" aria-hidden="true">01</div>
				<p class="eyebrow">What we do</p>
				<h2>Thoughtful tools,<br><span class="dim">built to last.</span></h2>
			</div>
			<p class="lead">We tackle the unglamorous problems that slow businesses down — and turn them into clean, reliable software your team can depend on every single day.</p>
		</div>
		<div class="services-list">
			<div class="service-item">
				<span class="service-item__num" aria-hidden="true">01</span>
				<div class="chip chip--peri" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
				</div>
				<div class="service-item__body">
					<h3>Product development</h3>
					<p>End-to-end web applications — from idea to a deployed, maintainable product your team can rely on every day. We sweat the details so the software feels obvious to use and quiet to run.</p>
				</div>
				<span class="service-item__tag">End-to-end builds</span>
			</div>
			<div class="service-item">
				<span class="service-item__num" aria-hidden="true">02</span>
				<div class="chip chip--cyan" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
				</div>
				<div class="service-item__body">
					<h3>Integrations &amp; automation</h3>
					<p>We connect the tools businesses already use — payments, messaging, scheduling, reviews — into one seamless workflow that eliminates manual hand-offs and keeps everything in sync.</p>
				</div>
				<span class="service-item__tag">Connected workflows</span>
			</div>
			<div class="service-item">
				<span class="service-item__num" aria-hidden="true">03</span>
				<div class="chip chip--peri" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg>
				</div>
				<div class="service-item__body">
					<h3>AI-powered features</h3>
					<p>Practical AI that does real work: answering customers, drafting content, and surfacing the insights that matter — built into the product, not bolted on as an afterthought.</p>
				</div>
				<span class="service-item__tag">Intelligent tools</span>
			</div>
		</div>
	</div>
</section>

<!-- ===================== PRODUCT: LIMITLESS ===================== -->
<section class="section section--soft" id="products">
	<div class="container">
		<div class="feature">
			<div>
				<div class="section-num" aria-hidden="true">02</div>
				<p class="eyebrow">Our flagship product</p>
				<h2>Everything your business needs, <span class="grad-word">in one place.</span></h2>
				<p class="lead">Limitless is the all-in-one platform for appointment-based businesses — online booking, payments, reviews, and client messaging in one connected system your front desk runs from a single screen.</p>
				<!-- Each capability is paired with a concrete benefit line.
				     TODO (owner): for an even stronger showcase, add a small real
				     Limitless UI screenshot per capability (a __shot slot) once
				     screenshots are available. -->
				<div class="feature-tiles">
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
						<span class="feature-tile__text">
							<span class="feature-tile__title">24/7 self-service booking</span>
							<span class="feature-tile__benefit">Clients book and reschedule themselves around the clock — ending phone tag and double-bookings.</span>
						</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
						<span class="feature-tile__text">
							<span class="feature-tile__title">Payments &amp; memberships</span>
							<span class="feature-tile__benefit">Take cards at checkout, auto-bill memberships, and stop chasing unpaid invoices.</span>
						</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<span class="feature-tile__text">
							<span class="feature-tile__title">Reviews on autopilot</span>
							<span class="feature-tile__benefit">Pull every Google and Facebook review into one inbox and reply in a tap with AI-drafted responses.</span>
						</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
						<span class="feature-tile__text">
							<span class="feature-tile__title">Automatic reminders</span>
							<span class="feature-tile__benefit">Fire off text and email reminders on their own — cutting no-shows without you lifting a finger.</span>
						</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
						<span class="feature-tile__text">
							<span class="feature-tile__title">Rebooking &amp; loyalty</span>
							<span class="feature-tile__benefit">Win back lapsed clients and reward your regulars with built-in campaigns and points.</span>
						</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
						<span class="feature-tile__text">
							<span class="feature-tile__title">Live reporting</span>
							<span class="feature-tile__benefit">Watch today's revenue, bookings, and ratings update on one dashboard — no spreadsheets.</span>
						</span>
					</div>
				</div>
				<a class="btn btn--primary" href="#contact">Book a demo</a>
			</div>
			<?php
			$spicola_video        = get_theme_mod( 'spicola_product_video', '' );
			$spicola_poster       = get_theme_mod( 'spicola_product_poster', '' );
			$spicola_product_shot = get_theme_mod( 'spicola_product_shot', '' );
			?>
			<!-- PRODUCT SHOWCASE — the real Limitless dashboard inside a clean browser frame.
			     Add your media one of these ways (no code edit needed):
			       • Screenshot: Appearance → Customize → Front Page Media → "Product screenshot"
			       • Or a short screen-recording loop via "Product video"
			     SCREENSHOT SPEC: 2000×1250px (16:10), PNG or JPG, the main Limitless
			     dashboard (calendar + today's bookings + revenue). Displays ~up to 560px wide. -->
			<div class="browser-frame">
				<div class="browser-frame__bar" aria-hidden="true">
					<span class="browser-frame__dots"><i></i><i></i><i></i></span>
					<span class="browser-frame__url">app.limitless.app/dashboard</span>
				</div>
				<div class="browser-frame__screen">
					<?php if ( $spicola_video ) : ?>
					<video
						class="browser-frame__media"
						autoplay muted loop playsinline preload="metadata"
						<?php if ( $spicola_poster ) : ?>poster="<?php echo esc_url( $spicola_poster ); ?>"<?php endif; ?>>
						<source src="<?php echo esc_url( $spicola_video ); ?>" type="video/mp4">
					</video>
					<?php elseif ( $spicola_product_shot ) : ?>
					<img
						class="browser-frame__media"
						src="<?php echo esc_url( $spicola_product_shot ); ?>"
						alt="The Limitless dashboard showing the day's bookings, revenue and reviews"
						width="2000" height="1250" loading="lazy" decoding="async">
					<?php else : ?>
					<!-- Placeholder shown until a real screenshot is added. Safe to ship. -->
					<div class="browser-frame__placeholder">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
						<p class="browser-frame__ph-title">Limitless dashboard screenshot</p>
						<p class="browser-frame__ph-spec">Add a 2000&times;1250px image (16:10)</p>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== INTEGRATES WITH =====================
     A slim logo strip showing the tools Limitless connects to.
     The logos below are clean text wordmarks so the section is correct and
     premium out of the box. To use the OFFICIAL brand logos instead, drop an
     inline <svg> (or an <img> ~24px tall, white/monochrome) in place of each
     .integration__name span. Keep them all one visual weight. -->
<section class="section integrations" id="integrations">
	<div class="container">
		<p class="integrations__eyebrow">Works with the tools you already use</p>
		<ul class="integrations__list">
			<li class="integration" aria-label="Stripe">
				<svg class="integration__glyph" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
				<span class="integration__name">Stripe</span>
			</li>
			<li class="integration" aria-label="Twilio">
				<svg class="integration__glyph" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
				<span class="integration__name">Twilio</span>
			</li>
			<li class="integration" aria-label="Google Calendar">
				<svg class="integration__glyph" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
				<span class="integration__name">Google Calendar</span>
			</li>
		</ul>
	</div>
</section>

<!-- ===================== HOW IT WORKS ===================== -->
<section class="section section--gray" id="how-it-works">
	<div class="container">
		<div class="center" style="margin-bottom:64px;">
			<p class="eyebrow">Getting started</p>
			<h2>Up and running in days,<br><span class="dim">not months.</span></h2>
			<p class="lead">No lengthy onboarding. No technical team required. We handle the setup so you can focus on your business.</p>
		</div>
		<div class="steps">
			<div class="step">
				<span class="step__num" aria-hidden="true">01</span>
				<h3>Book a discovery call</h3>
				<p>Tell us about your business, your workflow, and what's slowing you down. We'll figure out together whether Limitless is the right fit — no pressure.</p>
			</div>
			<div class="step">
				<span class="step__num" aria-hidden="true">02</span>
				<h3>We configure it for you</h3>
				<p>We set up Limitless to match your exact processes — your services, pricing, branding, and team — before you ever touch it.</p>
			</div>
			<div class="step">
				<span class="step__num" aria-hidden="true">03</span>
				<h3>Go live with confidence</h3>
				<p>Your team gets a hands-on walkthrough and you go live with support from day one. No guessing, no fumbling through a help center alone.</p>
			</div>
		</div>
		<div class="steps-cta">
			<?php $spicola_calendar = spicola_scheduling_url(); ?>
			<?php if ( $spicola_calendar ) : ?>
			<a class="btn btn--primary" href="<?php echo esc_url( $spicola_calendar ); ?>" target="_blank" rel="noopener">Book a demo</a>
			<?php else : ?>
			<a class="btn btn--primary" href="#contact">Book a demo</a>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- ===================== WHO WE SERVE ===================== -->
<section class="section section--light personas" id="who-we-serve">
	<div class="container">
		<div class="center" style="margin-bottom:48px;">
			<p class="eyebrow">Who we serve</p>
			<h2>Built for the people <span class="dim">who run the business.</span></h2>
			<p class="lead">Limitless adapts to every role on your team — giving each person exactly the tools and clarity they need.</p>
		</div>

		<?php
		$spicola_personas = array(
			array(
				'name'  => 'Owners &amp; Executives',
				'desc'  => 'See the whole business at a glance: revenue, bookings and reviews on one live dashboard — so you can make the call without chasing five different tools.',
				'photo' => 'http://spicolatechnologies.com/wp-content/uploads/2026/06/AdobeStock_365778073-scaled.jpeg',
				'link'  => '#contact',
			),
			array(
				'name'  => 'Operations &amp; Managers',
				'desc'  => 'Keep every job, shift and hand-off on track with shared schedules and real-time status — so nothing slips and no one has to ask "who\'s doing what?"',
				'photo' => 'http://spicolatechnologies.com/wp-content/uploads/2026/06/AdobeStock_603261551-scaled-e1782398539292.jpeg',
				'link'  => '#contact',
			),
			array(
				'name'  => 'Accountants',
				'desc'  => 'Close the books faster: payments, invoices and job costing reconcile automatically in one connected ledger — no exports, no end-of-month scramble.',
				'photo' => 'http://spicolatechnologies.com/wp-content/uploads/2026/06/AdobeStock_378057687-scaled-e1782398562372.jpeg',
				'link'  => '#contact',
			),
		);
		?>

		<div class="personas-card" data-personas>
			<div class="personas-glow" aria-hidden="true"></div>

			<div class="persona-dots" aria-hidden="true">
				<?php foreach ( $spicola_personas as $j => $unused ) : ?>
				<span class="<?php echo 0 === $j ? 'is-on' : ''; ?>"></span>
				<?php endforeach; ?>
			</div>

			<div class="personas-stage">
				<?php foreach ( $spicola_personas as $i => $persona ) : ?>
				<article class="persona<?php echo 0 === $i ? ' is-active' : ''; ?>" id="persona-<?php echo (int) $i; ?>" role="tabpanel" aria-hidden="<?php echo 0 === $i ? 'false' : 'true'; ?>">
					<div class="persona-info">
						<h3 class="persona-name"><?php echo wp_kses_post( $persona['name'] ); ?></h3>
						<p class="persona-desc"><?php echo esc_html( $persona['desc'] ); ?></p>
						<a class="persona-link" href="<?php echo esc_url( $persona['link'] ); ?>">Learn more
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
						</a>
					</div>
					<div class="persona-photo">
						<img src="<?php echo esc_url( $persona['photo'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $persona['name'] ) ); ?>" loading="lazy">
					</div>
				</article>
				<?php endforeach; ?>
			</div>

			<div class="personas-foot">
				<div class="personas-tabs" role="tablist" aria-label="Who we serve">
					<?php foreach ( $spicola_personas as $i => $persona ) : ?>
					<button type="button" class="persona-tab<?php echo 0 === $i ? ' is-active' : ''; ?>" data-index="<?php echo (int) $i; ?>" role="tab" aria-controls="persona-<?php echo (int) $i; ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>"><?php echo wp_kses_post( $persona['name'] ); ?></button>
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

<!-- ===================== HOW WE WORK (founder-led) =====================
     This section carries the trust load that client logos normally would.
     It is built around the founder. TWO things to personalise:
       1. The bio paragraph marked [Your background goes here] below.
       2. The founder headshot — swap the JS initials avatar for a real photo
          (square, 160×160px min, shown at 56px). See the comment inline. -->
<section class="section section--soft" id="about">
	<div class="container">
		<div class="about-layout">
			<div class="about-text">
				<div class="section-num" aria-hidden="true">03</div>
				<p class="eyebrow">How we work</p>
				<h2>You work directly with the <span class="grad-word">person who builds it.</span></h2>
				<p>I'm Joseph Spicola, the founder and engineer behind Limitless. I write the code, run your demo, and answer your emails myself — there's no sales layer or support queue between you and the person shipping the product.</p>
				<!-- TODO (founder bio): replace the bracketed line below with 1–2 sentences
				     of your REAL background — previous roles and things you've shipped.
				     Be specific (companies, products, years, scale); this is the copy that
				     earns trust in place of testimonials. Then delete the .is-todo class. -->
				<p class="about-bio is-todo"><strong>[Your background goes here]</strong> — a sentence or two on your previous roles and what you've shipped, e.g. &ldquo;Before Spicola I spent six years building scheduling software at Acme and shipped it to 400+ businesses.&rdquo;</p>

				<!-- Founder identity row. Swap the initials avatar for a real headshot:
				     <img class="founder__avatar" src="…" width="56" height="56" alt="Joseph Spicola"> -->
				<div class="founder">
					<span class="founder__avatar" aria-hidden="true">JS</span>
					<span class="founder__id">
						<span class="founder__name">Joseph Spicola</span>
						<span class="founder__role">Founder &amp; Engineer, Spicola Technologies</span>
					</span>
				</div>
			</div>
			<div class="about-cards">
				<div class="card">
					<div class="chip chip--cyan">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
					</div>
					<h3>Built on a modern stack</h3>
					<p>Limitless runs on React and Next.js — the same battle-tested foundation behind the web apps you use every day. It's fast, secure, and built to grow with you, not patched together from plugins.</p>
				</div>
				<div class="card">
					<div class="chip chip--peri">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><path d="M6 9v6"/><path d="M13 6h3a2 2 0 0 1 2 2v7"/><circle cx="18" cy="18" r="3"/></svg>
					</div>
					<h3>A deliberate process</h3>
					<p>We start with a discovery call, I configure Limitless to your exact services and pricing, then walk your team through go-live. You're never handed a login and left to figure it out alone.</p>
				</div>
				<div class="card">
					<div class="chip chip--cyan">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
					</div>
					<h3>A direct line, not a ticket queue</h3>
					<p>Found a bug or need a change? You message me, not a call center — and early features get shaped by what real businesses actually ask for.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== FOUNDING CLIENTS (honest early-customer offer) =====================
     Replaces fake testimonials with a real invitation. Adjust the number of
     spots / terms to whatever you'll genuinely honour. -->
<section class="section section--gray founding" id="founding">
	<div class="container">
		<div class="founding-card">
			<div class="founding-glow" aria-hidden="true"></div>
			<div class="founding-copy">
				<p class="eyebrow">Founding clients</p>
				<h2>Be one of our first ten clients.</h2>
				<p class="lead">Limitless is new, and I'm hand-picking a small group of appointment-based businesses to build it around. Founding clients get my hands-on help and a founding rate locked in for good — in exchange for honest feedback as we grow. No fake reviews here; just a real offer.</p>
			</div>
			<ul class="founding-list">
				<li>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
					<span>A reduced founding rate, locked in for as long as you stay.</span>
				</li>
				<li>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
					<span>I personally set up Limitless and migrate your existing data.</span>
				</li>
				<li>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
					<span>A direct line to me for support, training, and requests.</span>
				</li>
				<li>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
					<span>Real influence over what we build next.</span>
				</li>
			</ul>
			<div class="founding-cta">
				<a class="btn btn--primary" href="#contact">Book a demo</a>
				<p class="founding-note">No contracts, no pressure — just a conversation.</p>
			</div>
		</div>
	</div>
</section>

<!-- ===================== TESTIMONIALS (client stories) =====================
     Data-driven + conditionally rendered: hidden entirely until real quotes
     exist. See template-parts/testimonials.php and inc/site-data.php. -->
<?php get_template_part( 'template-parts/testimonials' ); ?>

<!-- ===================== CTA / CONTACT (demo request form) ===================== -->
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
