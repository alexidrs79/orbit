<?php
/**
 * ACF field group: Phone system — Cloud phone system & IVR.
 * Figma: 607:11675, 1440 × 1189 at (0, 12938).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_phone_system_field_group' );

function orbit_register_phone_system_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_phone_system',
			'title'  => 'Phone system — Cloud phone system & IVR',
			'fields' => array(
				array(
					'key'           => 'field_orbit_phone_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'phone_eyebrow',
					'type'          => 'text',
					'default_value' => 'Cloud phone system & IVR',
				),
				array(
					'key'           => 'field_orbit_phone_headline',
					'label'         => 'Headline',
					'name'          => 'phone_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'A business phone system with the IVR, trunking, queues, and team chat built in',
				),
				array(
					'key'           => 'field_orbit_phone_body',
					'label'         => 'Body',
					'name'          => 'phone_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Run your whole inbound voice operation on Orbit — greet callers with a visual IVR, bring your own carrier over SIP, distribute calls to the right team, and capture a voicemail when no one can pick up. No separate PBX vendor or chat app to manage.',
				),
				array(
					'key'          => 'field_orbit_phone_replaces',
					'label'        => 'What Orbit replaces',
					'name'         => 'phone_replaces',
					'type'         => 'repeater',
					'instructions' => 'Struck-through chips in the consolidation band, left to right.',
					'layout'       => 'table',
					'button_label' => 'Add Item',
					'min'          => 0,
					'max'          => 5,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_phone_replaces_label',
							'label'    => 'Label',
							'name'     => 'label',
							'type'     => 'text',
						),
					),
				),
				array(
					'key'          => 'field_orbit_phone_cards',
					'label'        => 'Feature cards',
					'name'         => 'phone_cards',
					'type'         => 'repeater',
					'instructions' => 'The six capability cards below the flow diagram.',
					'layout'       => 'block',
					'button_label' => 'Add Card',
					'min'          => 0,
					'max'          => 6,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_phone_card_icon',
							'label'         => 'Icon',
							'name'          => 'icon',
							'type'          => 'select',
							'choices'       => array(
								'tree'      => 'Hierarchy (IVR builder)',
								'database'  => 'Database (SIP trunk)',
								'people'    => 'People (ACD queues)',
								'voicemail' => 'Voicemail',
								'whatsapp'  => 'WhatsApp',
								'chat'      => 'Chat bubble',
							),
							'default_value' => 'tree',
							'ui'            => 0,
						),
						array(
							'key'           => 'field_orbit_phone_card_color',
							'label'         => 'Icon tile color',
							'name'          => 'color',
							'type'          => 'select',
							'choices'       => array(
								'blue'   => 'Blue',
								'purple' => 'Purple',
								'amber'  => 'Amber',
								'green'  => 'Green',
								'slate'  => 'Slate',
							),
							'default_value' => 'blue',
							'ui'            => 0,
						),
						array(
							'key'      => 'field_orbit_phone_card_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_phone_card_body',
							'label'    => 'Body',
							'name'     => 'body',
							'type'     => 'textarea',
							'rows'     => 3,
						),
						array(
							'key'      => 'field_orbit_phone_card_chip',
							'label'    => 'Chip label',
							'name'     => 'chip',
							'type'     => 'text',
						),
						array(
							'key'           => 'field_orbit_phone_card_new',
							'label'         => 'New surface (blue highlight, checkmark)',
							'name'          => 'new',
							'type'          => 'true_false',
							'default_value' => 0,
							'ui'            => 1,
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
