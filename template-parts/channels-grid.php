<?php
/**
 * Template part: 14 channels + SwiftShop chat.
 * Figma: 1:5744 + 1:6183.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'channels_eyebrow' );
$headline = get_field( 'channels_headline' );
$body     = get_field( 'channels_body' );
$items    = array_values(
	array_filter(
		(array) get_field( 'channels_items' ),
		function ( $item ) {
			return ! empty( $item['label'] );
		}
	)
);

$chat_photo_id  = (int) get_field( 'channels_chat_photo' );
$chat_avatar_id = (int) get_field( 'channels_chat_avatar' );
$chat_name      = get_field( 'channels_chat_name' );
$chat_messages  = array_values(
	array_filter(
		(array) get_field( 'channels_chat_messages' ),
		function ( $message ) {
			return ! empty( $message['text'] );
		}
	)
);

if ( ! $chat_photo_id ) {
	$chat_photo_id = orbit_get_attachment_id_by_filename( ORBIT_CHANNELS_CHAT_PHOTO_ID );
}
if ( ! $chat_avatar_id ) {
	$chat_avatar_id = orbit_get_attachment_id_by_filename( ORBIT_CHANNELS_CHAT_AVATAR_ID );
}

if ( ! $headline && ! $items ) {
	return;
}
?>
<section class="channels-grid" id="channels">
	<div class="channels-grid__inner">
		<div class="channels-grid__copy" data-animate="fade">
			<?php if ( $eyebrow ) : ?>
				<p class="channels-grid__eyebrow">
					<span class="channels-grid__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
			<?php endif; ?>
			<?php if ( $headline ) : ?>
				<h2 class="channels-grid__headline"><?php echo esc_html( $headline ); ?></h2>
			<?php endif; ?>
			<?php if ( $body ) : ?>
				<p class="channels-grid__body"><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( $items ) : ?>
			<ul class="channels-grid__cards" data-animate="stagger">
				<?php foreach ( $items as $item ) : ?>
					<?php
					$icon_id = ! empty( $item['icon'] ) ? (int) $item['icon'] : 0;
					$well    = ! empty( $item['well'] ) ? $item['well'] : '';
					$mark    = ! empty( $item['mark'] ) ? $item['mark'] : 'none';
					$tight   = ( 'Apple Business' === $item['label'] );
					?>
					<li class="channels-card">
						<div
							class="channels-card__well<?php echo 'full' === $mark ? ' channels-card__well--full' : ''; ?>"
							<?php if ( $well && 'full' !== $mark ) : ?>
								style="background: <?php echo esc_attr( $well ); ?>"
							<?php endif; ?>
						>
							<?php if ( in_array( $mark, array( 'gradient', 'brand', 'white' ), true ) ) : ?>
								<span class="channels-card__mark channels-card__mark--<?php echo esc_attr( $mark ); ?>">
									<?php
									if ( $icon_id ) {
										echo wp_get_attachment_image(
											$icon_id,
											'full',
											false,
											array(
												'class' => 'channels-card__icon channels-card__icon--glyph',
												'alt'   => '',
											)
										);
									}
									?>
								</span>
							<?php elseif ( $icon_id ) : ?>
								<?php
								echo wp_get_attachment_image(
									$icon_id,
									'full',
									false,
									array(
										'class' => 'channels-card__icon',
										'alt'   => '',
									)
								);
								?>
							<?php endif; ?>
						</div>
						<p class="channels-card__label<?php echo $tight ? ' channels-card__label--tight' : ''; ?>"><?php echo esc_html( $item['label'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $chat_photo_id || $chat_messages ) : ?>
			<figure class="channels-chat" data-animate="chat" aria-label="<?php esc_attr_e( 'SwiftShop support conversation', 'orbit' ); ?>">
				<?php if ( $chat_photo_id ) : ?>
					<div class="channels-chat__photo">
						<?php
						echo wp_get_attachment_image(
							$chat_photo_id,
							'full',
							false,
							array(
								'class'    => 'channels-chat__photo-img',
								'sizes'    => '1241px',
								'loading'  => 'lazy',
								'decoding' => 'async',
								'alt'      => '',
							)
						);
						?>
						<span class="channels-chat__dim" aria-hidden="true"></span>
					</div>
				<?php endif; ?>

				<div class="channels-chat__thread">
					<?php if ( $chat_name ) : ?>
						<div class="channels-chat__person">
							<?php if ( $chat_avatar_id ) : ?>
								<?php
								echo wp_get_attachment_image(
									$chat_avatar_id,
									'full',
									false,
									array(
										'class' => 'channels-chat__avatar',
										'alt'   => '',
									)
								);
								?>
							<?php endif; ?>
							<p class="channels-chat__name"><?php echo esc_html( $chat_name ); ?></p>
						</div>
					<?php endif; ?>

					<?php foreach ( $chat_messages as $message ) : ?>
						<?php $role = ( 'user' === ( $message['role'] ?? '' ) ) ? 'user' : 'agent'; ?>
						<p class="channels-chat__bubble channels-chat__bubble--<?php echo esc_attr( $role ); ?>"><?php echo esc_html( $message['text'] ); ?></p>
					<?php endforeach; ?>
				</div>

				<span class="channels-chat__fade" aria-hidden="true"></span>
			</figure>
		<?php endif; ?>
	</div>
</section>
