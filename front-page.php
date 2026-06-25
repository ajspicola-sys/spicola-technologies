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
				<p class="eyebrow">Software company</p>
				<h1>Software that helps your business run <span class="grad-word">without limits.</span></h1>
				<p class="lead">Spicola Technologies builds practical, modern software for growing businesses — including <strong>Limitless</strong>, our all-in-one B2B platform that brings your operations into a single place.</p>
				<div class="hero-actions">
					<a class="btn btn--primary" href="#products">Explore Limitless</a>
					<a class="btn btn--secondary" href="#contact">Talk to us</a>
				</div>
			</div>
			<!-- Product mockup hugging the bottom of the card. Set via
			     Appearance → Customize → Front Page Media; bundled PNG fallback. -->
			<?php
			// Uploaded to the Media Library; override via Appearance → Customize → Front Page Media.
			$spicola_hero_mockup = get_theme_mod( 'spicola_hero_mockup', 'https://spicolatechnologies.com/wp-content/uploads/2026/06/hero-mockup-scaled.png' );
			?>
			<div class="hero-placeholder" aria-hidden="true"><img src="<?php echo esc_url( $spicola_hero_mockup ); ?>" alt="" loading="lazy"></div>
		</div>
	</div>
</section>

<!-- ===================== WHAT WE DO ===================== -->
<section class="section section--light" id="services">
	<div class="container">
		<div class="services-intro">
			<div>
				<div class="section-num" aria-hidden="true">01</div>
				<p class="eyebrow">What we do</p>
				<h2>Thoughtful tools,<br>built to last</h2>
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
				<p class="lead">Limitless is the all-in-one B2B platform built for growing businesses — replacing the patchwork of tools with a single, connected system your whole team can actually use.</p>
				<div class="feature-tiles">
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
						<span>Online booking &amp; scheduling</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
						<span>Payments, invoices &amp; memberships</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<span>Review aggregation &amp; AI replies</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
						<span>SMS, email &amp; AI messaging</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
						<span>Marketing &amp; customer loyalty</span>
					</div>
					<div class="feature-tile">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
						<span>Real-time reporting &amp; analytics</span>
					</div>
				</div>
				<a class="btn btn--primary" href="#contact">Request a demo</a>
			</div>
			<?php
			$spicola_video  = get_theme_mod( 'spicola_product_video', '' );
			$spicola_poster = get_theme_mod( 'spicola_product_poster', '' );
			if ( $spicola_video ) :
			?>
			<div class="product-video">
				<video
					class="product-video__el"
					autoplay muted loop playsinline
					preload="metadata"
					<?php if ( $spicola_poster ) : ?>poster="<?php echo esc_url( $spicola_poster ); ?>"<?php endif; ?>>
					<source src="<?php echo esc_url( $spicola_video ); ?>" type="video/mp4">
				</video>
			</div>
			<?php else : ?>
			<div class="laptop-stage laptop-stage--fallback" aria-hidden="true">
				<div class="laptop">
					<div class="laptop__lid">
						<div class="laptop__screen">
							<div class="ui">
								<div class="ui__top">
									<span class="ui__dot"></span>
									<span class="ui__brand">Limitless</span>
									<span class="ui__spacer"></span>
									<span class="ui__pill"></span>
								</div>
								<div class="ui__body">
									<div class="ui__side">
										<span></span><span></span><span></span><span></span><span></span>
									</div>
									<div class="ui__main">
										<div class="ui__cards">
											<div class="ui__card"><b>248</b><i>Bookings</i></div>
											<div class="ui__card"><b>$31k</b><i>Revenue</i></div>
											<div class="ui__card"><b>4.9★</b><i>Reviews</i></div>
										</div>
										<div class="ui__chart">
											<span style="height:38%"></span><span style="height:62%"></span>
											<span style="height:48%"></span><span style="height:80%"></span>
											<span style="height:58%"></span><span style="height:92%"></span>
											<span style="height:70%"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="laptop__glare"></div>
						</div>
					</div>
					<div class="laptop__deck">
						<div class="laptop__keyboard"></div>
						<div class="laptop__trackpad"></div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- ===================== HOW IT WORKS ===================== -->
<section class="section section--gray" id="how-it-works">
	<div class="container">
		<div class="center" style="margin-bottom:64px;">
			<p class="eyebrow">Getting started</p>
			<h2>Up and running in days,<br>not months</h2>
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
			<a class="btn btn--primary" href="#contact">Book your free call</a>
		</div>
	</div>
</section>

<!-- ===================== WHO WE SERVE ===================== -->
<section class="section section--light personas" id="who-we-serve">
	<div class="container">
		<div class="center" style="margin-bottom:48px;">
			<p class="eyebrow">Who we serve</p>
			<h2>Built for the people who run the business</h2>
			<p class="lead">Limitless adapts to every role on your team — giving each person exactly the tools and clarity they need.</p>
		</div>

		<?php
		$spicola_personas = array(
			array(
				'name'  => 'Owners &amp; Executives',
				'desc'  => 'Unlock scalability and long-term profitability through the strategic integration of automation, AI, and operational control.',
				'photo' => 'http://spicolatechnologies.com/wp-content/uploads/2026/06/AdobeStock_365778073-scaled.jpeg',
				'link'  => '#contact',
			),
			array(
				'name'  => 'Operations &amp; Managers',
				'desc'  => 'Keep your team aligned and your work on track with clear visibility into tasks, resources, and progress across every part of the business.',
				'photo' => 'http://spicolatechnologies.com/wp-content/uploads/2026/06/AdobeStock_603261551-scaled-e1782398539292.jpeg',
				'link'  => '#contact',
			),
			array(
				'name'  => 'Accountants',
				'desc'  => 'Close the books faster with accurate, automated financials — job costing, reporting, and reconciliation in one connected system.',
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

<!-- ===================== ABOUT ===================== -->
<section class="section section--soft" id="about">
	<div class="container">
		<div class="about-layout">
			<div class="about-text">
				<div class="section-num" aria-hidden="true">03</div>
				<p class="eyebrow">About us</p>
				<h2>A focused software company</h2>
				<p>Spicola Technologies builds tools that remove friction for growing businesses. We believe good software should feel obvious — fast, reliable, and completely out of the way.</p>
				<p>We build our own products, like Limitless, and partner with businesses who want software that actually fits how they work — not the other way around.</p>
			</div>
			<div class="about-cards">
				<div class="card">
					<div class="chip chip--cyan">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2c.4 4.6 2.4 6.6 7 7-4.6.4-6.6 2.4-7 7-.4-4.6-2.4-6.6-7-7 4.6-.4 6.6-2.4 7-7z"/></svg>
					</div>
					<h3>Why we exist</h3>
					<p>Too many businesses are held back by clunky, disconnected tools. We bring those pieces together so owners can spend less time fighting their software and more time growing.</p>
				</div>
				<div class="card">
					<div class="chip chip--peri">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
					</div>
					<h3>How we build</h3>
					<p>Every decision is deliberate. Good software should feel invisible — fast when you need it, quiet when you don't, and built to last as your business scales.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================== TESTIMONIALS (client stories) =====================
     Data-driven + conditionally rendered: hidden entirely until real quotes
     exist. See template-parts/testimonials.php and inc/site-data.php. -->
<?php get_template_part( 'template-parts/testimonials' ); ?>

<!-- ===================== CTA / CONTACT ===================== -->
<section class="section cta-section" id="contact">
	<div class="container">
		<div class="cta-inner">
			<div class="cta-glow" aria-hidden="true"></div>
			<p class="eyebrow">Get started</p>
			<h2>Ready to run your business<br><span class="grad-word">without limits?</span></h2>
			<p>Whether you're exploring Limitless or need a custom build, we'd love to hear about your business and what's slowing it down.</p>
			<div class="cta-actions">
				<a class="btn btn--primary" href="mailto:joseph@spicolatechnologies.com">Request a demo</a>
				<a class="btn btn--secondary" href="mailto:joseph@spicolatechnologies.com">joseph@spicolatechnologies.com</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
