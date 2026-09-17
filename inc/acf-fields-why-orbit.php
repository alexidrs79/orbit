<?php
/**
 * ACF field group: Why Orbit — four reasons.
 * Figma: node 1:103, 1280 × 255 at (80, 1433).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_why_orbit_field_group' );

function orbit_register_why_orbit_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_why',
			'title'  => 'Why Orbit',
			'fields' => array(
				array(
					'key'          => 'field_orbit_why_items',
					'label'        => 'Reasons',
					'name'         => 'why_orbit_items',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add Reason',
					'min'          => 1,
					'max'          => 4,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_why_item_icon',
							'label'         => 'Icon',
							'name'          => 'icon',
							'type'          => 'image',
							'return_format' => 'id',
							'mime_types'    => 'svg',
						),
						array(
							'key'      => 'field_orbit_why_item_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_why_item_body',
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
