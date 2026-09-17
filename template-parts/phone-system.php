<?php
/**
 * Template part: Phone system — Cloud phone system & IVR.
 * Figma: 607:11675 ("Cloud phone system — Slide"), 1440 wide.
 * Light section: IVR flow card, "replaces" chips, 6 feature cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'phone_eyebrow' );
$headline = get_field( 'phone_headline' );
$body     = get_field( 'phone_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Cloud phone system & IVR';
}
if ( ! $headline ) {
	$headline = 'A business phone system with the IVR, trunking, queues, and team chat built in';
}
if ( ! $body ) {
	$body = 'Run your whole inbound voice operation on Orbit — greet callers with a visual IVR, bring your own carrier over SIP, distribute calls to the right team, and capture a voicemail when no one can pick up. No separate PBX vendor or chat app to manage.';
}

$whatsapp_src = get_template_directory_uri() . '/assets/img/phone-system/icon-whatsapp.svg';

// Flow-canvas node icons — exact paths from Figma 607:11675, stroke-width 1.8, tinted via currentColor.
$icons = array(
	'antenna'   => '<svg width="38" height="33" viewBox="0 0 38 33" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7.75835 20.4914C6.72905 19.4622 5.91256 18.2403 5.3555 16.8956C4.79843 15.5508 4.51172 14.1095 4.51172 12.6539C4.51172 11.1983 4.79843 9.757 5.3555 8.41224C5.91256 7.06747 6.72905 5.8456 7.75835 4.81641M12.35 15.8997C11.5263 15.0197 11.068 13.8593 11.068 12.6539C11.068 11.4485 11.5263 10.2882 12.35 9.40807M25.65 9.40807C26.4737 10.2882 26.932 11.4485 26.932 12.6539C26.932 13.8593 26.4737 15.0197 25.65 15.8997M30.2417 4.81641C31.271 5.8456 32.0875 7.06747 32.6445 8.41224C33.2016 9.757 33.4883 11.1983 33.4883 12.6539C33.4883 14.1095 33.2016 15.5508 32.6445 16.8956C32.0875 18.2403 31.271 19.4622 30.2417 20.4914" /><path d="M19.0001 15.2669C20.3993 15.2669 21.5335 14.1326 21.5335 12.7335C21.5335 11.3344 20.3993 10.2002 19.0001 10.2002C17.601 10.2002 16.4668 11.3344 16.4668 12.7335C16.4668 14.1326 17.601 15.2669 19.0001 15.2669Z" /><path d="M19 15.2666V28.2499M19 28.2499H23.75L19 15.2666L14.25 28.2499H19Z" /></svg>',
	'keypad'    => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 14.5246C15.2564 14.5246 16.275 13.5061 16.275 12.2496C16.275 10.9932 15.2564 9.97461 14 9.97461C12.7435 9.97461 11.725 10.9932 11.725 12.2496C11.725 13.5061 12.7435 14.5246 14 14.5246Z"/><path d="M21 14.5246C22.2564 14.5246 23.275 13.5061 23.275 12.2496C23.275 10.9932 22.2564 9.97461 21 9.97461C19.7435 9.97461 18.725 10.9932 18.725 12.2496C18.725 13.5061 19.7435 14.5246 21 14.5246Z"/><path d="M28 14.5246C29.2564 14.5246 30.275 13.5061 30.275 12.2496C30.275 10.9932 29.2564 9.97461 28 9.97461C26.7435 9.97461 25.725 10.9932 25.725 12.2496C25.725 13.5061 26.7435 14.5246 28 14.5246Z"/><path d="M14 23.2746C15.2564 23.2746 16.275 22.2561 16.275 20.9996C16.275 19.7432 15.2564 18.7246 14 18.7246C12.7435 18.7246 11.725 19.7432 11.725 20.9996C11.725 22.2561 12.7435 23.2746 14 23.2746Z"/><path d="M21 23.2746C22.2564 23.2746 23.275 22.2561 23.275 20.9996C23.275 19.7432 22.2564 18.7246 21 18.7246C19.7435 18.7246 18.725 19.7432 18.725 20.9996C18.725 22.2561 19.7435 23.2746 21 23.2746Z"/><path d="M28 23.2746C29.2564 23.2746 30.275 22.2561 30.275 20.9996C30.275 19.7432 29.2564 18.7246 28 18.7246C26.7435 18.7246 25.725 19.7432 25.725 20.9996C25.725 22.2561 26.7435 23.2746 28 23.2746Z"/><path d="M14 32.0246C15.2564 32.0246 16.275 31.0061 16.275 29.7496C16.275 28.4932 15.2564 27.4746 14 27.4746C12.7435 27.4746 11.725 28.4932 11.725 29.7496C11.725 31.0061 12.7435 32.0246 14 32.0246Z"/><path d="M21 32.0246C22.2564 32.0246 23.275 31.0061 23.275 29.7496C23.275 28.4932 22.2564 27.4746 21 27.4746C19.7435 27.4746 18.725 28.4932 18.725 29.7496C18.725 31.0061 19.7435 32.0246 21 32.0246Z"/><path d="M28 32.0246C29.2564 32.0246 30.275 31.0061 30.275 29.7496C30.275 28.4932 29.2564 27.4746 28 27.4746C26.7435 27.4746 25.725 28.4932 25.725 29.7496C25.725 31.0061 26.7435 32.0246 28 32.0246Z"/></svg>',
	'people'    => '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18.75 23.75V22C18.75 21.0054 18.3549 20.0516 17.6517 19.3483C16.9484 18.6451 15.9946 18.25 15 18.25H8.75C7.75544 18.25 6.80161 18.6451 6.09835 19.3483C5.39509 20.0516 5 21.0054 5 22V23.75"/><path d="M11.875 13.75C13.9461 13.75 15.625 12.0711 15.625 10C15.625 7.92893 13.9461 6.25 11.875 6.25C9.80393 6.25 8.125 7.92893 8.125 10C8.125 12.0711 9.80393 13.75 11.875 13.75Z"/><path d="M25 23.75V22C25.0024 21.1779 24.7345 20.3777 24.2376 19.7228C23.7407 19.0678 23.0424 18.5942 22.25 18.375"/><path d="M20 6.5C20.7074 6.77212 21.3158 7.25223 21.7449 7.87704C22.174 8.50185 22.4037 9.24203 22.4037 10C22.4037 10.758 22.174 11.4981 21.7449 12.123C21.3158 12.7478 20.7074 13.2279 20 13.5"/></svg>',
	'headset'   => '<svg width="25" height="27" viewBox="0 0 25 27" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.1665 14.5837V12.5003C4.1665 10.2902 5.04448 8.17057 6.60728 6.60777C8.17008 5.04497 10.2897 4.16699 12.4998 4.16699C14.71 4.16699 16.8296 5.04497 18.3924 6.60777C19.9552 8.17057 20.8332 10.2902 20.8332 12.5003V14.5837"/><path d="M4.34798 14.9912H4.24381C2.97816 14.9912 1.95215 16.0172 1.95215 17.2829V19.9912C1.95215 21.2569 2.97816 22.2829 4.24381 22.2829H4.34798C5.61363 22.2829 6.63965 21.2569 6.63965 19.9912V17.2829C6.63965 16.0172 5.61363 14.9912 4.34798 14.9912Z"/><path d="M20.8743 15.0997H20.7702C19.5045 15.0997 18.4785 16.1257 18.4785 17.3913V20.0997C18.4785 21.3653 19.5045 22.3913 20.7702 22.3913H20.8743C22.14 22.3913 23.166 21.3653 23.166 20.0997V17.3913C23.166 16.1257 22.14 15.0997 20.8743 15.0997Z"/><path d="M20.8411 22.6072V23.2322C20.8411 23.8953 20.5777 24.5312 20.1089 25C19.64 25.4688 19.0042 25.7322 18.3411 25.7322H15.6328"/></svg>',
	'voicemail' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9.75 23.25C12.6495 23.25 15 20.8995 15 18C15 15.1005 12.6495 12.75 9.75 12.75C6.85051 12.75 4.5 15.1005 4.5 18C4.5 20.8995 6.85051 23.25 9.75 23.25Z"/><path d="M26.25 23.25C29.1495 23.25 31.5 20.8995 31.5 18C31.5 15.1005 29.1495 12.75 26.25 12.75C23.3505 12.75 21 15.1005 21 18C21 20.8995 23.3505 23.25 26.25 23.25Z"/><path d="M9.75 23.25H26.25"/></svg>',
	'chat'      => '<svg width="23" height="23" viewBox="0 0 23 23" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.125 14.375C20.125 14.8833 19.9231 15.3708 19.5636 15.7303C19.2042 16.0897 18.7167 16.2917 18.2083 16.2917H7.66667L3.83333 20.125V4.79167C3.83333 4.28334 4.03527 3.79582 4.39471 3.43638C4.75416 3.07693 5.24167 2.875 5.75 2.875H18.2083C18.7167 2.875 19.2042 3.07693 19.5636 3.43638C19.9231 3.79582 20.125 4.28334 20.125 4.79167V14.375Z"/><path d="M8.14581 8.5H14.8541M8.14581 11.8542H11.9791"/></svg>',
);

// Feature-card icons — exact paths from Figma 607:11675, stroke-width 1.75, uniform 24×24.
$card_icons = array(
	'tree'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 7C13.1046 7 14 6.10457 14 5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5C10 6.10457 10.8954 7 12 7Z"/><path d="M6 21C7.10457 21 8 20.1046 8 19C8 17.8954 7.10457 17 6 17C4.89543 17 4 17.8954 4 19C4 20.1046 4.89543 21 6 21Z"/><path d="M12 21C13.1046 21 14 20.1046 14 19C14 17.8954 13.1046 17 12 17C10.8954 17 10 17.8954 10 19C10 20.1046 10.8954 21 12 21Z"/><path d="M18 21C19.1046 21 20 20.1046 20 19C20 17.8954 19.1046 17 18 17C16.8954 17 16 17.8954 16 19C16 20.1046 16.8954 21 18 21Z"/><path d="M12 7V16.5C12 17.4763 12 12.5237 12 13.5M6 17V13.5H12M18 17V13.5H12"/></svg>',
	'database'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 9C15.866 9 19 7.65685 19 6C19 4.34315 15.866 3 12 3C8.13401 3 5 4.34315 5 6C5 7.65685 8.13401 9 12 9Z"/><path d="M5 6V12C5 13.7 8.1 15 12 15C15.9 15 19 13.7 19 12V6"/><path d="M5 12V18C5 19.7 8.1 21 12 21C15.9 21 19 19.7 19 18V12"/></svg>',
	'people'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18.9996V17.5996C15 16.804 14.6839 16.0409 14.1213 15.4783C13.5587 14.9157 12.7956 14.5996 12 14.5996H7C6.20435 14.5996 5.44129 14.9157 4.87868 15.4783C4.31607 16.0409 4 16.804 4 17.5996V18.9996"/><path d="M9.5 11C11.1569 11 12.5 9.65685 12.5 8C12.5 6.34315 11.1569 5 9.5 5C7.84315 5 6.5 6.34315 6.5 8C6.5 9.65685 7.84315 11 9.5 11Z"/><path d="M19.9998 18.9992V17.5992C20.0017 16.9415 19.7874 16.3014 19.3899 15.7774C18.9924 15.2534 18.4337 14.8746 17.7998 14.6992"/><path d="M16 5.19922C16.566 5.41691 17.0526 5.801 17.3959 6.30085C17.7392 6.8007 17.923 7.39284 17.923 7.99922C17.923 8.6056 17.7392 9.19774 17.3959 9.69759C17.0526 10.1974 16.566 10.5815 16 10.7992"/></svg>',
	'voicemail' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6.5 15.5C8.433 15.5 10 13.933 10 12C10 10.067 8.433 8.5 6.5 8.5C4.567 8.5 3 10.067 3 12C3 13.933 4.567 15.5 6.5 15.5Z"/><path d="M17.5 15.5C19.433 15.5 21 13.933 21 12C21 10.067 19.433 8.5 17.5 8.5C15.567 8.5 14 10.067 14 12C14 13.933 15.567 15.5 17.5 15.5Z"/><path d="M6.5 15.5H17.5"/></svg>',
	'chat'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15C21 15.5304 20.7893 16.0391 20.4142 16.4142C20.0391 16.7893 19.5304 17 19 17H8L4 21V5C4 4.46957 4.21071 3.96086 4.58579 3.58579C4.96086 3.21071 5.46957 3 6 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V15Z"/><path d="M8.5 9H15.5M8.5 12.5H12.5"/></svg>',
);

// Chip glyphs — exact paths from Figma 607:11675.
$icon_x    = '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M10.5 3.5L3.5 10.5M3.5 3.5L10.5 10.5" stroke="#9AA4B2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$icon_plus = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6 2.5V9.5M2.5 6H9.5" stroke="#2563EB" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';

$flow_nodes = array(
	array( 'slot' => 'n1', 'color' => 'blue',   'icon' => 'antenna',   'label' => 'SIP trunk · BYOC',  'sub' => 'Your carrier, your IP' ),
	array( 'slot' => 'n2', 'color' => 'purple', 'icon' => 'keypad',    'label' => 'IVR menu',          'sub' => 'Caller presses 2' ),
	array( 'slot' => 'n3', 'color' => 'amber',  'icon' => 'people',    'label' => 'ACD queue',         'sub' => 'Skill · priority · SLA' ),
	array( 'slot' => 'n4', 'color' => 'green',  'icon' => 'headset',   'label' => 'Agent softphone',   'sub' => 'Answers in 8s' ),
	array( 'slot' => 'n5', 'color' => 'slate',  'icon' => 'voicemail', 'label' => 'Voicemail',         'sub' => 'Transcript + summary' ),
);

$replace_chips = array_values(
	array_filter(
		wp_list_pluck( (array) get_field( 'phone_replaces' ), 'label' )
	)
);

if ( ! $replace_chips ) {
	$replace_chips = array( 'PBX dial-plan code', 'Carrier contract', 'ACD appliance', 'Voicemail system', 'Slack for agents' );
}

$cards = array_values(
	array_filter(
		(array) get_field( 'phone_cards' ),
		function ( $card ) {
			return ! empty( $card['title'] );
		}
	)
);

if ( ! $cards ) {
	$cards = array(
		array(
			'icon'  => 'tree',
			'color' => 'blue',
			'title' => 'Visual IVR builder',
			'body'  => 'Build call menus on a drag-and-drop canvas, then route callers by the key they press or the intent they speak — straight to the queue or agent you pick by name.',
			'chip'  => 'Replaces PBX dial-plan code',
			'new'   => false,
		),
		array(
			'icon'  => 'database',
			'color' => 'blue',
			'title' => 'SIP trunk BYOC',
			'body'  => 'Register your PBX or authenticate by IP, and watch every registration handshake and call attempt on the trunk’s live monitoring panel.',
			'chip'  => 'Replaces a carrier contract',
			'new'   => false,
		),
		array(
			'icon'  => 'people',
			'color' => 'amber',
			'title' => 'ACD call queues',
			'body'  => 'Distribute inbound calls by skill, priority, and business hours. A caller on hold can keep their place and take a callback when their turn comes.',
			'chip'  => 'Replaces an ACD appliance',
			'new'   => false,
		),
		array(
			'icon'  => 'voicemail',
			'color' => 'slate',
			'title' => 'Voicemail, greetings & warm transfer',
			'body'  => 'Branded greetings per box, voicemail with a transcript and summary sent to your team, and warm transfer with music on hold instead of dead air.',
			'chip'  => 'Replaces a voicemail system',
			'new'   => false,
		),
		array(
			'icon'  => 'whatsapp',
			'color' => 'green',
			'title' => 'WhatsApp Business Calling',
			'body'  => 'Place and receive calls inside a WhatsApp conversation on the same softphone your team uses for PSTN lines, metered per destination.',
			'chip'  => 'New surface — no equivalent',
			'new'   => true,
		),
		array(
			'icon'  => 'chat',
			'color' => 'purple',
			'title' => 'Team chat channels',
			'body'  => 'Threaded channels with searchable history and live presence, in the same workspace your agents take calls in, so a handoff never leaves Orbit.',
			'chip'  => 'Replaces Slack for agents',
			'new'   => false,
		),
	);
}
?>
<section class="phone-system" id="phone-system">
	<div class="phone-system__frame">
		<div class="phone-system__header">
			<p class="phone-system__eyebrow" data-animate="fade">
				<span class="phone-system__section-dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<h2 class="phone-system__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
			<p class="phone-system__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
		</div>

		<div class="phone-system__flow" data-animate="fade">
			<div class="phone-system__flow-bar">
				<p class="phone-system__live">
					<span class="phone-system__live-pill"><span class="phone-system__live-dot" aria-hidden="true"></span>LIVE</span>
					<strong>Inbound call · +1 415 ••• 0122</strong>
				</p>
				<p class="phone-system__flow-meta">Answered in 8s · 1 of 24 active calls</p>
			</div>
			<div class="phone-system__flow-canvas">
				<?php
				foreach ( $flow_nodes as $node ) :
					?>
					<div class="phone-node phone-node--<?php echo esc_attr( $node['slot'] ); ?> phone-node--color-<?php echo esc_attr( $node['color'] ); ?>">
						<span class="phone-node__tile" aria-hidden="true">
							<?php echo $icons[ $node['icon'] ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
						</span>
						<strong class="phone-node__label"><?php echo esc_html( $node['label'] ); ?></strong>
						<span class="phone-node__sub"><?php echo esc_html( $node['sub'] ); ?></span>
					</div>
				<?php endforeach; ?>
				<span class="phone-link phone-link--l1" aria-hidden="true">
					<svg class="phone-link__line" width="144" height="2" viewBox="0 0 144 2" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0 0.700195H144" stroke="#B9C4D4" stroke-width="1.4"/></svg>
					<svg class="phone-link__arrow" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0.75 0.75L6.75 5.75L0.75 10.75" stroke="#8FA0B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
				<span class="phone-link phone-link--l2" aria-hidden="true">
					<svg class="phone-link__line" width="144" height="2" viewBox="0 0 144 2" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0 0.700195H144" stroke="#B9C4D4" stroke-width="1.4"/></svg>
					<svg class="phone-link__arrow" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0.75 0.75L6.75 5.75L0.75 10.75" stroke="#8FA0B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
				<span class="phone-link phone-link--l3" aria-hidden="true">
					<svg class="phone-link__line" width="144" height="2" viewBox="0 0 144 2" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0 0.700195H144" stroke="#B9C4D4" stroke-width="1.4"/></svg>
					<svg class="phone-link__arrow" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0.75 0.75L6.75 5.75L0.75 10.75" stroke="#8FA0B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
				<span class="phone-link phone-link--l4 phone-link--dashed" aria-hidden="true">
					<svg class="phone-link__line" width="144" height="2" viewBox="0 0 144 2" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0 0.700195H144" stroke="#B9C4D4" stroke-width="1.4" stroke-dasharray="4 6"/></svg>
					<svg class="phone-link__arrow" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M0.75 0.75L6.75 5.75L0.75 10.75" stroke="#8FA0B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<span class="phone-link__tag">no answer</span>
				</span>
				<span class="phone-branch phone-branch--ivr" aria-hidden="true"></span>
				<span class="phone-branch phone-branch--agent" aria-hidden="true"></span>
				<div class="phone-node phone-node--wa phone-node--color-green">
					<span class="phone-node__tile" aria-hidden="true"><img src="<?php echo esc_url( $whatsapp_src ); ?>" alt="" width="32" height="32"></span>
					<strong class="phone-node__label">WhatsApp Business Calling</strong>
					<span class="phone-node__sub">Inbound and outbound inside the chat thread</span>
				</div>
				<div class="phone-node phone-node--tc phone-node--color-purple">
					<span class="phone-node__tile" aria-hidden="true">
						<?php echo $icons['chat']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
					</span>
					<strong class="phone-node__label">Team chat channels</strong>
					<span class="phone-node__sub">Threads, presence, handoff without leaving Orbit</span>
				</div>
			</div>
		</div>

		<div class="phone-system__replaces" data-animate="fade">
			<p class="phone-system__replaces-label">What Orbit replaces</p>
			<ul class="phone-system__chips">
				<?php foreach ( $replace_chips as $chip ) : ?>
					<li class="phone-chip phone-chip--wide"><span class="phone-chip__x" aria-hidden="true"><?php echo $icon_x; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span><?php echo esc_html( $chip ); ?></li>
				<?php endforeach; ?>
				<li class="phone-system__arrow" aria-hidden="true">
					<svg viewBox="0 0 40 12" fill="none"><path d="M0 6h34M30 1l5 5-5 5" stroke="currentColor" stroke-width="1.6"/></svg>
				</li>
				<li class="phone-chip phone-chip--wide phone-chip--active"><span class="phone-chip__x phone-chip__check" aria-hidden="true">✓</span>Orbit · one platform</li>
			</ul>
		</div>

		<div class="phone-system__cards">
			<?php
			foreach ( $cards as $card ) :
				$is_whatsapp = 'whatsapp' === $card['icon'];
				?>
				<article class="phone-card phone-card--<?php echo esc_attr( $card['color'] ); ?>" data-animate="fade">
					<span class="phone-card__tile" aria-hidden="true">
						<?php if ( $is_whatsapp ) : ?>
							<img src="<?php echo esc_url( $whatsapp_src ); ?>" alt="" width="24" height="24">
						<?php else : ?>
							<?php echo $card_icons[ $card['icon'] ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
						<?php endif; ?>
					</span>
					<h3 class="phone-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p class="phone-card__body"><?php echo esc_html( $card['body'] ); ?></p>
					<span class="phone-chip <?php echo $card['new'] ? 'phone-chip--new' : ''; ?>">
						<span class="phone-chip__x <?php echo $card['new'] ? 'phone-chip__check' : ''; ?>" aria-hidden="true"><?php echo $card['new'] ? $icon_plus : $icon_x; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
						<?php echo esc_html( $card['chip'] ); ?>
					</span>
				</article>
			<?php endforeach; ?>
		</div>

		<!--
		Mobile-only layout (<768px) — Figma 688:1008 ("UCaaS — Light mobile"),
		a dedicated single-column adaptation: one bordered "inbound call flow"
		panel (5 steps + 2 connected-channel chips), a filter-chip row, and 6
		capability cards. Reuses the same $flow_nodes/$cards PHP data as desktop.
		-->
		<div class="phone-system-mobile">
			<div class="phone-m__header">
				<p class="phone-m__eyebrow" data-animate="fade">
					<span class="phone-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( strtoupper( $eyebrow ) ); ?>
				</p>
				<h2 class="phone-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="phone-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="phone-m__flow" data-animate="fade">
				<div class="phone-m__flow-head">
					<p class="phone-m__flow-live">
						<span class="phone-m__flow-live-dot" aria-hidden="true"></span>
						Inbound call · +1 415 ••• 0122
					</p>
					<p class="phone-m__flow-meta">Answered in 8s</p>
				</div>
				<div class="phone-m__flow-divider"></div>
				<?php foreach ( $flow_nodes as $i => $node ) : ?>
					<div class="phone-m-step<?php echo ( count( $flow_nodes ) - 1 === $i ) ? ' phone-m-step--last' : ''; ?>">
						<div class="phone-m-step__rail">
							<span class="phone-m-step__tile phone-node--color-<?php echo esc_attr( $node['color'] ); ?>">
								<?php echo $icons[ $node['icon'] ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
							</span>
							<?php if ( count( $flow_nodes ) - 1 !== $i ) : ?>
								<span class="phone-m-step__connector" aria-hidden="true"></span>
							<?php endif; ?>
						</div>
						<div class="phone-m-step__copy">
							<p class="phone-m-step__title"><?php echo esc_html( $node['label'] ); ?></p>
							<p class="phone-m-step__sub"><?php echo esc_html( $node['sub'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="phone-m__channels">
					<div class="phone-m__channel phone-m__channel--wa">
						<img src="<?php echo esc_url( $whatsapp_src ); ?>" alt="" width="22" height="22">
						<span>WhatsApp Business Calling</span>
					</div>
					<div class="phone-m__channel phone-m__channel--chat">
						<?php echo $icons['chat']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
						<span>Team chat</span>
					</div>
				</div>
			</div>

			<div class="phone-m__filters" data-animate="fade">
				<span class="phone-m__filter">PBX-grade phone system</span>
				<span class="phone-m__filter">Carrier termination</span>
				<span class="phone-m__filter">ACD operations</span>
				<span class="phone-m__filter">Voicemail system</span>
				<span class="phone-m__filter">Agent softphone</span>
				<span class="phone-m__filter phone-m__filter--active">✓ Chat + omni-platform</span>
			</div>

			<div class="phone-m__cards">
				<?php foreach ( $cards as $card ) : ?>
					<?php $is_whatsapp = 'whatsapp' === $card['icon']; ?>
					<article class="phone-m-card phone-card--<?php echo esc_attr( $card['color'] ); ?>" data-animate="fade">
						<span class="phone-m-card__tile phone-card--<?php echo esc_attr( $card['color'] ); ?>" aria-hidden="true">
							<?php if ( $is_whatsapp ) : ?>
								<img src="<?php echo esc_url( $whatsapp_src ); ?>" alt="" width="20" height="20">
							<?php else : ?>
								<?php echo $card_icons[ $card['icon'] ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
							<?php endif; ?>
						</span>
						<h3 class="phone-m-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
						<p class="phone-m-card__body"><?php echo esc_html( $card['body'] ); ?></p>
						<span class="phone-m-card__tag phone-card--<?php echo esc_attr( $card['color'] ); ?>">
							↳ <?php echo esc_html( $card['chip'] ); ?>
						</span>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

