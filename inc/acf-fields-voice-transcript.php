<?php
/**
 * ACF field group: Voice transcript.
 * Figma: copy 48:122 (459 × 269 at 100, 5007) + visual 1:6678 (622 × 455 at 718, 4999).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_voice_transcript_field_group' );

function orbit_register_voice_transcript_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_voice_transcript',
			'title'  => 'Voice transcript',
			'fields' => array(
				array(
					'key'           => 'field_orbit_voice_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'voice_eyebrow',
					'type'          => 'text',
					'default_value' => 'Voice · the production layer',
				),
				array(
					'key'           => 'field_orbit_voice_headline',
					'label'         => 'Headline',
					'name'          => 'voice_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'Assembled stacks ship a demo. Not a product.',
				),
				array(
					'key'           => 'field_orbit_voice_body',
					'label'         => 'Body',
					'name'          => 'voice_body',
					'type'          => 'textarea',
					'rows'          => 5,
					'default_value' => 'Wire Vapi for the agent, Twilio for numbers, Aircall for the dialer, NICE for QM; pick the best API per micro‑task. The modular architecture lets you swap a component by rewriting a single integration. It works—until you ship.',
				),
				array(
					'key'           => 'field_orbit_voice_photo',
					'label'         => 'Photo',
					'name'          => 'voice_photo',
					'type'          => 'image',
					'return_format' => 'id',
					'mime_types'    => 'jpg,jpeg,png,webp',
				),
				array(
					'key'           => 'field_orbit_voice_transcript_title',
					'label'         => 'Transcript title',
					'name'          => 'voice_transcript_title',
					'type'          => 'text',
					'default_value' => 'Realtime Transcript',
				),
				array(
					'key'          => 'field_orbit_voice_transcript_lines',
					'label'        => 'Transcript lines',
					'name'         => 'voice_transcript_lines',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Line',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_voice_line_time',
							'label'         => 'Time',
							'name'          => 'time',
							'type'          => 'text',
							'default_value' => '02:14',
						),
						array(
							'key'      => 'field_orbit_voice_line_text',
							'label'    => 'Text',
							'name'     => 'text',
							'type'     => 'textarea',
							'rows'     => 3,
						),
					),
				),
				array(
					'key'           => 'field_orbit_voice_caller_avatar',
					'label'         => 'Caller avatar',
					'name'          => 'voice_caller_avatar',
					'type'          => 'image',
					'return_format' => 'id',
					'mime_types'    => 'jpg,jpeg,png,webp',
				),
				array(
					'key'           => 'field_orbit_voice_caller_name',
					'label'         => 'Caller name',
					'name'          => 'voice_caller_name',
					'type'          => 'text',
					'default_value' => 'Sarah Martinez',
				),
				array(
					'key'           => 'field_orbit_voice_caller_phone',
					'label'         => 'Caller phone',
					'name'          => 'voice_caller_phone',
					'type'          => 'text',
					'default_value' => '+1 (628) 555-0144',
				),
				array(
					'key'           => 'field_orbit_voice_caller_timer',
					'label'         => 'Call timer',
					'name'          => 'voice_caller_timer',
					'type'          => 'text',
					'default_value' => '03:13',
				),
				array(
					'key'           => 'field_orbit_voice_live_label',
					'label'         => 'Live label',
					'name'          => 'voice_live_label',
					'type'          => 'text',
					'default_value' => 'LIVE',
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
