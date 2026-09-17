<?php
/**
 * ACF field group: Verify — Verify & identity.
 * Figma: 607:11496, 1440 × 1092.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_verify_field_group' );

function orbit_register_verify_field_group() {
	acf_add_local_field_group(
		array(
			'key'      => 'group_orbit_verify',
			'title'    => 'Verify — Verify & identity',
			'fields'   => array(
				array(
					'key'           => 'field_orbit_verify_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'verify_eyebrow',
					'type'          => 'text',
					'default_value' => 'Verify & identity',
				),
				array(
					'key'           => 'field_orbit_verify_headline',
					'label'         => 'Headline',
					'name'          => 'verify_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Verify users and check identity on the same platform',
				),
				array(
					'key'           => 'field_orbit_verify_body',
					'label'         => 'Body',
					'name'          => 'verify_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Send one-time passcodes and passwordless prompts, then confirm a number is real and its owner has not changed — before you trust a signup, login, or payout. There is no separate verification vendor to integrate.',
				),
				array(
					'key'          => 'field_orbit_verify_rows',
					'label'        => 'Capability rows',
					'name'         => 'verify_rows',
					'type'         => 'repeater',
					'instructions' => 'Capability rows displayed below the trust gate visual.',
					'button_label' => 'Add Row',
					'min'          => 0,
					'max'          => 0,
					'layout'       => 'table',
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_verify_row_icon',
							'label'         => 'Icon',
							'name'          => 'row_icon',
							'type'          => 'image',
							'required'      => 0,
							'return_format' => 'id',
						),
						array(
							'key'           => 'field_orbit_verify_row_title',
							'label'         => 'Title',
							'name'          => 'row_title',
							'type'          => 'text',
							'required'      => 0,
						),
						array(
							'key'           => 'field_orbit_verify_row_body',
							'label'         => 'Body',
							'name'          => 'row_body',
							'type'          => 'textarea',
							'rows'          => 3,
							'required'      => 0,
						),
						array(
							'key'           => 'field_orbit_verify_row_badge',
							'label'         => 'Badge',
							'name'          => 'row_badge',
							'type'          => 'text',
							'required'      => 0,
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
