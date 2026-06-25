<?php
/**
 * Demo request form (lead capture).
 *
 * Progressive enhancement:
 *  - No JS: posts to admin-post.php, the handler emails the lead and redirects
 *    back with a ?demo=success|error|invalid flag shown as a banner.
 *  - With JS (assets/demo-form.js): submits via fetch to admin-ajax.php (or the
 *    external endpoint) and shows inline loading/success/error states without a
 *    reload, with accessible field-level errors.
 *
 * Endpoint + recipient are configured in inc/form.php (Customizer / constant).
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

$spicola_endpoint = spicola_form_endpoint();
$spicola_action   = $spicola_endpoint ? $spicola_endpoint : admin_url( 'admin-post.php' );
$spicola_ajax     = $spicola_endpoint ? $spicola_endpoint : admin_url( 'admin-ajax.php' );
$spicola_mode     = $spicola_endpoint ? 'external' : 'internal';

// No-JS status banner from the redirect flag.
$spicola_status = isset( $_GET['demo'] ) ? sanitize_key( wp_unslash( $_GET['demo'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>
<form
	class="demo-form"
	method="post"
	action="<?php echo esc_url( $spicola_action ); ?>"
	data-demo-form
	data-ajax-url="<?php echo esc_url( $spicola_ajax ); ?>"
	data-mode="<?php echo esc_attr( $spicola_mode ); ?>"
	novalidate
>
	<?php wp_nonce_field( 'spicola_demo', 'spicola_demo_nonce' ); ?>
	<input type="hidden" name="action" value="spicola_demo_request">

	<!-- Form-level status (announced to screen readers). -->
	<div class="demo-form__status" data-form-status role="status" aria-live="polite"
		<?php if ( 'success' === $spicola_status ) : ?>data-state="success"<?php elseif ( in_array( $spicola_status, array( 'error', 'invalid' ), true ) ) : ?>data-state="error"<?php endif; ?>>
		<?php
		if ( 'success' === $spicola_status ) {
			echo 'Thanks — we&rsquo;ve received your request and will be in touch shortly.';
		} elseif ( 'invalid' === $spicola_status ) {
			echo 'Some details were missing or invalid. Please check the fields and try again.';
		} elseif ( 'error' === $spicola_status ) {
			echo 'Sorry, something went wrong. Please try again, or email us directly below.';
		}
		?>
	</div>

	<div class="demo-form__grid">
		<div class="field">
			<label for="demo-name">Full name <span class="req" aria-hidden="true">*</span></label>
			<input type="text" id="demo-name" name="name" autocomplete="name" required
				aria-required="true" aria-describedby="demo-name-error">
			<span class="field__error" id="demo-name-error" role="alert"></span>
		</div>

		<div class="field">
			<label for="demo-email">Work email <span class="req" aria-hidden="true">*</span></label>
			<input type="email" id="demo-email" name="email" autocomplete="email" required
				aria-required="true" aria-describedby="demo-email-error">
			<span class="field__error" id="demo-email-error" role="alert"></span>
		</div>

		<div class="field">
			<label for="demo-company">Company name <span class="req" aria-hidden="true">*</span></label>
			<input type="text" id="demo-company" name="company" autocomplete="organization" required
				aria-required="true" aria-describedby="demo-company-error">
			<span class="field__error" id="demo-company-error" role="alert"></span>
		</div>

		<div class="field">
			<label for="demo-team">Team size</label>
			<select id="demo-team" name="team_size" aria-describedby="demo-team-error">
				<option value="">Select…</option>
				<?php foreach ( spicola_team_sizes() as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
			</select>
			<span class="field__error" id="demo-team-error" role="alert"></span>
		</div>

		<div class="field field--full">
			<label for="demo-message">Anything we should know? <span class="field__opt">(optional)</span></label>
			<textarea id="demo-message" name="message" rows="4"
				placeholder="Tell us a bit about your business and what's slowing you down."></textarea>
		</div>
	</div>

	<!-- Honeypot: hidden from people; bots that fill it are silently dropped. -->
	<div class="demo-form__hp" aria-hidden="true">
		<label for="demo-company-url">Company website</label>
		<input type="text" id="demo-company-url" name="company_url" tabindex="-1" autocomplete="off">
	</div>

	<div class="demo-form__actions">
		<button type="submit" class="btn btn--primary" data-submit>
			<span data-submit-label>Request a demo</span>
			<span class="demo-form__spinner" data-spinner aria-hidden="true"></span>
		</button>
		<p class="demo-form__alt">or email us at
			<a href="mailto:joseph@spicolatechnologies.com">joseph@spicolatechnologies.com</a>
		</p>
	</div>
</form>
