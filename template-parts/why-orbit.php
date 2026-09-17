<?php
/**
 * Template part: Why Orbit — four reasons.
 * Figma: 1:103, 1280 × 255 at (80, 1433).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array_values(
	array_filter(
		(array) get_field( 'why_orbit_items' ),
		function ( $item ) {
			return ! empty( $item['title'] );
		}
	)
);

if ( ! $items ) {
	return;
}
?>
<section class="why-orbit" id="why-orbit">
	<div class="why-orbit__grid" data-animate="group">
		<?php foreach ( $items as $item ) : ?>
			<?php
			$icon_id = ! empty( $item['icon'] ) ? (int) $item['icon'] : 0;
			?>
			<article class="why-orbit__item">
				<div class="why-orbit__head">
					<?php if ( $icon_id ) : ?>
						<span class="why-orbit__icon">
							<?php
							echo wp_get_attachment_image(
								$icon_id,
								'full',
								false,
								array(
									'class' => 'why-orbit__icon-img',
									'alt'   => '',
								)
							);
							?>
						</span>
					<?php endif; ?>
					<h2 class="why-orbit__title"><?php echo esc_html( $item['title'] ); ?></h2>
				</div>
				<?php if ( ! empty( $item['body'] ) ) : ?>
					<p class="why-orbit__body"><?php echo esc_html( $item['body'] ); ?></p>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
</section>
