<?php
/**
 * ACF field group: Compliance badges.
 * Figma: node 48:10, 1440 × 574 at y=1796.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_compliance_field_group' );

function orbit_register_compliance_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_compliance',
			'title'  => 'Compliance',
			'fields' => array(
				array(
					'key'           => 'field_orbit_compliance_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'compliance_eyebrow',
					'type'          => 'text',
					'default_value' => 'Scale with security',
				),
				array(
					'key'           => 'field_orbit_compliance_headline',
					'label'         => 'Headline',
					'name'          => 'compliance_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Built to satisfy the standards your security team will ask about.',
				),
				array(
					'key'          => 'field_orbit_compliance_badges',
					'label'        => 'Badges',
					'name'         => 'compliance_badges',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Badge',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_compliance_badge_image',
							'label'         => 'Mark',
							'name'          => 'image',
							'type'          => 'image',
							'return_format' => 'id',
						),
						array(
							'key'      => 'field_orbit_compliance_badge_label',
							'label'    => 'Label',
							'name'     => 'label',
							'type'     => 'text',
						),
					),
				),
				array(
					'key'           => 'field_orbit_compliance_footer',
					'label'         => 'Footer',
					'name'          => 'compliance_footer',
					'type'          => 'text',
					'default_value' => 'Your data stays where you operate — EU, US, Middle East, and more on request.',
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
