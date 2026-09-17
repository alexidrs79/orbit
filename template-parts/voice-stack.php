<?php
/**
 * Template part: Voice stack.
 * Figma: diagram 1:6582 (575 × 651 at 132, 5599) + copy 48:116 (499 × 204 at 774, 5758).
 * Cards, labels, and dotted connectors are HTML/CSS. Icons from Media Library.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = get_field( 'vstack_headline' );
$body     = get_field( 'vstack_body' );
$layers   = array_values(
	array_filter(
		(array) get_field( 'vstack_layers' ),
		function ( $layer ) {
			return ! empty( $layer['label'] ) && ! empty( $layer['stack'] );
		}
	)
);

if ( ! $headline ) {
	$headline = 'We picked one stack per layer and committed to it.';
}
if ( ! $body ) {
	$body = 'Deepgram for speech-to-text. Cartesia and ElevenLabs for text-to-speech. A self-hosted SFU running in the same region as the dashboard. Our own SIP bridge, our own egress recorder, our own RTCP XR ingest.';
}

$defaults = array(
	array(
		'label'    => 'Speech to text',
		'stack'    => 'Deepgram',
		'icon_key' => 'ORBIT_VSTACK_ICON_STT_ID',
		'card_top' => -5,
		'icon_l'   => 48,
		'icon_t'   => 31,
		'icon_w'   => 73.374,
		'icon_h'   => 45.849,
		'line_t'   => 58,
	),
	array(
		'label'    => 'Text to Speech',
		'stack'    => 'Cartesia · ElevenLabs',
		'icon_key' => 'ORBIT_VSTACK_ICON_TTS_ID',
		'card_top' => 72.36,
		'icon_l'   => 48,
		'icon_t'   => 108.85,
		'icon_w'   => 73.374,
		'icon_h'   => 45.849,
		'line_t'   => 139,
	),
	array(
		'label'    => 'Model',
		'stack'    => 'Anthropic Claude',
		'icon_key' => 'ORBIT_VSTACK_ICON_MODEL_ID',
		'card_top' => 149.72,
		'icon_l'   => 48,
		'icon_t'   => 186.69,
		'icon_w'   => 73.374,
		'icon_h'   => 45.849,
		'line_t'   => 220,
	),
	array(
		'label'    => 'SIP Bridge',
		'stack'    => 'Own bridge, own switch',
		'icon_key' => 'ORBIT_VSTACK_ICON_SIP_ID',
		'card_top' => 227.08,
		'icon_l'   => 48,
		'icon_t'   => 264.54,
		'icon_w'   => 73.374,
		'icon_h'   => 45.849,
		'line_t'   => 301,
	),
	array(
		'label'    => 'Recording',
		'stack'    => 'Own egress recorder',
		'icon_key' => 'ORBIT_VSTACK_ICON_RECORD_ID',
		'card_top' => 304.44,
		'icon_l'   => 48,
		'icon_t'   => 342.39,
		'icon_w'   => 73.374,
		'icon_h'   => 45.849,
		'line_t'   => 382,
	),
	array(
		'label'    => 'Watchdog',
		'stack'    => 'Per-chunk barge-in',
		'icon_key' => 'ORBIT_VSTACK_ICON_WATCHDOG_ID',
		'card_top' => 381.8,
		'icon_l'   => 48,
		'icon_t'   => 420.24,
		'icon_w'   => 73.374,
		'icon_h'   => 45.849,
		'line_t'   => 463,
	),
	array(
		'label'    => 'SFU',
		'stack'    => 'Self-hosted (forked LiveKit)',
		'icon_key' => 'ORBIT_VSTACK_ICON_SFU_ID',
		'card_top' => 457,
		'icon_l'   => 54,
		'icon_t'   => 498,
		'icon_w'   => 62.904,
		'icon_h'   => 39.307,
		'line_t'   => 544,
	),
	array(
		'label'    => 'Turn detection',
		'stack'    => 'Pipecat smart-turn',
		'icon_key' => 'ORBIT_VSTACK_ICON_TURN_ID',
		'card_top' => 538,
		'icon_l'   => 54,
		'icon_t'   => 580,
		'icon_w'   => 62.904,
		'icon_h'   => 39.307,
		'line_t'   => 625,
	),
);

if ( $layers ) {
	foreach ( $layers as $index => $layer ) {
		if ( ! isset( $defaults[ $index ] ) ) {
			break;
		}
		$defaults[ $index ]['label'] = $layer['label'];
		$defaults[ $index ]['stack'] = $layer['stack'];
		if ( ! empty( $layer['icon'] ) ) {
			$defaults[ $index ]['icon_id'] = (int) $layer['icon'];
		}
	}
}
?>
<section class="vstack" id="voice-stack">
	<div class="vstack__frame">
		<div class="vstack__stage">
			<div class="vstack__diagram" data-animate="group">
				<div class="vstack__board">
				<?php foreach ( $defaults as $index => $row ) : ?>
					<div
						class="vstack-row"
						style="--i: <?php echo (int) $index; ?>; --card-top: <?php echo esc_attr( $row['card_top'] ); ?>px; --icon-l: <?php echo esc_attr( $row['icon_l'] ); ?>px; --icon-t: <?php echo esc_attr( $row['icon_t'] ); ?>px; --icon-w: <?php echo esc_attr( $row['icon_w'] ); ?>px; --icon-h: <?php echo esc_attr( $row['icon_h'] ); ?>px; --line-t: <?php echo esc_attr( $row['line_t'] ); ?>px;"
					>
						<div class="vstack-row__card" aria-hidden="true">
							<span class="vstack-row__face"></span>
						</div>
						<span class="vstack-row__line" aria-hidden="true">
							<svg viewBox="0 0 136 8" width="136" height="8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill="url(#vstack-line-<?php echo (int) $index; ?>)" d="M0.75 3.25C0.335786 3.25 0 3.58579 0 4C0 4.41421 0.335786 4.75 0.75 4.75V4V3.25ZM127.75 4C127.75 6.20914 129.541 8 131.75 8C133.959 8 135.75 6.20914 135.75 4C135.75 1.79086 133.959 0 131.75 0C129.541 0 127.75 1.79086 127.75 4ZM2.79688 4.75C3.21109 4.75 3.54688 4.41421 3.54688 4C3.54688 3.58579 3.21109 3.25 2.79688 3.25V4V4.75ZM6.89062 3.25C6.47641 3.25 6.14062 3.58579 6.14062 4C6.14062 4.41421 6.47641 4.75 6.89062 4.75V4V3.25ZM10.9844 4.75C11.3986 4.75 11.7344 4.41421 11.7344 4C11.7344 3.58579 11.3986 3.25 10.9844 3.25V4V4.75ZM15.0781 3.25C14.6639 3.25 14.3281 3.58579 14.3281 4C14.3281 4.41421 14.6639 4.75 15.0781 4.75V4V3.25ZM19.1719 4.75C19.5861 4.75 19.9219 4.41421 19.9219 4C19.9219 3.58579 19.5861 3.25 19.1719 3.25V4V4.75ZM23.2656 3.25C22.8514 3.25 22.5156 3.58579 22.5156 4C22.5156 4.41421 22.8514 4.75 23.2656 4.75V4V3.25ZM27.3594 4.75C27.7736 4.75 28.1094 4.41421 28.1094 4C28.1094 3.58579 27.7736 3.25 27.3594 3.25V4V4.75ZM31.4531 3.25C31.0389 3.25 30.7031 3.58579 30.7031 4C30.7031 4.41421 31.0389 4.75 31.4531 4.75V4V3.25ZM35.5469 4.75C35.9611 4.75 36.2969 4.41421 36.2969 4C36.2969 3.58579 35.9611 3.25 35.5469 3.25V4V4.75ZM39.6406 3.25C39.2264 3.25 38.8906 3.58579 38.8906 4C38.8906 4.41421 39.2264 4.75 39.6406 4.75V4V3.25ZM43.7344 4.75C44.1486 4.75 44.4844 4.41421 44.4844 4C44.4844 3.58579 44.1486 3.25 43.7344 3.25V4V4.75ZM47.8281 3.25C47.4139 3.25 47.0781 3.58579 47.0781 4C47.0781 4.41421 47.4139 4.75 47.8281 4.75V4V3.25ZM51.9219 4.75C52.3361 4.75 52.6719 4.41421 52.6719 4C52.6719 3.58579 52.3361 3.25 51.9219 3.25V4V4.75ZM56.0156 3.25C55.6014 3.25 55.2656 3.58579 55.2656 4C55.2656 4.41421 55.6014 4.75 56.0156 4.75V4V3.25ZM60.1094 4.75C60.5236 4.75 60.8594 4.41421 60.8594 4C60.8594 3.58579 60.5236 3.25 60.1094 3.25V4V4.75ZM64.2031 3.25C63.7889 3.25 63.4531 3.58579 63.4531 4C63.4531 4.41421 63.7889 4.75 64.2031 4.75V4V3.25ZM68.2969 4.75C68.7111 4.75 69.0469 4.41421 69.0469 4C69.0469 3.58579 68.7111 3.25 68.2969 3.25V4V4.75ZM72.3906 3.25C71.9764 3.25 71.6406 3.58579 71.6406 4C71.6406 4.41421 71.9764 4.75 72.3906 4.75V4V3.25ZM76.4844 4.75C76.8986 4.75 77.2344 4.41421 77.2344 4C77.2344 3.58579 76.8986 3.25 76.4844 3.25V4V4.75ZM80.5781 3.25C80.1639 3.25 79.8281 3.58579 79.8281 4C79.8281 4.41421 80.1639 4.75 80.5781 4.75V4V3.25ZM84.6719 4.75C85.0861 4.75 85.4219 4.41421 85.4219 4C85.4219 3.58579 85.0861 3.25 84.6719 3.25V4V4.75ZM88.7656 3.25C88.3514 3.25 88.0156 3.58579 88.0156 4C88.0156 4.41421 88.3514 4.75 88.7656 4.75V4V3.25ZM92.8594 4.75C93.2736 4.75 93.6094 4.41421 93.6094 4C93.6094 3.58579 93.2736 3.25 92.8594 3.25V4V4.75ZM96.9531 3.25C96.5389 3.25 96.2031 3.58579 96.2031 4C96.2031 4.41421 96.5389 4.75 96.9531 4.75V4V3.25ZM101.047 4.75C101.461 4.75 101.797 4.41421 101.797 4C101.797 3.58579 101.461 3.25 101.047 3.25V4V4.75ZM105.141 3.25C104.726 3.25 104.391 3.58579 104.391 4C104.391 4.41421 104.726 4.75 105.141 4.75V4V3.25ZM109.234 4.75C109.649 4.75 109.984 4.41421 109.984 4C109.984 3.58579 109.649 3.25 109.234 3.25V4V4.75ZM113.328 3.25C112.914 3.25 112.578 3.58579 112.578 4C112.578 4.41421 112.914 4.75 113.328 4.75V4V3.25ZM117.422 4.75C117.836 4.75 118.172 4.41421 118.172 4C118.172 3.58579 117.836 3.25 117.422 3.25V4V4.75ZM121.516 3.25C121.101 3.25 120.766 3.58579 120.766 4C120.766 4.41421 121.101 4.75 121.516 4.75V4V3.25ZM125.609 4.75C126.024 4.75 126.359 4.41421 126.359 4C126.359 3.58579 126.024 3.25 125.609 3.25V4V4.75ZM129.703 3.25C129.289 3.25 128.953 3.58579 128.953 4C128.953 4.41421 129.289 4.75 129.703 4.75V4V3.25ZM0.75 4V4.75H2.79688V4V3.25H0.75V4ZM6.89062 4V4.75H10.9844V4V3.25H6.89062V4ZM15.0781 4V4.75H19.1719V4V3.25H15.0781V4ZM23.2656 4V4.75H27.3594V4V3.25H23.2656V4ZM31.4531 4V4.75H35.5469V4V3.25H31.4531V4ZM39.6406 4V4.75H43.7344V4V3.25H39.6406V4ZM47.8281 4V4.75H51.9219V4V3.25H47.8281V4ZM56.0156 4V4.75H60.1094V4V3.25H56.0156V4ZM64.2031 4V4.75H68.2969V4V3.25H64.2031V4ZM72.3906 4V4.75H76.4844V4V3.25H72.3906V4ZM80.5781 4V4.75H84.6719V4V3.25H80.5781V4ZM88.7656 4V4.75H92.8594V4V3.25H88.7656V4ZM96.9531 4V4.75H101.047V4V3.25H96.9531V4ZM105.141 4V4.75H109.234V4V3.25H105.141V4ZM113.328 4V4.75H117.422V4V3.25H113.328V4ZM121.516 4V4.75H125.609V4V3.25H121.516V4ZM129.703 4V4.75H131.75V4V3.25H129.703V4Z"/>
								<defs>
									<linearGradient id="vstack-line-<?php echo (int) $index; ?>" x1="0.75" y1="4.5" x2="131.75" y2="4.5" gradientUnits="userSpaceOnUse">
										<stop stop-color="#fff" stop-opacity="0"/>
										<stop offset="1" stop-color="#fff"/>
									</linearGradient>
								</defs>
							</svg>
						</span>
						<span class="vstack-row__icon" aria-hidden="true">
							<?php
							if ( ! empty( $row['icon_id'] ) ) {
								echo wp_get_attachment_image(
									(int) $row['icon_id'],
									'full',
									false,
									array(
										'class' => 'vstack-row__icon-img',
										'alt'   => '',
									)
								);
							} else {
								orbit_print_icon( $row['icon_key'], 'vstack-row__icon-img' );
							}
							?>
						</span>
						<div class="vstack-row__copy">
							<p class="vstack-row__label"><?php echo esc_html( $row['label'] ); ?></p>
							<p class="vstack-row__stack"><?php echo esc_html( $row['stack'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>

			<div class="vstack__copy" data-animate="fade">
				<h2 class="vstack__headline"><?php echo esc_html( $headline ); ?></h2>
				<p class="vstack__body"><?php echo esc_html( $body ); ?></p>
			</div>
		</div>
	</div>
</section>
