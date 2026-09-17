<?php
/**
 * ACF field group: Conversational commerce.
 * Figma: 607:11164, 1440 × 1466 at (0, 9587).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_commerce_field_group' );

function orbit_register_commerce_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_commerce',
			'title'  => 'Conversational commerce',
			'fields' => array(
				array(
					'key'           => 'field_orbit_commerce_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'commerce_eyebrow',
					'type'          => 'text',
					'default_value' => 'Conversational commerce',
				),
				array(
					'key'           => 'field_orbit_commerce_headline',
					'label'         => 'Headline',
					'name'          => 'commerce_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'From first message to paid, without leaving the thread',
				),
				array(
					'key'           => 'field_orbit_commerce_body',
					'label'         => 'Body',
					'name'          => 'commerce_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Turn a conversation into a sale in the chat it started in. Orbit carries the shopper from a product catalog to a shared cart to a paid checkout across WhatsApp, RCS, and the channels with no native wallet.',
				),
				array(
					'key'           => 'field_orbit_commerce_features',
					'label'         => 'Features',
					'name'          => 'commerce_features',
					'type'          => 'repeater',
					'instructions'  => 'Feature cards displayed below flow steps.',
					'button_label'  => 'Add Feature',
					'min'           => 0,
					'max'           => 0,
					'layout'        => 'table',
					'sub_fields'    => array(
						array(
							'key'           => 'field_orbit_commerce_feature_icon',
							'label'         => 'Icon',
							'name'          => 'feature_icon',
							'type'          => 'image',
							'required'      => 0,
							'return_format' => 'id',
						),
						array(
							'key'           => 'field_orbit_commerce_feature_title',
							'label'         => 'Title',
							'name'          => 'feature_title',
							'type'          => 'text',
						),
						array(
							'key'           => 'field_orbit_commerce_feature_body',
							'label'         => 'Body',
							'name'          => 'feature_body',
							'type'          => 'textarea',
							'rows'          => 3,
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
