<?php
/**
 * Core theme setup: supports, menus, assets, shared helpers.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function orbit_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 118,
			'height'      => 32,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'orbit_theme_setup' );

/**
 * This theme's folder slug matches Bitadot's "Orbit" on WordPress.org.
 * Never install that directory update — it would overwrite this theme.
 */
function orbit_block_wporg_theme_updates( $transient ) {
	if ( ! is_object( $transient ) || empty( $transient->response ) || ! is_array( $transient->response ) ) {
		return $transient;
	}

	$stylesheet = get_template();
	unset( $transient->response[ $stylesheet ] );

	return $transient;
}
add_filter( 'site_transient_update_themes', 'orbit_block_wporg_theme_updates' );

/**
 * Allow SVG uploads through the Media Library — needed for the vector
 * wordmark logo. Restricted to admins to keep the door narrow.
 */
function orbit_allow_svg_upload( $mimes ) {
	if ( ( defined( 'WP_CLI' ) && WP_CLI ) || current_user_can( 'manage_options' ) ) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}
add_filter( 'upload_mimes', 'orbit_allow_svg_upload' );

function orbit_fix_svg_mime_type( $data, $file, $filename, $mimes ) {
	if ( ! empty( $data['ext'] ) ) {
		return $data;
	}

	$filetype = wp_check_filetype( $filename, $mimes );
	if ( 'svg' === $filetype['ext'] ) {
		$data['ext']             = 'svg';
		$data['type']            = 'image/svg+xml';
		$data['proper_filename'] = $filename;
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'orbit_fix_svg_mime_type', 10, 4 );

function orbit_font_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' !== $relation_type ) {
		return $urls;
	}

	$urls[] = 'https://fonts.googleapis.com';
	$urls[] = array(
		'href'        => 'https://fonts.gstatic.com',
		'crossorigin' => 'anonymous',
	);

	return $urls;
}
add_filter( 'wp_resource_hints', 'orbit_font_resource_hints', 10, 2 );

/*
 * One-page landing: document prefetch starts same-URL "transitions" that
 * Chrome then skips (AbortError). No other pages to prefetch anyway.
 */
add_filter( 'wp_speculation_rules_configuration', '__return_null' );

function orbit_enqueue_assets() {
	wp_enqueue_style(
		'orbit-fonts',
		'https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Geist+Mono:wght@400&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'orbit-style', get_stylesheet_uri(), array( 'orbit-fonts' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

	$sticky_header_path = get_template_directory() . '/assets/js/sticky-header.js';
	wp_enqueue_script(
		'orbit-sticky-header',
		get_template_directory_uri() . '/assets/js/sticky-header.js',
		array(),
		file_exists( $sticky_header_path ) ? filemtime( $sticky_header_path ) : null,
		true
	);

	$mobile_menu_path = get_template_directory() . '/assets/js/mobile-menu.js';
	wp_enqueue_script(
		'orbit-mobile-menu',
		get_template_directory_uri() . '/assets/js/mobile-menu.js',
		array(),
		file_exists( $mobile_menu_path ) ? filemtime( $mobile_menu_path ) : null,
		true
	);

	$hero_tabs_path = get_template_directory() . '/assets/js/hero-tabs.js';
	wp_enqueue_script(
		'orbit-hero-tabs',
		get_template_directory_uri() . '/assets/js/hero-tabs.js',
		array(),
		file_exists( $hero_tabs_path ) ? filemtime( $hero_tabs_path ) : null,
		true
	);

	$supervisor_tabs_path = get_template_directory() . '/assets/js/supervisor-tabs.js';
	wp_enqueue_script(
		'orbit-supervisor-tabs',
		get_template_directory_uri() . '/assets/js/supervisor-tabs.js',
		array(),
		file_exists( $supervisor_tabs_path ) ? filemtime( $supervisor_tabs_path ) : null,
		true
	);

	$developers_tabs_path = get_template_directory() . '/assets/js/developers-tabs.js';
	wp_enqueue_script(
		'orbit-developers-tabs',
		get_template_directory_uri() . '/assets/js/developers-tabs.js',
		array(),
		file_exists( $developers_tabs_path ) ? filemtime( $developers_tabs_path ) : null,
		true
	);

	$motion_path = get_template_directory() . '/assets/js/orbit-motion.js';
	wp_enqueue_script(
		'orbit-motion',
		get_template_directory_uri() . '/assets/js/orbit-motion.js',
		array(),
		file_exists( $motion_path ) ? filemtime( $motion_path ) : null,
		true
	);

	$price_snap_path = get_template_directory() . '/assets/js/price-snap.js';
	wp_enqueue_script(
		'orbit-price-snap',
		get_template_directory_uri() . '/assets/js/price-snap.js',
		array(),
		file_exists( $price_snap_path ) ? filemtime( $price_snap_path ) : null,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'orbit_enqueue_assets' );

/**
 * Prints an attachment as an <img>, given a media-defaults constant name.
 * Prefer filename-stem constants — see orbit_get_attachment_id_by_filename().
 */
function orbit_print_icon( $constant_name, $class ) {
	if ( ! defined( $constant_name ) ) {
		return;
	}
	$value         = constant( $constant_name );
	$attachment_id = is_numeric( $value ) ? (int) $value : orbit_get_attachment_id_by_filename( $value );
	if ( ! $attachment_id ) {
		return;
	}
	echo wp_get_attachment_image(
		$attachment_id,
		'full',
		false,
		array(
			'class' => $class,
			'alt'   => '',
		)
	);
}

/**
 * Resolves a filename stem (no path, no extension — e.g. "orbit-logo")
 * to whatever attachment ID actually owns a matching file on THIS install.
 */
function orbit_get_attachment_id_by_filename( $filename_stem ) {
	static $cache = array();

	if ( isset( $cache[ $filename_stem ] ) ) {
		return $cache[ $filename_stem ];
	}

	global $wpdb;
	$attachment_id = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT post_id FROM {$wpdb->postmeta}
			WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s
			ORDER BY post_id DESC LIMIT 1",
			'%' . $wpdb->esc_like( $filename_stem ) . '%'
		)
	);

	$cache[ $filename_stem ] = $attachment_id ? (int) $attachment_id : 0;
	return $cache[ $filename_stem ];
}

if ( ! defined( 'ORBIT_CTA_LOGIN_URL' ) ) {
	define( 'ORBIT_CTA_LOGIN_URL', 'https://orbit.devotel.io/en/login' );
}
if ( ! defined( 'ORBIT_CTA_SIGNUP_URL' ) ) {
	define( 'ORBIT_CTA_SIGNUP_URL', 'https://orbit.devotel.io/en/signup' );
}
if ( ! defined( 'ORBIT_CTA_SALES_URL' ) ) {
	define( 'ORBIT_CTA_SALES_URL', 'https://orbit.devotel.io/en/contact' );
}
if ( ! defined( 'ORBIT_CTA_PRICING_URL' ) ) {
	define( 'ORBIT_CTA_PRICING_URL', 'https://orbit.devotel.io/en/pricing' );
}

/**
 * Resolves a plain-text URL value from a Theme Settings field into a real href.
 * Same-page anchors like "/#channels" get home_url() so they work from any page.
 */
function orbit_resolve_theme_url( $value ) {
	if ( empty( $value ) ) {
		return '#';
	}

	if ( '#' === $value || preg_match( '#^(https?:)?//#', $value ) ) {
		return $value;
	}

	return home_url( $value );
}

/**
 * Product URL for landing CTA buttons (header, hero, network, pricing, closing,
 * naas) — mirrors the matching button's real destination on orbit.devotel.io.
 *
 * @param string $value Unused ACF value — kept for call-site compatibility.
 * @param string $kind  Which real button this corresponds to: 'signup' (Start
 *                      Building / Get started), 'sales' (Talk to Sales),
 *                      'login' (Sign in), or 'pricing' (See full list).
 */
function orbit_cta_url( $value = '', $kind = 'signup' ) {
	switch ( $kind ) {
		case 'sales':
			return ORBIT_CTA_SALES_URL;
		case 'login':
			return ORBIT_CTA_LOGIN_URL;
		case 'pricing':
			return ORBIT_CTA_PRICING_URL;
		case 'signup':
		default:
			return ORBIT_CTA_SIGNUP_URL;
	}
}
