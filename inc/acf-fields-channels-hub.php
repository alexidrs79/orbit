<?php
/**
 * ACF field group: Channel hub + Shop24 chat.
 * Figma: 1:6025, 1442 × 854 at (−1, 4017).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_channels_hub_field_group' );

function orbit_register_channels_hub_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_channels_hub',
			'title'  => 'Channel hub',
			'fields' => array(
				array(
					'key'           => 'field_orbit_hub_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'hub_eyebrow',
					'type'          => 'text',
					'default_value' => '14 channels, native',
				),
				array(
					'key'           => 'field_orbit_hub_headline',
					'label'         => 'Headline',
					'name'          => 'hub_headline',
					'type'          => 'text',
					'default_value' => 'Every channel customers actually use.',
				),
				array(
					'key'           => 'field_orbit_hub_body',
					'label'         => 'Body',
					'name'          => 'hub_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Native runtime build, not a thin API wrapper over aggregators. Channel-specific features ship by default',
				),
				array(
					'key'          => 'field_orbit_hub_items',
					'label'        => 'Hub channels',
					'name'         => 'hub_items',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Channel',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_hub_item_icon',
							'label'         => 'Icon',
							'name'          => 'icon',
							'type'          => 'image',
							'return_format' => 'id',
						),
						array(
							'key'      => 'field_orbit_hub_item_label',
							'label'    => 'Label',
							'name'     => 'label',
							'type'     => 'text',
						),
						array(
							'key'           => 'field_orbit_hub_item_well',
							'label'         => 'Well color',
							'name'          => 'well',
							'type'          => 'text',
							'default_value' => 'rgba(50, 95, 236, 0.2)',
						),
						array(
							'key'           => 'field_orbit_hub_item_mark',
							'label'         => 'Inner mark',
							'name'          => 'mark',
							'type'          => 'select',
							'choices'       => array(
								'none'     => 'None (icon is already the mark)',
								'gradient' => 'Green gradient square',
								'brand'    => 'Brand-blue square',
								'white'    => 'White square',
								'full'     => 'Full 48px icon (no pad)',
							),
							'default_value' => 'none',
						),
					),
				),
				array(
					'key'           => 'field_orbit_hub_chat_avatar',
					'label'         => 'Shop24 avatar',
					'name'          => 'hub_chat_avatar',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_orbit_hub_chat_name',
					'label'         => 'Chat name',
					'name'          => 'hub_chat_name',
					'type'          => 'text',
					'default_value' => 'Shop24 Live Support',
				),
				array(
					'key'           => 'field_orbit_hub_chat_status',
					'label'         => 'Status',
					'name'          => 'hub_chat_status',
					'type'          => 'text',
					'default_value' => 'Online',
				),
				array(
					'key'           => 'field_orbit_hub_chat_placeholder',
					'label'         => 'Composer placeholder',
					'name'          => 'hub_chat_placeholder',
					'type'          => 'text',
					'default_value' => 'Message...',
				),
				array(
					'key'          => 'field_orbit_hub_chat_messages',
					'label'        => 'Chat messages',
					'name'         => 'hub_chat_messages',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Message',
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_hub_chat_role',
							'label'         => 'Role',
							'name'          => 'role',
							'type'          => 'select',
							'choices'       => array(
								'agent' => 'Agent',
								'user'  => 'Customer',
							),
							'default_value' => 'agent',
						),
						array(
							'key'      => 'field_orbit_hub_chat_text',
							'label'    => 'Text',
							'name'     => 'text',
							'type'     => 'textarea',
							'rows'     => 3,
						),
						array(
							'key'      => 'field_orbit_hub_chat_time',
							'label'    => 'Time',
							'name'     => 'time',
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
