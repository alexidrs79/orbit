<?php
/**
 * ACF field group: CX — Orbit ("Every conversation").
 * Figma: 607:11877 ("CX — Orbit (1440)"), 1440 wide.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_cx_orbit_field_group' );

function orbit_register_cx_orbit_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_cx_orbit',
			'title'  => 'CX — Orbit (Every conversation)',
			'fields' => array(
				array(
					'key'           => 'field_orbit_cx_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'cx_eyebrow',
					'type'          => 'text',
					'default_value' => 'Customer experience',
				),
				array(
					'key'           => 'field_orbit_cx_headline',
					'label'         => 'Headline',
					'name'          => 'cx_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Measure, coach, and staff your support team in one place',
				),
				array(
					'key'           => 'field_orbit_cx_body',
					'label'         => 'Body',
					'name'          => 'cx_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Close the loop after every conversation: survey the customer, score how the agent handled it, schedule the right people for tomorrow, and reward the customer with a loyalty card that brings them back. One platform, not a CX suite bolted onto your contact center.',
				),
				array(
					'key'          => 'field_orbit_cx_stages',
					'label'        => 'Stages',
					'name'         => 'cx_stages',
					'type'         => 'repeater',
					'instructions' => 'The 5 orbit stages, in order: 1 Ask, 2 Score, 3 Diagnose, 4 Staff, 5 Reward. Position and icon are fixed per slot — only edit the copy.',
					'layout'       => 'block',
					'button_label' => 'Add Stage',
					'min'          => 0,
					'max'          => 5,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_cx_stage_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_cx_stage_body',
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
