<?php
/**
 * Template part: Conversational commerce.
 * Figma: 607:11164, 1440 × 1466 at (0, 9587).
 * Phone mockup + 4-step flow + 5 feature cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'commerce_eyebrow' );
$headline = get_field( 'commerce_headline' );
$body     = get_field( 'commerce_body' );
$features = get_field( 'commerce_features' );

if ( ! $eyebrow ) {
	$eyebrow = 'Conversational commerce';
}
if ( ! $headline ) {
	$headline = 'From first message to paid, without leaving the thread';
}
if ( ! $body ) {
	$body = 'Turn a conversation into a sale in the chat it started in. Orbit carries the shopper from a product catalog to a shared cart to a paid checkout across WhatsApp, RCS, and the channels with no native wallet.';
}

$commerce_src = static function ( $file ) {
	echo esc_url( get_template_directory_uri() . '/assets/img/commerce/' . $file );
};

$flow_steps = array(
	array(
		'n'       => '1',
		'label'   => 'Message',
		'caption' => 'Shopper replies in-thread',
	),
	array(
		'n'       => '2',
		'label'   => 'Catalog',
		'caption' => 'Products sent inline',
	),
	array(
		'n'              => '3',
		'label'          => 'Cart',
		'caption'        => 'One cart, any channel',
		'caption_mobile' => 'One-tap checkout',
	),
	array(
		'n'       => '4',
		'label'   => 'Paid',
		'caption' => 'Checkout captured',
	),
);

$default_features = array(
	array(
		'title' => 'Pay-by-link payment requests',
		'body'  => 'Mint a hosted checkout link and collect on the channels with no native wallet — SMS, email, Telegram, Viber, or a voice IVR. When the payment is captured, it reconciles back to the request automatically.',
		'icon'  => 'icon-pay-by-link.svg',
	),
	array(
		'title' => 'Unified cart & checkout',
		'body'  => 'One cart spans every channel: items added on WhatsApp Pay carry into an RCS carousel, and a checkout begun on one channel can be finished — and paid — on another. Totals re-derive server-side, and quiet carts are flagged for abandoned-cart recovery.',
		'icon'  => 'icon-cart.svg',
	),
	array(
		'title' => 'WhatsApp commerce catalogs',
		'body'  => 'Send shoppable messages straight from a linked Meta catalog — single products, multi-product lists, or your full catalog inline. Customers browse and add to cart without leaving the chat.',
		'icon'  => 'icon-whatsapp-catalog.svg',
	),
	array(
		'title' => 'RCS catalog carousels',
		'body'  => 'Bind the same Meta catalog to RCS Business Messaging and send a rich-card product carousel — an Add-to-cart chip per card and a Checkout action that closes the funnel in-thread.',
		'icon'  => 'icon-rcs-carousel.svg',
	),
	array(
		'title' => 'Agentic checkout & payment mandates',
		'body'  => 'Publish a hosted, agent-facing storefront that ChatGPT Instant Checkout, Perplexity, and other Agentic Commerce Protocol agents discover and buy from directly — no API key. Only a verified shopping agent can complete a purchase, and every charge is bounded by a spend-capped, revocable mandate.',
		'icon'  => 'icon-mandate.svg',
	),
	array(
		'title' => 'Direct carrier billing',
		'body'  => 'Let a buyer pay straight from their mobile-operator bill — no card, no wallet. Onboard a merchant, declare which country-operator pairs are live, and run the charge through capture, refund, or chargeback.',
		'icon'  => 'icon-carrier-bill.svg',
	),
);

if ( ! $features ) {
	$features = $default_features;
}
?>
<section class="commerce" id="commerce">
	<div class="commerce__frame">
		<div class="commerce__header">
			<div class="commerce__text">
				<p class="commerce__eyebrow" data-animate="fade">
					<span class="commerce__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="commerce__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="commerce__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
			<div class="commerce__visual">
				<div class="commerce__visual-scene" data-animate="fade">
					<?php orbit_print_icon( 'ORBIT_COMMERCE_VISUAL_ID', 'commerce__visual-img' ); ?>
				</div>
			</div>
		</div>

		<div class="commerce__flow" data-animate="group">
			<?php foreach ( $flow_steps as $i => $step ) : ?>
				<div class="commerce-step <?php echo ( $i < 3 ) ? 'commerce-step--gap-after' : ''; ?>">
					<div class="commerce-step__badge">
						<?php echo esc_html( $step['n'] ); ?>
					</div>
					<div class="commerce-step__content">
						<p class="commerce-step__label"><?php echo esc_html( $step['label'] ); ?></p>
						<p class="commerce-step__caption"><?php echo esc_html( $step['caption'] ); ?></p>
					</div>
				</div>
				<?php if ( $i < 3 ) : ?>
					<div class="commerce-step__connector" aria-hidden="true"></div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<div class="commerce-cards">
			<?php
			$total_features = count( $features );
			foreach ( $features as $i => $feature ) :
				$is_row_two = $i >= 3;
				?>
				<div class="commerce-card <?php echo ( $is_row_two ) ? 'commerce-card--tall' : ''; ?>">
					<div class="commerce-card__icon">
						<?php if ( is_array( $feature ) && isset( $feature['feature_icon'] ) && $feature['feature_icon'] ) : ?>
							<?php echo wp_get_attachment_image( $feature['feature_icon'], 'full', false, array( 'class' => 'commerce-card__icon-img' ) ); ?>
						<?php else : ?>
							<img src="<?php $commerce_src( $feature['icon'] ?? 'icon-pay-by-link.svg' ); ?>" alt="" width="20" height="20">
						<?php endif; ?>
					</div>
					<div class="commerce-card__content">
						<h3 class="commerce-card__title">
							<?php echo esc_html( $feature['feature_title'] ?? $feature['title'] ); ?>
						</h3>
						<p class="commerce-card__body">
							<?php echo esc_html( $feature['feature_body'] ?? $feature['body'] ); ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!--
		Mobile-only layout (<900px) — Figma 681:567, a dedicated single-column
		adaptation with a realistic phone mockup, not a reflow of the desktop
		diagram. Hidden on desktop.
		-->
		<div class="commerce-mobile">
			<div class="commerce-m__hero">
				<p class="commerce-m__eyebrow" data-animate="fade">
					<span class="commerce-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<div class="commerce-m__title-block">
					<h2 class="commerce-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
					<p class="commerce-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
				</div>

				<div class="commerce__visual-scene commerce__visual-scene--m" data-animate="fade">
					<?php orbit_print_icon( 'ORBIT_COMMERCE_VISUAL_ID', 'commerce__visual-img' ); ?>
				</div>
			</div>

			<div class="commerce-m__flow-strip" data-animate="group">
				<p class="commerce-m__strip-label">Customer Journey</p>
				<?php foreach ( $flow_steps as $step ) : ?>
					<div class="commerce-m-step">
						<span class="commerce-m-step__badge"><?php echo esc_html( $step['n'] ); ?></span>
						<div class="commerce-m-step__copy">
							<p class="commerce-m-step__title"><?php echo esc_html( $step['label'] ); ?></p>
							<p class="commerce-m-step__caption"><?php echo esc_html( $step['caption_mobile'] ?? $step['caption'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="commerce-m__feats">
				<p class="commerce-m__feats-title">Enterprise Capabilities</p>
				<?php foreach ( $features as $feature ) : ?>
					<?php
					$icon_file  = $feature['icon'] ?? 'icon-pay-by-link.svg';
					$self_boxed = ( 'icon-rcs-carousel.svg' === $icon_file );
					?>
					<article class="commerce-m-feat" data-animate="fade">
						<?php if ( is_array( $feature ) && isset( $feature['feature_icon'] ) && $feature['feature_icon'] ) : ?>
							<div class="commerce-m-feat__icon">
								<?php echo wp_get_attachment_image( $feature['feature_icon'], 'full', false, array( 'class' => 'commerce-m-feat__icon-img' ) ); ?>
							</div>
						<?php elseif ( $self_boxed ) : ?>
							<img class="commerce-m-feat__icon commerce-m-feat__icon--boxed" src="<?php $commerce_src( $icon_file ); ?>" alt="" width="40" height="40">
						<?php else : ?>
							<div class="commerce-m-feat__icon">
								<img src="<?php $commerce_src( $icon_file ); ?>" alt="" width="20" height="20">
							</div>
						<?php endif; ?>
						<div class="commerce-m-feat__content">
							<h3 class="commerce-m-feat__title"><?php echo esc_html( $feature['feature_title'] ?? $feature['title'] ); ?></h3>
							<p class="commerce-m-feat__body"><?php echo esc_html( $feature['feature_body'] ?? $feature['body'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
