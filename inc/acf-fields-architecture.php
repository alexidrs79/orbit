<?php
/**
 * ACF field group: Traditional vs Orbit architecture.
 * Figma: 1:6199, 1440 × 1021 at (0, 8966).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_architecture_field_group' );

function orbit_register_architecture_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_architecture',
			'title'  => 'Architecture',
			'fields' => array(
				array(
					'key'           => 'field_orbit_arch_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'arch_eyebrow',
					'type'          => 'text',
					'default_value' => 'The structural argument',
				),
				array(
					'key'           => 'field_orbit_arch_headline',
					'label'         => 'Headline',
					'name'          => 'arch_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'One platform beats a stack of vendors.',
				),
				array(
					'key'           => 'field_orbit_arch_left_label',
					'label'         => 'Left label',
					'name'          => 'arch_left_label',
					'type'          => 'text',
					'default_value' => 'Traditional way',
				),
				array(
					'key'           => 'field_orbit_arch_right_label',
					'label'         => 'Right label',
					'name'          => 'arch_right_label',
					'type'          => 'text',
					'default_value' => 'Orbit',
				),
				array(
					'key'           => 'field_orbit_arch_left_caption',
					'label'         => 'Left caption',
					'name'          => 'arch_left_caption',
					'type'          => 'text',
					'default_value' => 'Multiple vendors. Multiple contracts. Multiple headaches.',
				),
				array(
					'key'           => 'field_orbit_arch_right_caption',
					'label'         => 'Right caption',
					'name'          => 'arch_right_caption',
					'type'          => 'text',
					'default_value' => 'One platform. One contract. Total control.',
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
