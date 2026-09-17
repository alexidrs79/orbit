<?php
/**
 * ACF field group: Hero section.
 * Figma: nodes 45:5 (copy), 1:6559 (9 tabs), 19:704 (dashboard image).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_hero_field_group' );

function orbit_register_hero_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_hero',
			'title'  => 'Hero Section',
			'fields' => array(
				array(
					'key'           => 'field_orbit_hero_announce_badge',
					'label'         => 'Announcement — Badge',
					'name'          => 'hero_announce_badge',
					'type'          => 'text',
					'default_value' => 'NEW',
				),
				array(
					'key'           => 'field_orbit_hero_announce_text',
					'label'         => 'Announcement — Text',
					'name'          => 'hero_announce_text',
					'type'          => 'text',
					'default_value' => 'Telegram channel has been added to supported channels',
				),
				array(
					'key'           => 'field_orbit_hero_announce_url',
					'label'         => 'Announcement — URL',
					'name'          => 'hero_announce_url',
					'type'          => 'text',
					'default_value' => '/#channels',
				),
				array(
					'key'           => 'field_orbit_hero_headline',
					'label'         => 'Headline',
					'name'          => 'hero_headline',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Convergent communications. One platform for every conversation — human or AI.',
				),
				array(
					'key'           => 'field_orbit_hero_body',
					'label'         => 'Body',
					'name'          => 'hero_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Voice, messaging, and the contact center — built and operated by us, on infrastructure we run as the carrier of record. Whether a message comes from a person or an AI agent, it runs on the same network, the same data, and the same rules.',
				),
				array(
					'key'           => 'field_orbit_hero_cta1_label',
					'label'         => 'CTA 1 — Label',
					'name'          => 'hero_cta1_label',
					'type'          => 'text',
					'default_value' => 'Talk to Sales',
				),
				array(
					'key'           => 'field_orbit_hero_cta1_url',
					'label'         => 'CTA 1 — URL',
					'name'          => 'hero_cta1_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'           => 'field_orbit_hero_cta2_label',
					'label'         => 'CTA 2 — Label',
					'name'          => 'hero_cta2_label',
					'type'          => 'text',
					'default_value' => 'Start Building',
				),
				array(
					'key'           => 'field_orbit_hero_cta2_url',
					'label'         => 'CTA 2 — URL',
					'name'          => 'hero_cta2_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'          => 'field_orbit_hero_tabs',
					'label'        => 'Tabs',
					'name'         => 'hero_tabs',
					'type'         => 'repeater',
					'instructions' => 'Nine product tabs. Each tab shows its own image in the dashboard frame. Leave an image empty until that screenshot is ready.',
					'layout'       => 'block',
					'button_label' => 'Add Tab',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'   => 'field_orbit_hero_tab_label',
							'label' => 'Label',
							'name'  => 'label',
							'type'  => 'text',
						),
						array(
							'key'           => 'field_orbit_hero_tab_image',
							'label'         => 'Image',
							'name'          => 'image',
							'type'          => 'image',
							'return_format' => 'id',
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
