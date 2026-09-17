<?php
/**
 * Template part: One API / six capabilities.
 * Figma: 1:5839, 1004 × 184 at (218, 3721).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array_values(
	array_filter(
		(array) get_field( 'api_items' ),
		function ( $item ) {
			return ! empty( $item['title'] );
		}
	)
);

if ( ! $items ) {
	return;
}
?>
<section class="channels-api" id="one-api">
	<div class="channels-api__grid" data-animate="group">
		<?php foreach ( $items as $item ) : ?>
			<?php $icon_id = ! empty( $item['icon'] ) ? (int) $item['icon'] : 0; ?>
			<article class="channels-api__item">
				<div class="channels-api__head">
					<?php if ( $icon_id ) : ?>
						<span class="channels-api__icon">
							<?php
							echo wp_get_attachment_image(
								$icon_id,
								'full',
								false,
								array(
									'class' => 'channels-api__icon-img',
									'alt'   => '',
								)
							);
							?>
						</span>
					<?php endif; ?>
					<h2 class="channels-api__title"><?php echo esc_html( $item['title'] ); ?></h2>
				</div>
				<?php if ( ! empty( $item['body'] ) ) : ?>
					<p class="channels-api__body"><?php echo esc_html( $item['body'] ); ?></p>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
</section>
