<?php
/**
 * Template part: Voice — AI voice agents.
 * Figma: 607:11311, 1440 × 1097 at (0, 11053).
 * Live call panel mockup + 4 feature cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'voice_main_eyebrow' );
$headline = get_field( 'voice_main_headline' );
$body     = get_field( 'voice_main_body' );
$features = get_field( 'voice_main_features' );

if ( ! $eyebrow ) {
	$eyebrow = 'Voice AI agents';
}
if ( ! $headline ) {
	$headline = 'AI voice agents that answer, reason, and resolve in real time';
}
if ( ! $body ) {
	$body = 'Orbit runs production voice agents that target under 300 milliseconds per turn on the speech-to-speech path (about a second when a turn needs Claude\'s deeper reasoning), score their own call quality as they talk, and summarise every conversation the moment it ends — then hand the caller to a specialist without dropping the line.';
}

$voice_src = static function ( $file ) {
	echo esc_url( get_template_directory_uri() . '/assets/img/voice/' . $file );
};

$default_features = array(
	array(
		'title' => 'Real-time voice agents',
		'body'  => 'On the OpenAI Realtime speech-to-speech path, agents target under 300 milliseconds per turn — natural enough to interrupt and be interrupted. For the hard questions an agent pauses to reason with Claude mid-call, without ending the call or breaking the audio stream.',
		'icon'  => 'icon-realtime.svg',
	),
	array(
		'title' => 'Voice AI Quality Index',
		'body'  => 'Every call is scored 0–100 in real time on response latency, interruption rate, and caller sentiment. Calls that fall below your threshold auto-flag for review, so a quality problem surfaces on the call — not in a churn report.',
		'icon'  => 'icon-quality.svg',
	),
	array(
		'title' => 'Automatic post-call synthesis',
		'body'  => 'The moment a call ends, Orbit writes a summary, action items, an overall sentiment read, and the topics that came up — stored on the call record and pushed to your webhooks so follow-ups and CRM updates happen on their own.',
		'icon'  => 'icon-synthesis.svg',
	),
	array(
		'title' => 'Squad handoff with cross-call memory',
		'body'  => 'A frontline agent can transfer a caller to a billing, support, or retention specialist mid-call, passing a context note before the specialist speaks. Agents also recall a contact\'s prior call summaries, so a returning caller never has to repeat themselves.',
		'icon'  => 'icon-handoff.svg',
	),
);

if ( ! $features ) {
	$features = $default_features;
}
?>
<section class="voice" id="voice">
	<div class="voice__frame">
		<div class="voice__header">
			<div class="voice__text">
				<p class="voice__eyebrow" data-animate="fade">
					<span class="voice__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="voice__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="voice__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
			<div class="voice__visual">
				<div class="voice__glow" aria-hidden="true">
					<img src="<?php $voice_src( 'glow.svg' ); ?>" alt="" width="437" height="246">
				</div>
				<div class="voice__call-panel">
					<div class="voice__call-header">
						<div class="voice__live-badge">
							<span class="voice__live-dot" aria-hidden="true">
								<img src="<?php $voice_src( 'dot-live.svg' ); ?>" alt="" width="6" height="6">
							</span>
							<span class="voice__live-text">LIVE</span>
						</div>
						<p class="voice__call-info">Inbound · +1 415 ••• 0122</p>
						<p class="voice__call-duration">03:13</p>
					</div>
					<div class="voice__call-body">
						<div class="voice__waveform">
							<?php
							// height,alpha pairs — exact per-bar values from Figma (607:11330).
							// alpha 1 means the solid peak color #3a7dff; the last 16 bars use a
							// flat low alpha to read as the not-yet-spoken tail of the waveform.
							$bars = array(
								array( 6, 0.52 ), array( 22, 0.73 ), array( 35, 0.89 ), array( 44, 1 ),
								array( 31, 0.84 ), array( 28, 0.8 ), array( 22, 0.73 ), array( 22, 0.73 ),
								array( 21, 0.71 ), array( 33, 0.86 ), array( 40, 0.95 ), array( 41, 0.96 ),
								array( 22, 0.73 ), array( 14, 0.63 ), array( 22, 0.73 ), array( 36, 0.9 ),
								array( 31, 0.84 ), array( 36, 0.9 ), array( 35, 0.89 ), array( 30, 0.82 ),
								array( 7, 0.54 ), array( 21, 0.71 ), array( 35, 0.89 ), array( 44, 1 ),
								array( 31, 0.84 ), array( 29, 0.81 ), array( 23, 0.74 ), array( 21, 0.71 ),
								array( 21, 0.71 ), array( 33, 0.86 ), array( 40, 0.95 ), array( 42, 0.98 ),
								array( 22, 0.73 ), array( 15, 0.64 ), array( 21, 0.71 ), array( 36, 0.9 ),
								array( 30, 0.82 ), array( 36, 0.9 ), array( 36, 0.9 ), array( 31, 0.84 ),
								array( 7, 0.54 ), array( 21, 0.71 ), array( 34, 0.88 ), array( 43, 0.99 ),
								array( 31, 0.16 ), array( 29, 0.16 ), array( 23, 0.16 ), array( 21, 0.16 ),
								array( 20, 0.16 ), array( 32, 0.16 ), array( 40, 0.16 ), array( 42, 0.16 ),
								array( 23, 0.16 ), array( 16, 0.16 ), array( 20, 0.16 ), array( 35, 0.16 ),
								array( 30, 0.16 ), array( 36, 0.16 ), array( 36, 0.16 ), array( 31, 0.16 ),
							);
							foreach ( $bars as $i => $bar ) {
								list( $h, $a ) = $bar;
								$bg    = ( 1 === $a ) ? '#3a7dff' : 'rgba(58,125,255,' . $a . ')';
								$delay = ( $i % 16 ) * 28;
								echo '<div class="voice__waveform-bar" style="height: ' . intval( $h ) . 'px; background: ' . esc_attr( $bg ) . '; animation-delay: ' . intval( $delay ) . 'ms;"></div>';
							}
							?>
						</div>
						<div class="voice__turn-latency">
							<div class="voice__latency-header">
								<p class="voice__latency-label">TURN LATENCY</p>
								<div class="voice__latency-total">284 ms</div>
							</div>
							<div class="voice__latency-bar">
								<div class="voice__latency-seg voice__latency-stt" style="width: 122px;"></div>
								<div class="voice__latency-seg voice__latency-model" style="width: 150px;"></div>
								<div class="voice__latency-seg voice__latency-tts" style="width: 86px;"></div>
							</div>
							<div class="voice__latency-legend">
								<div class="voice__latency-item">
									<span class="voice__latency-dot">
										<img src="<?php $voice_src( 'dot-stt.svg' ); ?>" alt="" width="6" height="6">
									</span>
									<span class="voice__latency-name">STT</span>
									<span class="voice__latency-value">96 ms</span>
								</div>
								<div class="voice__latency-item">
									<span class="voice__latency-dot">
										<img src="<?php $voice_src( 'dot.svg' ); ?>" alt="" width="6" height="6">
									</span>
									<span class="voice__latency-name">Claude reasoning</span>
									<span class="voice__latency-value">118 ms</span>
								</div>
								<div class="voice__latency-item">
									<span class="voice__latency-dot">
										<img src="<?php $voice_src( 'dot-tts.svg' ); ?>" alt="" width="6" height="6">
									</span>
									<span class="voice__latency-name">TTS</span>
									<span class="voice__latency-value">70 ms</span>
								</div>
							</div>
						</div>
						<div class="voice__divider"></div>
						<div class="voice__transcript">
							<p class="voice__transcript-label">LIVE TRANSCRIPT</p>
							<div class="voice__transcript-line voice__transcript-caller">
								<p class="voice__transcript-speaker">CALLER</p>
								<p class="voice__transcript-text">I need to move my flight to Thursday.</p>
							</div>
							<div class="voice__transcript-line voice__transcript-agent">
								<p class="voice__transcript-speaker">AGENT</p>
								<p class="voice__transcript-text">I can do that — the 6:40 or the 9:15?</p>
							</div>
						</div>
					</div>
				</div>
				<div class="voice__quality-card">
					<p class="voice__quality-label">VOICE AI QUALITY INDEX</p>
					<div class="voice__quality-score">
						<span class="voice__quality-number">94</span>
						<span class="voice__quality-max">/ 100</span>
						<span class="voice__quality-status">Healthy</span>
					</div>
					<div class="voice__quality-metrics">
						<div class="voice__quality-metric">
							<p class="voice__quality-metric-label">Response latency</p>
							<p class="voice__quality-metric-value">98</p>
						</div>
						<div class="voice__quality-metric">
							<p class="voice__quality-metric-label">Interruption rate</p>
							<p class="voice__quality-metric-value">91</p>
						</div>
						<div class="voice__quality-metric">
							<p class="voice__quality-metric-label">Caller sentiment</p>
							<p class="voice__quality-metric-value">93</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="voice-cards">
			<?php
			foreach ( $features as $feature ) :
				?>
				<div class="voice-card">
					<div class="voice-card__icon">
						<?php if ( is_array( $feature ) && isset( $feature['feature_icon'] ) && $feature['feature_icon'] ) : ?>
							<?php echo wp_get_attachment_image( $feature['feature_icon'], 'full', false, array( 'class' => 'voice-card__icon-img' ) ); ?>
						<?php else : ?>
							<img src="<?php $voice_src( $feature['icon'] ?? 'icon-realtime.svg' ); ?>" alt="" width="20" height="20">
						<?php endif; ?>
					</div>
					<div class="voice-card__content">
						<h3 class="voice-card__title">
							<?php echo esc_html( $feature['feature_title'] ?? $feature['title'] ); ?>
						</h3>
						<p class="voice-card__body">
							<?php echo esc_html( $feature['feature_body'] ?? $feature['body'] ); ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!--
		Mobile-only layout (<768px) — Figma 681:726, a dedicated single-column
		adaptation with full-width stacking. Hides the desktop call-panel + quality-card
		layout and replaces with a simplified call mockup, latency breakdown, and stacked feature cards.
		-->
		<div class="voice-mobile">
			<div class="voice-m__header">
				<p class="voice-m__eyebrow" data-animate="fade">
					<span class="voice-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="voice-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="voice-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="voice-m__call-wrap" data-animate="fade">
				<div class="voice-m__glow" aria-hidden="true"></div>
				<div class="voice-m__call-mockup">
					<div class="voice-m__call-header">
						<div class="voice-m__live-badge">
							<span class="voice-m__live-dot" aria-hidden="true">●</span>
							LIVE
						</div>
						<p class="voice-m__call-info">Inbound · +1 415 ••• 0122</p>
						<p class="voice-m__call-duration">03:13</p>
					</div>

					<div class="voice-m__waveform">
						<?php
						// height,alpha pairs scaled ×0.875 from desktop — exact per-bar values
						// from Figma mobile node 681:744.
						$bars = array(
							array( 5.25, 0.52 ), array( 19.25, 0.73 ), array( 30.625, 0.89 ), array( 38.5, 1 ),
							array( 27.125, 0.84 ), array( 24.5, 0.8 ), array( 19.25, 0.73 ), array( 19.25, 0.73 ),
							array( 18.375, 0.71 ), array( 28.875, 0.86 ), array( 35, 0.95 ), array( 35.875, 0.96 ),
							array( 19.25, 0.73 ), array( 12.25, 0.63 ), array( 19.25, 0.73 ), array( 31.5, 0.9 ),
							array( 27.125, 0.84 ), array( 31.5, 0.9 ), array( 30.625, 0.89 ), array( 26.25, 0.82 ),
							array( 6.125, 0.54 ), array( 18.375, 0.71 ), array( 30.625, 0.89 ), array( 38.5, 1 ),
							array( 27.125, 0.84 ), array( 25.375, 0.81 ), array( 20.125, 0.74 ), array( 18.375, 0.71 ),
							array( 18.375, 0.71 ), array( 28.875, 0.86 ), array( 35, 0.95 ), array( 36.75, 0.98 ),
							array( 19.25, 0.73 ), array( 13.125, 0.64 ), array( 18.375, 0.71 ), array( 31.5, 0.9 ),
							array( 26.25, 0.82 ), array( 31.5, 0.9 ), array( 31.5, 0.9 ), array( 27.125, 0.84 ),
							array( 6.125, 0.54 ), array( 18.375, 0.71 ), array( 29.75, 0.88 ), array( 37.625, 0.99 ),
							array( 27.125, 0.16 ), array( 25.375, 0.16 ), array( 20.125, 0.16 ), array( 18.375, 0.16 ),
							array( 17.5, 0.16 ), array( 28, 0.16 ), array( 35, 0.16 ), array( 36.75, 0.16 ),
							array( 20.125, 0.16 ), array( 14, 0.16 ), array( 17.5, 0.16 ), array( 30.625, 0.16 ),
							array( 26.25, 0.16 ), array( 31.5, 0.16 ), array( 31.5, 0.16 ), array( 27.125, 0.16 ),
						);
						foreach ( $bars as $bar ) {
							list( $h, $a ) = $bar;
							$bg = ( 1 === $a ) ? '#3a7dff' : 'rgba(58,125,255,' . $a . ')';
							echo '<div class="voice-m__waveform-bar" style="height: ' . esc_attr( $h ) . 'px; background: ' . esc_attr( $bg ) . ';"></div>';
						}
						?>
					</div>

					<div class="voice-m__latency">
						<div class="voice-m__latency-header">
							<p class="voice-m__latency-label">TURN LATENCY</p>
							<div class="voice-m__latency-value">284 ms</div>
						</div>
						<div class="voice-m__latency-bar">
							<div class="voice-m__latency-seg voice-m__latency-stt"></div>
							<div class="voice-m__latency-seg voice-m__latency-model"></div>
							<div class="voice-m__latency-seg voice-m__latency-tts"></div>
						</div>
						<div class="voice-m__latency-legend">
							<div class="voice-m__latency-item">
								<span class="voice-m__latency-dot">●</span>
								<span>STT</span>
								<span>96 ms</span>
							</div>
							<div class="voice-m__latency-item">
								<span class="voice-m__latency-dot">●</span>
								<span>Claude reasoning</span>
								<span>118 ms</span>
							</div>
							<div class="voice-m__latency-item">
								<span class="voice-m__latency-dot">●</span>
								<span>TTS</span>
								<span>70 ms</span>
							</div>
						</div>
					</div>

					<div class="voice-m__divider"></div>

					<div class="voice-m__transcript">
						<p class="voice-m__transcript-label">LIVE TRANSCRIPT</p>
						<div class="voice-m__transcript-line">
							<p class="voice-m__transcript-speaker">CALLER</p>
							<p class="voice-m__transcript-text">I need to move my flight to Thursday.</p>
						</div>
						<div class="voice-m__transcript-line">
							<p class="voice-m__transcript-speaker">AGENT</p>
							<p class="voice-m__transcript-text">I can do that — the 6:40 or the 9:15?</p>
						</div>

						<div class="voice-m__quality">
							<div class="voice-m__quality-copy">
								<p class="voice-m__quality-label">VOICE QUALITY INDEX</p>
								<p class="voice-m__quality-number">94</p>
							</div>
							<span class="voice-m__quality-status">Excellent</span>
						</div>
					</div>
				</div>
			</div>

			<div class="voice-m__feats">
				<?php
				foreach ( $features as $feature ) :
					?>
					<div class="voice-m-feat" data-animate="fade">
						<div class="voice-m-feat__icon">
							<?php if ( is_array( $feature ) && isset( $feature['feature_icon'] ) && $feature['feature_icon'] ) : ?>
								<?php echo wp_get_attachment_image( $feature['feature_icon'], 'full', false, array( 'class' => 'voice-m-feat__icon-img' ) ); ?>
							<?php else : ?>
								<img src="<?php $voice_src( $feature['icon'] ?? 'icon-realtime.svg' ); ?>" alt="" width="20" height="20">
							<?php endif; ?>
						</div>
						<div class="voice-m-feat__content">
							<h3 class="voice-m-feat__title"><?php echo esc_html( $feature['feature_title'] ?? $feature['title'] ); ?></h3>
							<p class="voice-m-feat__body"><?php echo esc_html( $feature['feature_body'] ?? $feature['body'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
