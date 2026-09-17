<?php
/**
 * Template part: Pricing.
 * Figma: 48:112, 1442 × 912 at (0, 12232). Header 48:111, grid 48:110.
 * Icons from Media Library (Figma SVG exports). Motion empty — fade copy only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow   = get_field( 'price_eyebrow' );
$headline  = get_field( 'price_headline' );
$body      = get_field( 'price_body' );
$cta_label = get_field( 'price_cta_label' );
$cta_url   = get_field( 'price_cta_url' );
$cards     = array_values(
	array_filter(
		(array) get_field( 'price_cards' ),
		function ( $card ) {
			return ! empty( $card['title'] );
		}
	)
);

if ( ! $eyebrow ) {
	$eyebrow = 'Pricing Rates';
}
if ( ! $headline ) {
	$headline = 'No seats. No tiers. Just published rates.';
}
if ( ! $body ) {
	$body = 'Usage-based pricing across messaging, voice, video and AI with no seat licenses, bundle tiers, or long term commitments.';
}
if ( ! $cta_label ) {
	$cta_label = 'See full list';
}
if ( ! $cta_url ) {
	$cta_url = ORBIT_CTA_LOGIN_URL;
}

$icon_meta = array(
	array(
		'mod'   => 'sms',
		'const' => 'ORBIT_PRICE_ICON_SMS_ID',
		'tile'  => false,
	),
	array(
		'mod'   => 'wa',
		'const' => 'ORBIT_PRICE_ICON_WHATSAPP_ID',
		'tile'  => false,
	),
	array(
		'mod'   => 'voice',
		'const' => 'ORBIT_PRICE_ICON_VOICE_OUT_ID',
		'tile'  => false,
	),
	array(
		'mod'   => 'voice',
		'const' => 'ORBIT_PRICE_ICON_VOICE_IN_ID',
		'tile'  => false,
	),
	array(
		'mod'   => 'video',
		'const' => 'ORBIT_PRICE_ICON_VIDEO_ID',
		'tile'  => true,
	),
	array(
		'mod'   => 'number',
		'const' => 'ORBIT_PRICE_ICON_NUMBER_ID',
		'tile'  => true,
	),
	array(
		'mod'   => 'ai',
		'const' => 'ORBIT_PRICE_ICON_AI_ID',
		'tile'  => true,
	),
	array(
		'mod'   => 'record',
		'const' => 'ORBIT_PRICE_ICON_RECORD_ID',
		'tile'  => true,
	),
);

$defaults = array(
	array(
		'title' => 'SMS · A2P US',
		'price' => '$0.0079',
		'unit'  => 'per segment',
	),
	array(
		'title' => 'WhatsApp · service',
		'price' => '$0.00',
		'unit'  => '+ Meta conversation fee',
	),
	array(
		'title' => 'Voice · outbound US',
		'price' => '$0.013',
		'unit'  => 'per minute · own switch',
	),
	array(
		'title' => 'Voice · inbound US',
		'price' => '$0.0085',
		'unit'  => 'per minute',
	),
	array(
		'title' => 'Video · group room',
		'price' => '$0.004',
		'unit'  => 'per participant minute',
	),
	array(
		'title' => 'Number · US local',
		'price' => '$1.15',
		'unit'  => 'per month',
	),
	array(
		'title' => 'AI invocation',
		'price' => 'passthrough',
		'unit'  => 'Anthropic list + 0%',
	),
	array(
		'title' => 'Recording · storage',
		'price' => '$0.025',
		'unit'  => 'per GB-month',
	),
);

if ( ! $cards ) {
	$cards = $defaults;
}

$print_icon = static function ( $meta ) {
	$id = orbit_get_attachment_id_by_filename( constant( $meta['const'] ) );
	if ( ! $id ) {
		return;
	}
	$attrs = array(
		'class'    => $meta['tile'] ? 'price-icon__leaf-img' : 'price-icon__img',
		'alt'      => '',
		'loading'  => 'lazy',
		'decoding' => 'async',
	);
	if ( empty( $meta['tile'] ) ) {
		$attrs['width']  = 32;
		$attrs['height'] = 32;
	}
	$img = wp_get_attachment_image(
		$id,
		'full',
		false,
		$attrs
	);
	if ( $meta['tile'] ) {
		echo '<span class="price-icon__tile"><span class="price-icon__leaf">' . $img . '</span></span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		echo $img; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
};
?>
<section class="price" id="pricing">
	<div class="price__frame">
		<div class="price__stage">
			<div class="price__head" data-animate="fade">
				<div class="price__intro">
					<p class="price__eyebrow">
						<span class="price__dot orbit-pulse-dot" aria-hidden="true"></span>
						<?php echo esc_html( $eyebrow ); ?>
					</p>
					<h2 class="price__headline"><?php echo esc_html( $headline ); ?></h2>
					<p class="price__body"><?php echo esc_html( $body ); ?></p>
				</div>
				<a class="price__cta" href="<?php echo esc_url( orbit_cta_url( $cta_url, 'pricing' ) ); ?>"><?php echo esc_html( $cta_label ); ?></a>
			</div>
			<div class="price__grid">
				<?php foreach ( $cards as $i => $card ) : ?>
					<?php
					$meta  = $icon_meta[ $i ] ?? $icon_meta[0];
					$title = $card['title'];
					$rate  = $card['price'];
					$unit  = $card['unit'];
					?>
					<article class="price-card">
						<div class="price-card__inner">
							<div class="price-icon price-icon--<?php echo esc_attr( $meta['mod'] ); ?>">
								<?php $print_icon( $meta ); ?>
							</div>
							<div class="price-card__text">
								<h3 class="price-card__title"><?php echo esc_html( $title ); ?></h3>
								<div class="price-card__rate">
									<p class="price-card__amount"><?php echo esc_html( $rate ); ?></p>
									<p class="price-card__unit"><?php echo esc_html( $unit ); ?></p>
								</div>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<nav class="price__dots" hidden aria-label="<?php esc_attr_e( 'Pricing cards', 'orbit' ); ?>"></nav>
		</div>
	</div>
</section>
