<?php
/**
 * The header for our theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<?php wp_body_open(); ?>
<a class="orbit-skip" href="#hero"><?php esc_html_e( 'Skip to content', 'orbit' ); ?></a>
<?php get_template_part( 'template-parts/header' ); ?>
