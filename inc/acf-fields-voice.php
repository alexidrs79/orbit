<?php
/**
 * ACF field group: Voice — AI voice agents.
 * Figma: 607:11311, 1440 × 1097 at (0, 11053).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_voice_field_group' );

function orbit_register_voice_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_voice',
			'title'  => 'Voice — AI voice agents',
			'fields' => array(
				array(
					'key'           => 'field_orbit_voice_main_eyebrow',
					'label'         => 'Eyebrow',
					'name'          => 'voice_main_eyebrow',
					'type'          => 'text',
					'default_value' => 'Voice AI agents',
				),
				array(
					'key'           => 'field_orbit_voice_main_headline',
					'label'         => 'Headline',
					'name'          => 'voice_main_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'AI voice agents that answer, reason, and resolve in real time',
				),
				array(
					'key'           => 'field_orbit_voice_main_body',
					'label'         => 'Body',
					'name'          => 'voice_main_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Orbit runs production voice agents that target under 300 milliseconds per turn on the speech-to-speech path (about a second when a turn needs Claude\'s deeper reasoning), score their own call quality as they talk, and summarise every conversation the moment it ends — then hand the caller to a specialist without dropping the line.',
				),
				array(
					'key'           => 'field_orbit_voice_main_features',
					'label'         => 'Features',
					'name'          => 'voice_main_features',
					'type'          => 'repeater',
					'instructions'  => 'Feature cards displayed below the call panel visual.',
					'button_label'  => 'Add Feature',
					'min'           => 0,
					'max'           => 0,
					'layout'        => 'table',
					'sub_fields'    => array(
						array(
							'key'           => 'field_orbit_voice_feature_icon',
							'label'         => 'Icon',
							'name'          => 'feature_icon',
							'type'          => 'image',
							'required'      => 0,
							'return_format' => 'id',
						),
						array(
							'key'           => 'field_orbit_voice_feature_title',
							'label'         => 'Title',
							'name'          => 'feature_title',
							'type'          => 'text',
						),
						array(
							'key'           => 'field_orbit_voice_feature_body',
							'label'         => 'Body',
							'name'          => 'feature_body',
							'type'          => 'textarea',
							'rows'          => 3,
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
