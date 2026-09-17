<?php
/**
 * ACF field group: Journeys — Journeys & automation.
 * Figma: 607:11611, 1440 × 769.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

add_action( 'acf/init', 'orbit_register_journeys_field_group' );

function orbit_register_journeys_field_group() {
	$fields = array(
		array(
			'key'           => 'field_orbit_journeys_eyebrow',
			'label'         => 'Eyebrow',
			'name'          => 'journeys_eyebrow',
			'type'          => 'text',
			'default_value' => 'JOURNEYS & AUTOMATION',
		),
		array(
			'key'           => 'field_orbit_journeys_headline',
			'label'         => 'Headline',
			'name'          => 'journeys_headline',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'Build customer journeys on a visual canvas that runs itself',
		),
		array(
			'key'           => 'field_orbit_journeys_body',
			'label'         => 'Body',
			'name'          => 'journeys_body',
			'type'          => 'textarea',
			'rows'          => 4,
			'default_value' => 'Drop nodes onto a canvas, connect them, and Orbit runs the whole flow — sending across email, SMS, WhatsApp, and voice, waiting, branching on what a contact does, and handing off to an AI agent or a person where the journey calls for it.',
		),
	);

	$node_labels = array(
		'Cart abandoned',
		'WhatsApp reminder',
		'Wait 24 hours',
		'Opened?',
		'SMS · 10% off',
		'AI agent · Answer',
	);

	foreach ( $node_labels as $index => $label ) {
		$slot     = $index + 1;
		$fields[] = array(
			'key'           => 'field_orbit_journeys_node_' . $slot,
			'label'         => 'Journey node ' . $slot . ' label',
			'name'          => 'journeys_node_' . $slot,
			'type'          => 'text',
			'instructions'  => 'Only the six fixed flow positions are rendered; longer labels widen their node.',
			'default_value' => $label,
		);
	}

	$callout_defaults = array(
		array(
			'title' => 'Drag-and-drop canvas',
			'body'  => 'Triggers, waits, branches, and handoffs in one view.',
		),
		array(
			'title' => 'Per-node analytics',
			'body'  => 'Track reach, delivery, and performance at each step.',
		),
		array(
			'title' => 'AI flow nodes',
			'body'  => 'Classify, respond, and branch using AI actions.',
		),
	);

	foreach ( $callout_defaults as $index => $callout ) {
		$slot     = $index + 1;
		$fields[] = array(
			'key'           => 'field_orbit_journeys_callout_' . $slot . '_title',
			'label'         => 'Feature callout ' . $slot . ' title',
			'name'          => 'journeys_callout_' . $slot . '_title',
			'type'          => 'text',
			'default_value' => $callout['title'],
		);
		$fields[] = array(
			'key'           => 'field_orbit_journeys_callout_' . $slot . '_body',
			'label'         => 'Feature callout ' . $slot . ' body',
			'name'          => 'journeys_callout_' . $slot . '_body',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => $callout['body'],
		);
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_orbit_journeys',
			'title'    => 'Journeys — Journeys & automation',
			'fields'   => $fields,
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
