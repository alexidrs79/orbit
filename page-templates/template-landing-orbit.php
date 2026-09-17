<?php
/**
 * Template Name: Orbit Landing
 *
 * Assembles the Orbit marketing landing page from template-parts, in
 * order. No content logic lives here — each part pulls its own ACF
 * fields. Figma: node 1:60 ("Orbit"), 1440 × 15089.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/why-orbit' );
get_template_part( 'template-parts/compliance' );
get_template_part( 'template-parts/channels-grid' );
echo '<div class="orbit-api-hub">';
get_template_part( 'template-parts/channels-api' );
echo '<div class="orbit-api-hub__join" aria-hidden="true"><div class="orbit-api-hub__wash">';
orbit_print_icon( 'ORBIT_HUB_WASH_ID', 'orbit-api-hub__wash-img' );
echo '</div></div>';
get_template_part( 'template-parts/channels-hub' );
echo '</div>';
get_template_part( 'template-parts/voice-transcript' );
get_template_part( 'template-parts/voice-stack' );
get_template_part( 'template-parts/voice-compare' );
get_template_part( 'template-parts/channel-memory' );
get_template_part( 'template-parts/cdp' );
get_template_part( 'template-parts/commerce' );
get_template_part( 'template-parts/voice' );
get_template_part( 'template-parts/verify' );
get_template_part( 'template-parts/journeys' );
get_template_part( 'template-parts/phone-system' );
get_template_part( 'template-parts/cx-orbit' );
get_template_part( 'template-parts/ccaas' );
get_template_part( 'template-parts/naas' );
get_template_part( 'template-parts/cspaas' );
get_template_part( 'template-parts/whyswitch' );
get_template_part( 'template-parts/cpaas' );
get_template_part( 'template-parts/architecture' );
get_template_part( 'template-parts/supervisor' );
get_template_part( 'template-parts/network-cta' );
get_template_part( 'template-parts/developers' );
get_template_part( 'template-parts/pricing' );
get_template_part( 'template-parts/integrations' );
get_template_part( 'template-parts/closing' );

get_footer();
