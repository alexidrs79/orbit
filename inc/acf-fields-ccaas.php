<?php
/**
 * ACF field group: CCaaS — "Run your contact center in one agent workspace".
 * Figma: 607:11970 ("CCaaS — Light (1440)"), 1440 wide.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_ccaas_field_group' );

function orbit_register_ccaas_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_ccaas',
			'title'  => 'CCaaS — Agent workspace',
			'fields' => array(
				array(
					'key'           => 'field_orbit_ccaas_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'ccaas_eyebrow',
					'type'          => 'text',
					'default_value' => 'Contact center',
				),
				array(
					'key'           => 'field_orbit_ccaas_headline',
					'label'         => 'Headline',
					'name'          => 'ccaas_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Run your contact center in one agent workspace',
				),
				array(
					'key'           => 'field_orbit_ccaas_body',
					'label'         => 'Body',
					'name'          => 'ccaas_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'Orbit gives every agent one screen for every channel — chat, email, and messaging — routes each conversation to the right skills, and closes it with a clear outcome. Supervisors watch the floor live and step in the moment an agent needs backup.',
				),
				array(
					'key'           => 'field_orbit_ccaas_hero_photo',
					'label'         => 'Hero agent photo',
					'name'          => 'ccaas_hero_photo',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_orbit_ccaas_avatar',
					'label'         => 'Swimlane agent avatar',
					'name'          => 'ccaas_avatar',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'          => 'field_orbit_ccaas_events',
					'label'        => 'Swimlane events',
					'name'         => 'ccaas_events',
					'type'         => 'repeater',
					'instructions' => 'The 6 events on the flow board, in order: Arrival, Assigned, Reply, Disposition, Resolved, Whisper. Position, icon and color are fixed per slot — only edit the copy.',
					'layout'       => 'block',
					'button_label' => 'Add Event',
					'min'          => 0,
					'max'          => 6,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_ccaas_event_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_ccaas_event_body',
							'label'    => 'Body',
							'name'     => 'body',
							'type'     => 'text',
						),
					),
				),
				array(
					'key'          => 'field_orbit_ccaas_columns',
					'label'        => 'Feature columns',
					'name'         => 'ccaas_columns',
					'type'         => 'repeater',
					'instructions' => 'The 4 columns below the flow board, in order: Inbox, Routing, Supervision, Outcome.',
					'layout'       => 'block',
					'button_label' => 'Add Column',
					'min'          => 0,
					'max'          => 4,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_ccaas_column_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_ccaas_column_body',
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
