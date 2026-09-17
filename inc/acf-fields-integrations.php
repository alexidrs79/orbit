<?php
/**
 * ACF field group: Integrations.
 * Figma: 48:113, 1440 × 917 at (0, 13144). Header 1:6356. Diagram 1:6370.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_integrations_field_group' );

function orbit_register_integrations_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_integrations',
			'title'  => 'Integrations',
			'fields' => array(
				array(
					'key'           => 'field_orbit_int_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'int_eyebrow',
					'type'          => 'text',
					'default_value' => 'Integration',
				),
				array(
					'key'           => 'field_orbit_int_headline',
					'label'         => 'Headline',
					'name'          => 'int_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Connect the tools you already rely on.',
				),
				array(
					'key'           => 'field_orbit_int_body',
					'label'         => 'Body',
					'name'          => 'int_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Hundreds of native integrations — from your CRM and helpdesk to your store and data warehouse. Salesforce, HubSpot, Shopify, Slack, Intercom, and more. Zapier for everything else.',
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
