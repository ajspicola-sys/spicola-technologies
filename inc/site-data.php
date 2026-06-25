<?php
/**
 * Editable site content — the one place the owner edits marketing data
 * WITHOUT touching markup. Each function returns a plain array consumed by a
 * template part. Keep copy truthful: this is an early-stage company.
 *
 * IMPORTANT (anti-fabrication rule): testimonials, client logos, and stats
 * must reflect REAL data only. Until you have real content, leave the seeded
 * "TODO …" placeholders exactly as they are — the template parts detect the
 * TODO marker and hide the section entirely, so nothing fake ever ships.
 *
 * @package spicola
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Marker that flags an entry as not-yet-real. Any value containing this string
 * is treated as a placeholder and excluded from rendering.
 */
if ( ! defined( 'SPICOLA_TODO' ) ) {
	define( 'SPICOLA_TODO', 'TODO' );
}

/**
 * True when a string is empty or still a TODO placeholder.
 *
 * @param string $value Value to test.
 * @return bool
 */
function spicola_is_todo( $value ) {
	return '' === trim( (string) $value ) || false !== stripos( (string) $value, SPICOLA_TODO );
}

/**
 * Client testimonials.
 *
 * Shape: name, role, company, quote, avatar (optional image URL).
 * Replace the TODO fields with real, attributable quotes. An entry counts as
 * "real" only when BOTH name and quote are filled in (no TODO marker). If no
 * entry is real, the whole Client Stories section is hidden — see
 * template-parts/testimonials.php.
 *
 * @return array<int,array<string,string>>
 */
function spicola_testimonials() {
	return array(
		array(
			'name'    => 'TODO — client name',
			'role'    => 'Owner',
			'company' => 'TODO — client business',
			'quote'   => 'TODO — paste a real quote about bringing operations into one place with Limitless.',
			'avatar'  => '', // Optional. Square image URL; leave empty for initials.
		),
		array(
			'name'    => 'TODO — client name',
			'role'    => 'Operations Manager',
			'company' => 'TODO — client business',
			'quote'   => 'TODO — paste a real quote about onboarding / setup experience.',
			'avatar'  => '',
		),
		array(
			'name'    => 'TODO — client name',
			'role'    => 'Accountant',
			'company' => 'TODO — client business',
			'quote'   => 'TODO — paste a real quote about reporting / closing the books faster.',
			'avatar'  => '',
		),
	);
}

/**
 * Only the testimonials that are real (name + quote filled in, no TODO).
 *
 * @return array<int,array<string,string>>
 */
function spicola_real_testimonials() {
	return array_values( array_filter(
		spicola_testimonials(),
		function ( $t ) {
			return ! spicola_is_todo( $t['name'] ) && ! spicola_is_todo( $t['quote'] );
		}
	) );
}

/**
 * Client / partner logos for the "Trusted by" strip below the hero.
 *
 * Shape: name (alt text), src (image URL). Add entries ONLY for businesses you
 * genuinely work with and have permission to display. The strip is hidden
 * entirely until at least one real logo exists.
 *
 * @return array<int,array<string,string>>
 */
function spicola_logos() {
	return array(
		// array( 'name' => 'Acme Co', 'src' => 'https://…/acme.svg' ),
		array( 'name' => 'TODO — client logo', 'src' => '' ),
	);
}

/**
 * Only logos that are real (have a name and an image src, no TODO).
 *
 * @return array<int,array<string,string>>
 */
function spicola_real_logos() {
	return array_values( array_filter(
		spicola_logos(),
		function ( $l ) {
			return ! spicola_is_todo( $l['name'] ) && ! spicola_is_todo( $l['src'] );
		}
	) );
}

/**
 * Headline stats for the social-proof strip.
 *
 * Shape: value (e.g. "98%"), label. Use only numbers you can stand behind.
 * Hidden entirely until at least one real stat exists.
 *
 * @return array<int,array<string,string>>
 */
function spicola_stats() {
	return array(
		// array( 'value' => '6', 'label' => 'tools replaced, on average' ),
		array( 'value' => 'TODO', 'label' => 'TODO — real metric' ),
	);
}

/**
 * Only stats that are real (value + label, no TODO).
 *
 * @return array<int,array<string,string>>
 */
function spicola_real_stats() {
	return array_values( array_filter(
		spicola_stats(),
		function ( $s ) {
			return ! spicola_is_todo( $s['value'] ) && ! spicola_is_todo( $s['label'] );
		}
	) );
}
