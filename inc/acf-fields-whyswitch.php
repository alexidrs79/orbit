<?php
/**
 * ACF field group: Why switch — "Built so you're never blindsided".
 * Figma: 607:12483, 1440 wide.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_whyswitch_field_group' );

function orbit_register_whyswitch_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_whyswitch',
			'title'  => 'Why switch — Never blindsided',
			'fields' => array(
				array(
					'key'           => 'field_orbit_whyswitch_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'whyswitch_eyebrow',
					'type'          => 'text',
					'default_value' => 'Why teams switch to Orbit',
				),
				array(
					'key'           => 'field_orbit_whyswitch_headline',
					'label'         => 'Headline',
					'name'          => 'whyswitch_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => "Built so you're never blindsided",
				),
				array(
					'key'           => 'field_orbit_whyswitch_body',
					'label'         => 'Body',
					'name'          => 'whyswitch_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Three questions come up in every migration conversation: can I see what happened to my message, will my account survive a false-positive flag, and will the bill surprise me. Orbit answers all three by design.',
				),
				array(
					'key'           => 'field_orbit_whyswitch_image',
					'label'         => 'Dashboard screenshot',
					'name'          => 'whyswitch_image',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'          => 'field_orbit_whyswitch_panels',
					'label'        => 'Panels',
					'name'         => 'whyswitch_panels',
					'type'         => 'repeater',
					'instructions' => 'The 3 stacked panels, in order. Icon is fixed per slot — only edit the copy.',
					'layout'       => 'block',
					'button_label' => 'Add Panel',
					'min'          => 0,
					'max'          => 3,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_whyswitch_panel_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_whyswitch_panel_body',
							'label'    => 'Body',
							'name'     => 'body',
							'type'     => 'textarea',
							'rows'     => 4,
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
