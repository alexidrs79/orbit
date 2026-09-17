<?php
/**
 * ACF field group: Channel memory.
 * Figma: photos 1:197 + 1:194, copy 1:192/1:193 + 1:195/1:196, badges 1:5900/1:5905/1:5937.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_channel_memory_field_group' );

function orbit_register_channel_memory_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_channel_memory',
			'title'  => 'Channel memory',
			'fields' => array(
				array(
					'key'           => 'field_orbit_mem1_headline',
					'label'         => 'Row 1 headline',
					'name'          => 'memory_1_headline',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Every channel your customer uses. One platform that remembers them.',
				),
				array(
					'key'           => 'field_orbit_mem1_body',
					'label'         => 'Row 1 body',
					'name'          => 'memory_1_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Orbit connects voice, messaging, email, WhatsApp and 11 more channels into a single runtime. When your customer switches channels, the context stays. No resets. No blind spots',
				),
				array(
					'key'           => 'field_orbit_mem1_point',
					'label'         => 'Row 1 point',
					'name'          => 'memory_1_point',
					'type'          => 'text',
					'default_value' => '14 channels, one architecture',
				),
				array(
					'key'           => 'field_orbit_mem1_photo',
					'label'         => 'Row 1 photo',
					'name'          => 'memory_1_photo',
					'type'          => 'image',
					'return_format' => 'id',
					'mime_types'    => 'jpg,jpeg,png,webp',
				),
				array(
					'key'           => 'field_orbit_mem2_headline',
					'label'         => 'Row 2 headline',
					'name'          => 'memory_2_headline',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Your customer already switched channels. Did your platform keep up?',
				),
				array(
					'key'           => 'field_orbit_mem2_body',
					'label'         => 'Row 2 body',
					'name'          => 'memory_2_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Whether it\'s a WhatsApp message, a phone call, or an email — Orbit follows the conversation, not the channel. Every interaction connected. Every customer remembered.',
				),
				array(
					'key'           => 'field_orbit_mem2_point_a',
					'label'         => 'Row 2 point one',
					'name'          => 'memory_2_point_a',
					'type'          => 'text',
					'default_value' => '14 channels, zero dropped context',
				),
				array(
					'key'           => 'field_orbit_mem2_point_b',
					'label'         => 'Row 2 point two',
					'name'          => 'memory_2_point_b',
					'type'          => 'text',
					'default_value' => 'One customer profile across every touchpoint',
				),
				array(
					'key'           => 'field_orbit_mem2_photo',
					'label'         => 'Row 2 photo',
					'name'          => 'memory_2_photo',
					'type'          => 'image',
					'return_format' => 'id',
					'mime_types'    => 'jpg,jpeg,png,webp',
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
