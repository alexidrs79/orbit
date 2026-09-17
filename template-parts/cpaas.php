<?php
/**
 * Template part: Simplified CPaaS Platform Management.
 * Figma: 1:7054, 1217 × 382 at (112, 8487). Four 290 × 250 cards, r16.
 * Icons are Figma 5×5 rounded cells (1:7058 / 1:7090 / 1:7114 / 1:7148). Motion empty.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = get_field( 'cpaas_headline' );
$cards    = array_values(
	array_filter(
		(array) get_field( 'cpaas_cards' ),
		function ( $card ) {
			return ! empty( $card['title'] );
		}
	)
);

if ( ! $headline ) {
	$headline = 'Simplified CPaaS Platform Management';
}

if ( ! $cards ) {
	$cards = array(
		array(
			'title' => 'Universal API Control',
			'body'  => 'Centrally manage voice, SMS, and video APIs from a central control plane.',
		),
		array(
			'title' => 'Communication Services',
			'body'  => 'Instantly provision and manage channel instances (SMS, Voice, Chat, Video) across apps.',
		),
		array(
			'title' => 'Communication Event Logs',
			'body'  => 'View aggregated logs and real-time metrics for all API requests and deliveries.',
		),
		array(
			'title' => 'Endpoint Health',
			'body'  => 'Easily set up monitoring and alerts for API availability and carrier health.',
		),
	);
}

$icon_dots = array(
	array(
		'color' => '#96d3ff',
		'dots'  => array(
			array( 23, 14, 5, 5 ),
			array( 32, 14, 5, 5 ),
			array( 14, 23, 5, 5 ),
			array( 23, 23, 5, 5 ),
			array( 32, 23, 5, 5 ),
			array( 41, 23, 5, 5 ),
			array( 14, 32, 5, 5 ),
			array( 23, 32, 5, 5 ),
			array( 32, 32, 5, 5 ),
			array( 41, 32, 5, 5 ),
			array( 23, 41, 5, 5 ),
			array( 32, 41, 5, 5 ),
		),
	),
	array(
		'color' => '#f4af88',
		'dots'  => array(
			array( 23, 14, 5, 6 ),
			array( 41, 14, 5, 5 ),
			array( 14, 23, 5, 6 ),
			array( 32, 23, 5, 6 ),
			array( 23, 32, 5, 6 ),
			array( 41, 32, 5, 5 ),
			array( 14, 41, 5, 5 ),
			array( 32, 41, 5, 5 ),
		),
	),
	array(
		'color' => '#fdafaf',
		'dots'  => array(
			array( 12, 19, 5, 6 ),
			array( 27.5, 19.5, 5, 6 ),
			array( 42.5, 19.5, 5, 6 ),
			array( 22.5, 24.5, 5, 6 ),
			array( 37.5, 24.5, 5, 6 ),
			array( 16.5, 29.5, 5, 6 ),
			array( 31.5, 29.5, 5, 6 ),
			array( 11.5, 34.5, 5, 6 ),
			array( 26.5, 34.5, 5, 6 ),
			array( 42, 34, 5, 6 ),
		),
	),
	array(
		'color' => '#a2cead',
		'dots'  => array(
			array( 16, 16, 5, 5 ),
			array( 40, 16, 5, 5 ),
			array( 28, 22, 5, 5 ),
			array( 22, 28, 5, 5 ),
			array( 34, 28, 5, 5 ),
			array( 28, 34, 5, 5 ),
			array( 16, 40, 5, 5 ),
			array( 40, 40, 5, 5 ),
		),
	),
);
?>
<section class="cpaas" id="cpaas">
	<div class="cpaas__frame">
		<div class="cpaas__stage">
			<div class="cpaas__content">
				<h2 class="cpaas__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<div class="cpaas__cards" data-animate="group">
					<?php foreach ( $cards as $index => $card ) : ?>
						<?php
						$icon = isset( $icon_dots[ $index ] ) ? $icon_dots[ $index ] : $icon_dots[0];
						?>
						<article class="cpaas-card">
							<span class="cpaas-icon" style="--cpaas-dot: <?php echo esc_attr( $icon['color'] ); ?>" aria-hidden="true">
								<?php foreach ( $icon['dots'] as $dot ) : ?>
									<i style="left: <?php echo esc_attr( $dot[0] ); ?>px; top: <?php echo esc_attr( $dot[1] ); ?>px; width: <?php echo esc_attr( $dot[2] ); ?>px; height: <?php echo esc_attr( $dot[3] ); ?>px;"></i>
								<?php endforeach; ?>
							</span>
							<h3 class="cpaas-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
							<p class="cpaas-card__body"><?php echo esc_html( $card['body'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
