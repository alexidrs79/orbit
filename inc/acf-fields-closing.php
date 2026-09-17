<?php
/**
 * ACF field group: Closing CTA.
 * Figma: 1:5947 (CTA block 48:109 at 417, 387 — headline + dual CTAs).
 * Motion empty — fade copy only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_closing_field_group' );

function orbit_register_closing_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_closing',
			'title'  => 'Closing CTA',
			'fields' => array(
				array(
					'key'           => 'field_orbit_close_headline',
					'label'         => 'Headline',
					'name'          => 'close_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => "Infrastructure you'll still trust in five years.",
				),
				array(
					'key'           => 'field_orbit_close_cta1_label',
					'label'         => 'CTA 1 label',
					'name'          => 'close_cta1_label',
					'type'          => 'text',
					'default_value' => 'Talk to Sales',
				),
				array(
					'key'           => 'field_orbit_close_cta1_url',
					'label'         => 'CTA 1 URL',
					'name'          => 'close_cta1_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'           => 'field_orbit_close_cta2_label',
					'label'         => 'CTA 2 label',
					'name'          => 'close_cta2_label',
					'type'          => 'text',
					'default_value' => 'Start Building',
				),
				array(
					'key'           => 'field_orbit_close_cta2_url',
					'label'         => 'CTA 2 URL',
					'name'          => 'close_cta2_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
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
