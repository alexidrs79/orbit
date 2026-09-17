<?php
/**
 * 404 — page not found.
 * Matches Orbit landing branding: Geist, blue wash, hero CTAs, site header/footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="orbit-404" id="orbit-404">
	<div class="orbit-404__wash" aria-hidden="true"></div>
	<div class="orbit-404__inner">
		<p class="orbit-404__eyebrow">
			<span class="orbit-404__dot orbit-pulse-dot" aria-hidden="true"></span>
			Error 404
		</p>
		<p class="orbit-404__code" aria-hidden="true">404</p>
		<h1 class="orbit-404__headline">This route isn’t on the network.</h1>
		<p class="orbit-404__body">
			The page you’re looking for doesn’t exist, moved, or never shipped.
			Head home — or talk to us if something should be here.
		</p>
		<div class="orbit-404__ctas">
			<a class="hero__cta hero__cta--ghost" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
			<a class="hero__cta hero__cta--solid" href="<?php echo esc_url( ORBIT_CTA_LOGIN_URL ); ?>">Talk to Sales</a>
		</div>
	</div>
</main>
<?php
get_footer();
