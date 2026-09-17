<?php
/**
 * ACF field group: Theme Settings (site-wide).
 * Figma: node 1:81 (header), node 1:5947 (footer).
 *
 * Registered on a real ACF Options Page, same pattern as Snap / Lucibook —
 * nav items and footer columns are real Repeaters so editors can add /
 * remove / reorder rows without touching code.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ORBIT_THEME_SETTINGS_PAGE_ID' ) ) {
	define( 'ORBIT_THEME_SETTINGS_PAGE_ID', 'option' );
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Theme Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'orbit-theme-settings',
			'capability' => 'manage_options',
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 59,
			'redirect'   => false,
		)
	);
}

add_action( 'acf/init', 'orbit_register_theme_settings_field_group' );

function orbit_register_theme_settings_field_group() {
	$nav_item_subfields = array(
		array(
			'key'   => 'field_orbit_nav_item_label',
			'label' => 'Label',
			'name'  => 'label',
			'type'  => 'text',
		),
		array(
			'key'          => 'field_orbit_nav_item_url',
			'label'        => 'URL',
			'name'         => 'url',
			'type'         => 'text',
			'instructions' => 'Full URL or a same-page anchor like /#channels.',
		),
	);

	acf_add_local_field_group(
		array(
			'key'    => 'group_orbit_theme_settings',
			'title'  => 'Theme Settings',
			'fields' => array(

				array(
					'key'   => 'field_orbit_ts_tab_general',
					'label' => 'General / Logo',
					'type'  => 'tab',
				),
				array(
					'key'           => 'field_orbit_ts_site_logo',
					'label'         => 'Site Logo',
					'name'          => 'theme_site_logo',
					'type'          => 'image',
					'instructions'  => 'The Orbit mark + wordmark used in the header and footer. Falls back to Appearance → Customize → Site Identity if left blank.',
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_orbit_ts_favicon',
					'label'         => 'Favicon',
					'name'          => 'theme_favicon',
					'type'          => 'image',
					'instructions'  => 'Saving this also updates the site icon WordPress itself uses to generate favicon tags.',
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_orbit_ts_site_tagline',
					'label'         => 'Site Tagline',
					'name'          => 'theme_site_tagline',
					'type'          => 'textarea',
					'rows'          => 3,
					'instructions'  => 'Used in the footer — one shared field, not duplicated per location.',
					'default_value' => "Devotel's unified omnichannel CPaaS/CCaaS platform. UCaaS, voice, messaging, and video on a single runtime. Every channel native. Anthropic's Claude on every agent: Opus, Sonnet, and Haiku.",
				),

				array(
					'key'   => 'field_orbit_ts_tab_header',
					'label' => 'Header',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_orbit_ts_nav_items',
					'label'        => 'Nav Items',
					'name'         => 'theme_nav_items',
					'type'         => 'repeater',
					'instructions' => 'Primary header nav links. Add, remove, or reorder rows to update the menu without touching code.',
					'layout'       => 'table',
					'button_label' => 'Add Nav Item',
					'sub_fields'   => $nav_item_subfields,
				),
				array(
					'key'           => 'field_orbit_ts_signin_label',
					'label'         => '"Sign in" — Label',
					'name'          => 'theme_signin_label',
					'type'          => 'text',
					'default_value' => 'Sign in',
				),
				array(
					'key'           => 'field_orbit_ts_signin_url',
					'label'         => '"Sign in" — URL',
					'name'          => 'theme_signin_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'           => 'field_orbit_ts_header_cta_label',
					'label'         => 'Header CTA Button — Label',
					'name'          => 'theme_header_cta_label',
					'type'          => 'text',
					'default_value' => 'Get started',
				),
				array(
					'key'           => 'field_orbit_ts_header_cta_url',
					'label'         => 'Header CTA Button — URL',
					'name'          => 'theme_header_cta_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
				array(
					'key'           => 'field_orbit_ts_sticky_header',
					'label'         => 'Sticky Header',
					'name'          => 'theme_sticky_header_enabled',
					'type'          => 'true_false',
					'instructions'  => 'Keep the header pinned to the top of the viewport on scroll.',
					'default_value' => 1,
					'ui'            => 1,
				),

				array(
					'key'   => 'field_orbit_ts_tab_footer',
					'label' => 'Footer',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_orbit_footer_columns',
					'label'        => 'Footer Columns',
					'name'         => 'footer_columns',
					'type'         => 'repeater',
					'instructions' => 'Footer grid columns (desktop: a wide brand column + 4 link columns). Each column can hold more than one heading/link-list group, stacked top to bottom — e.g. "Platform" then "Products" then "Channels" inside one column.',
					'layout'       => 'block',
					'button_label' => 'Add Column',
					'sub_fields'   => array(
						array(
							'key'          => 'field_orbit_footer_col_groups',
							'label'        => 'Groups in this column',
							'name'         => 'groups',
							'type'         => 'repeater',
							'layout'       => 'block',
							'button_label' => 'Add Group',
							'sub_fields'   => array(
								array(
									'key'   => 'field_orbit_footer_col_heading',
									'label' => 'Group Heading',
									'name'  => 'heading',
									'type'  => 'text',
								),
								array(
									'key'          => 'field_orbit_footer_col_links',
									'label'        => 'Links',
									'name'         => 'links',
									'type'         => 'repeater',
									'layout'       => 'table',
									'button_label' => 'Add Link',
									'sub_fields'   => array(
										array(
											'key'   => 'field_orbit_footer_col_link',
											'label' => 'Link',
											'name'  => 'link',
											'type'  => 'link',
										),
									),
								),
							),
						),
					),
				),
				array(
					'key'          => 'field_orbit_footer_legal_links',
					'label'        => 'Legal links row',
					'name'         => 'footer_legal_links',
					'type'         => 'repeater',
					'instructions' => 'The small link row above the copyright line (Privacy, Terms, DPA, …).',
					'layout'       => 'table',
					'button_label' => 'Add Legal Link',
					'sub_fields'   => array(
						array(
							'key'   => 'field_orbit_footer_legal_link',
							'label' => 'Link',
							'name'  => 'link',
							'type'  => 'link',
						),
					),
				),
				array(
					'key'           => 'field_orbit_footer_rights_text',
					'label'         => 'Copyright line',
					'name'          => 'footer_rights_text',
					'type'          => 'text',
					'default_value' => '© 2026 Devotel UK LTD · Company No. 15550931 · Registered in England & Wales',
				),
				array(
					'key'           => 'field_orbit_footer_address_text',
					'label'         => 'Address line',
					'name'          => 'footer_address_text',
					'type'          => 'text',
					'default_value' => 'Suite 7 Innovation House, Molly Millars Close, Wokingham, Berkshire, RG41 2RX',
				),
				array(
					'key'           => 'field_orbit_footer_domain_label',
					'label'         => 'Domain link — label',
					'name'          => 'footer_domain_label',
					'type'          => 'text',
					'default_value' => 'orbit.devotel.io',
				),
				array(
					'key'           => 'field_orbit_footer_domain_url',
					'label'         => 'Domain link — URL',
					'name'          => 'footer_domain_url',
					'type'          => 'text',
					'default_value' => 'https://orbit.devotel.io/en/login',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'orbit-theme-settings',
					),
				),
			),
		)
	);
}

/**
 * Seed default nav rows the first time Theme Settings is empty,
 * so the header matches Figma without a manual first-save in wp-admin.
 */
add_filter( 'acf/load_value/name=theme_nav_items', 'orbit_default_nav_items', 10, 3 );

function orbit_default_nav_items( $value, $post_id, $field ) {
	if ( ! empty( $value ) ) {
		return $value;
	}

	if ( (string) $post_id !== (string) ORBIT_THEME_SETTINGS_PAGE_ID && 'option' !== $post_id && 'options' !== $post_id ) {
		return $value;
	}

	return array(
		array(
			'label' => 'Why Orbit',
			'url'   => '/#why-orbit',
		),
		array(
			'label' => 'Channels',
			'url'   => '/#channels',
		),
		array(
			'label' => 'Architecture',
			'url'   => '/#architecture',
		),
		array(
			'label' => 'Voice',
			'url'   => '/#voice',
		),
		array(
			'label' => 'Compliance',
			'url'   => '/#compliance',
		),
		array(
			'label' => 'Pricing',
			'url'   => '/#pricing',
		),
		array(
			'label' => 'Changelog',
			'url'   => 'https://orbit.devotel.io/en/changelog',
		),
	);
}

/**
 * Seed default footer columns the first time Theme Settings is empty —
 * mirrors the live product footer at orbit.devotel.io: a 328px brand
 * column plus 4 link columns, each column stacking 1–3 heading/link
 * groups (e.g. column 2 is "Platform" then "Products" then "Channels").
 */
add_filter( 'acf/load_value/name=footer_columns', 'orbit_default_footer_columns', 10, 3 );

function orbit_default_footer_columns( $value, $post_id, $field ) {
	if ( ! empty( $value ) ) {
		return $value;
	}

	if ( (string) $post_id !== (string) ORBIT_THEME_SETTINGS_PAGE_ID && 'option' !== $post_id && 'options' !== $post_id ) {
		return $value;
	}

	$base = 'https://orbit.devotel.io';

	$link = static function ( $title, $url ) {
		return array(
			'link' => array(
				'title'  => $title,
				'url'    => $url,
				'target' => '',
			),
		);
	};

	$group = static function ( $heading, $links ) {
		return array(
			'heading' => $heading,
			'links'   => $links,
		);
	};

	return array(
		array(
			'groups' => array(
				$group(
					'Platform',
					array(
						$link( 'All features', $base . '/en/features' ),
						$link( 'CPaaS overview', $base . '/en/features/cpaas' ),
						$link( 'Contact center (CCaaS)', $base . '/en/features/ccaas' ),
						$link( 'Cloud phone system (UCaaS)', $base . '/en/features/ucaas' ),
						$link( 'Omnichannel messaging', $base . '/en/features/messaging' ),
						$link( 'Real-time communications', $base . '/en/features/rtc-paas' ),
					)
				),
				$group(
					'Products',
					array(
						$link( 'AI voice agents', $base . '/en/features/aiaas' ),
						$link( 'Connectivity (NaaS)', $base . '/en/features/naas' ),
						$link( 'White-label & reseller (CSPaaS)', $base . '/en/features/cspaas' ),
						$link( 'Customer experience (CXaaS)', $base . '/en/features/cxaas' ),
						$link( 'Customer data platform', $base . '/en/features/cdpaas' ),
					)
				),
				$group(
					'Channels',
					array(
						$link( 'RCS messaging', $base . '/en#channels' ),
						$link( 'Video', $base . '/en#speech-stack' ),
						$link( 'Campaigns & journeys', $base . '/en#journeys-automation' ),
					)
				),
			),
		),
		array(
			'groups' => array(
				$group(
					'Developers',
					array(
						$link( 'Docs', 'https://docs.orbit.devotel.io' ),
						$link( 'API reference', 'https://docs.orbit.devotel.io/api-reference/overview' ),
						$link( 'SDKs', 'https://docs.orbit.devotel.io/sdks/node' ),
						$link( 'MCP server', 'https://docs.orbit.devotel.io/guides/mcp-claude-cursor' ),
						$link( 'Webhooks', 'https://docs.orbit.devotel.io/webhooks' ),
						$link( 'Status', 'https://status.orbit.devotel.io' ),
					)
				),
				$group(
					'Channel APIs',
					array(
						$link( 'SMS API', $base . '/en/sms-api' ),
						$link( 'WhatsApp Business API', $base . '/en/whatsapp-business-api' ),
						$link( 'Voice API', $base . '/en/programmable-voice' ),
						$link( 'Email API', $base . '/en/email-api' ),
						$link( 'RCS API', $base . '/en/rcs-api' ),
						$link( 'Video API', $base . '/en/video-api' ),
						$link( 'Benchmarks', $base . '/en/benchmarks/latency' ),
					)
				),
			),
		),
		array(
			'groups' => array(
				$group(
					'Trust',
					array(
						$link( 'Security', $base . '/en/security' ),
						$link( 'Compliance', $base . '/en/trust' ),
						$link( 'Data residency', $base . '/en/subprocessors' ),
						$link( 'SOC 2 & GDPR', $base . '/en/security' ),
					)
				),
			),
		),
		array(
			'groups' => array(
				$group(
					'Company',
					array(
						$link( 'Pricing', $base . '/en/pricing' ),
						$link( 'Resources', $base . '/en/resources' ),
						$link( 'Glossary', $base . '/en/glossary' ),
						$link( 'Changelog', $base . '/en/changelog' ),
						$link( 'Contact', $base . '/en/contact' ),
						$link( 'About', $base . '/en/about' ),
					)
				),
				$group(
					'Compare',
					array(
						$link( 'vs Twilio', $base . '/en/compare/twilio' ),
						$link( 'vs Telnyx', $base . '/en/compare/telnyx' ),
						$link( 'vs Vonage', $base . '/en/compare/vonage' ),
						$link( 'Journeys & automation', $base . '/en/compare/journeys' ),
					)
				),
				$group(
					'Help',
					array(
						$link( 'FAQ', $base . '/en/faq' ),
					)
				),
			),
		),
	);
}

/**
 * Seed the default legal-links row (Privacy, Terms, …) the same way as
 * the other footer defaults above.
 */
add_filter( 'acf/load_value/name=footer_legal_links', 'orbit_default_footer_legal_links', 10, 3 );

function orbit_default_footer_legal_links( $value, $post_id, $field ) {
	if ( ! empty( $value ) ) {
		return $value;
	}

	if ( (string) $post_id !== (string) ORBIT_THEME_SETTINGS_PAGE_ID && 'option' !== $post_id && 'options' !== $post_id ) {
		return $value;
	}

	$base = 'https://orbit.devotel.io';

	$link = static function ( $title, $url ) {
		return array(
			'link' => array(
				'title'  => $title,
				'url'    => $url,
				'target' => '',
			),
		);
	};

	return array(
		$link( 'Privacy', $base . '/en/legal/privacy' ),
		$link( 'Terms', $base . '/en/legal/terms' ),
		$link( 'DPA', $base . '/en/legal/dpa' ),
		$link( 'Cookies', $base . '/en/legal/cookie-policy' ),
		$link( 'SLA', $base . '/en/legal/sla' ),
		$link( 'Acceptable Use', $base . '/en/legal/aup' ),
		$link( 'Do Not Sell or Share', $base . '/en/privacy/do-not-sell' ),
	);
}
