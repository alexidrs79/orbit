<?php
/**
 * Template part: Compliance badges.
 * Figma: 48:10, 1440 × 574 at y=1796.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'compliance_eyebrow' );
$headline = get_field( 'compliance_headline' );
$footer   = get_field( 'compliance_footer' );
$badges   = array_values(
	array_filter(
		(array) get_field( 'compliance_badges' ),
		function ( $badge ) {
			return ! empty( $badge['label'] );
		}
	)
);

if ( ! $headline && ! $badges ) {
	return;
}
?>
<section class="compliance" id="compliance">
	<div class="compliance__inner">
		<div class="compliance__copy" data-animate="fade">
			<?php if ( $eyebrow ) : ?>
				<p class="compliance__eyebrow">
					<span class="compliance__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
			<?php endif; ?>
			<?php if ( $headline ) : ?>
				<h2 class="compliance__headline"><?php echo esc_html( $headline ); ?></h2>
			<?php endif; ?>
		</div>

		<?php if ( $badges ) : ?>
			<ul class="compliance__badges" data-animate="stagger">
				<?php foreach ( $badges as $badge ) : ?>
					<?php $image_id = ! empty( $badge['image'] ) ? (int) $badge['image'] : 0; ?>
					<li class="compliance__badge">
						<div class="compliance__tile">
							<?php
							if ( $image_id ) {
								echo wp_get_attachment_image(
									$image_id,
									'full',
									false,
									array(
										'class' => 'compliance__mark',
										'alt'   => '',
									)
								);
							}
							?>
						</div>
						<p class="compliance__label"><?php echo esc_html( $badge['label'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $footer ) : ?>
			<p class="compliance__footer" data-animate="fade"><?php echo esc_html( $footer ); ?></p>
		<?php endif; ?>
	</div>
</section>
