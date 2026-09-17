<?php
/**
 * ACF field group: Supervisor desktop.
 * Figma: 1:6796, 1440 × 1020 at (0, 9987). Motion empty.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_supervisor_field_group' );

function orbit_register_supervisor_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_supervisor',
			'title'  => 'Supervisor',
			'fields' => array(
				array(
					'key'           => 'field_orbit_sup_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'supervisor_eyebrow',
					'type'          => 'text',
					'default_value' => 'The structural argument',
				),
				array(
					'key'           => 'field_orbit_sup_headline',
					'label'         => 'Headline',
					'name'          => 'supervisor_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Your AI works. Your team stays in charge',
				),
				array(
					'key'           => 'field_orbit_sup_body',
					'label'         => 'Body',
					'name'          => 'supervisor_body',
					'type'          => 'textarea',
					'rows'          => 3,
					'default_value' => 'AI agents handle the volume. Supervisors set the limits, review the work, and step in when it matters.',
				),
				array(
					'key'          => 'field_orbit_sup_features',
					'label'        => 'Features',
					'name'         => 'supervisor_features',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add feature',
					'min'          => 1,
					'max'          => 6,
					'sub_fields'   => array(
						array(
							'key'      => 'field_orbit_sup_feat_num',
							'label'    => 'Number',
							'name'     => 'number',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_sup_feat_title',
							'label'    => 'Title',
							'name'     => 'title',
							'type'     => 'text',
						),
						array(
							'key'   => 'field_orbit_sup_feat_lead',
							'label' => 'Lead (22px)',
							'name'  => 'lead',
							'type'  => 'textarea',
							'rows'  => 2,
						),
						array(
							'key'   => 'field_orbit_sup_feat_body',
							'label' => 'Body',
							'name'  => 'body',
							'type'  => 'textarea',
							'rows'  => 4,
						),
					),
				),
				array(
					'key'           => 'field_orbit_sup_whisper_title',
					'label'         => 'Whisper title',
					'name'          => 'supervisor_whisper_title',
					'type'          => 'text',
					'default_value' => 'Whisper note to agents',
				),
				array(
					'key'           => 'field_orbit_sup_whisper_note',
					'label'         => 'Whisper note',
					'name'          => 'supervisor_whisper_note',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Offer a discount option to them.',
				),
				array(
					'key'           => 'field_orbit_sup_live',
					'label'         => 'Live label',
					'name'          => 'supervisor_live_label',
					'type'          => 'text',
					'default_value' => 'LIVE',
				),
				array(
					'key'           => 'field_orbit_sup_name',
					'label'         => 'Supervisor label',
					'name'          => 'supervisor_name',
					'type'          => 'text',
					'default_value' => 'Supervisor',
				),
				array(
					'key'           => 'field_orbit_sup_status',
					'label'         => 'Supervisor status',
					'name'          => 'supervisor_status',
					'type'          => 'text',
					'default_value' => 'Watching 4 sessions',
				),
				array(
					'key'           => 'field_orbit_sup_photo',
					'label'         => 'Supervisor photo',
					'name'          => 'supervisor_photo',
					'type'          => 'image',
					'return_format' => 'id',
					'mime_types'    => 'jpg,jpeg,png,webp',
				),
				array(
					'key'          => 'field_orbit_sup_sessions',
					'label'        => 'Sessions',
					'name'         => 'supervisor_sessions',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add session',
					'min'          => 1,
					'max'          => 4,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_sup_sess_kind',
							'label'         => 'Kind',
							'name'          => 'kind',
							'type'          => 'select',
							'choices'       => array(
								'human' => 'Human agent',
								'ai'    => 'AI agent',
							),
							'default_value' => 'human',
						),
						array(
							'key'      => 'field_orbit_sup_sess_name',
							'label'    => 'Name',
							'name'     => 'name',
							'type'     => 'text',
						),
						array(
							'key'  => 'field_orbit_sup_sess_role',
							'label' => 'Role',
							'name'  => 'role',
							'type'  => 'text',
						),
						array(
							'key'  => 'field_orbit_sup_sess_quote',
							'label' => 'Quote',
							'name'  => 'quote',
							'type'  => 'textarea',
							'rows'  => 2,
						),
						array(
							'key'           => 'field_orbit_sup_sess_photo',
							'label'         => 'Photo (human agents)',
							'name'          => 'photo',
							'type'          => 'image',
							'return_format' => 'id',
							'mime_types'    => 'jpg,jpeg,png,webp',
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
