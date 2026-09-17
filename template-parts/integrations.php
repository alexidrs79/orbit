<?php
/**
 * Template part: Integrations.
 * Figma: 48:113, 1440 × 917 at (0, 13144). Header 1:6356 at (388, 120).
 * Diagram 1:6370 at (0, 325) 1440 × 472.
 * Dots 1:6371 at (482, −3) 477×477, soft-light.
 * Glow 1:6483 324×187 @ (558, 145), #325FEC blur 142.
 * Tiles: 64×64, radius 13.797, fill rgba(13,96,252,0.13), gradient stroke 0.862.
 * Motion empty — fade copy only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'int_eyebrow' );
$headline = get_field( 'int_headline' );
$body     = get_field( 'int_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Integration';
}
if ( ! $headline ) {
	$headline = 'Connect the tools you already rely on.';
}
if ( ! $body ) {
	$body = 'Hundreds of native integrations — from your CRM and helpdesk to your store and data warehouse. Salesforce, HubSpot, Shopify, Slack, Intercom, and more. Zapier for everything else.';
}

$img = static function ( $stem, $class, $w = null, $h = null ) {
	$id = orbit_get_attachment_id_by_filename( $stem );
	if ( ! $id ) {
		return;
	}
	$attrs = array(
		'class'    => $class,
		'alt'      => '',
		'loading'  => 'eager',
		'decoding' => 'async',
	);
	if ( null !== $w ) {
		$attrs['width'] = $w;
	}
	if ( null !== $h ) {
		$attrs['height'] = $h;
	}
	echo wp_get_attachment_image( $id, 'full', false, $attrs );
};

$wire = static function ( $left, $top, $box_w, $box_h, $inner_w, $inner_h, $rot, $inset, $stem ) use ( $img ) {
	echo '<div class="int-wire" style="left:' . esc_attr( $left . 'px' ) . ';top:' . esc_attr( $top . 'px' ) . ';width:' . esc_attr( $box_w . 'px' ) . ';height:' . esc_attr( $box_h . 'px' ) . '" aria-hidden="true">';
	echo '<div class="int-wire__rot int-wire__rot--' . esc_attr( $rot ) . '">';
	echo '<div class="int-wire__src" style="width:' . esc_attr( $inner_w . 'px' ) . ';height:' . esc_attr( $inner_h . 'px' ) . '">';
	echo '<div class="int-wire__img" style="inset:' . esc_attr( $inset ) . '">';
	$img( $stem, 'int-wire__asset' );
	echo '</div></div></div></div>';
};

$tile = static function ( $left, $top, $stem, $logo_w, $logo_h, $side = 'left' ) use ( $img ) {
	echo '<div class="int-tile int-tile--' . esc_attr( $side ) . '" style="left:' . esc_attr( $left . 'px' ) . ';top:' . esc_attr( $top . 'px' ) . '">';
	echo '<span class="int-tile__logo" style="width:' . esc_attr( $logo_w . 'px' ) . ';height:' . esc_attr( $logo_h . 'px' ) . '">';
	$img( $stem, 'int-tile__img', $logo_w, $logo_h );
	echo '</span></div>';
};

$tile_full = static function ( $left, $top, $stem ) use ( $img ) {
	echo '<div class="int-tile-full" style="left:' . esc_attr( $left . 'px' ) . ';top:' . esc_attr( $top . 'px' ) . '" aria-hidden="true">';
	$img( $stem, 'int-tile-full__img', 64, 64 );
	echo '</div>';
};

	/*
	 * Glow 1:6483 — 324×187 #325FEC, layer blur 142. Hub pill shadows
	 * stay on .int-hub__aura (Figma 1:6523). No extra hotspot cores.
	 */
$glow_svg = '<svg class="int-glow__img" viewBox="0 0 1176 1039" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><g filter="url(#int-glow-soft)"><rect x="426" y="426" width="324" height="187" rx="163" fill="#325FEC"/></g><defs><filter id="int-glow-soft" x="0" y="0" width="1176" height="1039" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="142" result="effect1_foregroundBlur"/></filter></defs></svg>';
?>
<section class="int" id="integrations">
	<div class="int__frame">
		<?php
		/*
		 * Dots OUTSIDE .int__stage (transform isolates soft-light) and ABOVE
		 * the glow so they blend against black + wash — that was the correct look.
		 * Figma Layer_1: 477×477 at diagram (482, −3) → section (482, 322).
		 */
		$dots_id = orbit_get_attachment_id_by_filename( 'int-dots' );
		if ( $dots_id ) :
			?>
		<div class="int-diagram__dots" aria-hidden="true">
			<?php
			echo wp_get_attachment_image(
				$dots_id,
				'full',
				false,
				array(
					'class'    => 'int-diagram__dots-img',
					'alt'      => '',
					'loading'  => 'eager',
					'decoding' => 'async',
					'width'    => 477,
					'height'   => 477,
				)
			);
			?>
		</div>
		<?php endif; ?>
		<div class="int__stage">
			<div class="int__head" data-animate="fade">
				<div class="int__intro">
					<p class="int__eyebrow">
						<span class="int__dot orbit-pulse-dot" aria-hidden="true"></span>
						<?php echo esc_html( $eyebrow ); ?>
					</p>
					<h2 class="int__headline"><?php echo esc_html( $headline ); ?></h2>
				</div>
				<p class="int__body"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="int-diagram" aria-hidden="true">
				<?php
				/*
				 * Glow lives inside the diagram so mobile scale keeps it
				 * locked to the Orbit hub (Figma 1:6483 at 558, 145).
				 */
				?>
				<div class="int-glow">
					<?php echo $glow_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<?php
				/* Right spokes */
				$wire( 810, 81, 388, 162, 162, 388, 'neg90-flip', '0 -1.22% 0 -1.23%', 'int-line-1476' );
				$wire( 810, 243, 388, 161, 161, 388, '90', '0 -1.22% 0 -1.24%', 'int-line-1480' );
				$wire( 810, 153.5, 504, 89.5, 89.5, 504, 'neg90-flip', '0 -2.22% 0 -2.23%', 'int-line-1479' );
				$wire( 810, 243, 504, 100, 100, 504, '90', '0 -1.99% 0 -2%', 'int-line-1481' );
				/* Left spokes */
				$wire( 241, 242, 388, 162, 162, 388, '90-flip', '0 -1.22% 0 -1.23%', 'int-line-1482' );
				$wire( 241, 81, 388, 161, 161, 388, 'neg90', '0 -1.22% 0 -1.24%', 'int-line-1483' );
				$wire( 125, 242, 504, 89.5, 89.5, 504, '90-flip', '0 -2.22% 0 -2.23%', 'int-line-1484' );
				$wire( 125, 142, 504, 100, 100, 504, 'neg90', '0 -1.99% 0 -2%', 'int-line-1485' );

				/* Left tiles — CSS chrome + logo leaf */
				$tile( 410, 122, 'int-logo-salesforce', 46.857, 32, 'left' );
				$tile( 146, 119, 'int-logo-woocommerce', 46.857, 27.429, 'left' );
				$tile( 294, 151, 'int-logo-shopify', 35.429, 34.286, 'left' );
				$tile( 319, 349, 'int-logo-segment', 35.2, 35.6, 'left' );
				$tile( 163, 296, 'int-logo-jira', 34.286, 34.286, 'left' );
				$tile( 333, 244, 'int-logo-stripe', 38.857, 38.857, 'left' );
				/* Right tiles */
				$tile( 1217, 123, 'int-logo-zendesk', 40, 29.714, 'right' );
				$tile( 959, 293, 'int-logo-google', 35.429, 34.286, 'right' );
				$tile( 1110, 366, 'int-logo-slack', 32, 32, 'right' );
				$tile( 1159, 42, 'int-logo-microsoft', 34.286, 38.857, 'right' );
				$tile( 1077, 167, 'int-logo-zapier', 32, 32, 'right' );

				/* Full-frame tiles (Figma export includes gradient stroke + mark) */
				$tile_full( 227, 52, 'int-tile-intercom' );
				$tile_full( 959, 123, 'int-tile-hubspot' );
				$tile_full( 1202, 297, 'int-tile-linear' );
				?>

				<div class="int-hub">
					<div class="int-hub__aura" aria-hidden="true"></div>
					<div class="int-hub__pill">
						<span class="int-hub__mark">
							<?php $img( 'int-orbit-mark', 'int-hub__mark-img', 151, 58 ); ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
