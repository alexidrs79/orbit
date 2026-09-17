<?php
/**
 * ACF field group: Voice compare.
 * Figma: copy 48:120 (499 × 412 at 119, 6523) + table 1:6989 (659 × 567 at 681, 6445).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_voice_compare_field_group' );

function orbit_register_voice_compare_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_voice_compare',
			'title'  => 'Voice compare',
			'fields' => array(
				array(
					'key'           => 'field_orbit_vcmp_headline',
					'label'         => 'Headline',
					'name'          => 'vcmp_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Building it yourself costs more than you think.',
				),
				array(
					'key'           => 'field_orbit_vcmp_body',
					'label'         => 'Body',
					'name'          => 'vcmp_body',
					'type'          => 'textarea',
					'rows'          => 6,
					'default_value' => 'Number porting, compliance recording, predictive dialing, CRM sync, quality management, supervisor controls — enterprises spend months assembling what Orbit ships as a single production-ready platform. And every capability you piece together separately is another vendor contract, another integration point, another failure surface to manage. The real cost of "building it yourself" isn\'t the build. It\'s everything that comes after.',
				),
				array(
					'key'           => 'field_orbit_vcmp_point_built',
					'label'         => 'Point one',
					'name'          => 'vcmp_point_built',
					'type'          => 'text',
					'default_value' => 'Every capability in this table, built in',
				),
				array(
					'key'           => 'field_orbit_vcmp_point_live',
					'label'         => 'Point two',
					'name'          => 'vcmp_point_live',
					'type'          => 'text',
					'default_value' => 'Live in 3–5 business days',
				),
				array(
					'key'           => 'field_orbit_vcmp_col_req',
					'label'         => 'Requirements column',
					'name'          => 'vcmp_col_req',
					'type'          => 'text',
					'default_value' => 'Production-layer requirement',
				),
				array(
					'key'           => 'field_orbit_vcmp_col_assemble',
					'label'         => 'Assemble column',
					'name'          => 'vcmp_col_assemble',
					'type'          => 'text',
					'default_value' => 'Assemble',
				),
				array(
					'key'           => 'field_orbit_vcmp_col_orbit',
					'label'         => 'Orbit column',
					'name'          => 'vcmp_col_orbit',
					'type'          => 'text',
					'default_value' => 'Orbit',
				),
				array(
					'key'          => 'field_orbit_vcmp_rows',
					'label'        => 'Rows',
					'name'         => 'vcmp_rows',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Row',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_vcmp_row_label',
							'label'    => 'Requirement',
							'name'     => 'label',
							'type'     => 'text',
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
