<?php
/**
 * ACF field group: Channels grid + SwiftShop chat.
 * Figma: 1:5744 (1442 × 1069 at y=2370) + 1:6183 (1241 × 619 at y=3022).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_channels_grid_field_group' );

function orbit_register_channels_grid_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_channels_grid',
			'title'  => 'Channels',
			'fields' => array(
				array(
					'key'           => 'field_orbit_channels_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'channels_eyebrow',
					'type'          => 'text',
					'default_value' => '14 channels, native',
				),
				array(
					'key'           => 'field_orbit_channels_headline',
					'label'         => 'Headline',
					'name'          => 'channels_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Every channel your customers use — already here',
				),
				array(
					'key'           => 'field_orbit_channels_body',
					'label'         => 'Body',
					'name'          => 'channels_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Reach people where they are, and keep the conversation intact as it moves between channels. Every major messaging and voice channel, in one place',
				),
				array(
					'key'          => 'field_orbit_channels_items',
					'label'        => 'Channels',
					'name'         => 'channels_items',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Channel',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_channels_item_icon',
							'label'         => 'Icon',
							'name'          => 'icon',
							'type'          => 'image',
							'return_format' => 'id',
						),
						array(
							'key'      => 'field_orbit_channels_item_label',
							'label'    => 'Label',
							'name'     => 'label',
							'type'     => 'text',
						),
						array(
							'key'           => 'field_orbit_channels_item_well',
							'label'         => 'Well color',
							'name'          => 'well',
							'type'          => 'text',
							'instructions'  => 'CSS color for the 56px pad, e.g. rgba(37,211,102,0.1). Leave empty for Instagram-style full icons.',
							'default_value' => 'rgba(50, 95, 236, 0.1)',
						),
						array(
							'key'           => 'field_orbit_channels_item_mark',
							'label'         => 'Inner mark',
							'name'          => 'mark',
							'type'          => 'select',
							'choices'       => array(
								'none'     => 'None (icon is already the 43px mark)',
								'gradient' => 'Green gradient square',
								'brand'    => 'Brand-blue square',
								'white'    => 'White square',
								'full'     => 'Full 56px icon (no pad)',
							),
							'default_value' => 'none',
							'ui'            => 0,
						),
					),
				),
				array(
					'key'           => 'field_orbit_channels_chat_photo',
					'label'         => 'Chat photo',
					'name'          => 'channels_chat_photo',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_orbit_channels_chat_avatar',
					'label'         => 'Agent avatar',
					'name'          => 'channels_chat_avatar',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_orbit_channels_chat_name',
					'label'         => 'Agent name',
					'name'          => 'channels_chat_name',
					'type'          => 'text',
					'default_value' => 'Kaitlyn Rodriguez',
				),
				array(
					'key'          => 'field_orbit_channels_chat_messages',
					'label'        => 'Chat messages',
					'name'         => 'channels_chat_messages',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Message',
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_channels_chat_role',
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
							'key'      => 'field_orbit_channels_chat_text',
							'label'    => 'Text',
							'name'     => 'text',
							'type'     => 'textarea',
							'rows'     => 2,
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
