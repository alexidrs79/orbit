<?php
/**
 * Template part: Journeys — Journeys & automation.
 * Figma: 607:11611 ("Journeys — Slide (Light · color system)"), 1440 × 769.
 * Light section: journey-flow canvas (6 nodes, Yes/No fork) + 3 feature callouts.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'journeys_eyebrow' );
$headline = get_field( 'journeys_headline' );
$body     = get_field( 'journeys_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'JOURNEYS & AUTOMATION';
}
if ( ! $headline ) {
	$headline = 'Build customer journeys on a visual canvas that runs itself';
}
if ( ! $body ) {
	$body = 'Drop nodes onto a canvas, connect them, and Orbit runs the whole flow — sending across email, SMS, WhatsApp, and voice, waiting, branching on what a contact does, and handing off to an AI agent or a person where the journey calls for it.';
}

$journeys_src = static function ( $file ) {
	echo esc_url( get_template_directory_uri() . '/assets/img/journeys/' . $file );
};

$default_nodes = array(
	array(
		'field' => 'journeys_node_1',
		'label' => 'Cart abandoned',
		'icon'  => 'icon-cart.svg',
		'color' => 'blue',
		'slot'  => 'n1',
	),
	array(
		'field' => 'journeys_node_2',
		'label' => 'WhatsApp reminder',
		'icon'  => 'icon-whatsapp.svg',
		'color' => 'green',
		'slot'  => 'n2',
	),
	array(
		'field' => 'journeys_node_3',
		'label' => 'Wait 24 hours',
		'icon'  => 'icon-clock.svg',
		'color' => 'slate',
		'slot'  => 'n3',
	),
	array(
		'field' => 'journeys_node_4',
		'label' => 'Opened?',
		'icon'  => 'icon-branch.svg',
		'color' => 'amber',
		'slot'  => 'n4',
	),
	array(
		'field' => 'journeys_node_5',
		'label' => 'SMS · 10% off',
		'icon'  => 'icon-sms.svg',
		'color' => 'green',
		'slot'  => 'n5',
	),
	array(
		'field' => 'journeys_node_6',
		'label' => 'AI agent · Answer',
		'icon'  => 'icon-ai.svg',
		'color' => 'purple',
		'slot'  => 'n6',
	),
);

$default_callouts = array(
	array(
		'title_field' => 'journeys_callout_1_title',
		'body_field'  => 'journeys_callout_1_body',
		'title'       => 'Drag-and-drop canvas',
		'body'        => 'Triggers, waits, branches, and handoffs in one view.',
		'color'       => 'blue',
		'slot'        => 'c1',
	),
	array(
		'title_field' => 'journeys_callout_2_title',
		'body_field'  => 'journeys_callout_2_body',
		'title'       => 'Per-node analytics',
		'body'        => 'Track reach, delivery, and performance at each step.',
		'color'       => 'green',
		'slot'        => 'c2',
	),
	array(
		'title_field' => 'journeys_callout_3_title',
		'body_field'  => 'journeys_callout_3_body',
		'title'       => 'AI flow nodes',
		'body'        => 'Classify, respond, and branch using AI actions.',
		'color'       => 'purple',
		'slot'        => 'c3',
	),
);
?>
<section class="journeys" id="journeys">
	<div class="journeys__frame">
		<div class="journeys__header">
			<div class="journeys__text">
				<p class="journeys__eyebrow" data-animate="fade">
					<span class="journeys__section-dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="journeys__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="journeys__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
			<div class="journeys__visual" data-animate="fade">
				<?php foreach ( $default_nodes as $node ) : ?>
					<?php
					$node_label = get_field( $node['field'] );
					if ( ! $node_label ) {
						$node_label = $node['label'];
					}
					?>
					<div class="journeys-node journeys-node--<?php echo esc_attr( $node['color'] ); ?> journeys-node--<?php echo esc_attr( $node['slot'] ); ?>">
						<span class="journeys-node__icon"><img src="<?php $journeys_src( $node['icon'] ); ?>" alt="" width="24" height="24"></span>
						<span class="journeys-node__label"><?php echo esc_html( $node_label ); ?></span>
					</div>
				<?php endforeach; ?>

				<span class="journeys__link journeys__link--blue-green" aria-hidden="true"></span>
				<span class="journeys__link journeys__link--green-slate" aria-hidden="true"></span>
				<span class="journeys__link journeys__link--slate-amber" aria-hidden="true"></span>

				<svg class="journeys__fork" width="230" height="115" viewBox="-2 0 233 115" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
					<path d="M114.5 0L113.4 0L113.4 39L114.5 39L115.6 39L115.6 0L114.5 0ZM114.5 39L113.4 39C113.4 45.5238 111.928 50.2113 109.178 53.2637C106.448 56.2944 102.287 57.9 96.4816 57.9L96.4816 59L96.4816 60.1C102.689 60.1 107.537 58.3723 110.812 54.7363C114.068 51.1221 115.6 45.8095 115.6 39L114.5 39ZM96.4816 59L96.4816 57.9L18.018 57.9L18.018 59L18.018 60.1L96.4816 60.1L96.4816 59ZM18.018 59L18.018 57.9C11.8111 57.9 6.96296 59.6277 3.68725 63.2637C0.431196 66.878 -1.1 72.1905 -1.1 79L0 79L1.1 79C1.1 72.4762 2.57181 67.7887 5.32176 64.7363C8.05206 61.7056 12.2129 60.1 18.018 60.1L18.018 59ZM0 79L-1.1 79L-1.1 115L0 115L1.1 115L1.1 79L0 79Z" fill="#16A34A"/>
					<g transform="translate(114.5,0)">
						<path d="M0 0L-1.1 0L-1.1 39L0 39L1.1 39L1.1 0L0 0ZM0 39L-1.1 39C-1.1 45.8089 0.427112 51.121 3.6749 54.7352C6.94279 58.3718 11.7798 60.1 17.9724 60.1L17.9724 59L17.9724 57.9C12.1833 57.9 8.03417 56.2949 5.31127 53.2648C2.56828 50.2123 1.1 45.5244 1.1 39L0 39ZM17.9724 59L17.9724 60.1L95.5276 60.1L95.5276 59L95.5276 57.9L17.9724 57.9L17.9724 59ZM95.5276 59L95.5276 60.1C101.317 60.1 105.466 61.7051 108.189 64.7352C110.932 67.7877 112.4 72.4756 112.4 79L113.5 79L114.6 79C114.6 72.1911 113.073 66.879 109.825 63.2648C106.557 59.6282 101.72 57.9 95.5276 57.9L95.5276 59ZM113.5 79L112.4 79L112.4 115L113.5 115L114.6 115L114.6 79L113.5 79Z" fill="#A855F7"/>
					</g>
				</svg>
				<span class="journeys__pill journeys__pill--yes">Yes</span>
				<span class="journeys__pill journeys__pill--no">No</span>

				<svg class="journeys__leader journeys__leader--blue" width="72.5" height="57" viewBox="0 -0.7 72.5 57" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 56.1989L0 56.8989L14.8245 56.8989L14.8245 56.1989L14.8245 55.4989L0 55.4989L0 56.1989ZM14.8245 56.1989L14.8245 56.8989C22.1547 56.8989 27.7726 54.7979 31.5424 50.4848C35.2964 46.1898 37.1123 39.8194 37.1123 31.4999L36.4123 31.4999L35.7122 31.4999C35.7122 39.6464 33.9301 45.6256 30.4883 49.5635C27.0621 53.4834 21.8862 55.4989 14.8245 55.4989L14.8245 56.1989ZM36.4123 31.4999L37.1123 31.4999L37.1123 24.699L36.4123 24.699L35.7122 24.699L35.7122 31.4999L36.4123 31.4999ZM36.4123 24.699L37.1123 24.699C37.1123 16.5525 38.8944 10.5734 42.3362 6.63542C45.7624 2.7155 50.9383 0.7 58 0.7L58 0L58 -0.7C50.6698 -0.7 45.0519 1.40101 41.2821 5.71409C37.5281 10.0092 35.7122 16.3795 35.7122 24.699L36.4123 24.699ZM58 0L58 0.7L72 0.7L72 0L72 -0.7L58 -0.7L58 0Z" fill="#2563EB"/>
				</svg>
				<span class="journeys__leader journeys__leader--green" aria-hidden="true"></span>
				<svg class="journeys__leader journeys__leader--purple" width="67" height="107" viewBox="-0.2 -0.2 67.4 107.4" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 106L0 106.7L14.8245 106.7L14.8245 106L14.8245 105.3L0 105.3L0 106ZM14.8245 106L14.8245 106.7C22.1547 106.7 27.7726 104.599 31.5424 100.286C35.2964 95.9908 37.1123 89.6205 37.1123 81.301L36.4123 81.301L35.7122 81.301C35.7122 89.4475 33.9301 95.4266 30.4883 99.3646C27.0621 103.284 21.8862 105.3 14.8245 105.3L14.8245 106ZM36.4123 81.301L37.1123 81.301L37.1123 24.699L36.4123 24.699L35.7122 24.699L35.7122 81.301L36.4123 81.301ZM36.4123 24.699L37.1123 24.699C37.1123 16.5525 38.8944 10.5734 42.3362 6.63542C45.7624 2.7155 50.9383 0.7 58 0.7L58 0L58 -0.7C50.6698 -0.7 45.0519 1.40101 41.2821 5.71409C37.5281 10.0092 35.7122 16.3795 35.7122 24.699L36.4123 24.699Z M58 0L58 0.7L67 0.7L67 0L67 -0.7L58 -0.7L58 0Z" fill="#9333EA"/>
				</svg>

				<?php foreach ( $default_callouts as $callout ) : ?>
					<?php
					$callout_title = get_field( $callout['title_field'] );
					$callout_body  = get_field( $callout['body_field'] );
					if ( ! $callout_title ) {
						$callout_title = $callout['title'];
					}
					if ( ! $callout_body ) {
						$callout_body = $callout['body'];
					}
					?>
					<div class="journeys-callout journeys-callout--<?php echo esc_attr( $callout['color'] ); ?> journeys-callout--<?php echo esc_attr( $callout['slot'] ); ?>">
						<span class="journeys-callout__dot" aria-hidden="true"></span>
						<h3 class="journeys-callout__title"><?php echo esc_html( $callout_title ); ?></h3>
						<p class="journeys-callout__desc"><?php echo esc_html( $callout_body ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!--
		Mobile-only layout (<768px) — Figma 620:90, a dedicated single-column
		adaptation with inline callouts and a branching Yes/No fork. Reuses the
		same $eyebrow/$headline/$body/$default_nodes/$default_callouts data.
		-->
		<div class="journeys-mobile">
			<div class="journeys-m__header">
				<p class="journeys-m__eyebrow" data-animate="fade">
					<span class="journeys-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="journeys-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="journeys-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="journeys-m__tree">
				<?php
				$node_label = static function ( $node ) {
					$label = get_field( $node['field'] );
					return $label ? $label : $node['label'];
				};
				$callout_copy = static function ( $callout ) {
					$title = get_field( $callout['title_field'] );
					$body  = get_field( $callout['body_field'] );
					return array(
						'title' => $title ? $title : $callout['title'],
						'body'  => $body ? $body : $callout['body'],
					);
				};
				$c1 = $callout_copy( $default_callouts[0] );
				$c2 = $callout_copy( $default_callouts[1] );
				$c3 = $callout_copy( $default_callouts[2] );
				?>
				<div class="journeys-m__rail journeys-m__rail--blue" data-animate="fade">
					<div class="journeys-m__rail-line">
						<svg viewBox="0 0 14 151.5" preserveAspectRatio="none" fill="none" aria-hidden="true">
							<path d="M14 1H7C3.68629 1 1 3.68629 1 7V144.5C1 147.814 3.68629 150.5 7 150.5H14" stroke="url(#jg1)" stroke-width="2"/>
							<defs><linearGradient id="jg1" x1="7.5" y1="1" x2="7.5" y2="150.5" gradientUnits="userSpaceOnUse"><stop stop-color="#2563EB"/><stop offset="1" stop-color="#179D49"/></linearGradient></defs>
						</svg>
					</div>
					<span class="journeys-m__rail-dot journeys-m__rail-dot--blue" aria-hidden="true"></span>
					<div class="journeys-m-node journeys-m-node--blue">
						<span class="journeys-m-node__icon"><img src="<?php $journeys_src( $default_nodes[0]['icon'] ); ?>" alt="" width="22" height="22"></span>
						<span class="journeys-m-node__label"><?php echo esc_html( $node_label( $default_nodes[0] ) ); ?></span>
					</div>
					<div class="journeys-m-callout">
						<p class="journeys-m-callout__title"><?php echo esc_html( $c1['title'] ); ?></p>
						<p class="journeys-m-callout__desc"><?php echo esc_html( $c1['body'] ); ?></p>
					</div>
				</div>

				<div class="journeys-m__rail journeys-m__rail--green" data-animate="fade">
					<div class="journeys-m__rail-line">
						<svg viewBox="0 0 14 176" preserveAspectRatio="none" fill="none" aria-hidden="true">
							<path d="M14 1H7C3.68629 1 1 3.68629 1 7V169C1 172.314 3.68629 175 7 175H14" stroke="url(#jg2)" stroke-width="2"/>
							<defs><linearGradient id="jg2" x1="7.5" y1="1" x2="7.5" y2="175" gradientUnits="userSpaceOnUse"><stop stop-color="#179D49"/><stop offset="1" stop-color="#94A3B8"/></linearGradient></defs>
						</svg>
					</div>
					<span class="journeys-m__rail-dot journeys-m__rail-dot--green" aria-hidden="true"></span>
					<div class="journeys-m-node journeys-m-node--green">
						<span class="journeys-m-node__icon"><img src="<?php $journeys_src( $default_nodes[1]['icon'] ); ?>" alt="" width="22" height="22"></span>
						<span class="journeys-m-node__label"><?php echo esc_html( $node_label( $default_nodes[1] ) ); ?></span>
					</div>
					<div class="journeys-m-callout">
						<p class="journeys-m-callout__title"><?php echo esc_html( $c2['title'] ); ?></p>
						<p class="journeys-m-callout__desc"><?php echo esc_html( $c2['body'] ); ?></p>
					</div>
				</div>

				<div class="journeys-m__connector journeys-m__connector--wait" data-animate="fade">
					<span class="journeys-m__rail-dot journeys-m__rail-dot--gray" aria-hidden="true"></span>
					<div class="journeys-m-node journeys-m-node--gray">
						<span class="journeys-m-node__icon"><img src="<?php $journeys_src( $default_nodes[2]['icon'] ); ?>" alt="" width="22" height="22"></span>
						<span class="journeys-m-node__label"><?php echo esc_html( $node_label( $default_nodes[2] ) ); ?></span>
					</div>
				</div>

				<div class="journeys-m__connector journeys-m__connector--amber" data-animate="fade">
					<svg class="journeys-m__connector-line" viewBox="0 0 2 26" preserveAspectRatio="none" fill="none" aria-hidden="true">
						<path d="M1 0V26" stroke="url(#jg3)" stroke-width="2"/>
						<defs><linearGradient id="jg3" x1="1.5" y1="0" x2="1.5" y2="26" gradientUnits="userSpaceOnUse"><stop stop-color="#94A3B8"/><stop offset="1" stop-color="#EA580C"/></linearGradient></defs>
					</svg>
					<div class="journeys-m-node journeys-m-node--amber">
						<span class="journeys-m-node__icon"><img src="<?php $journeys_src( $default_nodes[3]['icon'] ); ?>" alt="" width="22" height="22"></span>
						<span class="journeys-m-node__label"><?php echo esc_html( $node_label( $default_nodes[3] ) ); ?></span>
					</div>
				</div>

				<div class="journeys-m__fork" data-animate="fade">
					<svg class="journeys-m__fork-curve journeys-m__fork-curve--yes" viewBox="0 0 91 81" preserveAspectRatio="none" fill="none" aria-hidden="true">
						<path d="M90 0L90 22C90 35.3333 84.4153 42 73.246 42H17.754C6.58465 42 1 48.6667 1 62V81" stroke="#16A34A" stroke-width="2"/>
					</svg>
					<svg class="journeys-m__fork-curve journeys-m__fork-curve--no" viewBox="0 0 91 81" preserveAspectRatio="none" fill="none" aria-hidden="true">
						<path d="M1 0V22C1 35.3333 6.58465 42 17.754 42H73.246C84.4153 42 90 48.6667 90 62V81" stroke="#A855F7" stroke-width="2"/>
					</svg>
					<div class="journeys-m__pills">
						<span class="journeys-m__pill journeys-m__pill--yes">Yes</span>
						<span class="journeys-m__pill journeys-m__pill--no">No</span>
					</div>
				</div>

				<div class="journeys-m__branches">
					<div class="journeys-m__branch-col">
						<div class="journeys-m-node journeys-m-node--green journeys-m-node--sm">
							<span class="journeys-m-node__icon"><img src="<?php $journeys_src( $default_nodes[4]['icon'] ); ?>" alt="" width="22" height="22"></span>
							<span class="journeys-m-node__label journeys-m-node__label--stack">SMS<br>10% off</span>
						</div>
					</div>
					<div class="journeys-m__branch-col">
						<div class="journeys-m-node journeys-m-node--purple journeys-m-node--sm" data-animate="fade">
							<span class="journeys-m-node__icon"><img src="<?php $journeys_src( $default_nodes[5]['icon'] ); ?>" alt="" width="22" height="22"></span>
							<span class="journeys-m-node__label journeys-m-node__label--stack">AI agent<br>Answer</span>
						</div>
						<div class="journeys-m-callout journeys-m-callout--center">
							<p class="journeys-m-callout__title"><?php echo esc_html( $c3['title'] ); ?></p>
							<p class="journeys-m-callout__desc"><?php echo esc_html( $c3['body'] ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
