<?php
/**
 * ACF field group: Voice stack.
 * Figma: diagram 1:6582 (575 × 651 at 132, 5599) + copy 48:116 (499 × 204 at 774, 5758).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_voice_stack_field_group' );

function orbit_register_voice_stack_field_group() {
	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_voice_stack',
			'title'  => 'Voice stack',
			'fields' => array(
				array(
					'key'           => 'field_orbit_vstack_headline',
					'label'         => 'Headline',
					'name'          => 'vstack_headline',
					'type'          => 'textarea',
					'rows'          => 2,
					'default_value' => 'We picked one stack per layer and committed to it.',
				),
				array(
					'key'           => 'field_orbit_vstack_body',
					'label'         => 'Body',
					'name'          => 'vstack_body',
					'type'          => 'textarea',
					'rows'          => 4,
					'default_value' => 'Deepgram for speech-to-text. Cartesia and ElevenLabs for text-to-speech. A self-hosted SFU running in the same region as the dashboard. Our own SIP bridge, our own egress recorder, our own RTCP XR ingest.',
				),
				array(
					'key'          => 'field_orbit_vstack_layers',
					'label'        => 'Layers',
					'name'         => 'vstack_layers',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add Layer',
					'min'          => 1,
					'sub_fields'   => array(
						array(
							'key'           => 'field_orbit_vstack_layer_icon',
							'label'         => 'Icon',
							'name'          => 'icon',
							'type'          => 'image',
							'return_format' => 'id',
							'mime_types'    => 'svg,png',
						),
						array(
							'key'      => 'field_orbit_vstack_layer_label',
							'label'    => 'Layer',
							'name'     => 'label',
							'type'     => 'text',
						),
						array(
							'key'      => 'field_orbit_vstack_layer_stack',
							'label'    => 'Stack',
							'name'     => 'stack',
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
