<?php
/**
 * Template part: Site header.
 * Figma: node 1:81 ("Container"), 1440 × 68.
 *
 * Logo, nav items, Sign in, Get started, and the sticky-header toggle
 * are all ACF fields on the site-wide Theme Settings options page.
 * Mobile hamburger + slide-in panel uses the same nav data
 * (assets/js/mobile-menu.js), matching Snap / Lucibook.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings_id = ORBIT_THEME_SETTINGS_PAGE_ID;

$site_logo_id = get_field( 'theme_site_logo', $settings_id );
$nav_items    = array_filter(
	(array) get_field( 'theme_nav_items', $settings_id ),
	function ( $item ) {
		return ! empty( $item['label'] );
	}
);

/*
 * "Platform" mega-menu — mirrors the real dropdown at orbit.devotel.io
 * (fetched from its live markup). Hardcoded like the footer social
 * icons: fixed external destinations, not editorial content.
 */
$platform_items = array(
	array(
		'title' => 'CPaaS overview',
		'body'  => 'Voice, SMS, WhatsApp, email, and video behind one API',
		'url'   => 'https://orbit.devotel.io/en/features/cpaas',
	),
	array(
		'title' => 'Contact center (CCaaS)',
		'body'  => 'Queues, skills-based routing, and supervisor tools',
		'url'   => 'https://orbit.devotel.io/en/features/ccaas',
	),
	array(
		'title' => 'Cloud phone system (UCaaS)',
		'body'  => 'IVR, SIP trunking, ACD queues, and voicemail',
		'url'   => 'https://orbit.devotel.io/en/features/ucaas',
	),
	array(
		'title' => 'AI voice agents',
		'body'  => 'Real-time voice agents that answer and resolve calls',
		'url'   => 'https://orbit.devotel.io/en/features/aiaas',
	),
	array(
		'title' => 'Connectivity (NaaS)',
		'body'  => 'Phone numbers and eSIM/IoT data plans on demand',
		'url'   => 'https://orbit.devotel.io/en/features/naas',
	),
	array(
		'title' => 'White-label & reseller (CSPaaS)',
		'body'  => 'Run Orbit as your own branded communications platform',
		'url'   => 'https://orbit.devotel.io/en/features/cspaas',
	),
	array(
		'title' => 'Real-time communications',
		'body'  => 'Video rooms, live broadcast, and co-browse',
		'url'   => 'https://orbit.devotel.io/en/features/rtc-paas',
	),
	array(
		'title' => 'Customer experience (CXaaS)',
		'body'  => 'Surveys, quality scoring, and workforce management',
		'url'   => 'https://orbit.devotel.io/en/features/cxaas',
	),
	array(
		'title' => 'Customer data platform',
		'body'  => 'One customer profile across every channel',
		'url'   => 'https://orbit.devotel.io/en/features/cdpaas',
	),
	array(
		'title' => 'Omnichannel messaging',
		'body'  => 'SMS, WhatsApp, RCS, email, and more on one API',
		'url'   => 'https://orbit.devotel.io/en/features/messaging',
	),
	array(
		'title' => 'Explore all features',
		'body'  => 'All ten Orbit pillars on one page',
		'url'   => 'https://orbit.devotel.io/en/features',
	),
	array(
		'title' => 'Contact Center',
		'body'  => 'See how Orbit compares to Five9, Genesys, and others',
		'url'   => 'https://orbit.devotel.io/en/compare/contact-center',
	),
	array(
		'title' => 'Journeys',
		'body'  => 'Visual automation across every channel',
		'url'   => 'https://orbit.devotel.io/en/compare/journeys',
	),
	array(
		'title' => 'White-label',
		'body'  => 'Resell Orbit under your own brand',
		'url'   => 'https://orbit.devotel.io/en/white-label',
	),
);

$signin_label   = get_field( 'theme_signin_label', $settings_id );
$signin_url     = get_field( 'theme_signin_url', $settings_id );
$cta_label      = get_field( 'theme_header_cta_label', $settings_id );
$cta_url        = get_field( 'theme_header_cta_url', $settings_id );
$sticky_enabled = get_field( 'theme_sticky_header_enabled', $settings_id );
$header_class   = 'site-header' . ( $sticky_enabled ? '' : ' site-header--static' );
?>
<?php if ( is_page_template( 'page-templates/template-landing-orbit.php' ) ) : ?>
	<div class="orbit-light" aria-hidden="true"></div>
<?php endif; ?>
<header class="<?php echo esc_attr( $header_class ); ?>">
	<div class="site-header__bar">
		<a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
			$fallback_logo_id = $site_logo_id ? $site_logo_id : get_theme_mod( 'custom_logo' );
			if ( ! $fallback_logo_id ) {
				$fallback_logo_id = orbit_get_attachment_id_by_filename( ORBIT_LOGO_ID );
			}
			if ( $fallback_logo_id ) {
				echo wp_get_attachment_image(
					$fallback_logo_id,
					'full',
					false,
					array(
						'class'         => 'site-header__logo-img',
						'fetchpriority' => 'high',
						'decoding'      => 'sync',
					)
				);
			} else {
				bloginfo( 'name' );
			}
			?>
		</a>

		<nav class="site-header__nav" aria-label="<?php esc_attr_e( 'Primary', 'orbit' ); ?>">
			<details class="site-header__dropdown">
				<summary class="orbit-link site-header__dropdown-trigger">
					Platform
					<svg class="site-header__dropdown-chevron" viewBox="0 0 12 8" fill="none" aria-hidden="true"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</summary>
				<div class="site-header__dropdown-panel">
					<?php foreach ( $platform_items as $item ) : ?>
						<a class="site-header__dropdown-item" href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
							<span class="site-header__dropdown-item-title"><?php echo esc_html( $item['title'] ); ?></span>
							<span class="site-header__dropdown-item-body"><?php echo esc_html( $item['body'] ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</details>
			<?php foreach ( $nav_items as $item ) : ?>
				<a class="orbit-link" href="<?php echo esc_url( orbit_resolve_theme_url( $item['url'] ?? '' ) ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
			<?php endforeach; ?>
		</nav>

		<div class="site-header__actions">
			<?php if ( $signin_label ) : ?>
				<a class="site-header__btn site-header__btn--ghost" href="<?php echo esc_url( orbit_cta_url( $signin_url, 'login' ) ); ?>"><?php echo esc_html( $signin_label ); ?></a>
			<?php endif; ?>
			<?php if ( $cta_label ) : ?>
				<a class="site-header__btn site-header__btn--solid" href="<?php echo esc_url( orbit_cta_url( $cta_url, 'signup' ) ); ?>"><?php echo esc_html( $cta_label ); ?></a>
			<?php endif; ?>
		</div>

		<button
			type="button"
			class="site-header__menu-toggle"
			aria-expanded="false"
			aria-controls="mobile-menu-panel"
			aria-label="Open menu"
		>
			<span class="site-header__menu-icon" aria-hidden="true"></span>
		</button>
	</div>

	<div class="mobile-menu-backdrop" data-mobile-menu-backdrop></div>

	<div class="mobile-menu-panel" id="mobile-menu-panel" aria-hidden="true">
		<div class="mobile-menu-panel__header">
			<span class="mobile-menu-panel__title">Menu</span>
			<button type="button" class="mobile-menu-panel__close" aria-label="Close menu">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<nav class="mobile-menu-panel__nav" aria-label="<?php esc_attr_e( 'Mobile primary', 'orbit' ); ?>">
			<details class="mobile-menu-panel__dropdown">
				<summary class="orbit-link site-header__dropdown-trigger">
					Platform
					<svg class="site-header__dropdown-chevron" viewBox="0 0 12 8" fill="none" aria-hidden="true"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</summary>
				<div class="mobile-menu-panel__dropdown-panel">
					<?php foreach ( $platform_items as $item ) : ?>
						<a class="site-header__dropdown-item" href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
							<span class="site-header__dropdown-item-title"><?php echo esc_html( $item['title'] ); ?></span>
							<span class="site-header__dropdown-item-body"><?php echo esc_html( $item['body'] ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</details>
			<?php foreach ( $nav_items as $item ) : ?>
				<a class="orbit-link" href="<?php echo esc_url( orbit_resolve_theme_url( $item['url'] ?? '' ) ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
			<?php endforeach; ?>
			<?php if ( $signin_label ) : ?>
				<a class="mobile-menu-panel__signin" href="<?php echo esc_url( orbit_cta_url( $signin_url, 'login' ) ); ?>"><?php echo esc_html( $signin_label ); ?></a>
			<?php endif; ?>
		</nav>

		<?php if ( $cta_label ) : ?>
			<div class="mobile-menu-panel__cta">
				<a class="site-header__btn site-header__btn--solid mobile-menu-panel__cta-btn" href="<?php echo esc_url( orbit_cta_url( $cta_url, 'signup' ) ); ?>">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</header>
<script>
document.addEventListener( 'click', function ( e ) {
	document.querySelectorAll( '.site-header__dropdown[open]' ).forEach( function ( el ) {
		if ( ! el.contains( e.target ) ) {
			el.removeAttribute( 'open' );
		}
	} );
} );
document.addEventListener( 'keydown', function ( e ) {
	if ( e.key === 'Escape' ) {
		document.querySelectorAll( '.site-header__dropdown[open]' ).forEach( function ( el ) {
			el.removeAttribute( 'open' );
		} );
	}
} );
</script>
