<?php
/**
 * Template part: Customer data platform.
 * Figma: 607:11020, 1440 × 1123 at (0, 8464).
 * Diagram is HTML + Figma SVG/PNG assets. Glow 607:11039. Motion empty.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'cdp_eyebrow' );
$headline = get_field( 'cdp_headline' );
$body     = get_field( 'cdp_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'Customer data platform';
}
if ( ! $headline ) {
	$headline = 'A customer data platform, built into your communications';
}
if ( ! $body ) {
	$body = 'Orbit resolves every call, message, and event into one customer profile, computes the traits and segments your team cares about, and syncs them to the tools you already run — no separate CDP to buy or bolt on.';
}

$cdp_src = static function ( $file ) {
	echo esc_url( get_template_directory_uri() . '/assets/img/cdp/' . $file );
};

$stages = array(
	array(
		'n'     => '1',
		'ring'  => 'stage-1.svg',
		'title' => 'Resolve identity',
		'body'  => 'Match signals from every channel to the same person.',
	),
	array(
		'n'     => '2',
		'ring'  => 'stage-2.svg',
		'title' => 'Golden profile',
		'body'  => 'One unified customer record, ready for action.',
	),
	array(
		'n'     => '3',
		'ring'  => 'stage-3.svg',
		'title' => 'Activate everywhere',
		'body'  => 'Send segments and traits to the tools you already use.',
	),
);

$signals = array(
	array( 'Email', 'icon-email.svg' ),
	array( 'Phone', 'icon-phone.svg' ),
	array( 'Name', 'icon-name.svg' ),
);

$fields = array(
	array( 'Email', 'j.doe@mail.com', 'field-email.svg' ),
	array( 'Phone', '+1 415 555 0122', 'field-phone.svg' ),
	array( 'Name', 'Jane Doe', 'field-name.svg' ),
	array( 'Device', 'd_9f3a · iOS', 'field-device.svg' ),
);

$dests = array(
	array(
		'label' => 'Meta / TikTok',
		'mod'   => 'meta',
		'logos' => array(
			array( 'logo-meta.png', 'cdp-dest__logo--meta' ),
			array( 'logo-tiktok.png', 'cdp-dest__logo--tiktok' ),
		),
	),
	array(
		'label' => 'HubSpot / Salesforce',
		'mod'   => 'crm',
		'logos' => array(
			array( 'logo-hubspot.png', 'cdp-dest__logo--hubspot' ),
			array( 'logo-salesforce.png', 'cdp-dest__logo--salesforce' ),
		),
	),
	array(
		'label' => 'Snowflake / BigQuery',
		'mod'   => 'data',
		'logos' => array(
			array( 'logo-snowflake.png', 'cdp-dest__logo--snowflake' ),
			array( 'logo-bigquery.png', 'cdp-dest__logo--bigquery' ),
		),
	),
);

$features = array(
	array(
		'n'     => '01',
		'title' => 'Identity resolution & golden records',
		'body'  => 'Deterministic and probabilistic matching stitch scattered emails, phone numbers, and device IDs into one identity.',
	),
	array(
		'n'     => '02',
		'title' => 'Computed traits & segments',
		'body'  => 'Build traits with a no-code rule builder or SQL, then group customers into segments that recompute as new events land.',
	),
	array(
		'n'     => '03',
		'title' => 'Audience activation',
		'body'  => 'Send segments to Meta, TikTok, and your ad and messaging channels. Consent is checked on every profile before it leaves.',
	),
	array(
		'n'     => '04',
		'title' => 'Reverse-ETL to your CRM & warehouse',
		'body'  => 'Sync enriched profiles and traits into HubSpot, Salesforce, Snowflake, and BigQuery — on a schedule or in real time.',
	),
);

$wires = array(
	array( 'wire-40.svg', 'cdp-wire--40' ),
	array( 'wire-41.svg', 'cdp-wire--41' ),
	array( 'wire-42.svg', 'cdp-wire--42' ),
	array( 'wire-dot.svg', 'cdp-wire--43' ),
	array( 'wire-dot.svg', 'cdp-wire--44' ),
	array( 'wire-dot.svg', 'cdp-wire--45' ),
	array( 'wire-46.svg', 'cdp-wire--46' ),
	array( 'wire-47.svg', 'cdp-wire--47' ),
	array( 'wire-48.svg', 'cdp-wire--48' ),
	array( 'wire-49.svg', 'cdp-wire--49' ),
	array( 'wire-50.svg', 'cdp-wire--50' ),
	array( 'wire-51.svg', 'cdp-wire--51' ),
	array( 'wire-52.svg', 'cdp-wire--52' ),
	array( 'wire-dot.svg', 'cdp-wire--53' ),
	array( 'wire-54.svg', 'cdp-wire--54' ),
	array( 'wire-55.svg', 'cdp-wire--55' ),
	array( 'wire-56.svg', 'cdp-wire--56' ),
);
?>
<section class="cdp" id="cdp">
	<div class="cdp__frame">
		<div class="cdp__stage">
			<p class="cdp__eyebrow" data-animate="fade">
				<span class="cdp__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<h2 class="cdp__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
			<p class="cdp__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>

			<?php foreach ( $stages as $i => $stage ) : ?>
				<div class="cdp-stage cdp-stage--<?php echo esc_attr( (string) ( $i + 1 ) ); ?>" data-animate="fade">
					<span class="cdp-stage__ring" aria-hidden="true">
						<img src="<?php $cdp_src( $stage['ring'] ); ?>" alt="" width="74" height="74">
					</span>
					<span class="cdp-stage__n"><?php echo esc_html( $stage['n'] ); ?></span>
					<p class="cdp-stage__title"><?php echo esc_html( $stage['title'] ); ?></p>
					<p class="cdp-stage__body"><?php echo esc_html( $stage['body'] ); ?></p>
				</div>
			<?php endforeach; ?>

			<div class="cdp-flow" data-animate="group">
				<div class="cdp-flow__glow" aria-hidden="true">
					<img class="cdp-flow__glow-img" src="<?php $cdp_src( 'glow-centre.svg' ); ?>" alt="" width="1124" height="936">
				</div>
				<div class="cdp-flow__halo" aria-hidden="true">
					<img class="cdp-flow__halo-img" src="<?php $cdp_src( 'card-halo.svg' ); ?>" alt="" width="600" height="400">
				</div>
				<div class="cdp-flow__platform" aria-hidden="true">
					<img src="<?php $cdp_src( 'platform.svg' ); ?>" alt="" width="520" height="140">
				</div>
				<?php foreach ( $wires as $wire ) : ?>
					<img class="cdp-wire <?php echo esc_attr( $wire[1] ); ?>" src="<?php $cdp_src( $wire[0] ); ?>" alt="" aria-hidden="true">
				<?php endforeach; ?>

				<?php foreach ( $signals as $i => $signal ) : ?>
					<div class="cdp-chip cdp-chip--in cdp-chip--<?php echo esc_attr( (string) ( $i + 1 ) ); ?>">
						<img class="cdp-chip__icon" src="<?php $cdp_src( $signal[1] ); ?>" alt="" width="22" height="22">
						<span class="cdp-chip__label"><?php echo esc_html( $signal[0] ); ?></span>
					</div>
				<?php endforeach; ?>

				<div class="cdp-node cdp-node--resolve" aria-hidden="true">
					<img src="<?php $cdp_src( 'arrow.svg' ); ?>" alt="" width="22" height="22">
				</div>

				<div class="cdp-profile">
					<div class="cdp-profile__id">
						<div class="cdp-profile__avatar">JD</div>
						<div class="cdp-profile__who">
							<p class="cdp-profile__name">Jane Doe</p>
							<p class="cdp-profile__sub">One golden record</p>
						</div>
					</div>
					<div class="cdp-profile__rule" aria-hidden="true"></div>
					<ul class="cdp-profile__fields">
						<?php foreach ( $fields as $field ) : ?>
							<li class="cdp-profile__field">
								<img src="<?php $cdp_src( $field[2] ); ?>" alt="" width="17" height="17">
								<span class="cdp-profile__k"><?php echo esc_html( $field[0] ); ?></span>
								<span class="cdp-profile__v"><?php echo esc_html( $field[1] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="cdp-node cdp-node--activate" aria-hidden="true">
					<img src="<?php $cdp_src( 'arrow.svg' ); ?>" alt="" width="22" height="22">
				</div>

				<?php foreach ( $dests as $i => $dest ) : ?>
					<div class="cdp-chip cdp-chip--out cdp-chip--<?php echo esc_attr( $dest['mod'] ); ?>">
						<?php foreach ( $dest['logos'] as $logo ) : ?>
							<img class="cdp-dest__logo <?php echo esc_attr( $logo[1] ); ?>" src="<?php $cdp_src( $logo[0] ); ?>" alt="" >
						<?php endforeach; ?>
						<span class="cdp-chip__label"><?php echo esc_html( $dest['label'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="cdp__rule" aria-hidden="true"></div>

			<div class="cdp-feats" data-animate="stagger">
				<?php foreach ( $features as $feat ) : ?>
					<article class="cdp-feat">
						<p class="cdp-feat__n"><?php echo esc_html( $feat['n'] ); ?></p>
						<span class="cdp-feat__dash" aria-hidden="true"></span>
						<h3 class="cdp-feat__title"><?php echo esc_html( $feat['title'] ); ?></h3>
						<p class="cdp-feat__body"><?php echo esc_html( $feat['body'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<!--
		Mobile-only layout (<900px) — Figma 681:442, a dedicated single-column
		adaptation, not a reflow of the desktop diagram. Hidden on desktop.
		-->
		<div class="cdp-mobile">
			<div class="cdp-m__hero">
				<p class="cdp-m__eyebrow" data-animate="fade">
					<span class="cdp-m__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="cdp-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="cdp-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>

			<div class="cdp-m__steps" data-animate="stagger">
				<?php foreach ( $stages as $i => $stage ) : ?>
					<div class="cdp-m-step cdp-m-step--<?php echo esc_attr( (string) ( $i + 1 ) ); ?>">
						<span class="cdp-m-step__badge" aria-hidden="true"><?php echo esc_html( $stage['n'] ); ?></span>
						<div class="cdp-m-step__copy">
							<p class="cdp-m-step__title"><?php echo esc_html( strtoupper( $stage['title'] ) ); ?></p>
							<p class="cdp-m-step__body"><?php echo esc_html( $stage['body'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="cdp-m__pipeline">
				<div class="cdp-m__inputs">
					<p class="cdp-m__label">Scattered Signals</p>
					<div class="cdp-m__signals">
						<?php foreach ( $signals as $signal ) : ?>
							<div class="cdp-m-signal">
								<img class="cdp-m-signal__icon" src="<?php $cdp_src( $signal[1] ); ?>" alt="" width="20" height="20">
								<span class="cdp-m-signal__label"><?php echo esc_html( $signal[0] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<span class="cdp-m__connector" aria-hidden="true"><img src="<?php $cdp_src( 'arrow-circle.svg' ); ?>" alt="" width="64" height="64"></span>

				<div class="cdp-m-profile">
					<div class="cdp-m-profile__id">
						<div class="cdp-m-profile__avatar">JD</div>
						<div class="cdp-m-profile__who">
							<p class="cdp-m-profile__name">Jane Doe</p>
							<p class="cdp-m-profile__sub">One golden record</p>
						</div>
					</div>
					<div class="cdp-m-profile__rule" aria-hidden="true"></div>
					<ul class="cdp-m-profile__fields">
						<?php foreach ( $fields as $field ) : ?>
							<li class="cdp-m-profile__field">
								<img src="<?php $cdp_src( $field[2] ); ?>" alt="" width="16" height="17">
								<span class="cdp-m-profile__k"><?php echo esc_html( $field[0] ); ?></span>
								<span class="cdp-m-profile__v"><?php echo esc_html( $field[1] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<span class="cdp-m__connector" aria-hidden="true"><img src="<?php $cdp_src( 'arrow-circle.svg' ); ?>" alt="" width="64" height="64"></span>

				<div class="cdp-m__dests">
					<p class="cdp-m__label">Audience Activation</p>
					<?php foreach ( $dests as $dest ) : ?>
						<div class="cdp-m-dest cdp-m-dest--<?php echo esc_attr( $dest['mod'] ); ?>">
							<?php foreach ( $dest['logos'] as $logo ) : ?>
								<img class="cdp-m-dest__logo <?php echo esc_attr( $logo[1] ); ?>" src="<?php $cdp_src( $logo[0] ); ?>" alt="">
							<?php endforeach; ?>
							<span class="cdp-m-dest__label"><?php echo esc_html( $dest['label'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="cdp-m__rule" aria-hidden="true"></div>

			<div class="cdp-m__feats" data-animate="stagger">
				<?php foreach ( $features as $feat ) : ?>
					<article class="cdp-m-feat">
						<span class="cdp-m-feat__num-row">
							<span class="cdp-m-feat__n"><?php echo esc_html( $feat['n'] ); ?></span>
							<span class="cdp-m-feat__dash" aria-hidden="true"></span>
						</span>
						<h3 class="cdp-m-feat__title"><?php echo esc_html( $feat['title'] ); ?></h3>
						<p class="cdp-m-feat__body"><?php echo esc_html( $feat['body'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
