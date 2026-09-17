<?php
/**
 * ACF field group: CPaaS cards.
 * Figma: 1:7054 Content, 1217 × 382 at (112, 8487).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_cpaas_field_group' );

function orbit_register_cpaas_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_cpaas',
			'title'  => 'CPaaS',
			'fields' => array(
				array(
					'key'           => 'field_orbit_cpaas_headline',
					'label'         => 'Headline',
					'name'          => 'cpaas_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Simplified CPaaS Platform Management',
				),
				array(
					'key'          => 'field_orbit_cpaas_cards',
					'label'        => 'Cards',
					'name'         => 'cpaas_cards',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add Card',
					'min'          => 1,
					'max'          => 4,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_cpaas_card_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_cpaas_card_body',
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
