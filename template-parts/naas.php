<?php
/**
 * Template part: NaaS — "Connect your devices with eSIM and IoT data plans".
 * Figma: 607:12137 ("NaaS — Network connectivity"), 1440 × 1257.
 * Dark section: header + CTAs, a network diagram (5 channel inputs →
 * agent workspace mock → 4 outcome nodes), and a 5-column feature grid.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'naas_eyebrow' );
$headline = get_field( 'naas_headline' );
$body     = get_field( 'naas_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Network connectivity';
}
if ( ! $headline ) {
	$headline = 'Connect your devices with eSIM and IoT data plans';
}
if ( ! $body ) {
	$body = "Orbit's Number-as-a-Service reaches past phone numbers into cellular data. Browse eSIM and IoT data plans, provision SIMs over the air without a card to swap by hand, and track usage across a whole fleet — from the same platform that runs your voice and messaging. Every plan carries data only, never voice or text.";
}

$sales_label = get_field( 'naas_cta_sales_label' );
$sales_url   = get_field( 'naas_cta_sales_url' );
$build_label = get_field( 'naas_cta_build_label' );
$build_url   = get_field( 'naas_cta_build_url' );

if ( ! $sales_label ) {
	$sales_label = 'Talk to Sales';
}
if ( ! $build_label ) {
	$build_label = 'Start Building';
}

$columns_field = array_values(
	array_filter(
		(array) get_field( 'naas_columns' ),
		function ( $column ) {
			return ! empty( $column['title'] );
		}
	)
);

$columns = array(
	array(
		'title' => 'eSIM & IoT data plans',
		'body'  => 'Browse a catalog of eSIM and IoT (M2M) data plans and filter it by SIM form factor or by the country a device runs in. Each plan spells out its metering — pay-as-you-go usage or pooled data.',
	),
	array(
		'title' => 'Provision without swapping a SIM',
		'body'  => 'Order a SIM against a plan and push an eSIM profile over the air with a GSMA activation code. Activate, suspend, resume, or terminate any SIM through its full lifecycle from one place.',
	),
	array(
		'title' => 'Fleet usage & data quotas',
		'body'  => 'Track data sessions on every SIM, set a per-SIM data limit, and read a fleet-wide rollup so a deployment of sensors, trackers, or terminals stays inside budget as it scales.',
	),
	array(
		'title' => 'Coverage & cost, up front',
		'body'  => 'Check whether a plan covers a country before you commit a device to it, and estimate the cost of a given amount of data — per-megabyte rate plus any monthly platform fee.',
	),
	array(
		'title' => 'Quality-on-Demand & network slicing',
		'body'  => 'Request an on-demand low-latency or high-throughput session for a single device, or book a slice that reserves guaranteed capacity for a whole fleet across a time window and service area.',
	),
);

foreach ( $columns as $index => &$column ) {
	if ( isset( $columns_field[ $index ]['title'] ) && $columns_field[ $index ]['title'] ) {
		$column['title'] = $columns_field[ $index ]['title'];
	}
	if ( isset( $columns_field[ $index ]['body'] ) && $columns_field[ $index ]['body'] ) {
		$column['body'] = $columns_field[ $index ]['body'];
	}
}
unset( $column );

$naas_img_uri = get_template_directory_uri() . '/assets/img/naas/';

// Input channel chips — fixed structural data (position, color, icon are design constants).
$inputs = array(
	array(
		'slot'  => 'chat',
		'top'   => 125.25,
		'wire'  => 'wire-in-0.svg',
		'wtop'  => 157,
		'inner' => '<span class="naas-well naas-well--sms" aria-hidden="true"><svg viewBox="0 0 38.952 38.952" width="38.952" height="38.952" aria-hidden="true"><rect width="38.952" height="38.952" rx="10" fill="url(#naasSmsGrad)"/><g transform="translate(7.033 8.386)"><path d="M12.4429 0C9.14287 0 5.97798 1.08689 3.64448 3.02152C1.31098 4.95615 0 7.58008 0 10.3161C0.003 12.0957 0.561255 13.8444 1.62049 15.3922C2.67972 16.9401 4.20392 18.2344 6.04495 19.1495C5.55461 20.2421 4.81921 21.2668 3.8692 22.1809C5.7115 21.859 7.44091 21.1827 8.92281 20.2048C10.0654 20.4863 11.2509 20.6302 12.4429 20.6321C15.743 20.6321 18.9079 19.5452 21.2414 17.6106C23.5749 15.676 24.8859 13.052 24.8859 10.3161C24.8859 7.58008 23.5749 4.95615 21.2414 3.02152C18.9079 1.08689 15.743 0 12.4429 0Z" fill="white"/></g><defs><linearGradient id="naasSmsGrad" x1="0" y1="38.952" x2="0" y2="0"><stop offset="0.0664" stop-color="#0CBD2A"/><stop offset="0.8759" stop-color="#5BF675"/></linearGradient></defs></svg></span>',
	),
	array(
		'slot'  => 'email',
		'top'   => 202.21,
		'wire'  => 'wire-in-1.svg',
		'wtop'  => 234,
		'inner' => '<span class="naas-well naas-well--email" aria-hidden="true"><svg viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="4.518" fill="#325FEC"/><g transform="translate(4.578 6.329)"><path d="M1.07042 0.0000485C0.693438 0.0000485 0.36416 0.169504 0.173582 0.425147L6.04377 5.54822C6.25997 5.7369 6.58435 5.7369 6.80054 5.54822L12.6707 0.425147C12.4802 0.169504 12.1509 0.0000485 11.7739 0.0000485H1.07042ZM0.0000687 1.59462V8.40715C0.0000687 8.92465 0.477444 9.34127 1.07042 9.34127H11.7739C12.3669 9.34127 12.8442 8.92465 12.8442 8.40715V1.59462L7.55731 6.20868C6.93491 6.75186 5.9094 6.75186 5.287 6.20868L0.0000687 1.59462Z" fill="white"/></g></svg></span>',
	),
	array(
		'slot'  => 'whatsapp',
		'top'   => 279.17,
		'wire'  => 'wire-in-2.svg',
		'wtop'  => 310,
		'inner' => '<span class="naas-well naas-well--whatsapp" aria-hidden="true"><img src="' . esc_url( $naas_img_uri . 'icon-whatsapp-naas.svg' ) . '" width="39" height="39" alt=""></span>',
	),
	array(
		'slot'  => 'slack',
		'top'   => 356.13,
		'wire'  => 'wire-in-3.svg',
		'wtop'  => 310,
		'inner' => '<span class="naas-well naas-well--slack" aria-hidden="true"><img src="' . esc_url( $naas_img_uri . 'icon-slack-glyph.svg' ) . '" width="26" height="26" alt=""></span>',
	),
	array(
		'slot'  => 'instagram',
		'top'   => 433.09,
		'wire'  => 'wire-in-4.svg',
		'wtop'  => 310,
		'inner' => '<span class="naas-well naas-well--instagram" aria-hidden="true"><img src="' . esc_url( $naas_img_uri . 'icon-instagram.svg' ) . '" width="48" height="48" alt=""></span>',
	),
);

// Output outcome nodes — fixed structural data.
$outputs = array(
	array(
		'slot' => 'resolved',
		'top'  => 148.48,
		'wire' => 'wire-out-0.svg',
		'wtop' => 180,
		'icon' => '<svg viewBox="0 0 25 25" fill="none" stroke="#4ADE80" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.5712 6.17188L9.25702 17.486L4.11423 12.3432"/></svg>',
	),
	array(
		'slot' => 'summary',
		'top'  => 235.61,
		'wire' => 'wire-out-1.svg',
		'wtop' => 268,
		'icon' => '<svg viewBox="0 0 25 25" fill="none" stroke="#E6E8EC" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15.4284 2.05664H6.17141C5.62582 2.05664 5.10259 2.27337 4.7168 2.65916C4.33102 3.04494 4.11429 3.56818 4.11429 4.11376V20.5707C4.11429 21.1163 4.33102 21.6395 4.7168 22.0253C5.10259 22.4111 5.62582 22.6278 6.17141 22.6278H18.5141C19.0597 22.6278 19.5829 22.4111 19.9687 22.0253C20.3545 21.6395 20.5712 21.1163 20.5712 20.5707V7.19944L15.4284 2.05664Z"/><path d="M14.3997 2.05664V7.19944H19.5425"/><path d="M9.25702 13.3711H15.4284M9.25702 17.4853H13.3713"/></svg>',
	),
	array(
		'slot' => 'disposition',
		'top'  => 322.73,
		'wire' => 'wire-out-2.svg',
		'wtop' => 310,
		'icon' => '<svg viewBox="0 0 25 25" fill="none" stroke="#E6E8EC" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.1883 13.783L13.7827 21.1886C13.3982 21.5655 12.8812 21.7766 12.3427 21.7766C11.8043 21.7766 11.2873 21.5655 10.9027 21.1886L3.4971 13.783C3.1839 13.3717 3.03702 12.8576 3.08568 12.343V4.62878C3.08568 4.21959 3.24822 3.82716 3.53756 3.53782C3.8269 3.24849 4.21933 3.08594 4.62851 3.08594H12.3427C12.8853 3.09367 13.4029 3.31548 13.7827 3.70307L21.1883 11.1087C21.507 11.4813 21.6822 11.9555 21.6822 12.4458C21.6822 12.9361 21.507 13.4103 21.1883 13.783Z"/><path d="M7.71412 9.15536C8.5094 9.15536 9.1541 8.51065 9.1541 7.71537C9.1541 6.92009 8.5094 6.27539 7.71412 6.27539C6.91884 6.27539 6.27414 6.92009 6.27414 7.71537C6.27414 8.51065 6.91884 9.15536 7.71412 9.15536Z"/></svg>',
	),
	array(
		'slot' => 'analytics',
		'top'  => 409.86,
		'wire' => 'wire-out-3.svg',
		'wtop' => 310,
		'icon' => '<svg viewBox="0 0 30 30" fill="white" aria-hidden="true"><path d="M29.0417 28.0723H0V29.0403H29.0417V28.0723Z"/><path d="M1.93612 27.1044H6.77639C7.0437 27.1044 7.26042 26.8877 7.26042 26.6204V17.9079C7.26042 17.6406 7.0437 17.4238 6.77639 17.4238H1.93612C1.66881 17.4238 1.45209 17.6406 1.45209 17.9079V26.6204C1.45209 26.8877 1.66881 27.1044 1.93612 27.1044ZM2.42014 18.3919H6.29236V26.1363H2.42014V18.3919Z"/><path d="M15.4889 27.1061H20.3292C20.5965 27.1061 20.8132 26.8894 20.8132 26.622V12.1012C20.8132 11.8339 20.5965 11.6172 20.3292 11.6172H15.4889C15.2216 11.6172 15.0049 11.8339 15.0049 12.1012V26.622C15.0049 26.8894 15.2216 27.1061 15.4889 27.1061ZM15.9729 12.5852H19.8451V26.138H15.9729V12.5852Z"/><path d="M8.71248 27.1058H13.5528C13.8201 27.1058 14.0368 26.8891 14.0368 26.6218V6.29262C14.0368 6.02532 13.8201 5.80859 13.5528 5.80859H8.71248C8.44518 5.80859 8.22845 6.02532 8.22845 6.29262V26.6218C8.22845 26.8891 8.44518 27.1058 8.71248 27.1058ZM9.19651 6.77665H13.0687V26.1378H9.19651V6.77665Z"/><path d="M22.2653 27.1056H27.1056C27.3729 27.1056 27.5896 26.8888 27.5896 26.6215V0.484028C27.5896 0.216723 27.3729 0 27.1056 0H22.2653C21.998 0 21.7812 0.216723 21.7812 0.484028V26.6215C21.7812 26.8888 21.998 27.1056 22.2653 27.1056ZM22.7493 0.968056H26.6215V26.1375H22.7493V0.968056Z"/></svg>',
	),
);
?>
<section class="naas" id="naas">
	<div class="naas__frame">
		<div class="naas__header">
			<p class="naas__eyebrow" data-animate="fade">
				<span class="naas__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<div class="naas__title-block">
				<h2 class="naas__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="naas__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
		</div>

		<div class="naas__ctas" data-animate="fade">
			<a class="naas-btn naas-btn--outline" href="<?php echo esc_url( orbit_cta_url( $sales_url, 'sales' ) ); ?>"><?php echo esc_html( $sales_label ); ?></a>
			<a class="naas-btn naas-btn--solid" href="<?php echo esc_url( orbit_cta_url( $build_url, 'signup' ) ); ?>"><?php echo esc_html( $build_label ); ?></a>
		</div>

		<div class="naas-diagram" data-animate="fade">
			<img class="naas-diagram__glow" src="<?php echo esc_url( $naas_img_uri . 'glow.svg' ); ?>" alt="" width="1234" height="944" style="left: 3px; top: -158px;">

			<svg class="naas-diagram__wires" viewBox="0 0 1240 521" fill="none" aria-hidden="true">
				<defs>
					<linearGradient id="naasWireIn" x1="145" y1="0" x2="356" y2="0" gradientUnits="userSpaceOnUse">
						<stop stop-color="#2269FF" stop-opacity="0"/>
						<stop offset="1" stop-color="#91C6FF"/>
					</linearGradient>
					<linearGradient id="naasWireOut" x1="885" y1="0" x2="1101" y2="0" gradientUnits="userSpaceOnUse">
						<stop stop-color="#2269FF" stop-opacity="0"/>
						<stop offset="1" stop-color="#91C6FF"/>
					</linearGradient>
				</defs>
				<?php foreach ( $inputs as $input ) : $y1 = $input['top'] + 31.95; ?>
					<path d="M145 <?php echo esc_attr( $y1 ); ?>C261 <?php echo esc_attr( $y1 ); ?> 239 310.5 356 310.5" stroke="url(#naasWireIn)" stroke-width="1.6" stroke-linecap="round"/>
					<circle cx="145" cy="<?php echo esc_attr( $y1 ); ?>" r="2.47" fill="#3D8BFF"/>
				<?php endforeach; ?>
				<path d="M352 306.5L357.5 310.5L352 314.5" stroke="#91C6FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>

				<?php foreach ( $outputs as $output ) : $y2 = $output['top'] + 31.95; ?>
					<path d="M885 310.5C1004 310.5 982 <?php echo esc_attr( $y2 ); ?> 1101 <?php echo esc_attr( $y2 ); ?>" stroke="url(#naasWireOut)" stroke-width="1.6" stroke-linecap="round"/>
					<path d="M1096.5 <?php echo esc_attr( $y2 - 4 ); ?>L1101.5 <?php echo esc_attr( $y2 ); ?>L1096.5 <?php echo esc_attr( $y2 + 4 ); ?>" stroke="#91C6FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
				<?php endforeach; ?>
				<circle cx="885" cy="310.5" r="2.47" fill="#3D8BFF"/>

				<path d="M621 132V172.44" stroke="#3D8BFF" stroke-width="1.3" stroke-dasharray="2 3" stroke-linecap="round"/>
				<circle cx="621" cy="152" r="2.47" fill="#3D8BFF"/>
			</svg>

			<?php foreach ( $inputs as $input ) : ?>
				<div class="naas-chip" style="top: <?php echo esc_attr( $input['top'] ); ?>px;">
					<?php echo $input['inner']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static markup ?>
				</div>
			<?php endforeach; ?>

			<img class="naas-mock naas-mock--workspace" src="<?php echo esc_url( $naas_img_uri . 'agent-workspace.svg' ); ?>" alt="" style="left: 323px; top: 129px; width: 595px; height: 363px;">
			<img class="naas-mock naas-mock--analytics" src="<?php echo esc_url( $naas_img_uri . 'analytics-panel.svg' ); ?>" alt="" style="left: 478px; top: 24px; width: 286px; height: 108px;">

			<?php foreach ( $outputs as $output ) : ?>
				<div class="naas-node" style="top: <?php echo esc_attr( $output['top'] ); ?>px;">
					<span class="naas-node__icon" aria-hidden="true"><?php echo $output['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="naas-columns">
			<?php foreach ( $columns as $index => $column ) : ?>
				<div class="naas-column" data-animate="fade">
					<p class="naas-column__num"><?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?></p>
					<span class="naas-column__tick" aria-hidden="true"></span>
					<h3 class="naas-column__title"><?php echo esc_html( $column['title'] ); ?></h3>
					<p class="naas-column__body"><?php echo esc_html( $column['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!--
	Mobile-only layout (<768px) — Figma 698:1898 ("NaaS — Network connectivity
	mobile"), a dedicated single-column adaptation: header + CTAs, a vertical
	diagram (5 input chips -> dashboard mock -> 4 output chips), and a 5-item
	numbered feature list with rule dividers. Reuses $columns/$inputs/$outputs.
	-->
	<div class="naas-mobile">
		<div class="naas-m__intro">
			<div class="naas-m__header">
				<p class="naas-m__eyebrow" data-animate="fade">
					<span class="naas-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="naas-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="naas-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
			<div class="naas-m__ctas" data-animate="fade">
				<a class="naas-btn naas-btn--outline" href="<?php echo esc_url( orbit_cta_url( $sales_url, 'sales' ) ); ?>"><?php echo esc_html( $sales_label ); ?></a>
				<a class="naas-btn naas-btn--solid" href="<?php echo esc_url( orbit_cta_url( $build_url, 'signup' ) ); ?>"><?php echo esc_html( $build_label ); ?></a>
			</div>
		</div>

		<div class="naas-m__diagram" data-animate="fade">
			<div class="naas-m__row naas-m__row--in">
				<?php foreach ( $inputs as $input ) : ?>
					<div class="naas-m-chip"><?php echo $input['inner']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<?php endforeach; ?>
			</div>

			<svg class="naas-m__wires naas-m__wires--in" viewBox="0 0 175.846 120.755" fill="none" aria-hidden="true">
				<path d="M175.387 0.458724C175.387 53.7197 88.4908 70.9006 88.4908 120.296" stroke="url(#naasMIn1)" stroke-width="0.917439" stroke-linecap="round"/>
				<path d="M131.655 0.458724C131.655 58.0149 88.4908 70.9006 88.4908 120.296" stroke="url(#naasMIn2)" stroke-width="0.917439" stroke-linecap="round"/>
				<path d="M87.9228 0.458723L88.4908 120.296" stroke="url(#naasMIn3)" stroke-width="0.917439" stroke-linecap="round"/>
				<path d="M44.1908 0.458722C44.1908 58.0149 88.4908 70.9007 88.4908 120.296" stroke="url(#naasMIn4)" stroke-width="0.917439" stroke-linecap="round"/>
				<path d="M0.917442 0.45872C0.917442 0.205376 0.712067 7.571e-09 0.458717 -3.50325e-09C0.205376 -1.45772e-08 1.1074e-08 0.205376 0 0.45872L0.458717 0.45872L0.917442 0.45872ZM88.1664 120.62C88.3455 120.799 88.636 120.799 88.8151 120.62L91.7344 117.701C91.9135 117.522 91.9135 117.231 91.7344 117.052C91.5553 116.873 91.2648 116.873 91.0857 117.052L88.4908 119.647L85.8958 117.052C85.7167 116.873 85.4263 116.873 85.2471 117.052C85.068 117.231 85.068 117.522 85.2471 117.701L88.1664 120.62ZM0.458717 0.45872L0 0.45872C-5.88144e-07 13.9139 5.56387 25.0747 13.8618 35.0008C22.1515 44.917 33.1955 53.6304 44.193 62.189C55.2082 70.7613 66.1729 79.1758 74.3912 88.5254C82.6014 97.8658 88.032 108.098 88.032 120.296L88.4908 120.296L88.9495 120.296C88.9495 107.796 83.3761 97.3575 75.0803 87.9197C66.7926 78.4911 55.7493 70.0199 44.7565 61.4649C33.7459 52.8962 22.782 44.2408 14.5657 34.4123C6.35757 24.5937 0.917442 13.634 0.917442 0.45872L0.458717 0.45872Z" fill="url(#naasMIn5)"/>
				<defs>
					<linearGradient id="naasMIn1" x1="88.14" y1="0.46" x2="88.14" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMIn2" x1="88.32" y1="0.46" x2="88.32" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMIn3" x1="87.92" y1="0.46" x2="87.92" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMIn4" x1="44.01" y1="0.46" x2="44.01" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMIn5" x1="0.11" y1="0.46" x2="0.11" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
				</defs>
			</svg>

			<div class="naas-m__mock">
				<img class="naas-m__glow" src="<?php echo esc_url( $naas_img_uri . 'glow.svg' ); ?>" alt="" width="1234" height="944">
				<img src="<?php echo esc_url( $naas_img_uri . 'agent-workspace.svg' ); ?>" alt="" class="naas-m__mock-img">
			</div>

			<svg class="naas-m__wires naas-m__wires--out" viewBox="0 0 155.559 120.755" fill="none" aria-hidden="true">
				<path d="M78.8059 0.45872C78.8059 0.205376 78.6005 2.36712e-09 78.3472 -8.7068e-09C78.0939 -1.97807e-08 77.8885 0.205376 77.8885 0.45872L78.3472 0.45872L78.8059 0.45872ZM151.856 120.62C152.035 120.799 152.326 120.799 152.505 120.62L155.424 117.701C155.603 117.522 155.603 117.231 155.424 117.052C155.245 116.873 154.955 116.873 154.775 117.052L152.181 119.647L149.586 117.052C149.406 116.873 149.116 116.873 148.937 117.052C148.758 117.231 148.758 117.522 148.937 117.701L151.856 120.62ZM78.3472 0.45872L77.8885 0.45872C77.8885 27.9548 96.5038 47.3089 114.946 65.0675C124.189 73.9678 133.385 82.4621 140.281 91.4131C147.17 100.356 151.722 109.705 151.722 120.296L152.181 120.296L152.639 120.296C152.639 109.423 147.962 99.8801 141.007 90.8532C134.059 81.8341 124.798 73.2806 115.582 64.4066C97.1073 46.6165 78.8059 27.5154 78.8059 0.45872L78.3472 0.45872Z" fill="url(#naasMOut1)"/>
				<path d="M78.8059 0.458722C78.8059 0.205378 78.6005 2.18704e-06 78.3472 2.17597e-06C78.0939 2.16489e-06 77.8885 0.205378 77.8885 0.458722L78.3472 0.458722L78.8059 0.458722ZM101.877 120.62C102.056 120.799 102.346 120.799 102.525 120.62L105.445 117.701C105.624 117.522 105.624 117.231 105.445 117.052C105.266 116.873 104.975 116.873 104.796 117.052L102.201 119.647L99.6061 117.052C99.427 116.873 99.1365 116.873 98.9574 117.052C98.7783 117.231 98.7783 117.522 98.9574 117.701L101.877 120.62ZM78.3472 0.458722L77.8885 0.458722C77.8885 27.8081 83.8699 48.2086 89.8379 66.5558C95.8092 84.9133 101.742 101.157 101.742 120.296L102.201 120.296L102.66 120.296C102.66 100.98 96.6659 84.581 90.7103 66.272C84.7514 47.9526 78.8059 27.6621 78.8059 0.458722L78.3472 0.458722Z" fill="url(#naasMOut2)"/>
				<path d="M78.8059 0.458723C78.8059 0.205379 78.6006 3.22972e-06 78.3472 3.21865e-06C78.0939 3.20758e-06 77.8885 0.205379 77.8885 0.458723L78.3472 0.458723L78.8059 0.458723ZM52.4652 120.62C52.6443 120.799 52.9348 120.799 53.1139 120.62L56.0332 117.701C56.2123 117.522 56.2123 117.231 56.0332 117.052C55.854 116.873 55.5636 116.873 55.3844 117.052L52.7895 119.647L50.1946 117.052C50.0155 116.873 49.725 116.873 49.5459 117.052C49.3668 117.231 49.3668 117.522 49.5459 117.701L52.4652 120.62ZM78.3472 0.458723L77.8885 0.458723C77.8885 27.6569 71.5197 47.9439 65.1352 66.2629C58.7549 84.57 52.3308 100.974 52.3308 120.296L52.7895 120.296L53.2482 120.296C53.2482 101.163 59.603 84.9243 66.0015 66.5649C72.3959 48.2173 78.8059 27.8133 78.8059 0.458723L78.3472 0.458723Z" fill="url(#naasMOut3)"/>
				<path d="M78.8059 0.458723C78.8059 0.205379 78.6006 3.22972e-06 78.3472 3.21865e-06C78.0939 3.20758e-06 77.8885 0.205379 77.8885 0.458723L78.3472 0.458723L78.8059 0.458723ZM3.05363 120.62C3.23276 120.799 3.52322 120.799 3.70235 120.62L6.62163 117.701C6.80077 117.522 6.80077 117.231 6.62163 117.052C6.44249 116.873 6.15205 116.873 5.9729 117.052L3.37799 119.647L0.783081 117.052C0.603943 116.873 0.313492 116.873 0.134354 117.052C-0.0447846 117.231 -0.0447847 117.522 0.134354 117.701L3.05363 120.62ZM78.3472 0.458723L77.8885 0.458723C77.8885 27.5126 59.3071 46.613 40.547 64.4042C31.1896 73.2783 21.7856 81.8315 14.7306 90.8505C7.66974 99.877 2.91927 109.421 2.91927 120.296L3.37799 120.296L3.83671 120.296C3.83671 109.707 8.4574 100.359 15.4532 91.4157C22.455 82.4647 31.7933 73.9702 41.1783 65.0699C59.9027 47.3124 78.8059 27.9576 78.8059 0.458723L78.3472 0.458723Z" fill="url(#naasMOut4)"/>
				<defs>
					<linearGradient id="naasMOut1" x1="78.05" y1="0.46" x2="78.05" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMOut2" x1="78.25" y1="0.46" x2="78.25" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMOut3" x1="52.69" y1="0.46" x2="52.69" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
					<linearGradient id="naasMOut4" x1="3.08" y1="0.46" x2="3.08" y2="120.3" gradientUnits="userSpaceOnUse"><stop stop-color="#2269FF" stop-opacity="0"/><stop offset="1" stop-color="#91C6FF"/></linearGradient>
				</defs>
			</svg>

			<div class="naas-m__row naas-m__row--out">
				<?php foreach ( $outputs as $output ) : ?>
					<div class="naas-m-node"><span class="naas-m-node__icon" aria-hidden="true"><?php echo $output['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="naas-m__features">
			<div class="naas-m-feature__rule"></div>
			<?php foreach ( $columns as $index => $column ) : ?>
				<div class="naas-m-feature" data-animate="fade">
					<div class="naas-m-feature__num-row">
						<p class="naas-m-feature__num"><?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?></p>
						<span class="naas-m-feature__tick" aria-hidden="true"></span>
					</div>
					<h3 class="naas-m-feature__title"><?php echo esc_html( $column['title'] ); ?></h3>
					<p class="naas-m-feature__body"><?php echo esc_html( $column['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
