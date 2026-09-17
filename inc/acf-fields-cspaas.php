<?php
/**
 * ACF field group: CSPaaS — "Run Orbit as your own communications platform".
 * Figma: 607:12347 ("CSPaaS — White-label & reseller"), 1440 wide.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_cspaas_field_group' );

function orbit_register_cspaas_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_cspaas',
			'title'  => 'CSPaaS — White-label & reseller',
			'fields' => array(
				array(
					'key'           => 'field_orbit_cspaas_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'cspaas_eyebrow',
					'type'          => 'text',
					'default_value' => 'White-label & reseller',
				),
				array(
					'key'           => 'field_orbit_cspaas_headline',
					'label'         => 'Headline',
					'name'          => 'cspaas_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Run Orbit as your own communications platform',
				),
				array(
					'key'           => 'field_orbit_cspaas_body',
					'label'         => 'Body',
					'name'          => 'cspaas_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'CSPaaS lets you operate a full communications platform under your own brand without building carrier infrastructure — you become the provider your customers see. Create an isolated sub-account for each customer, rebrand the dashboard on your own domain, set reseller margins and spend caps, and allocate prepaid credit from your parent balance.',
				),
				array(
					'key'          => 'field_orbit_cspaas_columns',
					'label'        => 'Feature columns',
					'name'         => 'cspaas_columns',
					'type'         => 'repeater',
					'instructions' => 'The 4 columns below the diagram, in order.',
					'layout'       => 'block',
					'button_label' => 'Add Column',
					'min'          => 0,
					'max'          => 4,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_cspaas_column_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_cspaas_column_body',
							'label'    => 'Body',
							'name'     => 'body',
							'type'     => 'textarea',
							'rows'     => 3,
						),
					),
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
