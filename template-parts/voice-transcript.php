<?php
/**
 * Template part: Voice transcript.
 * Figma: copy 48:122 + visual 1:6678 (622 × 455, r40).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'voice_eyebrow' );
$headline = get_field( 'voice_headline' );
$body     = get_field( 'voice_body' );
$title    = get_field( 'voice_transcript_title' );
$name     = get_field( 'voice_caller_name' );
$phone    = get_field( 'voice_caller_phone' );
$timer    = get_field( 'voice_caller_timer' );
$live     = get_field( 'voice_live_label' );
$photo_id = (int) get_field( 'voice_photo' );
$avatar_id = (int) get_field( 'voice_caller_avatar' );
$lines    = array_values(
	array_filter(
		(array) get_field( 'voice_transcript_lines' ),
		function ( $line ) {
			return ! empty( $line['text'] );
		}
	)
);

if ( ! $eyebrow ) {
	$eyebrow = 'Voice · the production layer';
}
if ( ! $headline ) {
	$headline = 'Assembled stacks ship a demo. Not a product.';
}
if ( ! $body ) {
	$body = 'Wire Vapi for the agent, Twilio for numbers, Aircall for the dialer, NICE for QM; pick the best API per micro‑task. The modular architecture lets you swap a component by rewriting a single integration. It works—until you ship.';
}
if ( ! $title ) {
	$title = 'Realtime Transcript';
}
if ( ! $name ) {
	$name = 'Sarah Martinez';
}
if ( ! $phone ) {
	$phone = '+1 (628) 555-0144';
}
if ( ! $timer ) {
	$timer = '03:13';
}
if ( ! $live ) {
	$live = 'LIVE';
}
if ( ! $lines ) {
	$lines = array(
		array(
			'time' => '02:14',
			'text' => '"And the prorated charge is for the days between the upgrade and your renewal eleven days at the new tier."',
			'top'  => 61,
		),
		array(
			'time' => '02:18',
			'text' => '“Thanks for the clarification. Could you also let me know how the total amount will be reflected on my next invoice?”',
			'top'  => 119,
		),
	);
}

if ( ! $photo_id ) {
	$photo_id = orbit_get_attachment_id_by_filename( ORBIT_VOICE_PHOTO_ID );
}
if ( ! $avatar_id ) {
	$avatar_id = orbit_get_attachment_id_by_filename( ORBIT_VOICE_AVATAR_ID );
}

// Figma 1:6681 bar lengths, stroke #007BFF / 2px, vertically centered.
$wave_bars = array(
	3.18, 6.36, 16.97, 11.67, 7.42, 6.36, 16.44, 33.94, 25.45, 11.67,
	5.30, 12.73, 22.27, 15.91, 9.55, 4.24, 7.42, 13.79, 21.21, 35.00,
	28.64, 25.45, 28.64, 33.94, 22.27, 19.09, 13.79, 7.42, 10.61, 22.27,
	9.55, 5.30, 9.55, 28.64, 28.64, 13.79, 20.15, 15.91, 8.48, 5.30,
	5.30, 13.79, 21.21, 31.82, 21.21, 29.70, 23.33, 7.42, 8.48, 13.79,
	21.21, 4.24, 14.85, 21.21, 16.97, 11.67, 7.42, 8.48,
);

$controls = array(
	array( 'record', 'ORBIT_VOICE_ICON_RECORD_ID' ),
	array( 'mute', 'ORBIT_VOICE_ICON_MUTE_ID' ),
	array( 'pause', 'ORBIT_VOICE_ICON_PAUSE_ID' ),
	array( 'keypad', 'ORBIT_VOICE_ICON_KEYPAD_ID' ),
	array( 'more', 'ORBIT_VOICE_ICON_MORE_ID' ),
);
?>
<section class="voice-tsec" id="voice-transcript">
	<div class="voice__frame">
		<div class="voice__stage">
		<div class="voice__copy" data-animate="fade">
			<p class="voice__eyebrow">
				<span class="voice__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<div class="voice__lead">
				<h2 class="voice__headline"><?php echo esc_html( $headline ); ?></h2>
				<p class="voice__body"><?php echo esc_html( $body ); ?></p>
			</div>
		</div>

		<div class="voice__visual" data-animate="group">
			<?php if ( $photo_id ) : ?>
				<div class="voice__photo">
					<?php
					echo wp_get_attachment_image(
						$photo_id,
						'full',
						false,
						array(
							'class' => 'voice__photo-img',
							'alt'   => '',
						)
					);
					?>
				</div>
			<?php endif; ?>

			<div class="voice-wave" aria-hidden="true">
				<div class="voice-wave__bars">
					<?php foreach ( $wave_bars as $index => $height ) : ?>
						<span
							class="voice-wave__bar"
							style="--h: <?php echo esc_attr( $height ); ?>; --i: <?php echo (int) $index; ?>"
						></span>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="voice-note">
				<div class="voice-note__head">
					<span class="voice-note__icon">
						<?php orbit_print_icon( 'ORBIT_VOICE_ICON_TRANSCRIPT_ID', 'voice-note__icon-img' ); ?>
					</span>
					<p class="voice-note__title"><?php echo esc_html( $title ); ?></p>
				</div>
				<div class="voice-note__rule" aria-hidden="true"></div>
				<div class="voice-note__lines">
					<?php foreach ( $lines as $index => $line ) : ?>
						<?php
						$line_top = isset( $line['top'] ) ? (float) $line['top'] : ( 61 + ( $index * 58 ) );
						?>
						<div class="voice-note__line" style="--line-top: <?php echo esc_attr( $line_top ); ?>;">
							<?php if ( ! empty( $line['time'] ) ) : ?>
								<span class="voice-note__time"><?php echo esc_html( $line['time'] ); ?></span>
							<?php endif; ?>
							<p class="voice-note__text"><?php echo esc_html( $line['text'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="voice-caller">
				<?php if ( $avatar_id ) : ?>
					<div class="voice-caller__avatar">
						<?php
						echo wp_get_attachment_image(
							$avatar_id,
							'full',
							false,
							array(
								'class' => 'voice-caller__avatar-img',
								'alt'   => $name,
							)
						);
						?>
					</div>
				<?php endif; ?>
				<p class="voice-caller__name"><?php echo esc_html( $name ); ?></p>
				<p class="voice-caller__phone"><?php echo esc_html( $phone ); ?></p>
				<div class="voice-caller__live">
					<span class="voice-caller__live-dot" aria-hidden="true"></span>
					<span class="voice-caller__live-label"><?php echo esc_html( $live ); ?></span>
				</div>
				<p class="voice-caller__timer"><?php echo esc_html( $timer ); ?></p>
				<div class="voice-caller__controls" aria-hidden="true">
					<?php foreach ( $controls as $control ) : ?>
						<span class="voice-caller__ctrl voice-caller__ctrl--<?php echo esc_attr( $control[0] ); ?>">
							<?php orbit_print_icon( $control[1], 'voice-caller__ctrl-img voice-caller__ctrl-img--' . $control[0] ); ?>
						</span>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>
