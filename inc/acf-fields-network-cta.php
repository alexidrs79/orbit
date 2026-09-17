<?php
/**
 * ACF field group: Network CTA.
 * Figma: 1:198, 1240 × 367 at (100, 11103).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_network_cta_field_group' );

function orbit_register_network_cta_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_network_cta',
			'title'  => 'Network CTA',
			'fields' => array(
				array(
					'key'           => 'field_orbit_ncta_headline',
					'label'         => 'Headline',
					'name'          => 'ncta_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Build on a network you actually own.',
				),
				array(
					'key'           => 'field_orbit_ncta_body',
					'label'         => 'Body',
					'name'          => 'ncta_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Voice, messaging, and AI agents on infrastructure we run as carrier of record. A few API calls to start — no telecom contracts, no per-seat fees.',
				),
				array(
					'key'           => 'field_orbit_ncta_cta1_label',
					'label'         => 'CTA 1 — Label',
					'name'          => 'ncta_cta1_label',
					'type'          => 'text',
					'default_value' => 'Talk to Sales',
				),
				array(
					'key'           => 'field_orbit_ncta_cta1_url',
					'label'         => 'CTA 1 — URL',
					'name'          => 'ncta_cta1_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'           => 'field_orbit_ncta_cta2_label',
					'label'         => 'CTA 2 — Label',
					'name'          => 'ncta_cta2_label',
					'type'          => 'text',
					'default_value' => 'Start Building',
				),
				array(
					'key'           => 'field_orbit_ncta_cta2_url',
					'label'         => 'CTA 2 — URL',
					'name'          => 'ncta_cta2_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'page-templates/template-landing-orbit.php',
					),
				),
			),
		)
	);
}
