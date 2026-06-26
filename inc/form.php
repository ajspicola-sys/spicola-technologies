<?php
/**
 * Demo / lead-capture request form — server side.
 *
 * Submission targets, in order of preference:
 *   1. A configurable external endpoint (e.g. Formspree). Set it WITHOUT
 *      touching code via either:
 *        - define( 'SPICOLA_FORM_ENDPOINT', getenv('SPICOLA_FORM_ENDPOINT') )
 *          in wp-config.php  (the env-var equivalent — keep secrets out of git)
 *        - Appearance → Customize → Lead Form → "Form endpoint URL"
 *      When set, the form posts straight there; no secret ever lives in code.
 *   2. Otherwise the built-in WordPress handler below emails the lead to the
 *      site owner — works out of the box with zero configuration.
 *
 * Both a no-JS path (admin-post.php → redirect) and a JS path
 * (admin-ajax.php → JSON) are provided, sharing one validator. The form
 * degrades gracefully without JavaScript.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/** Allowed team-size options (value => label). */
function spicola_team_sizes() {
	return array(
		'1-10'   => '1–10',
		'11-50'  => '11–50',
		'51-200' => '51–200',
		'200+'   => '200+',
	);
}

/**
 * Configurable external form endpoint (env-var style). Empty => use built-in
 * email handler.
 *
 * @return string
 */
function spicola_form_endpoint() {
	$endpoint = defined( 'SPICOLA_FORM_ENDPOINT' ) ? SPICOLA_FORM_ENDPOINT : get_theme_mod( 'spicola_form_endpoint', '' );
	return (string) apply_filters( 'spicola_form_endpoint', $endpoint );
}

/**
 * Optional scheduling link (e.g. Cal.com / Calendly) for the "Book a demo" CTA.
 * Empty => fall back to scrolling to the form (#contact).
 *
 * @return string
 */
function spicola_scheduling_url() {
	$url = defined( 'SPICOLA_SCHEDULING_URL' ) ? SPICOLA_SCHEDULING_URL : get_theme_mod( 'spicola_scheduling_url', '' );
	return (string) apply_filters( 'spicola_scheduling_url', $url );
}

/**
 * Where lead emails are sent when using the built-in handler.
 *
 * @return string
 */
function spicola_lead_recipient() {
	$email = get_theme_mod( 'spicola_lead_email', 'joseph@spicolatechnologies.com' );
	return is_email( $email ) ? $email : 'joseph@spicolatechnologies.com';
}

/**
 * Normalise + validate posted lead data.
 *
 * @param array $raw Raw $_POST.
 * @return array{data:array<string,string>,errors:array<string,string>,spam:bool}
 */
function spicola_validate_lead( $raw ) {
	// Honeypot: a field hidden from humans. If a bot fills it, silently drop.
	$spam = ! empty( $raw['company_url'] );

	// Trimmed lead form: name + work email required, message optional.
	$data = array(
		'name'    => isset( $raw['name'] ) ? sanitize_text_field( wp_unslash( $raw['name'] ) ) : '',
		'email'   => isset( $raw['email'] ) ? sanitize_email( wp_unslash( $raw['email'] ) ) : '',
		'message' => isset( $raw['message'] ) ? sanitize_textarea_field( wp_unslash( $raw['message'] ) ) : '',
	);

	$errors = array();
	if ( '' === $data['name'] ) {
		$errors['name'] = 'Please enter your name.';
	}
	if ( '' === $data['email'] || ! is_email( $data['email'] ) ) {
		$errors['email'] = 'Please enter a valid work email.';
	}

	return array(
		'data'   => $data,
		'errors' => $errors,
		'spam'   => $spam,
	);
}

/**
 * Email a validated lead to the owner.
 *
 * @param array $data Validated data.
 * @return bool
 */
function spicola_send_lead( $data ) {
	$subject = sprintf( 'New demo request — %s', $data['name'] );

	$lines = array(
		'New Limitless demo request from the website:',
		'',
		'Name:    ' . $data['name'],
		'Email:   ' . $data['email'],
		'',
		'Message:',
		$data['message'] ? $data['message'] : '(none)',
	);

	$headers = array();
	if ( is_email( $data['email'] ) ) {
		$headers[] = 'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>';
	}

	return wp_mail( spicola_lead_recipient(), $subject, implode( "\n", $lines ), $headers );
}

/**
 * No-JS submission: validate, send, redirect back to the form anchor with a
 * status flag the template reads to show a banner.
 */
function spicola_handle_lead_post() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$back = remove_query_arg( 'demo', $back );

	if ( ! isset( $_POST['spicola_demo_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['spicola_demo_nonce'] ) ), 'spicola_demo' ) ) {
		wp_safe_redirect( add_query_arg( 'demo', 'error', $back ) . '#contact' );
		exit;
	}

	$result = spicola_validate_lead( $_POST );

	// Honeypot tripped: pretend success, send nothing.
	if ( $result['spam'] ) {
		wp_safe_redirect( add_query_arg( 'demo', 'success', $back ) . '#contact' );
		exit;
	}

	if ( ! empty( $result['errors'] ) ) {
		wp_safe_redirect( add_query_arg( 'demo', 'invalid', $back ) . '#contact' );
		exit;
	}

	$sent = spicola_send_lead( $result['data'] );
	wp_safe_redirect( add_query_arg( 'demo', $sent ? 'success' : 'error', $back ) . '#contact' );
	exit;
}
add_action( 'admin_post_nopriv_spicola_demo_request', 'spicola_handle_lead_post' );
add_action( 'admin_post_spicola_demo_request', 'spicola_handle_lead_post' );

/**
 * JS submission: validate, send, return JSON with field-level errors.
 */
function spicola_handle_lead_ajax() {
	if ( ! check_ajax_referer( 'spicola_demo', 'spicola_demo_nonce', false ) ) {
		wp_send_json_error( array( 'message' => 'Your session expired — please refresh and try again.' ), 400 );
	}

	$result = spicola_validate_lead( $_POST );

	if ( $result['spam'] ) {
		wp_send_json_success( array( 'message' => "Thanks — we'll be in touch shortly." ) );
	}

	if ( ! empty( $result['errors'] ) ) {
		wp_send_json_error(
			array(
				'message' => 'Please fix the highlighted fields.',
				'fields'  => $result['errors'],
			),
			422
		);
	}

	$sent = spicola_send_lead( $result['data'] );
	if ( $sent ) {
		wp_send_json_success( array( 'message' => "Thanks — we'll be in touch shortly." ) );
	}
	wp_send_json_error( array( 'message' => 'Something went wrong sending your request. Please email us instead.' ), 500 );
}
add_action( 'wp_ajax_nopriv_spicola_demo_request', 'spicola_handle_lead_ajax' );
add_action( 'wp_ajax_spicola_demo_request', 'spicola_handle_lead_ajax' );

/**
 * Email-signup (blog empty-state) — no-JS submission. Validates a single email
 * + honeypot, notifies the owner, and redirects back with a status flag.
 */
function spicola_handle_subscribe() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$back = remove_query_arg( 'subscribed', $back );

	$ok = isset( $_POST['spicola_sub_nonce'] )
		&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['spicola_sub_nonce'] ) ), 'spicola_subscribe' );

	// Honeypot.
	if ( ! empty( $_POST['company_url'] ) ) {
		wp_safe_redirect( add_query_arg( 'subscribed', '1', $back ) );
		exit;
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	if ( ! $ok || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'subscribed', '0', $back ) );
		exit;
	}

	wp_mail(
		spicola_lead_recipient(),
		'New blog subscriber',
		'A visitor asked to be notified about new posts: ' . $email,
		array( 'Reply-To: ' . $email )
	);
	wp_safe_redirect( add_query_arg( 'subscribed', '1', $back ) );
	exit;
}
add_action( 'admin_post_nopriv_spicola_subscribe', 'spicola_handle_subscribe' );
add_action( 'admin_post_spicola_subscribe', 'spicola_handle_subscribe' );

/**
 * Customizer: lead-form configuration.
 */
function spicola_form_customize( $wp_customize ) {
	$wp_customize->add_section( 'spicola_lead_form', array(
		'title'    => __( 'Lead Form', 'spicola' ),
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'spicola_form_endpoint', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'spicola_form_endpoint', array(
		'label'       => __( 'Form endpoint URL (optional)', 'spicola' ),
		'description' => __( 'Paste a form service URL (e.g. Formspree) to receive submissions there. Leave empty to email the lead to the address below. Can also be set via the SPICOLA_FORM_ENDPOINT constant in wp-config.php.', 'spicola' ),
		'section'     => 'spicola_lead_form',
		'type'        => 'url',
	) );

	$wp_customize->add_setting( 'spicola_lead_email', array(
		'default'           => 'joseph@spicolatechnologies.com',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'spicola_lead_email', array(
		'label'       => __( 'Lead notification email', 'spicola' ),
		'description' => __( 'Where built-in form submissions are sent (used only when no endpoint URL is set).', 'spicola' ),
		'section'     => 'spicola_lead_form',
		'type'        => 'email',
	) );

	$wp_customize->add_setting( 'spicola_scheduling_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'spicola_scheduling_url', array(
		'label'       => __( 'Scheduling link (optional)', 'spicola' ),
		'description' => __( 'A Calendly/Cal.com link for the "Book a demo" buttons. Leave empty to scroll to the form instead.', 'spicola' ),
		'section'     => 'spicola_lead_form',
		'type'        => 'url',
	) );
}
add_action( 'customize_register', 'spicola_form_customize' );
