<?php
/**
 * ACF field group: NaaS — "Connect your devices with eSIM and IoT data plans".
 * Figma: 607:12137 ("NaaS — Network connectivity"), 1440 wide.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_naas_field_group' );

function orbit_register_naas_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_naas',
			'title'  => 'NaaS — Network connectivity',
			'fields' => array(
				array(
					'key'           => 'field_orbit_naas_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'naas_eyebrow',
					'type'          => 'text',
					'default_value' => 'Network connectivity',
				),
				array(
					'key'           => 'field_orbit_naas_headline',
					'label'         => 'Headline',
					'name'          => 'naas_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Connect your devices with eSIM and IoT data plans',
				),
				array(
					'key'           => 'field_orbit_naas_body',
					'label'         => 'Body',
					'name'          => 'naas_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => "Orbit's Number-as-a-Service reaches past phone numbers into cellular data. Browse eSIM and IoT data plans, provision SIMs over the air without a card to swap by hand, and track usage across a whole fleet — from the same platform that runs your voice and messaging. Every plan carries data only, never voice or text.",
				),
				array(
					'key'           => 'field_orbit_naas_cta_sales_label',
					'label'         => 'Outline button label',
					'name'          => 'naas_cta_sales_label',
					'type'          => 'text',
					'default_value' => 'Talk to Sales',
				),
				array(
					'key'           => 'field_orbit_naas_cta_sales_url',
					'label'         => 'Outline button URL',
					'name'          => 'naas_cta_sales_url',
					'type'          => 'url',
				),
				array(
					'key'           => 'field_orbit_naas_cta_build_label',
					'label'         => 'Filled button label',
					'name'          => 'naas_cta_build_label',
					'type'          => 'text',
					'default_value' => 'Start Building',
				),
				array(
					'key'           => 'field_orbit_naas_cta_build_url',
					'label'         => 'Filled button URL',
					'name'          => 'naas_cta_build_url',
					'type'          => 'url',
				),
				array(
					'key'          => 'field_orbit_naas_columns',
					'label'        => 'Feature columns',
					'name'         => 'naas_columns',
					'type'         => 'repeater',
					'instructions' => 'The 5 columns below the diagram, in order.',
					'layout'       => 'block',
					'button_label' => 'Add Column',
					'min'          => 0,
					'max'          => 5,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_naas_column_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_naas_column_body',
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
