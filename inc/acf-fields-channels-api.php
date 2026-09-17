<?php
/**
 * ACF field group: One API / six capabilities.
 * Figma: 1:5839, 1004 × 184 at (218, 3721).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_channels_api_field_group' );

function orbit_register_channels_api_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_channels_api',
			'title'  => 'One API',
			'fields' => array(
				array(
					'key'          => 'field_orbit_api_items',
					'label'        => 'Capabilities',
					'name'         => 'api_items',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add Capability',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_api_item_icon',
							'label'         => 'Icon',
							'name'          => 'icon',
							'type'          => 'image',
							'return_format' => 'id',
							'mime_types'    => 'svg',
						),
						array(
							'key'      => 'field_orbit_api_item_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_api_item_body',
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
