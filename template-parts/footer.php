<?php
/**
 * Template part: Site footer.
 * On the Orbit landing page the footer lives inside Closing (Figma 1:5947
 * is one continuous block). Elsewhere render the same columns standalone.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_page_template( 'page-templates/template-landing-orbit.php' ) ) {
	return;
}

$settings_id  = ORBIT_THEME_SETTINGS_PAGE_ID;
$site_logo_id = get_field( 'theme_site_logo', $settings_id );
$tagline      = get_field( 'theme_site_tagline', $settings_id );
$columns      = get_field( 'footer_columns', $settings_id );
$rights       = get_field( 'footer_rights_text', $settings_id );
$domain_label = get_field( 'footer_domain_label', $settings_id );

if ( ! $tagline ) {
	$tagline = "Devotel's unified omnichannel CPaaS/CCaaS platform. UCaaS, voice, messaging, and video on a single runtime. Every channel native. Anthropic's Claude on every agent: Opus, Sonnet, and Haiku.";
}
if ( ! $rights ) {
	$rights = '© 2026 Devotel UK LTD · Company No. 15550931 · Registered in England & Wales';
}
if ( ! $domain_label ) {
	$domain_label = 'orbit.devotel.io';
}

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
?>
<footer class="site-footer site-footer--standalone">
	<div class="site-footer__inner">
		<div class="site-footer__main site-footer__main--flow">
			<div class="site-footer__brand">
				<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					if ( $logo_id ) {
						echo wp_get_attachment_image(
							$logo_id,
							'full',
							false,
							array(
								'class'  => 'site-footer__logo-img',
								'alt'    => esc_attr( get_bloginfo( 'name' ) ),
								'width'  => 100,
								'height' => 28,
							)
						);
					} else {
						bloginfo( 'name' );
					}
					?>
				</a>
				<p class="site-footer__tagline"><?php echo esc_html( $tagline ); ?></p>
			</div>
			<?php foreach ( $columns as $column ) : ?>
				<div class="site-footer__col site-footer__col--flow">
					<?php foreach ( (array) $column['groups'] as $group_index => $group ) : ?>
						<?php if ( ! empty( $group['heading'] ) ) : ?>
							<h3 class="site-footer__heading<?php echo $group_index > 0 ? ' site-footer__heading--stacked' : ''; ?>"><?php echo esc_html( $group['heading'] ); ?></h3>
						<?php endif; ?>
						<ul class="site-footer__links">
							<?php
							foreach ( (array) ( $group['links'] ?? array() ) as $row ) {
								if ( empty( $row['link']['title'] ) ) {
									continue;
								}
								$link = $row['link'];
								echo '<li><a class="site-footer__link" href="' . esc_url( orbit_resolve_theme_url( $link['url'] ?? '#' ) ) . '">' . esc_html( $link['title'] ) . '</a></li>';
							}
							?>
						</ul>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="site-footer__legal site-footer__legal--flow">
			<p class="site-footer__rights"><?php echo esc_html( $rights ); ?></p>
			<p class="site-footer__credit"><?php echo esc_html( $domain_label ); ?></p>
		</div>
	</div>
</footer>
