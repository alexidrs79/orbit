<?php
/**
 * Template part: CCaaS — "Run your contact center in one agent workspace".
 * Figma: 607:11970 ("CCaaS — Light (1440)"), 1440 × 1189.
 * Light section: header + hero illustration, a 3-lane conversation flow
 * board (customer/agent/supervisor), and a 4-column feature grid.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'ccaas_eyebrow' );
$headline = get_field( 'ccaas_headline' );
$body     = get_field( 'ccaas_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Contact center';
}
if ( ! $headline ) {
	$headline = 'Run your contact center in one agent workspace';
}
if ( ! $body ) {
	$body = 'Orbit gives every agent one screen for every channel — chat, email, and messaging — routes each conversation to the right skills, and closes it with a clear outcome. Supervisors watch the floor live and step in the moment an agent needs backup.';
}

$hero_photo_id = (int) get_field( 'ccaas_hero_photo' );
if ( ! $hero_photo_id ) {
	$hero_photo_id = orbit_get_attachment_id_by_filename( ORBIT_CCAAS_HERO_PHOTO_ID );
}

$avatar_id = (int) get_field( 'ccaas_avatar' );
if ( ! $avatar_id ) {
	$avatar_id = orbit_get_attachment_id_by_filename( ORBIT_CCAAS_AVATAR_ID );
}

$events_field = array_values(
	array_filter(
		(array) get_field( 'ccaas_events' ),
		function ( $event ) {
			return ! empty( $event['title'] );
		}
	)
);

// Fixed structural data per event slot — position, color and icon are design
// constants from the Figma flow board; only title/body are ACF-editable.
$event_slots = array(
	array(
		'slot'  => 'arrival',
		'color' => 'blue',
		'title' => 'Arrives on WhatsApp · 10:02',
		'body'  => 'Same thread already holds her email from Tuesday',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.125 11.0208C20.1283 12.2857 19.8328 13.5335 19.2625 14.6625C18.5863 16.0154 17.5468 17.1534 16.2605 17.9489C14.9741 18.7444 13.4916 19.1661 11.9792 19.1667C10.7143 19.17 9.46653 18.8744 8.3375 18.3042L2.875 20.125L4.69583 14.6625C4.12556 13.5335 3.83004 12.2857 3.83333 11.0208C3.83392 9.50835 4.25559 8.0259 5.05111 6.73953C5.84663 5.45316 6.98458 4.41367 8.3375 3.7375C9.46653 3.16723 10.7143 2.8717 11.9792 2.875H12.4583C14.4558 2.9852 16.3425 3.82831 17.7571 5.24291C19.1717 6.6575 20.0148 8.54417 20.125 10.5417V11.0208Z"/></svg>',
		'pos'   => array(
			'node' => array( 'left' => 249, 'top' => 51 ),
			'text' => array( 'left' => 315, 'top' => 49, 'width' => 250 ),
		),
	),
	array(
		'slot'  => 'assigned',
		'color' => 'blue',
		'title' => 'Assigned to Dana K.',
		'body'  => 'Billing · Spanish · Tier 2 matched · SLA 2:00',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11.5 10.925C13.2995 10.925 14.7583 9.46619 14.7583 7.66667C14.7583 5.86714 13.2995 4.40833 11.5 4.40833C9.70047 4.40833 8.24167 5.86714 8.24167 7.66667C8.24167 9.46619 9.70047 10.925 11.5 10.925Z"/><path d="M5.27083 19.1667C5.27083 17.5146 5.92712 15.9302 7.09531 14.762C8.26351 13.5938 9.84792 12.9375 11.5 12.9375C13.1521 12.9375 14.7365 13.5938 15.9047 14.762C17.0729 15.9302 17.7292 17.5146 17.7292 19.1667"/></svg>',
		'pos'   => array(
			'node' => array( 'left' => 329, 'top' => 201 ),
			'text' => array( 'left' => 396, 'top' => 199, 'width' => 240 ),
		),
	),
	array(
		'slot'  => 'reply',
		'color' => 'blue',
		'title' => 'Replies with a saved macro',
		'body'  => 'Reply, tag, and update in one click',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.125 14.375C20.125 14.8833 19.9231 15.3708 19.5636 15.7303C19.2042 16.0897 18.7167 16.2917 18.2083 16.2917H7.66667L3.83333 20.125V4.79167C3.83333 4.28334 4.03527 3.79582 4.39471 3.43638C4.75416 3.07693 5.24167 2.875 5.75 2.875H18.2083C18.7167 2.875 19.2042 3.07693 19.5636 3.43638C19.9231 3.79582 20.125 4.28334 20.125 4.79167V14.375Z"/></svg>',
		'pos'   => array(
			'node' => array( 'left' => 659, 'top' => 201 ),
			'text' => array( 'left' => 723, 'top' => 201, 'width' => 220 ),
		),
	),
	array(
		'slot'  => 'disposition',
		'color' => 'amber',
		'title' => 'Closed with a disposition',
		'body'  => 'Refund issued — auto-suggested',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.3747 1.91602H5.74967C5.24134 1.91602 4.75383 2.11795 4.39439 2.47739C4.03494 2.83684 3.83301 3.32435 3.83301 3.83268V19.166C3.83301 19.6743 4.03494 20.1619 4.39439 20.5213C4.75383 20.8807 5.24134 21.0827 5.74967 21.0827H17.2497C17.758 21.0827 18.2455 20.8807 18.605 20.5213C18.9644 20.1619 19.1663 19.6743 19.1663 19.166V6.70768L14.3747 1.91602Z"/><path d="M13.417 1.91602V6.70768H18.2087"/></svg>',
		'pos'   => array(
			'node' => array( 'left' => 943, 'top' => 201 ),
			'text' => array( 'left' => 1005, 'top' => 201, 'width' => 236 ),
		),
	),
	array(
		'slot'  => 'resolved',
		'color' => 'green',
		'title' => 'Resolved · 4m 12s',
		'body'  => 'Outcome written back to the customer profile',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19.1667 5.75L8.625 16.2917L3.83333 11.5"/></svg>',
		'pos'   => array(
			'node' => array( 'left' => 989, 'top' => 51 ),
			'text' => array( 'left' => 1053, 'top' => 51, 'width' => 190 ),
		),
	),
	array(
		'slot'  => 'whisper',
		'color' => 'purple',
		'title' => 'Supervisor whispers',
		'body'  => '"Offer the retention discount" — the customer never hears it',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.3747 18.2089V16.8672C14.3747 16.1047 14.0718 15.3734 13.5326 14.8343C12.9934 14.2951 12.2622 13.9922 11.4997 13.9922H6.70801C5.94551 13.9922 5.21424 14.2951 4.67508 14.8343C4.13591 15.3734 3.83301 16.1047 3.83301 16.8672V18.2089"/><path d="M9.10449 10.541C10.6923 10.541 11.9795 9.25383 11.9795 7.66602C11.9795 6.0782 10.6923 4.79102 9.10449 4.79102C7.51667 4.79102 6.22949 6.0782 6.22949 7.66602C6.22949 9.25383 7.51667 10.541 9.10449 10.541Z"/><path d="M19.1669 18.2087V16.8671C19.1687 16.2368 18.9634 15.6233 18.5824 15.1212C18.2015 14.619 17.6661 14.256 17.0586 14.0879"/><path d="M15.333 4.98242C15.8754 5.19105 16.3418 5.55913 16.6708 6.03815C16.9998 6.51718 17.1759 7.08464 17.1759 7.66576C17.1759 8.24687 16.9998 8.81434 16.6708 9.29336C16.3418 9.77238 15.8754 10.1405 15.333 10.3491"/></svg>',
		'pos'   => array(
			'node' => array( 'left' => 653, 'top' => 357 ),
			'text' => array( 'left' => 717, 'top' => 357, 'width' => 300 ),
		),
	),
);

foreach ( $event_slots as $index => &$slot ) {
	if ( isset( $events_field[ $index ]['title'] ) && $events_field[ $index ]['title'] ) {
		$slot['title'] = $events_field[ $index ]['title'];
	}
	if ( isset( $events_field[ $index ]['body'] ) && $events_field[ $index ]['body'] ) {
		$slot['body'] = $events_field[ $index ]['body'];
	}
}
unset( $slot );

$columns_field = array_values(
	array_filter(
		(array) get_field( 'ccaas_columns' ),
		function ( $column ) {
			return ! empty( $column['title'] );
		}
	)
);

$columns = array(
	array(
		'tag'   => '1 · INBOX',
		'title' => 'Unified omnichannel inbox',
		'body'  => 'Chat, email, WhatsApp, and social in one conversation timeline, with your internal team channels beside it. Ask a colleague for help and warm-transfer without ever leaving the inbox.',
	),
	array(
		'tag'   => '2 · ROUTING',
		'title' => 'Skills-based routing & queues',
		'body'  => 'Route each inbound conversation to the right-skilled agent through digital queues with SLA targets and overflow rules. Voice calls and digital conversations share one priority queue.',
	),
	array(
		'tag'   => '3 · SUPERVISION',
		'title' => 'Live wallboards & coaching',
		'body'  => 'Watch active agents, open-conversation load, queue depth, and SLA-at-risk counts on a real-time wallboard, and step into a live conversation when an agent needs help.',
	),
	array(
		'tag'   => '4 · OUTCOME',
		'title' => 'Dispositions & macros',
		'body'  => 'Close every conversation with a consistent outcome label — auto-suggested and always overridable — so your reporting stays clean. Fire a saved macro to reply, tag, and update in one click.',
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

$role_icons = array(
	'customer'   => '<svg viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11.0005 10.4501C12.7217 10.4501 14.1171 9.05475 14.1171 7.33346C14.1171 5.61218 12.7217 4.2168 11.0005 4.2168C9.27917 4.2168 7.88379 5.61218 7.88379 7.33346C7.88379 9.05475 9.27917 10.4501 11.0005 10.4501Z"/><path d="M5.04199 18.3333C5.04199 16.7531 5.66974 15.2376 6.78715 14.1202C7.90455 13.0028 9.42008 12.375 11.0003 12.375C12.5806 12.375 14.0961 13.0028 15.2135 14.1202C16.3309 15.2376 16.9587 16.7531 16.9587 18.3333"/></svg>',
	'agent'      => '<svg viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3.66699 12.8327V10.9993C3.66699 9.05443 4.43961 7.18917 5.81488 5.8139C7.19014 4.43863 9.0554 3.66602 11.0003 3.66602C12.9452 3.66602 14.8105 4.43863 16.1858 5.8139C17.561 7.18917 18.3337 9.05443 18.3337 10.9993V12.8327"/><path d="M3.84967 11.916H3.66634C2.65382 11.916 1.83301 12.7368 1.83301 13.7493V16.1327C1.83301 17.1452 2.65382 17.966 3.66634 17.966H3.84967C4.8622 17.966 5.68301 17.1452 5.68301 16.1327V13.7493C5.68301 12.7368 4.8622 11.916 3.84967 11.916Z"/><path d="M18.3331 11.916H18.1497C17.1372 11.916 16.3164 12.7368 16.3164 13.7493V16.1327C16.3164 17.1452 17.1372 17.966 18.1497 17.966H18.3331C19.3456 17.966 20.1664 17.1452 20.1664 16.1327V13.7493C20.1664 12.7368 19.3456 11.916 18.3331 11.916Z"/></svg>',
	'supervisor' => '<svg viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13.7503 17.4161V16.1328C13.7503 15.4035 13.4606 14.704 12.9449 14.1883C12.4291 13.6725 11.7297 13.3828 11.0003 13.3828H6.41699C5.68765 13.3828 4.98817 13.6725 4.47245 14.1883C3.95672 14.704 3.66699 15.4035 3.66699 16.1328V17.4161"/><path d="M8.70801 10.084C10.2268 10.084 11.458 8.85277 11.458 7.33398C11.458 5.8152 10.2268 4.58398 8.70801 4.58398C7.18922 4.58398 5.95801 5.8152 5.95801 7.33398C5.95801 8.85277 7.18922 10.084 8.70801 10.084Z"/><path d="M18.3331 17.4163V16.1329C18.3348 15.53 18.1384 14.9433 17.774 14.463C17.4096 13.9826 16.8975 13.6354 16.3164 13.4746"/><path d="M14.667 4.76758C15.1858 4.96713 15.6319 5.31921 15.9466 5.77741C16.2613 6.2356 16.4297 6.7784 16.4297 7.33425C16.4297 7.89009 16.2613 8.43289 15.9466 8.89108C15.6319 9.34928 15.1858 9.70136 14.667 9.90091"/></svg>',
);
?>
<section class="ccaas" id="ccaas">
	<div class="ccaas__frame">
		<div class="ccaas__header-row">
			<div class="ccaas__header">
				<p class="ccaas__eyebrow" data-animate="fade">
					<span class="ccaas__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="ccaas__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="ccaas__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="ccaas__hero" data-animate="fade">
				<svg class="ccaas__hero-wires" viewBox="0 0 580 340" fill="none" aria-hidden="true">
					<path d="M214 133.5H246" stroke="#C3CBD9" stroke-width="1.3"/>
					<path d="M242 129L247 133.5L242 138" stroke="#C3CBD9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M48 38H56.7114C85.3432 38 110.491 57.0168 118.291 84.5658L122.646 99.9475C128.517 120.685 147.447 135 169 135" stroke="#528CED" stroke-width="2" stroke-linecap="round"/>
					<path d="M48 164H85.1376C97.8859 164 110.073 158.756 118.839 149.5C127.604 140.244 139.791 135 152.54 135H169" stroke="#528CED" stroke-width="2" stroke-linecap="round"/>
					<path d="M48 231H56.8485C85.4155 231 110.523 212.067 118.38 184.602L122.55 170.025C128.481 149.292 147.435 135 169 135" stroke="#528CED" stroke-width="2" stroke-linecap="round"/>
					<path d="M48 101H83.6413C97.2419 101 110.139 107.046 118.839 117.5C127.538 127.954 140.435 134 154.036 134H169" stroke="#528CED" stroke-width="2" stroke-linecap="round"/>
				</svg>

				<span class="ccaas-chip ccaas-chip--whatsapp" style="left: 4px; top: 14px;" aria-hidden="true">
					<svg viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="5.77" fill="#25D366"/><path d="M5.29 16.89L5.89 14.1C5.12 12.88 4.82 11.42 5.04 9.99C5.27 8.56 6.01 7.27 7.12 6.35C8.23 5.43 9.64 4.95 11.09 4.99C12.53 5.04 13.91 5.61 14.96 6.6C16.01 7.59 16.67 8.93 16.8 10.36C16.94 11.8 16.54 13.24 15.69 14.41C14.84 15.58 13.6 16.39 12.19 16.71C10.78 17.02 9.3 16.81 8.04 16.11L5.29 16.89Z" fill="#25D366" stroke="white" stroke-width="1.12"/><path d="M13.24 11.73C13.11 11.64 12.98 11.6 12.85 11.77L12.34 12.46C12.21 12.55 12.12 12.59 11.95 12.5C11.31 12.16 10.4 11.77 9.63 10.48C9.59 10.31 9.67 10.23 9.76 10.14L10.15 9.54C10.23 9.45 10.19 9.37 10.15 9.28L9.63 8.03C9.5 7.69 9.37 7.73 9.24 7.73H8.9C8.81 7.73 8.64 7.78 8.47 7.95C7.52 8.89 7.91 10.23 8.6 11.09C8.73 11.26 9.59 12.8 11.43 13.62C12.81 14.22 13.11 14.14 13.5 14.05C13.97 14.01 14.44 13.62 14.66 13.23C14.7 13.11 14.92 12.55 14.74 12.46" fill="white"/></svg>
				</span>
				<span class="ccaas-chip ccaas-chip--email" style="left: 4px; top: 78px;" aria-hidden="true">
					<svg viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="4.518" fill="#325FEC"/><g transform="translate(4.578 6.329)"><path d="M1.07042 0.0000485C0.693438 0.0000485 0.36416 0.169504 0.173582 0.425147L6.04377 5.54822C6.25997 5.7369 6.58435 5.7369 6.80054 5.54822L12.6707 0.425147C12.4802 0.169504 12.1509 0.0000485 11.7739 0.0000485H1.07042ZM0.0000687 1.59462V8.40715C0.0000687 8.92465 0.477444 9.34127 1.07042 9.34127H11.7739C12.3669 9.34127 12.8442 8.92465 12.8442 8.40715V1.59462L7.55731 6.20868C6.93491 6.75186 5.9094 6.75186 5.287 6.20868L0.0000687 1.59462Z" fill="white"/></g></svg>
				</span>
				<span class="ccaas-chip ccaas-chip--social" style="left: -6px; top: 135px;" aria-hidden="true">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/icon-social.svg' ); ?>" width="64" height="64" alt="">
				</span>
				<span class="ccaas-chip ccaas-chip--messaging" style="left: 4px; top: 206px;" aria-hidden="true">
					<svg viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6.67" fill="#0866FF"/><path d="M11 3.5C6.86 3.5 3.5 6.62 3.5 10.5C3.5 12.63 4.51 14.53 6.12 15.82C6.24 15.93 6.32 16.08 6.32 16.25L6.36 17.42C6.37 17.76 6.73 17.98 7.05 17.84L8.36 17.29C8.47 17.24 8.6 17.24 8.72 17.27C9.44 17.46 10.2 17.56 11 17.56C15.14 17.56 18.5 14.44 18.5 10.56C18.5 6.68 15.14 3.5 11 3.5Z" fill="white"/><path d="M12.24 12.5L14.6 9.1C14.83 8.76 14.4 8.37 14.07 8.6L11.6 10.34C11.52 10.4 11.41 10.4 11.33 10.34L9.17 8.85C8.97 8.72 8.71 8.77 8.58 8.96L6.23 12.36C6 12.7 6.43 13.09 6.76 12.86L9.23 11.12C9.31 11.06 9.43 11.06 9.51 11.12L11.66 12.61C11.85 12.74 12.12 12.68 12.24 12.5Z" fill="#0866FF"/></svg>
				</span>

				<span class="ccaas-mark" style="left: 143px; top: 92px;" aria-hidden="true">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/icon-orbit-mark.svg' ); ?>" width="88" height="88" alt="">
				</span>

				<figure class="ccaas-photo">
					<?php if ( $hero_photo_id ) : ?>
						<?php
						echo wp_get_attachment_image(
							$hero_photo_id,
							'full',
							false,
							array(
								'class'    => 'ccaas-photo__img',
								'sizes'    => '185px',
								'loading'  => 'lazy',
								'decoding' => 'async',
								'alt'      => '',
							)
						);
						?>
					<?php else : ?>
						<img class="ccaas-photo__img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/hero-agent-photo.png' ); ?>" loading="lazy" decoding="async" alt="">
					<?php endif; ?>
				</figure>

				<div class="ccaas-card">
					<p class="ccaas-card__title">One workspace.<br>Every conversation.</p>
					<div class="ccaas-card__rows">
						<div class="ccaas-card__row">
							<span class="ccaas-card__dot ccaas-card__dot--blue" aria-hidden="true"></span>
							<span class="ccaas-card__skeleton">
								<span class="ccaas-card__line" style="width: 105px;"></span>
								<span class="ccaas-card__line" style="width: 65px;"></span>
							</span>
						</div>
						<div class="ccaas-card__row">
							<span class="ccaas-card__dot ccaas-card__dot--green" aria-hidden="true"></span>
							<span class="ccaas-card__skeleton">
								<span class="ccaas-card__line" style="width: 105px;"></span>
								<span class="ccaas-card__line" style="width: 65px;"></span>
							</span>
						</div>
						<div class="ccaas-card__row">
							<span class="ccaas-card__dot ccaas-card__dot--amber" aria-hidden="true"></span>
							<span class="ccaas-card__skeleton">
								<span class="ccaas-card__line" style="width: 89px;"></span>
								<span class="ccaas-card__line" style="width: 55px;"></span>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="ccaas-board" data-animate="fade">
			<span class="ccaas-board__band ccaas-board__band--agent" aria-hidden="true"></span>
			<span class="ccaas-board__band ccaas-board__band--supervisor" aria-hidden="true"></span>

			<svg class="ccaas-board__wires" viewBox="0 0 1240 470" fill="none" aria-hidden="true">
				<path d="M272 104V124C272 132 276 136 284 136H340C348 136 352 140 352 148V194" stroke="#2563EB" stroke-width="1.8"/>
				<path d="M347.5 190L352 195L356.5 190" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M352 250V262C352 270 356 274 364 274H954C962 274 966 270 966 262V252" stroke="#2563EB" stroke-width="1.8"/>
				<path d="M676 274V341" stroke="#7C3AED" stroke-opacity="0.7" stroke-width="1.6" stroke-dasharray="4 5"/>
				<path d="M671.5 337L676 342L680.5 337" stroke="#7C3AED" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M974 202V172C974 164 978 160 986 160H1000C1008 160 1012 156 1012 148V104.5" stroke="#2563EB" stroke-width="1.8"/>
				<path d="M1007.5 109L1012 104L1016.5 109" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
				<circle cx="676" cy="274" r="5" fill="white" stroke="#2563EB" stroke-width="1.8"/>
			</svg>

			<div class="ccaas-role ccaas-role--customer" style="left: 31px; top: 51px;">
				<span class="ccaas-role__well" aria-hidden="true"><?php echo $role_icons['customer']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			</div>
			<div class="ccaas-role__label" style="left: 89px; top: 53px; width: 160px;">
				<p class="ccaas-role__name">CUSTOMER</p>
				<p class="ccaas-role__sub">Jane Doe</p>
			</div>

			<div class="ccaas-role ccaas-role--agent" style="left: 31px; top: 209px;">
				<span class="ccaas-role__well" aria-hidden="true"><?php echo $role_icons['agent']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			</div>
			<span class="ccaas-role__avatar" style="left: 87px; top: 214px;">
				<?php if ( $avatar_id ) : ?>
					<?php echo wp_get_attachment_image( $avatar_id, 'thumbnail', false, array( 'class' => 'ccaas-role__avatar-img', 'alt' => '' ) ); ?>
				<?php else : ?>
					<img class="ccaas-role__avatar-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/dana-avatar.png' ); ?>" loading="lazy" decoding="async" alt="">
				<?php endif; ?>
			</span>
			<div class="ccaas-role__label" style="left: 131px; top: 211px; width: 120px;">
				<p class="ccaas-role__name">AGENT</p>
				<p class="ccaas-role__sub">Dana K.</p>
			</div>

			<div class="ccaas-role ccaas-role--supervisor" style="left: 31px; top: 363px;">
				<span class="ccaas-role__well" aria-hidden="true"><?php echo $role_icons['supervisor']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			</div>
			<div class="ccaas-role__label" style="left: 89px; top: 365px; width: 160px;">
				<p class="ccaas-role__name">SUPERVISOR</p>
				<p class="ccaas-role__sub">Floor view</p>
			</div>

			<?php foreach ( $event_slots as $slot ) : ?>
				<div
					class="ccaas-node ccaas-node--<?php echo esc_attr( $slot['color'] ); ?>"
					style="left: <?php echo esc_attr( $slot['pos']['node']['left'] ); ?>px; top: <?php echo esc_attr( $slot['pos']['node']['top'] ); ?>px;"
				>
					<span class="ccaas-node__icon" aria-hidden="true"><?php echo $slot['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
				</div>
				<div
					class="ccaas-event"
					style="left: <?php echo esc_attr( $slot['pos']['text']['left'] ); ?>px; top: <?php echo esc_attr( $slot['pos']['text']['top'] ); ?>px; width: <?php echo esc_attr( $slot['pos']['text']['width'] ); ?>px;"
				>
					<p class="ccaas-event__title"><?php echo esc_html( $slot['title'] ); ?></p>
					<p class="ccaas-event__body"><?php echo esc_html( $slot['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="ccaas-columns">
			<?php foreach ( $columns as $column ) : ?>
				<div class="ccaas-column" data-animate="fade">
					<p class="ccaas-column__tag"><?php echo esc_html( $column['tag'] ); ?></p>
					<h3 class="ccaas-column__title"><?php echo esc_html( $column['title'] ); ?></h3>
					<p class="ccaas-column__body"><?php echo esc_html( $column['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!--
	Mobile-only layout (<900px) — Figma 692:1430 ("CCaaS — Light mobile"), a
	dedicated single-column adaptation: header, a channels->hub->photo hero
	illustration, one bordered "swimlane" card (customer/agent/supervisor/
	resolution), and 4 stacked capability blocks. Reuses $event_slots/$columns/
	$hero_photo_id/$avatar_id — the same PHP data as desktop.
	-->
	<div class="ccaas-mobile">
		<div class="ccaas-m__header">
			<p class="ccaas-m__eyebrow" data-animate="fade">
				<span class="ccaas-m__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<h2 class="ccaas-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
			<p class="ccaas-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
		</div>

		<div class="ccaas-m__hero" data-animate="fade">
			<svg class="ccaas-m__wire ccaas-m__wire--1" width="97" height="78" viewBox="0 0 97 78" fill="none" aria-hidden="true"><path d="M1 1H6.3368C29.708 1 50.2384 16.5161 56.6171 39L59.5913 49.4836C64.2102 65.7645 79.0766 77 96 77" stroke="url(#ccm1)" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="ccm1" x1="2.3" y1="-11.7" x2="102.4" y2="-2.5" gradientUnits="userSpaceOnUse"><stop stop-color="#528CED"/><stop offset="1" stop-color="#528CED" stop-opacity="0"/></linearGradient></defs></svg>
			<svg class="ccaas-m__wire ccaas-m__wire--2" width="97" height="26" viewBox="0 0 97 26" fill="none" aria-hidden="true"><path d="M1 1H29.705C39.9721 1 49.7556 5.36243 56.6171 13C63.4786 20.6376 73.2621 25 83.5291 25H96" stroke="url(#ccm2)" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="ccm2" x1="2.3" y1="-3" x2="95.4" y2="24" gradientUnits="userSpaceOnUse"><stop stop-color="#528CED"/><stop offset="1" stop-color="#528CED" stop-opacity="0"/></linearGradient></defs></svg>
			<svg class="ccaas-m__wire ccaas-m__wire--3" width="97" height="27" viewBox="0 0 97 27" fill="none" aria-hidden="true"><path d="M1 1H29.3297C39.8105 1 49.772 5.56322 56.6171 13.5C63.4622 21.4368 73.4237 26 83.9045 26H96" stroke="url(#ccm3)" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="ccm3" x1="2.3" y1="-3.2" x2="96" y2="23" gradientUnits="userSpaceOnUse"><stop stop-color="#528CED"/><stop offset="1" stop-color="#528CED" stop-opacity="0"/></linearGradient></defs></svg>
			<svg class="ccaas-m__wire ccaas-m__wire--4" width="97" height="77" viewBox="0 0 97 77" fill="none" aria-hidden="true"><path d="M1 1H6.81756C29.9212 1 50.2337 16.2957 56.6171 38.5L59.4951 48.5112C64.1744 64.7877 79.0642 76 96 76" stroke="url(#ccm4)" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="ccm4" x1="2.3" y1="-11.5" x2="102.4" y2="-2.2" gradientUnits="userSpaceOnUse"><stop stop-color="#528CED"/><stop offset="1" stop-color="#528CED" stop-opacity="0"/></linearGradient></defs></svg>

			<div class="ccaas-m__channels">
				<span class="ccaas-m-channel">
					<span class="ccaas-m-channel__badge" style="background:#25d366;"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M1.54246 8.75491C1.58535 8.56006 1.56898 8.35684 1.49546 8.17137C0.983802 7.10977 0.863535 5.90157 1.15588 4.75994C1.44822 3.61831 2.13438 2.61661 3.0933 1.93158C4.05223 1.24656 5.22228 0.922219 6.39703 1.0158C7.57179 1.10937 8.67574 1.61485 9.51412 2.44305C10.3525 3.27125 10.8714 4.36894 10.9794 5.54245C11.0873 6.71597 10.7773 7.88989 10.104 8.8571C9.43072 9.82431 8.43747 10.5227 7.29949 10.8289C6.16151 11.1352 4.95192 11.0297 3.88415 10.531C3.7089 10.4645 3.51847 10.4486 3.3346 10.485L1.62797 10.9841C1.54564 11.0059 1.4591 11.0064 1.37655 10.9854C1.294 10.9644 1.21817 10.9227 1.15626 10.8642C1.09436 10.8057 1.04842 10.7324 1.02281 10.6511C0.997197 10.5699 0.99276 10.4835 1.00992 10.4L1.54246 8.75491Z" stroke="white" stroke-linecap="round"/></svg></span>
				</span>
				<span class="ccaas-m-channel">
					<span class="ccaas-m-channel__badge" style="background:#325fec;"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M11.0004 3.49985L6.50451 6.36306C6.35195 6.45166 6.17866 6.49833 6.00222 6.49833C5.82579 6.49833 5.6525 6.45166 5.49993 6.36306L0.999573 3.49985M1.99965 2H10.0003C10.5526 2 11.0004 2.44767 11.0004 2.9999V8.9993C11.0004 9.55153 10.5526 9.9992 10.0003 9.9992H1.99965C1.44732 9.9992 0.999573 9.55153 0.999573 8.9993V2.9999C0.999573 2.44767 1.44732 2 1.99965 2Z" stroke="white" stroke-linecap="round"/></svg></span>
				</span>
				<span class="ccaas-m-channel">
					<span class="ccaas-m-channel__badge" style="background:#e94875;"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M6.00003 9.00064C8.20895 9.00064 9.99963 7.20964 9.99963 5.00032C9.99963 2.791 8.20895 1 6.00003 1C3.79111 1 2.00043 2.791 2.00043 5.00032C2.00043 7.20964 3.79111 9.00064 6.00003 9.00064ZM6.00003 9.00064V11.0008M3.50028 11.0008H8.49978M7.49988 5.00032C7.49988 5.82881 6.82837 6.50044 6.00003 6.50044C5.17168 6.50044 4.50018 5.82881 4.50018 5.00032C4.50018 4.17183 5.17168 3.5002 6.00003 3.5002C6.82837 3.5002 7.49988 4.17183 7.49988 5.00032Z" stroke="white" stroke-linecap="round"/></svg></span>
				</span>
				<span class="ccaas-m-channel">
					<span class="ccaas-m-channel__badge" style="background:#0866ff;"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M7.50009 4.50028L4.49985 7.50052M4.49985 4.50028L7.50009 7.50052M11.0004 6.0004C11.0004 8.76204 8.76162 11.0008 5.99997 11.0008C3.23833 11.0008 0.999573 8.76204 0.999573 6.0004C0.999573 3.23876 3.23833 1 5.99997 1C8.76162 1 11.0004 3.23876 11.0004 6.0004Z" stroke="white" stroke-linecap="round"/></svg></span>
				</span>
			</div>

			<span class="ccaas-m__hub" aria-hidden="true">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/icon-orbit-mark.svg' ); ?>" width="92" height="92" alt="">
			</span>
			<svg class="ccaas-m__arrow-line" width="29" height="2" viewBox="0 0 29 1.3" fill="none" aria-hidden="true"><path d="M0 0.65H29" stroke="#C3CBD9" stroke-width="1.3"/></svg>
			<svg class="ccaas-m__arrow-head" width="7" height="11" viewBox="0 0 6.5 10.5" fill="none" aria-hidden="true"><path d="M0.75 0.75L5.75 5.25L0.75 9.75" stroke="#C3CBD9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>

			<figure class="ccaas-m__photo">
				<?php if ( $hero_photo_id ) : ?>
					<?php echo wp_get_attachment_image( $hero_photo_id, 'full', false, array( 'class' => 'ccaas-m__photo-img', 'loading' => 'lazy', 'decoding' => 'async', 'alt' => '' ) ); ?>
				<?php else : ?>
					<img class="ccaas-m__photo-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/hero-agent-photo.png' ); ?>" loading="lazy" decoding="async" alt="">
				<?php endif; ?>
			</figure>

			<div class="ccaas-m__card">
				<p class="ccaas-m__card-title">One workspace.<br>Every conversation.</p>
				<div class="ccaas-m__card-row">
					<span class="ccaas-m__card-dot" style="background:#2563eb;" aria-hidden="true"></span>
					<span class="ccaas-m__card-lines"><span style="width:78px;"></span><span style="width:48px;"></span></span>
				</div>
				<div class="ccaas-m__card-row">
					<span class="ccaas-m__card-dot" style="background:#16a34a;" aria-hidden="true"></span>
					<span class="ccaas-m__card-lines"><span style="width:78px;"></span><span style="width:48px;"></span></span>
				</div>
				<div class="ccaas-m__card-row">
					<span class="ccaas-m__card-dot" style="background:#f59e0b;" aria-hidden="true"></span>
					<span class="ccaas-m__card-lines"><span style="width:78px;"></span><span style="width:48px;"></span></span>
				</div>
			</div>
		</div>

		<div class="ccaas-m__journey" data-animate="fade">
			<div class="ccaas-m__board">
				<div class="ccaas-m-lane">
					<div class="ccaas-m-lane__role">
						<p class="ccaas-m-lane__name">CUSTOMER</p>
						<p class="ccaas-m-lane__sub">Jane Doe</p>
					</div>
					<div class="ccaas-m-event">
						<span class="ccaas-m-event__node" style="background:#16a34a;">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M2.31 15.84L3.28 12.31C2.6 11.11 2.35 9.71 2.58 8.34C2.82 6.97 3.51 5.72 4.55 4.79C5.6 3.86 6.93 3.31 8.32 3.24C9.72 3.16 11.1 3.56 12.24 4.38C13.38 5.19 14.2 6.36 14.58 7.7C14.96 9.04 14.87 10.47 14.34 11.75C13.8 13.04 12.85 14.11 11.63 14.79C10.4 15.47 8.99 15.72 7.61 15.5C6.7 15.35 5.83 14.98 5.08 14.42L2.31 15.84Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</span>
						<div class="ccaas-m-event__copy">
							<p class="ccaas-m-event__title">Arrives on WhatsApp · 10:02</p>
							<p class="ccaas-m-event__body">Same thread already holds her email from Tuesday</p>
						</div>
					</div>
				</div>

				<div class="ccaas-m-lane ccaas-m-lane--agent">
					<div class="ccaas-m-lane__role">
						<span class="ccaas-m-lane__avatar">
							<?php if ( $avatar_id ) : ?>
								<?php echo wp_get_attachment_image( $avatar_id, 'thumbnail', false, array( 'class' => 'ccaas-m-lane__avatar-img', 'alt' => '' ) ); ?>
							<?php else : ?>
								<img class="ccaas-m-lane__avatar-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ccaas/dana-avatar.png' ); ?>" loading="lazy" decoding="async" alt="">
							<?php endif; ?>
						</span>
						<span>
							<p class="ccaas-m-lane__name">AGENT</p>
							<p class="ccaas-m-lane__sub">Dana K.</p>
						</span>
					</div>
					<?php foreach ( array( $event_slots[1], $event_slots[2], $event_slots[3] ) as $slot ) : ?>
						<div class="ccaas-m-event">
							<span class="ccaas-m-event__node" style="background:<?php echo 'amber' === $slot['color'] ? '#f59e0b' : '#2563eb'; ?>;"><?php echo $slot['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<div class="ccaas-m-event__copy">
								<p class="ccaas-m-event__title"><?php echo esc_html( $slot['title'] ); ?></p>
								<p class="ccaas-m-event__body"><?php echo esc_html( $slot['body'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="ccaas-m-lane ccaas-m-lane--supervisor">
					<div class="ccaas-m-lane__role">
						<p class="ccaas-m-lane__name">SUPERVISOR</p>
						<p class="ccaas-m-lane__sub">Floor view</p>
					</div>
					<div class="ccaas-m-event">
						<span class="ccaas-m-event__node" style="background:#7c3aed;"><?php echo $event_slots[5]['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<div class="ccaas-m-event__copy">
							<p class="ccaas-m-event__title"><?php echo esc_html( $event_slots[5]['title'] ); ?></p>
							<p class="ccaas-m-event__body"><?php echo esc_html( $event_slots[5]['body'] ); ?></p>
						</div>
					</div>
				</div>

				<div class="ccaas-m-lane ccaas-m-lane--resolution">
					<div class="ccaas-m-event">
						<span class="ccaas-m-event__node" style="background:#16a34a;"><?php echo $event_slots[4]['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<div class="ccaas-m-event__copy">
							<p class="ccaas-m-event__title"><?php echo esc_html( $event_slots[4]['title'] ); ?></p>
							<p class="ccaas-m-event__body"><?php echo esc_html( $event_slots[4]['body'] ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="ccaas-m__capabilities">
			<?php foreach ( $columns as $index => $column ) : ?>
				<div class="ccaas-m-capability" data-animate="fade">
					<?php if ( $index > 0 ) : ?><div class="ccaas-m-capability__divider"></div><?php endif; ?>
					<div class="ccaas-m-capability__heading">
						<p class="ccaas-m-capability__tag"><?php echo esc_html( $column['tag'] ); ?></p>
						<h3 class="ccaas-m-capability__title"><?php echo esc_html( $column['title'] ); ?></h3>
					</div>
					<p class="ccaas-m-capability__body"><?php echo esc_html( $column['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
