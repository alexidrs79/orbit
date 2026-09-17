<?php
/**
 * Template part: Hero section.
 * Figma: 45:5 (copy), 1:6559 (tabs), 19:704 (dashboard), 1:64 (light), 1:77 + 1:78 (glows).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$announce_badge = get_field( 'hero_announce_badge' );
$announce_text  = get_field( 'hero_announce_text' );
$announce_url   = get_field( 'hero_announce_url' );
$headline       = get_field( 'hero_headline' );
$body           = get_field( 'hero_body' );
$cta1_label     = get_field( 'hero_cta1_label' );
$cta1_url       = get_field( 'hero_cta1_url' );
$cta2_label     = get_field( 'hero_cta2_label' );
$cta2_url       = get_field( 'hero_cta2_url' );

$tabs = array_values(
	array_filter(
		(array) get_field( 'hero_tabs' ),
		function ( $tab ) {
			// Hide tabs with no image yet (e.g. Customer Data) instead of
			// showing an empty dashboard frame — reappears automatically
			// once that tab's image is set.
			return ! empty( $tab['label'] ) && ! empty( $tab['image'] );
		}
	)
);

$arrow_id = orbit_get_attachment_id_by_filename( ORBIT_HERO_ANNOUNCE_ARROW_ID );
?>
<section class="hero" id="hero">
	<div class="hero__copy" data-animate="fade">
		<?php if ( $announce_text ) : ?>
			<?php if ( $announce_url ) : ?>
				<a class="hero__announce" href="<?php echo esc_url( orbit_resolve_theme_url( $announce_url ) ); ?>">
			<?php else : ?>
				<div class="hero__announce">
			<?php endif; ?>
				<?php if ( $announce_badge ) : ?>
					<span class="hero__announce-badge"><?php echo esc_html( $announce_badge ); ?></span>
				<?php endif; ?>
				<span class="hero__announce-text"><?php echo esc_html( $announce_text ); ?></span>
				<?php if ( $arrow_id ) : ?>
					<span class="hero__announce-arrow">
						<?php
						echo wp_get_attachment_image(
							$arrow_id,
							'full',
							false,
							array(
								'class' => 'hero__announce-arrow-img',
								'alt'   => '',
							)
						);
						?>
					</span>
				<?php endif; ?>
			<?php if ( $announce_url ) : ?>
				</a>
			<?php else : ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $headline ) : ?>
			<h1 class="hero__headline"><?php echo esc_html( $headline ); ?></h1>
		<?php endif; ?>

		<?php if ( $body ) : ?>
			<p class="hero__body"><?php echo esc_html( $body ); ?></p>
		<?php endif; ?>

		<?php if ( $cta1_label || $cta2_label ) : ?>
			<div class="hero__ctas">
				<?php if ( $cta1_label ) : ?>
					<a class="hero__cta hero__cta--ghost" href="<?php echo esc_url( orbit_cta_url( $cta1_url, 'sales' ) ); ?>"><?php echo esc_html( $cta1_label ); ?></a>
				<?php endif; ?>
				<?php if ( $cta2_label ) : ?>
					<a class="hero__cta hero__cta--solid" href="<?php echo esc_url( orbit_cta_url( $cta2_url, 'signup' ) ); ?>"><?php echo esc_html( $cta2_label ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if ( $tabs ) : ?>
		<div class="hero__tabs-wrap" data-animate="fade">
			<div class="hero__tabs" role="tablist" aria-label="<?php esc_attr_e( 'Product views', 'orbit' ); ?>">
				<?php foreach ( $tabs as $index => $tab ) : ?>
					<?php
					$tab_id    = 'hero-tab-' . $index;
					$panel_id  = 'hero-panel-' . $index;
					$is_active = ( 0 === $index );
					?>
					<button
						type="button"
						class="hero__tab<?php echo $is_active ? ' is-active' : ''; ?>"
						role="tab"
						id="<?php echo esc_attr( $tab_id ); ?>"
						aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
						tabindex="<?php echo $is_active ? '0' : '-1'; ?>"
					><?php echo esc_html( $tab['label'] ); ?></button>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="hero__stage" data-animate="fade">
			<div class="hero__glow hero__glow--blue" aria-hidden="true"></div>
			<div class="hero__glow hero__glow--color" aria-hidden="true"></div>
			<?php foreach ( $tabs as $index => $tab ) : ?>
				<?php
				$tab_id    = 'hero-tab-' . $index;
				$panel_id  = 'hero-panel-' . $index;
				$is_active = ( 0 === $index );
				$image_id  = ! empty( $tab['image'] ) ? (int) $tab['image'] : 0;
				?>
				<div
					class="hero__frame<?php echo $is_active ? ' is-active' : ''; ?>"
					role="tabpanel"
					id="<?php echo esc_attr( $panel_id ); ?>"
					aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
					<?php echo $is_active ? '' : ' hidden'; ?>
				>
					<div class="hero__preview">
						<?php
						if ( $image_id ) {
							echo wp_get_attachment_image(
								$image_id,
								'full',
								false,
								array(
									'class'    => 'hero__preview-img',
									'sizes'    => '1180px',
									'loading'  => $is_active ? 'eager' : 'lazy',
									'decoding' => 'async',
								)
							);
						}
						?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
