<?php
/**
 * Template part: Channel memory.
 * Figma: 1:197 + 1:192/1:193/1:5900 and 1:194 + 1:195/1:196/1:5905/1:5937.
 * Photos from Media Library. Glows are Figma 1:62 / 1:191 SVG fills (transparent). Badge icons are Figma paths.
 * Motion empty — copy fades, photos enter as a group.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$row_one = array(
	'headline' => get_field( 'memory_1_headline' ),
	'body'     => get_field( 'memory_1_body' ),
	'point'    => get_field( 'memory_1_point' ),
	'photo'    => (int) get_field( 'memory_1_photo' ),
);
$row_two = array(
	'headline' => get_field( 'memory_2_headline' ),
	'body'     => get_field( 'memory_2_body' ),
	'point_a'  => get_field( 'memory_2_point_a' ),
	'point_b'  => get_field( 'memory_2_point_b' ),
	'photo'    => (int) get_field( 'memory_2_photo' ),
);

if ( ! $row_one['headline'] ) {
	$row_one['headline'] = 'Every channel your customer uses. One platform that remembers them.';
}
if ( ! $row_one['body'] ) {
	$row_one['body'] = 'Orbit connects voice, messaging, email, WhatsApp and 11 more channels into a single runtime. When your customer switches channels, the context stays. No resets. No blind spots';
}
if ( ! $row_one['point'] ) {
	$row_one['point'] = '14 channels, one architecture';
}
if ( ! $row_one['photo'] ) {
	$row_one['photo'] = orbit_get_attachment_id_by_filename( ORBIT_MEMORY_PHOTO_A_ID );
}

if ( ! $row_two['headline'] ) {
	$row_two['headline'] = 'Your customer already switched channels. Did your platform keep up?';
}
if ( ! $row_two['body'] ) {
	$row_two['body'] = 'Whether it\'s a WhatsApp message, a phone call, or an email — Orbit follows the conversation, not the channel. Every interaction connected. Every customer remembered.';
}
if ( ! $row_two['point_a'] ) {
	$row_two['point_a'] = '14 channels, zero dropped context';
}
if ( ! $row_two['point_b'] ) {
	$row_two['point_b'] = 'One customer profile across every touchpoint';
}
if ( ! $row_two['photo'] ) {
	$row_two['photo'] = orbit_get_attachment_id_by_filename( ORBIT_MEMORY_PHOTO_B_ID );
}

$doc_icon = '<svg viewBox="0 0 16 16" width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="#007BFF"/></svg>';
$layers_icon = '<svg viewBox="0 0 16 16" width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6 1.00009V13L9.99998 15V3.002L6 1.00009Z" fill="#007BFF"/><path d="M5 13L4.99998 1.00009L1.40251 3.04566C1.15509 3.17502 1 3.43111 1 3.71031V14.2501C1 14.5203 1.14535 14.7696 1.38048 14.9027C1.61562 15.0359 1.90419 15.0322 2.13588 14.8932L5 13Z" fill="#007BFF"/><path d="M14.6935 12.1049L11 15V3.002L13.8641 1.10688C14.0958 0.967862 14.3844 0.964221 14.6195 1.09735C14.8547 1.23048 15 1.4798 15 1.75V11.5001C15 11.739 14.8862 11.9636 14.6935 12.1049Z" fill="#007BFF"/></svg>';

// Figma 1:62 / 1:191 — exported ellipse fill (1685 viewBox, #1B50FF, blur 300). Transparent, not a black PNG.
$glow_svg = static function ( $filter_id ) {
	return '<svg class="memory__glow-img" viewBox="0 0 1685 1685" width="1685" height="1685" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><g filter="url(#' . $filter_id . ')"><circle cx="842.5" cy="842.5" r="242.5" fill="#1B50FF"/></g><defs><filter id="' . $filter_id . '" x="0" y="0" width="1685" height="1685" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="300" result="effect1_foregroundBlur"/></filter></defs></svg>';
};
?>
<section class="memory" id="channel-memory">
	<div class="memory__frame">
		<div class="memory__stage">
			<article class="memory__row memory__row--photo-start">
			<div class="memory__glow memory__glow--left" aria-hidden="true">
				<?php echo $glow_svg( 'memory-glow-l' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<?php if ( $row_one['photo'] ) : ?>
				<figure class="memory__photo memory__photo--a" data-animate="group">
					<?php
					echo wp_get_attachment_image(
						$row_one['photo'],
						'full',
						false,
						array(
							'class' => 'memory__photo-img',
							'alt'   => '',
						)
					);
					?>
				</figure>
			<?php endif; ?>
			<div class="memory__copy" data-animate="fade">
				<h2 class="memory__headline"><?php echo esc_html( $row_one['headline'] ); ?></h2>
				<p class="memory__body"><?php echo esc_html( $row_one['body'] ); ?></p>
				<p class="memory__point">
					<span class="memory__point-icon"><?php echo $doc_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<span class="memory__point-text"><?php echo esc_html( $row_one['point'] ); ?></span>
				</p>
			</div>
		</article>

		<article class="memory__row memory__row--photo-end">
			<div class="memory__glow memory__glow--right" aria-hidden="true">
				<?php echo $glow_svg( 'memory-glow-r' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="memory__copy" data-animate="fade">
				<h2 class="memory__headline"><?php echo esc_html( $row_two['headline'] ); ?></h2>
				<p class="memory__body memory__body--on-brand"><?php echo esc_html( $row_two['body'] ); ?></p>
				<ul class="memory__points">
					<li class="memory__point">
						<span class="memory__point-icon"><?php echo $doc_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span class="memory__point-text"><?php echo esc_html( $row_two['point_a'] ); ?></span>
					</li>
					<li class="memory__point">
						<span class="memory__point-icon"><?php echo $layers_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span class="memory__point-text"><?php echo esc_html( $row_two['point_b'] ); ?></span>
					</li>
				</ul>
			</div>
			<?php if ( $row_two['photo'] ) : ?>
				<figure class="memory__photo memory__photo--b" data-animate="group">
					<?php
					echo wp_get_attachment_image(
						$row_two['photo'],
						'full',
						false,
						array(
							'class' => 'memory__photo-img',
							'alt'   => '',
						)
					);
					?>
				</figure>
			<?php endif; ?>
		</article>
		</div>
	</div>
</section>
