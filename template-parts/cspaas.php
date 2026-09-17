<?php
/**
 * Template part: CSPaaS — "Run Orbit as your own communications platform".
 * Figma: 607:12347 ("CSPaaS — White-label & reseller"), 1440 × 1063.
 * Dark section: header, a 3-tenant cascade (Acme/Northwind/Vega sub-account
 * cards dropping dashed lines into a shared infrastructure bar), and a
 * 4-column feature grid.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'cspaas_eyebrow' );
$headline = get_field( 'cspaas_headline' );
$body     = get_field( 'cspaas_body' );

if ( ! $eyebrow ) {
	$eyebrow = 'White-label & reseller';
}
if ( ! $headline ) {
	$headline = 'Run Orbit as your own communications platform';
}
if ( ! $body ) {
	$body = 'CSPaaS lets you operate a full communications platform under your own brand without building carrier infrastructure — you become the provider your customers see. Create an isolated sub-account for each customer, rebrand the dashboard on your own domain, set reseller margins and spend caps, and allocate prepaid credit from your parent balance.';
}

$columns_field = array_values(
	array_filter(
		(array) get_field( 'cspaas_columns' ),
		function ( $column ) {
			return ! empty( $column['title'] );
		}
	)
);

$columns = array(
	array(
		'title' => 'Multi-tenant sub-accounts',
		'body'  => 'Create an isolated sub-account per customer with its own contacts, numbers, and configuration, and provision, suspend, or close it from one parent account.',
	),
	array(
		'title' => 'Per-tenant branding & custom domains',
		'body'  => "Set each sub-account's logo and colors and serve the dashboard on your customer's own domain, so they see your brand — not Orbit's.",
	),
	array(
		'title' => 'Reseller pricing & margins',
		'body'  => 'Set a markup margin and a monthly spend cap per sub-account. Your customers are billed at your rates while you settle the underlying usage with Orbit.',
	),
	array(
		'title' => 'Prepaid credit allocation',
		'body'  => 'Seed a sub-account with an opening credit balance transferred from your parent account so a new customer can start sending immediately.',
	),
);

foreach ( $columns as $index => &$column ) {
	if ( isset( $columns_field[ $index ]['title'] ) && $columns_field[ $index ]['title'] ) {
		$column['title'] = $columns_field[ $index ]['title'];
	}
	if ( isset( $columns_field[ $index ]['body'] ) && $columns_field[ $index ]['body'] ) {
		$column['body'] = $columns_field[ $index ]['body'];
	}
}
unset( $column );

// Fixed structural data — the 3 tenant cards are a design showcase (exact
// Figma copy/position/color), not ACF-editable content.
$tenants = array(
	array(
		'slot'    => 'acme',
		'left'    => 64,
		'top'     => 22,
		'height'  => 209,
		'url'     => 'app.acme.io',
		'name'    => 'Acme Comms',
		'color'   => '#34d399',
		'border'  => 'rgba(52, 211, 153, 0.38)',
		'margin'  => '+18%',
		'credit'  => '$2,400',
		'logo'    => '<svg viewBox="0 0 21.1464 21.1469" fill="none" aria-hidden="true"><path d="M0 17.4463C0 19.4897 1.65674 21.1463 3.70041 21.1463L7.40126 21.1469C6.98536 21.1469 6.60546 20.9102 6.42249 20.5368L5.81538 19.2969C5.26078 18.1648 4.10988 17.4471 2.84907 17.4469L0 17.4463ZM3.31935e-08 11.635C3.31935e-08 13.6766 1.65675 15.3317 3.70043 15.3317L10.0446 15.3277C9.62866 15.3277 9.24877 15.0913 9.06575 14.7182L8.45868 13.4794C7.90407 12.3482 6.75317 11.6311 5.49237 11.631L3.31935e-08 11.635ZM9.20769 0.000498496C10.4687 0.000498496 11.6195 0.717537 12.1742 1.84858L12.7818 3.08715C12.9627 3.45564 13.3352 3.69049 13.7452 3.69614L3.70063 3.70113C1.65683 3.70113 3.31935e-08 2.0463 3.31935e-08 0.00497426L9.20769 0.000498496ZM7.09305 5.81577C8.35401 5.81577 9.50485 6.53279 10.0595 7.66376L10.6672 8.90231C10.848 9.27073 11.2206 9.50561 11.6305 9.51122L3.70063 9.5164C1.65683 9.5164 3.31935e-08 7.86164 3.31935e-08 5.82042L7.09305 5.81577Z" fill="#00DF98"/><path d="M21.1464 0C21.1464 2.04341 19.4897 3.69992 17.446 3.69992L13.7452 3.70057C14.1611 3.70057 14.541 3.4639 14.7239 3.09046L15.3311 1.85062C15.8857 0.718466 17.0366 0.000740469 18.2974 0.000657443L21.1464 0ZM21.1464 5.81929C21.1464 7.86087 19.4897 9.5159 17.446 9.5159L11.6305 9.51194C12.0465 9.51194 12.4263 9.27552 12.6094 8.90239L13.2164 7.66363C13.771 6.53251 14.9219 5.81543 16.1827 5.81533L21.1464 5.81929ZM11.9387 17.4458C10.6778 17.4458 9.52694 18.1628 8.97227 19.2939L8.36463 20.5325C8.18383 20.9009 7.81123 21.1358 7.40125 21.1415L17.4458 21.1464C19.4896 21.1464 21.1464 19.4916 21.1464 17.4503L11.9387 17.4458ZM14.5821 11.6305C13.3211 11.6305 12.1702 12.3476 11.6156 13.4785L11.0079 14.7171C10.8271 15.0855 10.4545 15.3204 10.0446 15.326L17.4458 15.3312C19.4896 15.3312 21.1464 13.6764 21.1464 11.6352L14.5821 11.6305Z" fill="#06835B"/></svg>',
	),
	array(
		'slot'    => 'northwind',
		'left'    => 431,
		'top'     => 78,
		'height'  => 211,
		'url'     => 'msg.northwind.app',
		'name'    => 'Northwind',
		'color'   => '#f472b6',
		'border'  => 'rgba(244, 114, 182, 0.38)',
		'margin'  => '+22%',
		'credit'  => '$6,100',
		'logo'    => '<svg viewBox="0 0 22.712 22.5253" fill="#F472B6" aria-hidden="true"><path d="M12.5802 18.4688C12.6022 16.2214 12.0325 14.3938 11.3077 14.3867C10.5829 14.3797 9.97749 16.1958 9.95557 18.4432C9.93357 20.6906 10.5033 22.5182 11.2281 22.5253C11.9529 22.5324 12.5583 20.7163 12.5802 18.4688Z"/><path d="M8.37615 17.958C9.60978 16.0793 10.1186 14.2337 9.51276 13.8359C8.90684 13.4381 7.41565 14.6385 6.18208 16.5172C4.94844 18.3959 4.43958 20.2414 5.04547 20.6393C5.65136 21.0372 7.14252 19.8367 8.37615 17.958Z"/><path d="M5.11082 15.2636C7.16437 14.3502 8.59025 13.0729 8.29563 12.4106C8.00107 11.7483 6.09758 11.952 4.04405 12.8654C1.99054 13.7788 0.56464 15.0561 0.859223 15.7184C1.1538 16.3807 3.05732 16.1771 5.11082 15.2636Z"/><path d="M8.04924 10.5528C8.15951 9.83639 6.44814 8.97849 4.22683 8.63658C2.00545 8.29467 0.115306 8.59829 0.00504267 9.31467C-0.105221 10.0311 1.60615 10.8889 3.8275 11.2308C6.04881 11.5728 7.93899 11.2692 8.04924 10.5528Z"/><path d="M8.84686 8.84566C9.32687 8.30257 8.35079 6.65572 6.66672 5.16738C4.98268 3.679 3.22836 2.91273 2.74836 3.45585C2.26835 3.99897 3.24443 5.64582 4.9285 7.13416C6.61258 8.62254 8.36689 9.38877 8.84686 8.84566Z"/><path d="M10.4355 7.84815C11.133 7.6508 11.2023 5.73767 10.5903 3.57509C9.97839 1.4125 8.91689 -0.180634 8.21945 0.0167215C7.52202 0.21408 7.45272 2.12718 8.06464 4.28979C8.67659 6.45233 9.73806 8.0455 10.4355 7.84815Z"/><path d="M14.7482 4.35678C15.4027 2.20669 15.3712 0.292568 14.6778 0.0814983C13.9843 -0.129575 12.8916 1.44232 12.2371 3.59244C11.5827 5.74249 11.6142 7.65664 12.3077 7.8677C13.0011 8.07876 14.0938 6.5069 14.7482 4.35678Z"/><path d="M17.8302 7.26263C19.543 5.80747 20.5512 4.18005 20.0818 3.62766C19.6125 3.07527 17.8436 3.80714 16.1308 5.26224C14.4179 6.71741 13.4099 8.34486 13.8791 8.89725C14.3484 9.44964 16.1174 8.7178 17.8302 7.26263Z"/><path d="M18.8487 11.3736C21.0764 11.0755 22.8043 10.2515 22.7082 9.53309C22.6121 8.81469 20.7283 8.47391 18.5006 8.7719C16.273 9.06992 14.545 9.89391 14.6412 10.6123C14.7373 11.3307 16.621 11.6716 18.8487 11.3736Z"/><path d="M21.7226 15.9228C22.0302 15.2665 20.6298 13.9613 18.5946 13.0075C16.5596 12.0537 14.6604 11.8127 14.3528 12.469C14.0453 13.1253 15.4457 14.4305 17.4808 15.3843C19.5159 16.338 21.415 16.5791 21.7226 15.9228Z"/><path d="M17.4415 20.7636C18.0551 20.3779 17.5828 18.5227 16.3865 16.62C15.1901 14.7173 13.7229 13.4877 13.1093 13.8735C12.4957 14.2593 12.9681 16.1145 14.1644 18.0172C15.3607 19.9199 16.8279 21.1495 17.4415 20.7636Z"/></svg>',
	),
	array(
		'slot'    => 'vega',
		'left'    => 798,
		'top'     => 22,
		'height'  => 210,
		'url'     => 'cloud.vega.dev',
		'name'    => 'Vega Telecom',
		'color'   => '#a78bfa',
		'border'  => 'rgba(167, 139, 250, 0.38)',
		'margin'  => '+15%',
		'credit'  => '$980',
		'logo'    => '<svg viewBox="0 0 23.3724 23.3715" fill="#A78BFA" aria-hidden="true"><path d="M9.56294 19.9049C9.77896 20.9047 10.6634 21.6185 11.6862 21.6185C12.709 21.6185 13.5934 20.9047 13.8095 19.9049L13.9442 19.2812H20.5667C18.4234 21.7847 15.2402 23.3714 11.6862 23.3714C8.1322 23.3714 4.94907 21.7847 2.80573 19.2812H9.42826L9.56294 19.9049Z"/><path d="M8.67048 15.777H14.7018L15.3329 12.8555H23.3142C23.1693 14.3145 22.756 15.6945 22.1244 16.9456H1.2479C0.616334 15.6945 0.203041 14.3145 0.0581665 12.8555H8.03936L8.67048 15.777Z"/><path d="M7.28161 9.34928H16.0908L16.7219 6.42773H23.3724V10.5179H0V6.42773H6.6505L7.28161 9.34928Z"/><path d="M0.431385 0C2.51038 0.124515 4.35832 1.23855 5.45622 2.92155H17.943C19.0628 1.23688 20.9272 0.124387 23.0214 0H23.3724V4.09017H0V0H0.431385Z"/></svg>',
	),
);
?>
<section class="cspaas" id="cspaas">
	<div class="cspaas__frame">
		<div class="cspaas__header">
			<p class="cspaas__eyebrow" data-animate="fade">
				<span class="cspaas__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<div class="cspaas__title-block">
				<h2 class="cspaas__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="cspaas__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
		</div>

		<div class="cspaas-cascade" data-animate="fade">
			<img class="cspaas-cascade__glow" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/cspaas/glow.svg' ); ?>" alt="" style="left: -70px; top: 5px; width: 1381px; height: 344px;">

			<svg class="cspaas-cascade__core" viewBox="0 0 1240 430" fill="none" aria-hidden="true">
				<path d="M290 249.73L290 360.538" stroke="#34D399" stroke-opacity="0.55" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="4 5"/>
				<path d="M620 291.076V360.538" stroke="#F472B6" stroke-opacity="0.55" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="4 5"/>
				<path d="M950 249.73V360.538" stroke="#A78BFA" stroke-opacity="0.55" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="4 5"/>
				<path d="M76 361.039H1164C1172.65 361.039 1179.5 366.823 1179.5 373.77V396.924C1179.5 403.87 1172.65 409.654 1164 409.654H76C67.3465 409.654 60.5001 403.87 60.5 396.924V373.77C60.5002 366.823 67.3466 361.039 76 361.039Z" fill="#111827" fill-opacity="0.2" stroke="url(#cspaasBarGrad)"/>
				<circle cx="290" cy="360.539" r="3.394" fill="#34D399"/>
				<circle cx="620" cy="360.539" r="3.394" fill="#F472B6"/>
				<circle cx="950" cy="360.539" r="3.394" fill="#A78BFA"/>
				<defs>
					<linearGradient id="cspaasBarGrad" x1="101.576" y1="362.22" x2="106.403" y2="461.191" gradientUnits="userSpaceOnUse">
						<stop stop-color="#007BFF"/>
						<stop offset="1" stop-color="#77ABE2" stop-opacity="0"/>
					</linearGradient>
				</defs>
			</svg>

			<p class="cspaas-cascade__bar-label cspaas-cascade__bar-label--left">Orbit · carrier infrastructure, numbers, routing, delivery</p>
			<p class="cspaas-cascade__bar-label cspaas-cascade__bar-label--right">One parent account · invisible to your customers</p>

			<?php foreach ( $tenants as $tenant ) : ?>
				<article
					class="cspaas-card cspaas-card--<?php echo esc_attr( $tenant['slot'] ); ?>"
					style="left: <?php echo esc_attr( $tenant['left'] ); ?>px; top: <?php echo esc_attr( $tenant['top'] ); ?>px; height: <?php echo esc_attr( $tenant['height'] ); ?>px; border-color: <?php echo esc_attr( $tenant['border'] ); ?>;"
				>
					<div class="cspaas-card__chrome">
						<svg class="cspaas-card__dots" viewBox="0 0 27.8243 5.565" fill="#333338" aria-hidden="true"><circle cx="2.78" cy="2.78" r="2.78"/><circle cx="13.91" cy="2.78" r="2.78"/><circle cx="25.04" cy="2.78" r="2.78"/></svg>
						<span class="cspaas-card__url"><?php echo esc_html( $tenant['url'] ); ?></span>
					</div>
					<div class="cspaas-card__body">
						<div class="cspaas-card__brand">
							<span class="cspaas-card__logo" aria-hidden="true"><?php echo $tenant['logo']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — static SVG ?></span>
							<strong class="cspaas-card__name" style="color: <?php echo esc_attr( $tenant['color'] ); ?>;"><?php echo esc_html( $tenant['name'] ); ?></strong>
						</div>
						<div class="cspaas-card__skeleton">
							<span class="cspaas-card__line" style="width: 100%;"></span>
							<span class="cspaas-card__line" style="width: 72%;"></span>
							<span class="cspaas-card__line" style="width: 46%;"></span>
						</div>
						<div class="cspaas-card__stats">
							<div class="cspaas-card__stat">
								<span class="cspaas-card__stat-label">Margin</span>
								<span class="cspaas-card__stat-value" style="color: <?php echo esc_attr( $tenant['color'] ); ?>;"><?php echo esc_html( $tenant['margin'] ); ?></span>
							</div>
							<div class="cspaas-card__stat">
								<span class="cspaas-card__stat-label">Prepaid credit</span>
								<span class="cspaas-card__stat-value">&#36;<?php echo esc_html( ltrim( $tenant['credit'], '$' ) ); ?></span>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="cspaas-columns">
			<?php foreach ( $columns as $index => $column ) : ?>
				<div class="cspaas-column" data-animate="fade">
					<p class="cspaas-column__num"><?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?></p>
					<span class="cspaas-column__tick" aria-hidden="true"></span>
					<h3 class="cspaas-column__title"><?php echo esc_html( $column['title'] ); ?></h3>
					<p class="cspaas-column__body"><?php echo esc_html( $column['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!--
	Mobile-only layout (<900px) — Figma 704:228 ("CSPaaS — White-label &
	reseller mobile"), a dedicated single-column adaptation: header, 3
	sub-account cards stacked vertically (no overlap/stagger), a standalone
	infrastructure bar (no connector lines), and 4 numbered features with no
	top divider. Reuses $tenants/$columns — the same PHP data as desktop.
	-->
	<div class="cspaas-mobile">
		<div class="cspaas-m__header">
			<p class="cspaas-m__eyebrow" data-animate="fade">
				<span class="cspaas-m__dot orbit-pulse-dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
			<h2 class="cspaas-m__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
			<p class="cspaas-m__body" data-animate="fade"><?php echo esc_html( $body ); ?></p>
		</div>

		<div class="cspaas-m__cascade">
			<?php foreach ( $tenants as $tenant ) : ?>
				<article class="cspaas-m-card" style="border-color: <?php echo esc_attr( $tenant['border'] ); ?>;" data-animate="fade">
					<div class="cspaas-m-card__chrome">
						<svg class="cspaas-m-card__dots" viewBox="0 0 27.8243 5.565" fill="#333338" aria-hidden="true"><circle cx="2.78" cy="2.78" r="2.78"/><circle cx="13.91" cy="2.78" r="2.78"/><circle cx="25.04" cy="2.78" r="2.78"/></svg>
						<span class="cspaas-m-card__url"><?php echo esc_html( $tenant['url'] ); ?></span>
					</div>
					<div class="cspaas-m-card__body">
						<div class="cspaas-m-card__brand">
							<span class="cspaas-m-card__logo" aria-hidden="true"><?php echo $tenant['logo']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<strong class="cspaas-m-card__name" style="color: <?php echo esc_attr( $tenant['color'] ); ?>;"><?php echo esc_html( $tenant['name'] ); ?></strong>
						</div>
						<div class="cspaas-m-card__skeleton">
							<span class="cspaas-m-card__line" style="width: 100%;"></span>
							<span class="cspaas-m-card__line" style="width: 63%;"></span>
							<span class="cspaas-m-card__line" style="width: 40%;"></span>
						</div>
						<div class="cspaas-m-card__stats">
							<div class="cspaas-m-card__stat">
								<span class="cspaas-m-card__stat-label">MARGIN</span>
								<span class="cspaas-m-card__stat-value" style="color: <?php echo esc_attr( $tenant['color'] ); ?>;"><?php echo esc_html( $tenant['margin'] ); ?></span>
							</div>
							<div class="cspaas-m-card__stat">
								<span class="cspaas-m-card__stat-label">PREPAID CREDIT</span>
								<span class="cspaas-m-card__stat-value">&#36;<?php echo esc_html( ltrim( $tenant['credit'], '$' ) ); ?></span>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>

			<div class="cspaas-m__infra" data-animate="fade">
				<p class="cspaas-m__infra-title">Orbit · carrier infrastructure, numbers, routing, delivery</p>
				<p class="cspaas-m__infra-sub">One parent account · invisible to your customers</p>
			</div>
		</div>

		<div class="cspaas-m__features">
			<?php foreach ( $columns as $index => $column ) : ?>
				<div class="cspaas-m-feature" data-animate="fade">
					<div class="cspaas-m-feature__num-row">
						<p class="cspaas-m-feature__num"><?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?></p>
						<span class="cspaas-m-feature__tick" aria-hidden="true"></span>
					</div>
					<h3 class="cspaas-m-feature__title"><?php echo esc_html( $column['title'] ); ?></h3>
					<p class="cspaas-m-feature__body"><?php echo esc_html( $column['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
