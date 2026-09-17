<?php
/**
 * Template part: Closing CTA + footer (Figma 1:5947, one continuous block).
 * Glow 1:5948 (−86, −115) 1612×801 — blue masked under Ellipse 433 curve.
 * Copy 48:109 at (417, 387). Footer 1:5957 at (132, 809), legal 1:6014.
 * Motion empty — fade copy only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline   = get_field( 'close_headline' );
$cta1_label = get_field( 'close_cta1_label' );
$cta1_url   = get_field( 'close_cta1_url' );
$cta2_label = get_field( 'close_cta2_label' );
$cta2_url   = get_field( 'close_cta2_url' );

if ( ! $headline ) {
	$headline = "Infrastructure you'll still trust in five years.";
}
if ( ! $cta1_label ) {
	$cta1_label = 'Talk to Sales';
}
if ( ! $cta1_url ) {
	$cta1_url = ORBIT_CTA_LOGIN_URL;
}
if ( ! $cta2_label ) {
	$cta2_label = 'Start Building';
}
if ( ! $cta2_url ) {
	$cta2_url = ORBIT_CTA_LOGIN_URL;
}

$hue_id = orbit_get_attachment_id_by_filename( ORBIT_CLOSE_BLUE_HUE_ID );

$settings_id  = ORBIT_THEME_SETTINGS_PAGE_ID;
$site_logo_id = get_field( 'theme_site_logo', $settings_id );
$tagline      = get_field( 'theme_site_tagline', $settings_id );
$columns      = get_field( 'footer_columns', $settings_id );
$legal_links  = get_field( 'footer_legal_links', $settings_id );
$rights       = get_field( 'footer_rights_text', $settings_id );
$address      = get_field( 'footer_address_text', $settings_id );
$domain_label = get_field( 'footer_domain_label', $settings_id );
$domain_url   = get_field( 'footer_domain_url', $settings_id );

if ( ! $tagline ) {
	$tagline = "Devotel's unified omnichannel CPaaS/CCaaS platform. UCaaS, voice, messaging, and video on a single runtime. Every channel native. Anthropic's Claude on every agent: Opus, Sonnet, and Haiku.";
}
if ( ! $rights ) {
	$rights = '© 2026 Devotel UK LTD · Company No. 15550931 · Registered in England & Wales';
}
if ( ! $address ) {
	$address = 'Suite 7 Innovation House, Molly Millars Close, Wokingham, Berkshire, RG41 2RX';
}
if ( ! $domain_label ) {
	$domain_label = 'orbit.devotel.io';
}
if ( ! $domain_url ) {
	$domain_url = 'https://orbit.devotel.io/en/login';
}

$social_links = array(
	array(
		'label' => 'Devotel Orbit on X',
		'url'   => 'https://x.com/orbitbydevotel',
		'path'  => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z',
	),
	array(
		'label' => 'Devotel Orbit on GitHub',
		'url'   => 'https://github.com/devotel',
		'path'  => 'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z',
		'fill_rule' => 'evenodd',
	),
	array(
		'label' => 'Devotel Orbit on LinkedIn',
		'url'   => 'https://www.linkedin.com/showcase/devotelorbit',
		'path'  => 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z',
	),
);

$logo_id = $site_logo_id ? $site_logo_id : get_theme_mod( 'custom_logo' );
if ( ! $logo_id ) {
	$logo_id = orbit_get_attachment_id_by_filename( ORBIT_CLOSE_FOOTER_LOGO_ID );
}
if ( ! $logo_id ) {
	$logo_id = orbit_get_attachment_id_by_filename( ORBIT_LOGO_ID );
}

$columns = array_values(
	array_filter(
		(array) $columns,
		static function ( $col ) {
			return ! empty( $col['groups'] );
		}
	)
);

$legal_links = array_values(
	array_filter(
		(array) $legal_links,
		static function ( $row ) {
			return ! empty( $row['link']['title'] );
		}
	)
);
?>
<section class="closing" id="closing">
	<div class="closing__frame">
		<div class="closing__glows" aria-hidden="true">
			<div class="closing-wash">
				<?php
				/*
				 * Figma 1:5948: blue under Ellipse 433’s bottom curve.
				 * Masked (not a painted black oval) so Integrations’ glow
				 * meshes through the lid instead of hitting a section plate.
				 */
				?>
				<div class="closing-wash__glow">
					<div class="closing-wash__blue"></div>
					<div class="closing-wash__pane closing-wash__pane--left"></div>
					<div class="closing-wash__pane closing-wash__pane--right"></div>
					<div class="closing-wash__soft"></div>
					<?php if ( $hue_id ) : ?>
						<div class="closing-wash__hue3">
							<?php
							echo wp_get_attachment_image(
								$hue_id,
								'full',
								false,
								array(
									'class'    => 'closing-wash__hue3-img',
									'alt'      => '',
									'loading'  => 'eager',
									'decoding' => 'async',
								)
							);
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="closing__stage">
			<div class="closing__copy" data-animate="fade">
				<h2 class="closing__headline"><?php echo esc_html( $headline ); ?></h2>
				<div class="closing__ctas">
					<a class="hero__cta hero__cta--ghost" href="<?php echo esc_url( orbit_cta_url( $cta1_url, 'sales' ) ); ?>"><?php echo esc_html( $cta1_label ); ?></a>
					<a class="hero__cta hero__cta--solid" href="<?php echo esc_url( orbit_cta_url( $cta2_url, 'signup' ) ); ?>"><?php echo esc_html( $cta2_label ); ?></a>
				</div>
			</div>
		</div>
	</div>

	<!--
	Footer — mirrors the live product footer at orbit.devotel.io: a wide
	brand column (logo, tagline, social icons) plus 4 link columns, each
	stacking 1–3 heading/link groups. Normal document flow (not the
	Figma-pixel absolute stage above), since its height is now variable.
	-->
	<div class="site-footer">
		<div class="site-footer__inner">
			<div class="site-footer__grid">
				<div class="site-footer__brand">
					<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
						if ( $logo_id ) {
							echo wp_get_attachment_image(
								$logo_id,
								'full',
								false,
								array(
									'class'    => 'site-footer__logo-img',
									'alt'      => esc_attr( get_bloginfo( 'name' ) ),
									'loading'  => 'lazy',
									'decoding' => 'async',
									'width'    => 100,
									'height'   => 28,
								)
							);
						} else {
							bloginfo( 'name' );
						}
						?>
					</a>
					<p class="site-footer__tagline"><?php echo esc_html( $tagline ); ?></p>
					<ul class="site-footer__social">
						<?php foreach ( $social_links as $social ) : ?>
							<li>
								<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $social['label'] ); ?>">
									<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path<?php echo ! empty( $social['fill_rule'] ) ? ' fill-rule="evenodd" clip-rule="evenodd"' : ''; ?> d="<?php echo esc_attr( $social['path'] ); ?>"></path></svg>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php foreach ( $columns as $col_index => $column ) : ?>
					<div class="site-footer__col site-footer__col--<?php echo esc_attr( $col_index + 1 ); ?>">
						<?php foreach ( $column['groups'] as $group_index => $group ) : ?>
							<?php
							$group_links = array_filter(
								(array) ( $group['links'] ?? array() ),
								static function ( $row ) {
									return ! empty( $row['link']['title'] );
								}
							);
							if ( empty( $group['heading'] ) && ! $group_links ) {
								continue;
							}
							?>
							<?php if ( ! empty( $group['heading'] ) ) : ?>
								<h3 class="site-footer__heading<?php echo $group_index > 0 ? ' site-footer__heading--stacked' : ''; ?>">
									<?php echo esc_html( $group['heading'] ); ?>
								</h3>
							<?php endif; ?>
							<?php if ( $group_links ) : ?>
								<ul class="site-footer__links">
									<?php foreach ( $group_links as $row ) : ?>
										<?php
										$link = $row['link'];
										$url  = $link['url'] ?? '#';
										?>
										<li>
											<a class="site-footer__link" href="<?php echo esc_url( orbit_resolve_theme_url( $url ) ); ?>"<?php echo ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '" rel="noopener noreferrer"' : ' target="_blank" rel="noopener noreferrer"'; ?>>
												<?php echo esc_html( $link['title'] ); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="site-footer__bottom">
				<?php if ( $legal_links ) : ?>
					<nav class="site-footer__legal-links" aria-label="Legal">
						<?php foreach ( $legal_links as $row ) : ?>
							<?php $link = $row['link']; ?>
							<a href="<?php echo esc_url( orbit_resolve_theme_url( $link['url'] ?? '#' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $link['title'] ); ?></a>
						<?php endforeach; ?>
					</nav>
				<?php endif; ?>
				<div class="site-footer__bottom-row">
					<div class="site-footer__legal-text">
						<span><?php echo esc_html( $rights ); ?></span>
						<span><?php echo esc_html( $address ); ?></span>
					</div>
					<a class="site-footer__domain" href="<?php echo esc_url( $domain_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $domain_label ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
