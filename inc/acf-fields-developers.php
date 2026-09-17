<?php
/**
 * ACF field group: Developers.
 * Figma: 1:6329, 1441 × 745 at (0, 11487).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_developers_field_group' );

function orbit_register_developers_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_developers',
			'title'  => 'Developers',
			'fields' => array(
				array(
					'key'           => 'field_orbit_dev_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'dev_eyebrow',
					'type'          => 'text',
					'default_value' => 'Developers',
				),
				array(
					'key'           => 'field_orbit_dev_headline',
					'label'         => 'Headline',
					'name'          => 'dev_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Build the way your team works.',
				),
				array(
					'key'           => 'field_orbit_dev_body',
					'label'         => 'Body',
					'name'          => 'dev_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Visual builders for the whole team — journeys, IVRs, WhatsApp Flows, and AI agents, no code required. Typed SDKs and MCP for your engineers.',
				),
				array(
					'key'           => 'field_orbit_dev_footnote',
					'label'         => 'Footnote',
					'name'          => 'dev_footnote',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => "An MCP server, both ways — your agents call Orbit, and Orbit's AI calls your tools.",
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
