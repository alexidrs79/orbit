<?php
/**
 * ACF field group: Customer data platform.
 * Figma: 607:11020, 1440 × 1123 at (0, 8464).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_cdp_field_group' );

function orbit_register_cdp_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_cdp',
			'title'  => 'Customer data platform',
			'fields' => array(
				array(
					'key'           => 'field_orbit_cdp_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'cdp_eyebrow',
					'type'          => 'text',
					'default_value' => 'Customer data platform',
				),
				array(
					'key'           => 'field_orbit_cdp_headline',
					'label'         => 'Headline',
					'name'          => 'cdp_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'A customer data platform, built into your communications',
				),
				array(
					'key'           => 'field_orbit_cdp_body',
					'label'         => 'Body',
					'name'          => 'cdp_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Orbit resolves every call, message, and event into one customer profile, computes the traits and segments your team cares about, and syncs them to the tools you already run — no separate CDP to buy or bolt on.',
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
