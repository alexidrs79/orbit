<?php
/**
 * Template part: Network CTA.
 * Figma: 1:198, 1240 × 367 at (100, 11103).
 * Card fill: linear-gradient(95deg, #001A6D 8.49%, #007BFF 93.23%), r40.
 * Globe 1:202 from Media Library. Copy 48:104. Motion empty — fade only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline   = get_field( 'ncta_headline' );
$body       = get_field( 'ncta_body' );
$cta1_label = get_field( 'ncta_cta1_label' );
$cta1_url   = get_field( 'ncta_cta1_url' );
$cta2_label = get_field( 'ncta_cta2_label' );
$cta2_url   = get_field( 'ncta_cta2_url' );
$globe_id   = orbit_get_attachment_id_by_filename( ORBIT_NCTA_GLOBE_ID );

if ( ! $headline ) {
	$headline = 'Build on a network you actually own.';
}
if ( ! $body ) {
	$body = 'Voice, messaging, and AI agents on infrastructure we run as carrier of record. A few API calls to start — no telecom contracts, no per-seat fees.';
}
if ( ! $cta1_label ) {
	$cta1_label = 'Talk to Sales';
}
if ( ! $cta1_url ) {
	$cta1_url = ORBIT_CTA_LOGIN_URL;
}
if ( ! $cta2_label ) {
	$cta2_label = 'Start Building';
}
if ( ! $cta2_url ) {
	$cta2_url = ORBIT_CTA_LOGIN_URL;
}
?>
<section class="ncta" id="network">
	<div class="ncta__frame">
		<div class="ncta__stage">
			<div class="ncta-card">
				<?php if ( $globe_id ) : ?>
					<div class="ncta-globe" aria-hidden="true">
						<?php
						echo wp_get_attachment_image(
							$globe_id,
							'full',
							false,
							array(
								'class'    => 'ncta-globe__img',
								'alt'      => '',
								'loading'  => 'lazy',
								'decoding' => 'async',
							)
						);
						?>
					</div>
				<?php endif; ?>
				<div class="ncta-copy" data-animate="fade">
					<div class="ncta-copy__text">
						<h2 class="ncta-copy__headline"><?php echo esc_html( $headline ); ?></h2>
						<p class="ncta-copy__body"><?php echo esc_html( $body ); ?></p>
					</div>
					<div class="ncta-copy__ctas">
						<a class="hero__cta hero__cta--ghost" href="<?php echo esc_url( orbit_cta_url( $cta1_url, 'sales' ) ); ?>"><?php echo esc_html( $cta1_label ); ?></a>
						<a class="hero__cta hero__cta--solid" href="<?php echo esc_url( orbit_cta_url( $cta2_url, 'signup' ) ); ?>"><?php echo esc_html( $cta2_label ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
