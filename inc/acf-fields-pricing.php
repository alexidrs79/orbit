<?php
/**
 * ACF field group: Pricing.
 * Figma: 48:112, 1442 × 912 at (0, 12232).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_pricing_field_group' );

function orbit_register_pricing_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_pricing',
			'title'  => 'Pricing',
			'fields' => array(
				array(
					'key'           => 'field_orbit_price_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'price_eyebrow',
					'type'          => 'text',
					'default_value' => 'Pricing Rates',
				),
				array(
					'key'           => 'field_orbit_price_headline',
					'label'         => 'Headline',
					'name'          => 'price_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'No seats. No tiers. Just published rates.',
				),
				array(
					'key'           => 'field_orbit_price_body',
					'label'         => 'Body',
					'name'          => 'price_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Usage-based pricing across messaging, voice, video and AI with no seat licenses, bundle tiers, or long term commitments.',
				),
				array(
					'key'           => 'field_orbit_price_cta_label',
					'label'         => 'CTA — Label',
					'name'          => 'price_cta_label',
					'type'          => 'text',
					'default_value' => 'See full list',
				),
				array(
					'key'           => 'field_orbit_price_cta_url',
					'label'         => 'CTA — URL',
					'name'          => 'price_cta_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'          => 'field_orbit_price_cards',
					'label'        => 'Rate cards',
					'name'         => 'price_cards',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add card',
					'min'          => 1,
					'max'          => 8,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_price_card_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_price_card_price',
							'label'    => 'Price',
							'name'     => 'price',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_price_card_unit',
							'label'    => 'Unit',
							'name'     => 'unit',
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
