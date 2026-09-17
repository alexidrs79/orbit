<?php
/**
 * Template part: CX — Orbit ("Every conversation").
 * Figma: 607:11877 ("CX — Orbit (1440)"), 1440 × 964.
 * Dark section: 5 stages orbiting a central "Every conversation" hub,
 * connected by straight glowing lines colored per stage.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'cx_eyebrow' );
$headline = get_field( 'cx_headline' );
$body     = get_field( 'cx_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Customer experience';
}
if ( ! $headline ) {
	$headline = 'Measure, coach, and staff your support team in one place';
}
if ( ! $body ) {
	$body = 'Close the loop after every conversation: survey the customer, score how the agent handled it, schedule the right people for tomorrow, and reward the customer with a loyalty card that brings them back. One platform, not a CX suite bolted onto your contact center.';
}

$stages_field = array_values(
	array_filter(
		(array) get_field( 'cx_stages' ),
		function ( $stage ) {
			return ! empty( $stage['title'] );
		}
	)
);

// Fixed structural data per stage slot — position, color, icon and connector line are
// design constants; only title/body are ACF-editable (via $stages_field, by index).
$stage_slots = array(
	array(
		'slot'   => 'ask',
		'number' => '1',
		'tag'    => 'ASK',
		'color'  => '#3a7dff',
		'title'  => 'CSAT, NPS & CES surveys',
		'body'   => "The survey fires the moment a call or chat ends, asked in the customer's own language and capped so no one is surveyed too often.",
		'icon'   => '<svg viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5.2085 4.16797H16.6668M5.2085 9.3763H13.5418M5.2085 14.5846H11.4585"/><path d="M18.3333 13.125L19.6875 15.9375L22.8125 16.3542L20.5208 18.5417L21.0417 21.6667L18.3333 20.2083L15.625 21.6667L16.1458 18.5417L13.8542 16.3542L16.9792 15.9375L18.3333 13.125Z"/></svg>',
		'node'   => array( 'left' => 586, 'top' => 155 ),
		'text'   => array(
			'left'  => 472,
			'top'   => 12,
			'width' => 296,
			'align' => 'left',
		),
		'line'   => array( 'x1' => 620, 'y1' => 290, 'x2' => 620, 'y2' => 223 ),
	),
	array(
		'slot'   => 'score',
		'number' => '2',
		'tag'    => 'SCORE',
		'color'  => '#a78bfa',
		'title'  => 'Quality scorecards & calibration',
		'body'   => 'Score against your own evaluation form, let AI clear the backlog, and calibrate reviewers so everyone grades to the same bar.',
		'icon'   => '<svg viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6.25 20.832V14.582M12.5 20.832V5.20703M18.75 20.832V11.457"/></svg>',
		'node'   => array( 'left' => 823.76, 'top' => 282.83 ),
		'text'   => array(
			'left'  => 975,
			'top'   => 258,
			'width' => 265,
			'align' => 'left',
		),
		'line'   => array(
			'x1' => 701.7,
			'y1' => 354.35,
			'x2' => 824.69,
			'y2' => 324.78,
		),
	),
	array(
		'slot'   => 'diagnose',
		'number' => '3',
		'tag'    => 'DIAGNOSE',
		'color'  => '#fbbf24',
		'title'  => 'Session replay',
		'body'   => "Replay the customer's on-page session beside the conversation to see exactly where they got stuck, sensitive fields masked at capture.",
		'icon'   => '<svg viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18.2292 5.20703H6.77083C4.7573 5.20703 3.125 6.83933 3.125 8.85286V16.1445C3.125 18.1581 4.7573 19.7904 6.77083 19.7904H18.2292C20.2427 19.7904 21.875 18.1581 21.875 16.1445V8.85286C21.875 6.83933 20.2427 5.20703 18.2292 5.20703Z"/><path d="M11.4583 10L15.8333 12.5L11.4583 15V10Z"/></svg>',
		'node'   => array( 'left' => 732.95, 'top' => 489.67 ),
		'text'   => array(
			'left'  => 975,
			'top'   => 466,
			'width' => 265,
			'align' => 'left',
		),
		'line'   => array(
			'x1' => 678.85,
			'y1' => 433.94,
			'x2' => 743.13,
			'y2' => 499.41,
		),
	),
	array(
		'slot'   => 'staff',
		'number' => '4',
		'tag'    => 'STAFF',
		'color'  => '#4ade80',
		'title'  => 'Workforce management',
		'body'   => "Forecast tomorrow's volume from today's, build the schedule, and flag rising burnout risk before an agent hits the wall.",
		'icon'   => '<svg viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15.6248 19.7904V18.332C15.6248 17.5032 15.2956 16.7084 14.7095 16.1223C14.1235 15.5363 13.3286 15.207 12.4998 15.207H7.2915C6.4627 15.207 5.66785 15.5363 5.0818 16.1223C4.49574 16.7084 4.1665 17.5032 4.1665 18.332V19.7904"/><path d="M9.896 11.457C11.6219 11.457 13.021 10.0579 13.021 8.33203C13.021 6.60614 11.6219 5.20703 9.896 5.20703C8.17011 5.20703 6.771 6.60614 6.771 8.33203C6.771 10.0579 8.17011 11.457 9.896 11.457Z"/><path d="M20.8333 19.7917V18.3333C20.8353 17.6482 20.6121 16.9815 20.198 16.4356C19.7839 15.8898 19.202 15.4952 18.5417 15.3125"/><path d="M16.6665 5.41797C17.256 5.64474 17.763 6.04483 18.1206 6.5655C18.4782 7.08618 18.6696 7.70299 18.6696 8.33464C18.6696 8.96628 18.4782 9.58309 18.1206 10.1038C17.763 10.6244 17.256 11.0245 16.6665 11.2513"/></svg>',
		'node'   => array( 'left' => 439.05, 'top' => 489.67 ),
		'text'   => array(
			'left'  => 0,
			'top'   => 466,
			'width' => 265,
			'align' => 'left',
		),
		'line'   => array(
			'x1' => 561.15,
			'y1' => 433.94,
			'x2' => 496.87,
			'y2' => 499.41,
		),
	),
	array(
		'slot'   => 'reward',
		'number' => '5',
		'tag'    => 'REWARD',
		'color'  => '#22d3ee',
		'title'  => 'Loyalty & wallet passes',
		'body'   => 'Points, tiers, and an Apple Wallet or Google Wallet card that brings the customer back for the next conversation.',
		'icon'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" aria-hidden="true"><path d="M12 7V21M12 7C11.6383 5.5094 11.0154 4.2355 10.2127 3.3436C9.41003 2.4517 8.46469 1.98363 7.5 2.00044C6.83696 2.00044 6.20107 2.26383 5.73223 2.73267C5.26339 3.20151 5 3.8374 5 4.50044C5 5.16348 5.26339 5.79936 5.73223 6.2682C6.20107 6.73705 6.83696 7.00044 7.5 7.00044M12 7C12.3617 5.5094 12.9846 4.2355 13.7873 3.3436C14.59 2.4517 15.5353 1.98363 16.5 2.00044C17.163 2.00044 17.7989 2.26383 18.2678 2.73267C18.7366 3.20151 19 3.8374 19 4.50044C19 5.16348 18.7366 5.79936 18.2678 6.2682C17.7989 6.73705 17.163 7.00044 16.5 7.00044M20 11V19C20 19.5304 19.7893 20.0391 19.4142 20.4142C19.0391 20.7893 18.5304 21 18 21H6C5.46957 21 4.96086 20.7893 4.58579 20.4142C4.21071 20.0391 4 19.5304 4 19V11M20 11C20.5523 11 21 10.5523 21 10V8C21 7.44772 20.5523 7 20 7H4C3.44772 7 3 7.44772 3 8V10C3 10.5523 3.44772 11 4 11M20 11H4"/></svg>',
		'node'   => array( 'left' => 348.24, 'top' => 282.83 ),
		'text'   => array(
			'left'  => 0,
			'top'   => 258,
			'width' => 265,
			'align' => 'left',
		),
		'line'   => array(
			'x1' => 538.3,
			'y1' => 354.35,
			'x2' => 415.31,
			'y2' => 324.78,
		),
	),
);

foreach ( $stage_slots as $index => &$slot ) {
	if ( isset( $stages_field[ $index ]['title'] ) && $stages_field[ $index ]['title'] ) {
		$slot['title'] = $stages_field[ $index ]['title'];
	}
	if ( isset( $stages_field[ $index ]['body'] ) && $stages_field[ $index ]['body'] ) {
		$slot['body'] = $stages_field[ $index ]['body'];
	}
}
unset( $slot );
?>
<section class="cx-orbit" id="cx-orbit">
	<div class="cx-orbit__frame">
		<div class="cx-orbit__header">
			<p class="cx-orbit__eyebrow" data-animate="fade">
				<span class="cx-orbit__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<h2 class="cx-orbit__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
			<p class="cx-orbit__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
		</div>

		<div class="cx-orbit__diagram" data-animate="fade">
			<img class="cx-orbit__glow" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/cx-orbit/glow.svg' ); ?>" alt="" width="1020" height="920">

			<svg class="cx-orbit__lines" viewBox="0 0 1240 620" fill="none" aria-hidden="true">
				<circle class="cx-orbit__ring" cx="620" cy="374" r="118" stroke="#1E3A6B" stroke-opacity="0.8" />
				<circle class="cx-orbit__ring cx-orbit__ring--dashed" cx="620" cy="374" r="168" stroke="#24405F" stroke-opacity="0.6" stroke-dasharray="3 7" />
				<circle class="cx-orbit__ring cx-orbit__ring--dashed" cx="620" cy="374" r="250" stroke="#23364B" stroke-opacity="0.55" stroke-dasharray="3 7" />
				<circle cx="620" cy="559" r="3" fill="#2A4463" />
				<?php foreach ( $stage_slots as $slot ) : ?>
					<line
						x1="<?php echo esc_attr( $slot['line']['x1'] ); ?>" y1="<?php echo esc_attr( $slot['line']['y1'] ); ?>"
						x2="<?php echo esc_attr( $slot['line']['x2'] ); ?>" y2="<?php echo esc_attr( $slot['line']['y2'] ); ?>"
						stroke="<?php echo esc_attr( $slot['color'] ); ?>" stroke-width="1.5" stroke-linecap="round"
						class="cx-orbit__line"
					/>
					<circle cx="<?php echo esc_attr( $slot['line']['x1'] ); ?>" cy="<?php echo esc_attr( $slot['line']['y1'] ); ?>" r="3.5" fill="<?php echo esc_attr( $slot['color'] ); ?>" />
					<circle cx="<?php echo esc_attr( $slot['line']['x2'] ); ?>" cy="<?php echo esc_attr( $slot['line']['y2'] ); ?>" r="3.5" fill="<?php echo esc_attr( $slot['color'] ); ?>" />
				<?php endforeach; ?>
			</svg>

			<div class="cx-orbit__hub">
				<span class="cx-orbit__hub-icon" aria-hidden="true">
					<svg viewBox="0 0 36 37.6" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M6 21V18C6 14.8174 7.26428 11.7652 9.51472 9.51472C11.7652 7.26428 14.8174 6 18 6C21.1826 6 24.2348 7.26428 26.4853 9.51472C28.7357 11.7652 30 14.8174 30 18V21"/><path d="M6.075 21.4492H5.925C4.10246 21.4492 2.625 22.9267 2.625 24.7492V28.6492C2.625 30.4718 4.10246 31.9492 5.925 31.9492H6.075C7.89754 31.9492 9.375 30.4718 9.375 28.6492V24.7492C9.375 22.9267 7.89754 21.4492 6.075 21.4492Z"/><path d="M30.075 21.0742H29.925C28.1025 21.0742 26.625 22.5517 26.625 24.3742V28.2742C26.625 30.0968 28.1025 31.5742 29.925 31.5742H30.075C31.8975 31.5742 33.375 30.0968 33.375 28.2742V24.3742C33.375 22.5517 31.8975 21.0742 30.075 21.0742Z"/><path d="M30 32.25V33.15C30 34.1048 29.6207 35.0205 28.9456 35.6956C28.2705 36.3707 27.3548 36.75 26.4 36.75H22.5"/></svg>
				</span>
				<p class="cx-orbit__hub-label">Every<br>conversation</p>
				<svg class="cx-orbit__waveform" viewBox="0 0 72.2 17" fill="none" aria-hidden="true">
					<path d="M1 5.5V11.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M6.4 2V15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M11.8 4.5V12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M17.2 1V16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M22.6 3.5V13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M28 5.5V11.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M33.4 3V14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M38.8 5V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M44.2 6.5V10.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M49.6 4V13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M55 6V11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M60.4 2.5V14.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M65.8 4.5V12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M71.2 6V11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</div>

			<?php foreach ( $stage_slots as $slot ) : ?>
				<div
					class="cx-node cx-node--<?php echo esc_attr( $slot['slot'] ); ?>"
					style="left: <?php echo esc_attr( $slot['node']['left'] ); ?>px; top: <?php echo esc_attr( $slot['node']['top'] ); ?>px; --cx-color: <?php echo esc_attr( $slot['color'] ); ?>;"
				>
					<span class="cx-node__icon" aria-hidden="true"><?php echo $slot['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
				</div>
				<div
					class="cx-text cx-text--<?php echo esc_attr( $slot['text']['align'] ); ?>"
					style="left: <?php echo esc_attr( $slot['text']['left'] ); ?>px; top: <?php echo esc_attr( $slot['text']['top'] ); ?>px; width: <?php echo esc_attr( $slot['text']['width'] ); ?>px;"
				>
					<p class="cx-text__tag" style="color: <?php echo esc_attr( $slot['color'] ); ?>;"><?php echo esc_html( $slot['number'] . ' · ' . $slot['tag'] ); ?></p>
					<h3 class="cx-text__title"><?php echo esc_html( $slot['title'] ); ?></h3>
					<p class="cx-text__body"><?php echo esc_html( $slot['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<!--
		Mobile-only layout (<768px) — Figma 691:1311 ("CX — Orbit mobile"), a
		dedicated single-column adaptation: centered header, a simplified hub-only
		diagram (no orbiting nodes), and a vertical connected timeline of the 5
		stages. Reuses the same $stage_slots PHP data (icons/colors/copy) as desktop.
		-->
		<div class="cx-orbit-mobile">
			<div class="cx-m__header">
				<p class="cx-m__eyebrow" data-animate="fade">
					<span class="cx-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="cx-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="cx-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="cx-m__diagram" data-animate="fade">
				<div class="cx-m__ring cx-m__ring--1"></div>
				<svg class="cx-m__ring--dashed" viewBox="0 0 315 299" fill="none" aria-hidden="true">
					<path d="M157.127 297.539C243.537 297.539 313.586 231.082 313.586 149.103C313.586 67.1247 243.537 0.667969 157.127 0.667969C70.7175 0.667969 0.668457 67.1247 0.668457 149.103C0.668457 231.082 70.7175 297.539 157.127 297.539Z" stroke="rgba(36,64,95,0.6)" stroke-width="1.33725" stroke-dasharray="4.01 9.36"/>
				</svg>
				<div class="cx-m__hub">
					<span class="cx-m__hub-icon" aria-hidden="true">
						<svg viewBox="0 0 36 37.6" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M6 21V18C6 14.8174 7.26428 11.7652 9.51472 9.51472C11.7652 7.26428 14.8174 6 18 6C21.1826 6 24.2348 7.26428 26.4853 9.51472C28.7357 11.7652 30 14.8174 30 18V21"/><path d="M6.075 21.4492H5.925C4.10246 21.4492 2.625 22.9267 2.625 24.7492V28.6492C2.625 30.4718 4.10246 31.9492 5.925 31.9492H6.075C7.89754 31.9492 9.375 30.4718 9.375 28.6492V24.7492C9.375 22.9267 7.89754 21.4492 6.075 21.4492Z"/><path d="M30.075 21.0742H29.925C28.1025 21.0742 26.625 22.5517 26.625 24.3742V28.2742C26.625 30.0968 28.1025 31.5742 29.925 31.5742H30.075C31.8975 31.5742 33.375 30.0968 33.375 28.2742V24.3742C33.375 22.5517 31.8975 21.0742 30.075 21.0742Z"/><path d="M30 32.25V33.15C30 34.1048 29.6207 35.0205 28.9456 35.6956C28.2705 36.3707 27.3548 36.75 26.4 36.75H22.5"/></svg>
					</span>
					<p class="cx-m__hub-label">Every<br>conversation</p>
					<svg class="cx-m__waveform" viewBox="0 0 72.2 17" fill="none" aria-hidden="true">
						<path d="M1 5.5V11.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M6.4 2V15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M11.8 4.5V12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M17.2 1V16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M22.6 3.5V13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M28 5.5V11.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M33.4 3V14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M38.8 5V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M44.2 6.5V10.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M49.6 4V13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M55 6V11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M60.4 2.5V14.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M65.8 4.5V12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M71.2 6V11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
					</svg>
				</div>
				<div class="cx-m__bubble cx-m__bubble--left">How can I help<br>you today?</div>
				<div class="cx-m__bubble cx-m__bubble--right">• • •</div>
			</div>

			<div class="cx-m__timeline">
				<?php foreach ( $stage_slots as $i => $slot ) : ?>
					<div class="cx-m-stage<?php echo ( count( $stage_slots ) - 1 === $i ) ? ' cx-m-stage--last' : ''; ?>">
						<div class="cx-m-stage__marker">
							<span class="cx-m-stage__ring" style="--cx-color: <?php echo esc_attr( $slot['color'] ); ?>;">
								<?php echo $slot['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?>
							</span>
							<?php if ( count( $stage_slots ) - 1 !== $i ) : ?>
								<span class="cx-m-stage__connector" aria-hidden="true"></span>
							<?php endif; ?>
						</div>
						<div class="cx-m-stage__copy">
							<p class="cx-m-stage__tag" style="color: <?php echo esc_attr( $slot['color'] ); ?>;"><?php echo esc_html( $slot['number'] . ' · ' . $slot['tag'] ); ?></p>
							<h3 class="cx-m-stage__title"><?php echo esc_html( $slot['title'] ); ?></h3>
							<p class="cx-m-stage__body"><?php echo esc_html( $slot['body'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
