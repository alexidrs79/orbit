<?php
/**
 * Template part: Why switch — "Built so you're never blindsided".
 * Figma: 607:12483, 1440 × 683.
 * Dark section: header, then a body row — dashboard screenshot on the
 * left, 3 stacked feature panels on the right.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'whyswitch_eyebrow' );
$headline = get_field( 'whyswitch_headline' );
$body     = get_field( 'whyswitch_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Why teams switch to Orbit';
}
if ( ! $headline ) {
	$headline = "Built so you're never blindsided";
}
if ( ! $body ) {
	$body = 'Three questions come up in every migration conversation: can I see what happened to my message, will my account survive a false-positive flag, and will the bill surprise me. Orbit answers all three by design.';
}

$image_id = (int) get_field( 'whyswitch_image' );
if ( ! $image_id ) {
	$image_id = orbit_get_attachment_id_by_filename( ORBIT_WHYSWITCH_IMAGE_ID );
}

$panels_field = array_values(
	array_filter(
		(array) get_field( 'whyswitch_panels' ),
		function ( $panel ) {
			return ! empty( $panel['title'] );
		}
	)
);

$panels = array(
	array(
		'title' => "See every message's journey",
		'body'  => "Every message carries a real delivery trail — queued, sent, delivered, or failed with the carrier's own reason code — in the same dashboard that tracks your spend. A message never just vanishes with no error; you get the reason so your team can fix a route instead of guessing why it never landed.",
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="#5B8CFF" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3.83301 16.7695L8.62467 11.4987L11.883 14.3737L18.208 6.70703"/><path d="M3.83353 18.5909C4.83915 18.5909 5.65436 17.7757 5.65436 16.7701C5.65436 15.7644 4.83915 14.9492 3.83353 14.9492C2.82791 14.9492 2.0127 15.7644 2.0127 16.7701C2.0127 17.7757 2.82791 18.5909 3.83353 18.5909Z"/><path d="M8.62503 13.3214C9.63065 13.3214 10.4459 12.5061 10.4459 11.5005C10.4459 10.4949 9.63065 9.67969 8.62503 9.67969C7.61941 9.67969 6.8042 10.4949 6.8042 11.5005C6.8042 12.5061 7.61941 13.3214 8.62503 13.3214Z"/><path d="M11.8833 16.1964C12.889 16.1964 13.7042 15.3811 13.7042 14.3755C13.7042 13.3699 12.889 12.5547 11.8833 12.5547C10.8777 12.5547 10.0625 13.3699 10.0625 14.3755C10.0625 15.3811 10.8777 16.1964 11.8833 16.1964Z"/><path d="M18.2085 8.52839C19.2141 8.52839 20.0294 7.71317 20.0294 6.70755C20.0294 5.70193 19.2141 4.88672 18.2085 4.88672C17.2029 4.88672 16.3877 5.70193 16.3877 6.70755C16.3877 7.71317 17.2029 8.52839 18.2085 8.52839Z"/></svg>',
	),
	array(
		'title' => 'No overnight account kills',
		'body'  => "Devotel is the carrier of record on every number we host, so your standing isn't decided by a reseller's risk score. A flagged account gets a warning and a compliance review before any suspension — immediate action stays reserved for severe abuse like fraud or spam, never an ordinary false positive.",
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="#5B8CFF" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19.1668 12.0759C19.1668 16.8675 15.7168 19.3592 11.7877 20.7009C11.5829 20.7725 11.3599 20.7725 11.1552 20.7009C7.2835 19.3592 3.8335 16.8675 3.8335 12.0759V5.46337C3.8335 5.20921 3.93446 4.96545 4.11419 4.78573C4.29391 4.60601 4.53766 4.50504 4.79183 4.50504C6.7085 4.50504 9.10433 3.35504 10.7814 1.89838C10.9822 1.72818 11.2369 1.63477 11.5002 1.63477C11.7634 1.63477 12.0181 1.72818 12.2189 1.89838C13.896 3.35504 16.2918 4.50504 18.2085 4.50504C18.4627 4.50504 18.7064 4.60601 18.8861 4.78573C19.0659 4.96545 19.1668 5.20921 19.1668 5.46337V12.0759Z"/><path d="M8.81641 11.4044L10.7331 13.3211L14.1831 9.87109"/></svg>',
	),
	array(
		'title' => 'Real-time spend, no bill shock',
		'body'  => 'Watch your balance and per-channel spend update as messages and calls go out, with alerts before you run low. Pay-as-you-go, pre-paid credits that never expire, no monthly minimum — the number on the dashboard is the number on the invoice.',
		'icon'  => '<svg viewBox="0 0 23 23" fill="none" stroke="#5B8CFF" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3.83301 19.168H19.1663"/><path d="M6.22917 19.1667V13.8958M10.5417 19.1667V8.625M14.8542 19.1667V11.9792M19.1667 19.1667V5.75"/><path d="M19.1664 7.47539C20.1191 7.47539 20.8914 6.70308 20.8914 5.75039C20.8914 4.7977 20.1191 4.02539 19.1664 4.02539C18.2137 4.02539 17.4414 4.7977 17.4414 5.75039C17.4414 6.70308 18.2137 7.47539 19.1664 7.47539Z"/></svg>',
	),
);

foreach ( $panels as $index => &$panel ) {
	if ( isset( $panels_field[ $index ]['title'] ) && $panels_field[ $index ]['title'] ) {
		$panel['title'] = $panels_field[ $index ]['title'];
	}
	if ( isset( $panels_field[ $index ]['body'] ) && $panels_field[ $index ]['body'] ) {
		$panel['body'] = $panels_field[ $index ]['body'];
	}
}
unset( $panel );
?>
<section class="whyswitch" id="why-switch">
	<div class="whyswitch__frame">
		<div class="whyswitch__header">
			<p class="whyswitch__eyebrow" data-animate="fade">
				<span class="whyswitch__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<div class="whyswitch__title-block">
				<h2 class="whyswitch__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="whyswitch__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
		</div>

		<div class="whyswitch__row">
			<figure class="whyswitch-shot" data-animate="fade">
				<?php if ( $image_id ) : ?>
					<?php
					echo wp_get_attachment_image(
						$image_id,
						'full',
						false,
						array(
							'class'    => 'whyswitch-shot__img',
							'sizes'    => '610px',
							'loading'  => 'lazy',
							'decoding' => 'async',
							'alt'      => 'Orbit dashboard showing message delivery insights and analytics',
						)
					);
					?>
				<?php else : ?>
					<img class="whyswitch-shot__img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/whyswitch/dashboard-mock.png' ); ?>" loading="lazy" decoding="async" alt="Orbit dashboard showing message delivery insights and analytics">
				<?php endif; ?>
			</figure>

			<div class="whyswitch-panels">
				<?php foreach ( $panels as $panel ) : ?>
					<article class="whyswitch-panel" data-animate="fade">
						<span class="whyswitch-panel__icon" aria-hidden="true"><?php echo $panel['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
						<div class="whyswitch-panel__copy">
							<h3 class="whyswitch-panel__title"><?php echo esc_html( $panel['title'] ); ?></h3>
							<p class="whyswitch-panel__body"><?php echo esc_html( $panel['body'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<!--
	Mobile-only layout (<768px) — Figma 708:4 ("Why switch mobile"), a
	dedicated single-column adaptation: header, full-width dashboard image,
	then 3 feature cards (icon on top, text below — not side-by-side like
	desktop's icon-left panels). Reuses $eyebrow/$headline/$body/$image_id/$panels.
	-->
	<div class="whyswitch-mobile">
		<div class="whyswitch-m__header">
			<p class="whyswitch-m__eyebrow" data-animate="fade">
				<span class="whyswitch-m__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<h2 class="whyswitch-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
			<p class="whyswitch-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
		</div>

		<figure class="whyswitch-m__shot" data-animate="fade">
			<?php if ( $image_id ) : ?>
				<?php
				echo wp_get_attachment_image(
					$image_id,
					'full',
					false,
					array(
						'class'    => 'whyswitch-m__shot-img',
						'sizes'    => '100vw',
						'loading'  => 'lazy',
						'decoding' => 'async',
						'alt'      => 'Orbit dashboard showing message delivery insights and analytics',
					)
				);
				?>
			<?php else : ?>
				<img class="whyswitch-m__shot-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/whyswitch/dashboard-mock.png' ); ?>" loading="lazy" decoding="async" alt="Orbit dashboard showing message delivery insights and analytics">
			<?php endif; ?>
		</figure>

		<div class="whyswitch-m__cards">
			<?php foreach ( $panels as $panel ) : ?>
				<article class="whyswitch-m-card" data-animate="fade">
					<span class="whyswitch-m-card__icon" aria-hidden="true"><?php echo $panel['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
					<div class="whyswitch-m-card__copy">
						<h3 class="whyswitch-m-card__title"><?php echo esc_html( $panel['title'] ); ?></h3>
						<p class="whyswitch-m-card__body"><?php echo esc_html( $panel['body'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
