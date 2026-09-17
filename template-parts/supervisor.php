<?php
/**
 * Template part: Supervisor desktop.
 * Figma: 1:6796, 1440 × 1020 at (0, 9987). Dashboard is HTML + SVG.
 * Photos 1:6844 / 1:6952 / 1:6988 from Media Library. Motion empty.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = get_field( 'supervisor_eyebrow' );
$headline       = get_field( 'supervisor_headline' );
$body           = get_field( 'supervisor_body' );
$whisper_title  = get_field( 'supervisor_whisper_title' );
$whisper_note   = get_field( 'supervisor_whisper_note' );
$live           = get_field( 'supervisor_live_label' );
$sup_name       = get_field( 'supervisor_name' );
$sup_status     = get_field( 'supervisor_status' );
$sup_photo      = (int) get_field( 'supervisor_photo' );
$features       = array_values(
	array_filter(
		(array) get_field( 'supervisor_features' ),
		function ( $row ) {
			return ! empty( $row['title'] );
		}
	)
);
$sessions       = array_values( (array) get_field( 'supervisor_sessions' ) );

if ( ! $eyebrow ) {
	$eyebrow = 'The structural argument';
}
if ( ! $headline ) {
	$headline = 'Your AI works. Your team stays in charge';
}
if ( ! $body ) {
	$body = 'AI agents handle the volume. Supervisors set the limits, review the work, and step in when it matters.';
}
if ( ! $whisper_title ) {
	$whisper_title = 'Whisper note to agents';
}
if ( ! $whisper_note ) {
	$whisper_note = 'Offer a discount option to them.';
}
if ( ! $live ) {
	$live = 'LIVE';
}
if ( ! $sup_name ) {
	$sup_name = 'Supervisor';
}
if ( ! $sup_status ) {
	$sup_status = 'Watching 4 sessions';
}
if ( ! $sup_photo ) {
	$sup_photo = orbit_get_attachment_id_by_filename( ORBIT_SUPERVISOR_PHOTO_ID );
}

$feature_defaults = array(
	array(
		'number' => '01',
		'title'  => 'Supervisor desktop',
		'lead'   => '',
		'body'   => 'Live tab streams every conversation across every agent. Click in to read the live transcript and send a note. Human agent or LLM, same workspace, same baseline.',
	),
	array(
		'number' => '02',
		'title'  => 'Hybrid handoff',
		'lead'   => '',
		'body'   => 'Hybrid models, where a human steps in for an AI, beat fully autonomous voice AI 68.7% of the time. The statistic only matters if the architecture lets the handoff happen — full context, shared memory, no re-prompting the customer.',
	),
	array(
		'number' => '03',
		'title'  => 'QM scoring',
		'lead'   => 'Score humans and LLMs against the same rubric, the same day.',
		'body'   => 'Quality management evaluates every conversation — whether the agent on the line was a human, an LLM, or a handoff between the two. Calibration stays intact across the entire workforce.',
	),
	array(
		'number' => '04',
		'title'  => 'Shared memory',
		'lead'   => 'One conversation across SMS, voice, WhatsApp, and a human takeover.',
		'body'   => 'Sentiment baselines do not fork at the bot-to-human boundary. Same identity graph, same conversation memory, same rubric. The model picks up where the human left off — and vice versa — without re-asking the customer who they are.',
	),
	array(
		'number' => '05',
		'title'  => 'Tool approvals',
		'lead'   => 'Gate risky tools behind a human. Auto-resume on approval.',
		'body'   => 'Any tool can be flagged confirmation: "always". The runtime parks the call instead of firing. Operator approves, the conversation resumes with the tool result baked in. Audit row per decision.',
	),
	array(
		'number' => '06',
		'title'  => 'Spend ceilings',
		'lead'   => 'Hard caps per conversation. Per squad. Per day.',
		'body'   => 'Set max_cost_per_conversation_cents on any agent. Runtime returns a 429 at the cap before any LLM tokens burn. Same cost-tracker as the billing ledger — no drift.',
	),
);

if ( ! $features ) {
	$features = $feature_defaults;
} else {
	foreach ( $features as $i => $row ) {
		$def = isset( $feature_defaults[ $i ] ) ? $feature_defaults[ $i ] : null;
		if ( ! $def ) {
			continue;
		}
		if ( empty( $row['lead'] ) ) {
			$features[ $i ]['lead'] = $def['lead'];
		}
		if ( empty( $row['body'] ) ) {
			$features[ $i ]['body'] = $def['body'];
		}
		if ( empty( $row['number'] ) ) {
			$features[ $i ]['number'] = $def['number'];
		}
	}
}

if ( ! $sessions || count( $sessions ) < 4 ) {
	$sessions = array(
		array(
			'kind'  => 'human',
			'name'  => 'Alex M.',
			'role'  => 'Human agent',
			'quote' => 'I can help you with that right away',
			'photo' => orbit_get_attachment_id_by_filename( ORBIT_SUPERVISOR_ALEX_ID ),
		),
		array(
			'kind'  => 'ai',
			'name'  => 'AI Agent',
			'role'  => 'LLM',
			'quote' => 'Sure, I can assist you with that.',
			'photo' => 0,
		),
		array(
			'kind'  => 'human',
			'name'  => 'Taylor R.',
			'role'  => 'Human agent',
			'quote' => 'Let me look that up for you.',
			'photo' => orbit_get_attachment_id_by_filename( ORBIT_SUPERVISOR_TAYLOR_ID ),
		),
		array(
			'kind'  => 'ai',
			'name'  => 'AI Agent',
			'role'  => 'LLM',
			'quote' => 'I’ve updated your order details',
			'photo' => 0,
		),
	);
} else {
	foreach ( $sessions as $i => $session ) {
		if ( empty( $session['photo'] ) && 'human' === ( $session['kind'] ?? '' ) ) {
			$stem = ( 0 === $i ) ? ORBIT_SUPERVISOR_ALEX_ID : ORBIT_SUPERVISOR_TAYLOR_ID;
			$sessions[ $i ]['photo'] = orbit_get_attachment_id_by_filename( $stem );
		}
	}
}

$slots = array( 'tl', 'tr', 'bl', 'br' );

$icon_send = '<svg viewBox="0 0 19 19" width="19" height="19" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.5918 5.40823L7.32174 9.76149L0.76356 7.57514C0.305788 7.42224 -0.00261712 6.99274 1.67399e-05 6.51023C0.00268526 6.02771 0.314625 5.60085 0.774165 5.45329L17.5412 0.0536906C17.9397 -0.074433 18.3772 0.0307136 18.6733 0.326781C18.9693 0.622848 19.0745 1.06028 18.9463 1.45886L13.5467 18.2259C13.3992 18.6854 12.9723 18.9973 12.4898 19C12.0073 19.0026 11.5778 18.6942 11.4249 18.2365L9.22793 11.6465L13.5918 5.40823Z" fill="#3A79FD"/></svg>';

$icon_whisper = '<svg viewBox="0 0 12.6087 13.9688" width="12.609" height="13.969" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M9.10672 2.57031H3.00781C2.77484 2.57031 2.58594 2.75922 2.58594 2.99219C2.58594 3.22516 2.77484 3.41406 3.00781 3.41406H9.10719C9.34016 3.41406 9.52906 3.22516 9.52906 2.99219C9.52906 2.75922 9.33969 2.57031 9.10672 2.57031Z" fill="#3A79FD"/><path d="M9.52859 5.36719C9.52859 5.13422 9.33969 4.94531 9.10672 4.94531H3.00781C2.77484 4.94531 2.58594 5.13422 2.58594 5.36719C2.58594 5.60016 2.77484 5.78906 3.00781 5.78906H9.10719C9.33969 5.78906 9.52859 5.60016 9.52859 5.36719Z" fill="#3A79FD"/><path d="M3.00781 7.32422C2.77484 7.32422 2.58594 7.51312 2.58594 7.74609C2.58594 7.97906 2.77484 8.16797 3.00781 8.16797H6.08C6.31297 8.16797 6.50188 7.97906 6.50188 7.74609C6.50188 7.51312 6.31297 7.32422 6.08 7.32422H3.00781Z" fill="#3A79FD"/><path d="M4.10672 13.125H1.49625C1.13625 13.125 0.84375 12.832 0.84375 12.4725V1.49625C0.84375 1.13625 1.13672 0.84375 1.49625 0.84375H10.6256C10.9852 0.84375 11.2781 1.13672 11.2781 1.49625V5.50172C11.2781 5.73469 11.467 5.92359 11.7 5.92359C11.933 5.92359 12.1219 5.73469 12.1219 5.50172V1.49625C12.1219 0.67125 11.4506 0 10.6261 0H1.49625C0.67125 0 0 0.67125 0 1.49625V12.4725C0 13.2975 0.67125 13.9687 1.49625 13.9687H4.10672C4.33969 13.9687 4.52859 13.7798 4.52859 13.5469C4.52859 13.3139 4.33969 13.125 4.10672 13.125Z" fill="#3A79FD"/><path d="M12.1496 7.41262C11.5375 6.79996 10.5404 6.79996 9.92871 7.41262L6.0498 11.2915C5.92699 11.4143 5.84636 11.57 5.8173 11.7411L5.60543 12.9987C5.56043 13.2636 5.64715 13.535 5.83699 13.7248C5.99355 13.8818 6.20683 13.9686 6.42527 13.9686C6.47121 13.9686 6.51715 13.9648 6.56308 13.9568L7.8198 13.7445C7.99136 13.7159 8.14746 13.6357 8.27027 13.5125L12.1492 9.63355C12.7618 9.02137 12.7618 8.0248 12.1496 7.41262ZM7.68058 12.9125L6.43746 13.1389L6.64605 11.8878L9.43746 9.09637L10.4659 10.1248L7.68058 12.9125ZM11.5529 9.03684L11.0621 9.52809L10.0337 8.49965L10.525 8.0084C10.6665 7.86684 10.8531 7.79606 11.0392 7.79606C11.2253 7.79606 11.4114 7.86684 11.5534 8.0084C11.8365 8.29246 11.8365 8.75324 11.5529 9.03684Z" fill="#3A79FD"/></svg>';

$icon_bot = '<svg viewBox="0 0 53 53" width="53" height="53" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><rect width="53" height="53" rx="26.5" fill="#354051"/><path d="M15.7679 40.9698H37.2655C39.0383 40.9698 40.4709 39.5282 40.4709 37.7644V22.9918C40.4709 21.219 39.0293 19.7864 37.2655 19.7864H27.2643V18.3091V17.948C28.8401 17.6167 30.031 16.202 30.031 14.5188C30.031 12.5758 28.4551 11 26.5212 11C24.5782 11 23.0024 12.5758 23.0024 14.5188C23.0024 16.202 24.1932 17.6167 25.778 17.948V18.3091V19.7864H15.7679C13.9951 19.7864 12.5625 21.2279 12.5625 22.9918V37.7733C12.5625 39.5372 13.9951 40.9698 15.7679 40.9698ZM31.6963 24.3259C33.0662 24.3259 34.1765 25.4361 34.1765 26.7971C34.1765 28.167 33.0662 29.2683 31.6963 29.2683C30.3354 29.2683 29.2252 28.167 29.2252 26.7971C29.2162 25.4361 30.3264 24.3259 31.6963 24.3259ZM30.7562 34.5171C31.1681 34.5171 31.4994 34.8484 31.4994 35.2603C31.4994 35.6722 31.1681 36.0034 30.7562 36.0034H22.2772C21.8653 36.0034 21.534 35.6722 21.534 35.2603C21.534 34.8484 21.8653 34.5171 22.2772 34.5171H30.7562ZM21.346 24.3259C22.7159 24.3259 23.8172 25.4361 23.8172 26.7971C23.8172 28.167 22.7159 29.2683 21.346 29.2683C19.9761 29.2683 18.8748 28.167 18.8748 26.7971C18.8658 25.4361 19.9671 24.3259 21.346 24.3259Z" fill="#3A79FD"/><path d="M41.9609 23.6523V34.3698C43.6621 34.3519 45.0499 32.9462 45.0499 31.236V26.7861C45.0499 25.076 43.6621 23.6792 41.9609 23.6523Z" fill="#3A79FD"/><path d="M11.08 34.3698V23.6523C9.3699 23.6792 8 25.076 8 26.7861V31.2271C8 32.9462 9.3699 34.334 11.08 34.3698Z" fill="#3A79FD"/></svg>';

$icon_wave = '<svg viewBox="0 0 70 15" width="70" height="15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><g stroke="#3A79FD" stroke-linecap="round"><line x1="0.5" y1="5.5" x2="0.5" y2="9.5"/><line x1="3.5" y1="2.5" x2="3.5" y2="12.5"/><line x1="6.5" y1="3.5" x2="6.5" y2="11.5"/><line x1="9.5" y1="5.5" x2="9.5" y2="9.5"/><line x1="12.5" y1="2.5" x2="12.5" y2="12.5"/><line x1="15.5" y1="3.5" x2="15.5" y2="11.5"/><line x1="18.5" y1="5.5" x2="18.5" y2="9.5"/><line x1="21.5" y1="2.5" x2="21.5" y2="12.5"/><line x1="24.5" y1="3.5" x2="24.5" y2="11.5"/><line x1="27.5" y1="5.5" x2="27.5" y2="9.5"/><line x1="30.5" y1="2.5" x2="30.5" y2="12.5"/><line x1="33.5" y1="3.5" x2="33.5" y2="11.5"/><line x1="36.5" y1="3.5" x2="36.5" y2="11.5"/><line x1="39.5" y1="2.5" x2="39.5" y2="12.5"/><line x1="42.5" y1="2.5" x2="42.5" y2="12.5"/><line x1="45.5" y1="0.5" x2="45.5" y2="14.5"/><line x1="48.5" y1="3.5" x2="48.5" y2="11.5"/><line x1="51.5" y1="0.5" x2="51.5" y2="14.5"/><line x1="54.5" y1="3.5" x2="54.5" y2="11.5"/><line x1="57.5" y1="5.5" x2="57.5" y2="9.5"/><line x1="60.5" y1="2.5" x2="60.5" y2="12.5"/><line x1="63.5" y1="3.5" x2="63.5" y2="11.5"/><line x1="66.5" y1="3.5" x2="66.5" y2="11.5"/><line x1="69.5" y1="2.5" x2="69.5" y2="12.5"/></g></svg>';

$wire_tr = '<svg viewBox="0 0 62.5001 76.5001" width="62.5" height="76.5" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><path d="M0.75 75.7501C13.4917 75.7501 25.203 68.749 31.2351 57.5256L61.75 0.750146" stroke="#52525B" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="5 5"/></svg>';
$wire_tl = '<svg viewBox="0 0 63.5001 76.5001" width="63.5" height="76.5" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><path d="M0.75 75.7501C13.7148 75.7501 25.6454 68.6728 31.8608 57.295L62.75 0.750141" stroke="#52525B" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="5 5"/></svg>';
?>
<section class="sup" id="supervisor">
	<div class="sup__frame">
		<div class="sup__stage">
			<div class="sup__intro" data-animate="fade">
				<p class="sup__eyebrow">
					<span class="sup__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="sup__headline"><?php echo esc_html( $headline ); ?></h2>
				<p class="sup__body"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="sup-list" data-animate="fade" role="tablist" aria-label="Supervisor capabilities" aria-orientation="vertical">
				<?php foreach ( $features as $index => $feature ) : ?>
					<?php
					$is_active   = ( 0 === $index );
					$tab_id      = 'sup-tab-' . $index;
					$panel_id    = 'sup-panel-' . $index;
					$lead        = isset( $feature['lead'] ) ? trim( (string) $feature['lead'] ) : '';
					$feat_body   = isset( $feature['body'] ) ? trim( (string) $feature['body'] ) : '';
					$body_class  = 'sup-feat__body' . ( 0 === $index && '' === $lead ? ' sup-feat__body--intro' : '' );
					?>
					<div class="sup-feat<?php echo $is_active ? ' is-active' : ''; ?>">
						<button
							class="sup-feat__row"
							type="button"
							role="tab"
							id="<?php echo esc_attr( $tab_id ); ?>"
							aria-controls="<?php echo esc_attr( $panel_id ); ?>"
							aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
							tabindex="<?php echo $is_active ? '0' : '-1'; ?>"
						>
							<span class="sup-feat__num"><?php echo esc_html( $feature['number'] ); ?></span>
							<span class="sup-feat__title"><?php echo esc_html( $feature['title'] ); ?></span>
						</button>
						<?php if ( '' !== $lead || '' !== $feat_body ) : ?>
							<div
								class="sup-feat__panel"
								role="tabpanel"
								id="<?php echo esc_attr( $panel_id ); ?>"
								aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
								<?php echo $is_active ? '' : 'hidden'; ?>
							>
								<?php if ( '' !== $lead ) : ?>
									<p class="sup-feat__lead"><?php echo esc_html( $lead ); ?></p>
								<?php endif; ?>
								<?php if ( '' !== $feat_body ) : ?>
									<p class="<?php echo esc_attr( $body_class ); ?>"><?php echo esc_html( $feat_body ); ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="sup-board-scale" data-animate="group">
				<div class="sup-board">
					<div class="sup-wire sup-wire--mid" aria-hidden="true">
						<svg viewBox="0 0 77 1.5" width="77" height="1.5" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="0.75" y1="0.75" x2="76.25" y2="0.75" stroke="#3A78FB" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="5 5"/></svg>
					</div>
					<span class="sup-pin sup-pin--mid" aria-hidden="true"></span>
					<div class="sup-wire sup-wire--tr" aria-hidden="true"><span class="sup-wire__img"><?php echo $wire_tr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></div>
					<div class="sup-wire sup-wire--tl" aria-hidden="true"><span class="sup-wire__rot sup-wire__rot--tl"><span class="sup-wire__img"><?php echo $wire_tl; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></span></div>
					<div class="sup-wire sup-wire--br" aria-hidden="true"><span class="sup-wire__rot sup-wire__rot--br"><span class="sup-wire__img"><?php echo $wire_tr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></span></div>
					<div class="sup-wire sup-wire--bl" aria-hidden="true"><span class="sup-wire__rot sup-wire__rot--bl"><span class="sup-wire__img"><?php echo $wire_tl; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></span></div>
					<span class="sup-pin sup-pin--bl" aria-hidden="true"></span>
					<span class="sup-pin sup-pin--tr" aria-hidden="true"></span>

					<div class="sup-whisper">
						<span class="sup-whisper__icon"><?php echo $icon_whisper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<p class="sup-whisper__title"><?php echo esc_html( $whisper_title ); ?></p>
						<div class="sup-whisper__note">
							<p><?php echo esc_html( $whisper_note ); ?></p>
							<span class="sup-whisper__send"><?php echo $icon_send; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						</div>
					</div>

					<?php foreach ( $sessions as $index => $session ) : ?>
						<?php
						if ( $index > 3 ) {
							break;
						}
						$slot     = $slots[ $index ];
						$kind     = ( 'ai' === ( $session['kind'] ?? '' ) ) ? 'ai' : 'human';
						$photo_id = isset( $session['photo'] ) ? (int) $session['photo'] : 0;
						?>
						<div class="sup-card sup-card--<?php echo esc_attr( $slot ); ?> sup-card--<?php echo esc_attr( $kind ); ?>">
							<div class="sup-card__live">
								<span class="sup-card__live-dot orbit-pulse-dot" style="--orbit-pulse:#29c376" aria-hidden="true"></span>
								<span><?php echo esc_html( $live ); ?></span>
							</div>
							<div class="sup-card__wave" aria-hidden="true"><?php echo $icon_wave; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
							<?php if ( 'ai' === $kind ) : ?>
								<span class="sup-card__bot"><?php echo $icon_bot; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<?php elseif ( $photo_id ) : ?>
								<div class="sup-card__face">
									<?php
									echo wp_get_attachment_image(
										$photo_id,
										'full',
										false,
										array(
											'class' => 'sup-card__face-img',
											'alt'   => $session['name'],
										)
									);
									?>
								</div>
							<?php endif; ?>
							<p class="sup-card__name"><?php echo esc_html( $session['name'] ); ?></p>
							<p class="sup-card__role"><?php echo esc_html( $session['role'] ); ?></p>
							<div class="sup-card__quote">
								<p><?php echo esc_html( $session['quote'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>

					<div class="sup-lead">
						<div class="sup-lead__face">
							<?php
							if ( $sup_photo ) {
								echo wp_get_attachment_image(
									$sup_photo,
									'full',
									false,
									array(
										'class' => 'sup-lead__face-img',
										'alt'   => $sup_name,
									)
								);
							}
							?>
						</div>
						<p class="sup-lead__name"><?php echo esc_html( $sup_name ); ?></p>
						<div class="sup-lead__status">
							<span class="sup-lead__status-dot orbit-pulse-dot" style="--orbit-pulse:#3a79fd" aria-hidden="true"></span>
							<span><?php echo esc_html( $sup_status ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
