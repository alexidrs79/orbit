<?php
/**
 * Template part: Traditional vs Orbit architecture.
 * Figma: 1:6199, 1440 × 1021 at (0, 8966). Diagrams are HTML + SVG lines.
 * Icons are Figma leaf paths. Glows 1:6200 / 1:6201. Motion empty.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = get_field( 'arch_eyebrow' );
$headline       = get_field( 'arch_headline' );
$left_label     = get_field( 'arch_left_label' );
$right_label    = get_field( 'arch_right_label' );
$left_caption   = get_field( 'arch_left_caption' );
$right_caption  = get_field( 'arch_right_caption' );

if ( ! $eyebrow ) {
	$eyebrow = 'The structural argument';
}
if ( ! $headline ) {
	$headline = 'One platform beats a stack of vendors.';
}
if ( ! $left_label ) {
	$left_label = 'Traditional way';
}
if ( ! $right_label ) {
	$right_label = 'Orbit';
}
if ( ! $left_caption ) {
	$left_caption = 'Multiple vendors. Multiple contracts. Multiple headaches.';
}
if ( ! $right_caption ) {
	$right_caption = 'One platform. One contract. Total control.';
}

$icon_company = '<svg viewBox="0 0 21.45 21.45" width="21.45" height="21.45" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0752 2.67969C12.2086 2.6817 12.34 2.72259 12.4519 2.80101C12.6309 2.92636 12.7375 3.13148 12.7375 3.35V18.0969C12.7375 18.4642 12.4419 18.7625 12.0759 18.7672H12.0672H4.69375C4.32374 18.7672 4.02344 18.4669 4.02344 18.0969C4.02344 18.0969 4.02344 9.80712 4.02344 6.97036C4.02344 6.12442 4.55231 5.36965 5.3473 5.08008C7.30462 4.36887 11.8379 2.71991 11.8379 2.71991C11.909 2.69443 11.9821 2.68103 12.0551 2.67969H12.0652H12.0752ZM14.0781 8.17491L16.2111 9.08854C16.9504 9.4056 17.4297 10.1329 17.4297 10.9373V18.0969C17.4297 18.4669 17.1294 18.7672 16.7594 18.7672H13.9635C14.0379 18.5574 14.0781 18.3322 14.0781 18.0969V8.17491ZM9.39465 14.075C9.76064 14.0703 10.0563 13.772 10.0563 13.4047C10.0563 13.0347 9.75595 12.7344 9.38594 12.7344H7.375C7.00499 12.7344 6.70469 13.0347 6.70469 13.4047C6.70469 13.7747 7.00499 14.075 7.375 14.075H9.38594H9.39465ZM9.39465 11.3937C9.76064 11.3891 10.0563 11.0908 10.0563 10.7234C10.0563 10.3534 9.75595 10.0531 9.38594 10.0531H7.375C7.00499 10.0531 6.70469 10.3534 6.70469 10.7234C6.70469 11.0934 7.00499 11.3937 7.375 11.3937H9.38594H9.39465ZM9.39465 8.7125C9.76064 8.70781 10.0563 8.40952 10.0563 8.04219C10.0563 7.67217 9.75595 7.37187 9.38594 7.37187H7.375C7.00499 7.37187 6.70469 7.67217 6.70469 8.04219C6.70469 8.4122 7.00499 8.7125 7.375 8.7125H9.38594H9.39465Z" fill="#fff"/></svg>';
$icon_person  = '<svg viewBox="0 0 12.4803 15.6762" width="12.48" height="15.676" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.23632 8.28515C8.51788 8.28515 10.3789 6.42428 10.3789 4.14263C10.3789 1.86098 8.51788 0 6.23633 0C3.95467 0 2.09375 1.86098 2.09375 4.14263C2.09375 6.42429 3.95467 8.28515 6.23632 8.28515Z" fill="#fff"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.6279 9.92687C9.50246 9.15874 7.9509 8.68359 6.24014 8.68359C4.52943 8.68359 2.97791 9.15874 1.85239 9.92687C0.707894 10.708 0 11.793 0 12.9966V14.4311C0 14.7749 0.139452 15.0862 0.364774 15.3115C0.590082 15.5368 0.901384 15.6762 1.24522 15.6762H11.2351C11.579 15.6762 11.8903 15.5368 12.1156 15.3115C12.3471 15.0801 12.4838 14.7565 12.4802 14.4281V12.9966C12.4802 11.793 11.7724 10.708 10.6279 9.92687Z" fill="#fff"/></svg>';
$icon_sms     = '<svg viewBox="0 0 17.109 15.2494" width="17.109" height="15.249" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8.55452 0C6.28573 1.49528e-05 4.10986 0.747237 2.50558 2.0773C0.901297 3.40736 1.53705e-05 5.2113 0 7.09229C0.00206755 8.31578 0.385863 9.51801 1.11409 10.5822C1.84231 11.6463 2.8902 12.5362 4.1559 13.1653C3.8188 13.9165 3.31321 14.6209 2.66008 15.2494C3.92666 15.0281 5.11562 14.5631 6.13444 13.8908C6.91999 14.0843 7.73502 14.1833 8.55452 14.1846C10.8233 14.1846 12.9992 13.4373 14.6035 12.1073C16.2077 10.7772 17.109 8.97328 17.109 7.09229C17.109 5.2113 16.2077 3.40736 14.6035 2.0773C12.9992 0.747237 10.8233 1.48831e-05 8.55452 0Z" fill="#fff"/></svg>';
$icon_email   = '<svg viewBox="0 0 15.6346 11.3706" width="15.635" height="11.371" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1.30288 0C0.844004 0 0.443191 0.20627 0.211209 0.517452L7.3567 6.75352C7.61987 6.98319 8.01472 6.98319 8.27788 6.75352L15.4234 0.517452C15.1914 0.20627 14.7906 0 14.3317 0H1.30288ZM0 1.941V10.2335C0 10.8635 0.581085 11.3706 1.30288 11.3706H14.3317C15.0535 11.3706 15.6346 10.8635 15.6346 10.2335V1.941L9.19906 7.55746C8.44144 8.21865 7.19314 8.21865 6.43553 7.55746L0 1.941Z" fill="#fff"/></svg>';
$icon_wa      = '<svg viewBox="0 0 26.7794 26.7794" width="26.779" height="26.779" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><rect width="26.7794" height="26.7794" rx="5.5" fill="#25D366"/><path d="M6.43658 20.5567L7.16883 17.157C6.22767 15.6725 5.86052 13.8956 6.13627 12.1598C6.41201 10.4239 7.3117 8.84822 8.66652 7.72848C10.0214 6.60874 11.7382 6.02184 13.495 6.07789C15.2517 6.13395 16.9277 6.82911 18.2084 8.03295C19.4891 9.2368 20.2865 10.8666 20.451 12.6165C20.6155 14.3665 20.1358 16.1163 19.1019 17.5377C18.068 18.9592 16.551 19.9545 14.8355 20.337C13.1199 20.7195 11.3238 20.4629 9.784 19.6152L6.43658 20.5567Z" fill="#25D366" stroke="#fff" stroke-width="1.35989"/><path d="M16.1156 14.2804C15.9586 14.1758 15.8017 14.1235 15.6448 14.3327L15.0172 15.1695C14.8603 15.2741 14.7557 15.3264 14.5465 15.2218C13.7619 14.8034 12.6635 14.3327 11.7221 12.7636C11.6698 12.5544 11.7744 12.4498 11.879 12.3451L12.3497 11.6129C12.4543 11.5083 12.402 11.4037 12.3497 11.2991L11.7221 9.78228C11.5652 9.36385 11.4082 9.41615 11.2513 9.41615H10.8329C10.7283 9.41615 10.5191 9.46846 10.3099 9.67767C9.1592 10.8283 9.62993 12.4498 10.4668 13.4958C10.6237 13.705 11.6698 15.588 13.9188 16.5817C15.5925 17.314 15.9586 17.2094 16.4294 17.1048C17.0047 17.0525 17.5801 16.5817 17.8416 16.111C17.8939 15.9541 18.1554 15.2741 17.9462 15.1695" fill="#fff"/></svg>';
$icon_msg     = '<svg viewBox="0 0 20.0845 20.0845" width="20.085" height="20.085" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20.0845 9.741C20.0845 15.3383 15.6994 19.482 10.0423 19.482C9.02632 19.482 8.05147 19.3481 7.13521 19.0962C6.95714 19.0469 6.76789 19.0609 6.59895 19.1352L4.60561 20.0152C4.08433 20.2455 3.49581 19.8747 3.47833 19.3049L3.42352 17.5183C3.41668 17.2984 3.31774 17.0924 3.15363 16.946C1.1996 15.1985 0 12.6689 0 9.741C0 4.14399 4.38518 0 10.0423 0C15.6994 0 20.0845 4.14399 20.0845 9.741Z" fill="#0866FF"/><path d="M12.7678 12.5434L16.2641 7.13989C16.6157 6.59678 15.9646 5.96463 15.4321 6.33193L11.7823 8.84937C11.6593 8.93435 11.4972 8.93664 11.3719 8.85546L8.13252 6.75964C7.8583 6.58231 7.49224 6.66069 7.31494 6.93491L3.81836 12.3386C3.46678 12.8817 4.11795 13.5139 4.65038 13.1466L8.30095 10.6289C8.42398 10.5439 8.58608 10.5416 8.71163 10.6228L11.9505 12.7186C12.2247 12.896 12.5908 12.8176 12.7681 12.5434H12.7678Z" fill="#fff"/></svg>';
$icon_check   = '<svg viewBox="0 0 32 32" width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M24.9307 9.59922C24.3974 9.06589 23.5974 9.06589 23.0641 9.59922L13.0641 19.5992L8.93073 15.4659C8.3974 14.9326 7.5974 14.9326 7.06406 15.4659C6.53073 15.9992 6.53073 16.7992 7.06406 17.3326L12.1307 22.3992C12.3974 22.6659 12.6641 22.7992 13.0641 22.7992C13.4641 22.7992 13.7307 22.6659 13.9974 22.3992L24.9307 11.4659C25.4641 10.9326 25.4641 10.1326 24.9307 9.59922Z" fill="#34E576"/></svg>';
$icon_x       = '<svg viewBox="0 0 18 18" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1.16659 17.9996C0.868056 17.9996 0.569313 17.8854 0.342106 17.6579C-0.114017 17.202 -0.114017 16.4649 0.342106 16.009L16.0089 0.341932C16.4649 -0.113977 17.202 -0.113977 17.6579 0.341932C18.114 0.797841 18.114 1.53498 17.6579 1.99089L1.99107 17.6579C1.76236 17.8864 1.46512 17.9996 1.16659 17.9996Z" fill="#FF7088"/><path d="M16.8334 17.9996C16.5349 17.9996 16.2364 17.8854 16.0089 17.6579L0.342106 1.99089C-0.114017 1.53498 -0.114017 0.797841 0.342106 0.341932C0.798015 -0.113977 1.53494 -0.113977 1.99107 0.341932L17.6579 16.009C18.114 16.4649 18.114 17.202 17.6579 17.6579C17.4305 17.8864 17.132 17.9996 16.8334 17.9996Z" fill="#FF7088"/></svg>';
$icon_orbit   = '<svg viewBox="0 0 117.579 44.49" width="117.579" height="44.49" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M69.0808 15.2031C71.3642 15.2031 73.2962 17.018 73.3649 19.3339C73.4254 21.4176 72.0034 23.1814 70.091 23.6177V23.6208L74.0709 28.7107C74.2409 28.9281 74.0874 29.2482 73.8144 29.2483H71.6813C71.5816 29.2482 71.4869 29.2018 71.4248 29.1222L67.2044 23.7238H62.6912V28.9149C62.6912 29.0973 62.5441 29.2467 62.3644 29.2467H60.6937C60.514 29.2467 60.3669 29.0974 60.3669 28.9149V21.3631H69.1149C70.0891 21.3631 70.9425 20.6298 71.0341 19.646C71.1387 18.5162 70.2624 17.5622 69.1705 17.5622H60.6955C60.5157 17.5622 60.3684 17.4129 60.3684 17.2305V15.5349C60.3684 15.3524 60.5157 15.2031 60.6955 15.2031H69.0808ZM51.55 15.2745C55.2653 15.2745 58.2894 18.3702 58.2878 22.1726V22.3468C58.2878 26.1509 55.2654 29.2451 51.5484 29.2451H49.1603C45.4449 29.2451 42.421 26.1509 42.421 22.3468V22.1726C42.421 18.3702 45.4449 15.2745 49.1618 15.2745H51.55ZM84.6538 15.2761C86.8883 15.2761 88.7077 17.1211 88.7077 19.3906C88.7077 20.5054 88.2663 21.5191 87.5537 22.2606C88.268 23.0022 88.7077 24.0141 88.7077 25.1306C88.7077 27.3985 86.8899 29.2451 84.6538 29.2451H77.1954C76.5188 29.2451 75.9695 28.6877 75.9695 28.0009V16.5188C75.9695 15.832 76.5187 15.2745 77.1954 15.2745H84.6538V15.2761ZM93.3723 15.2745C93.5528 15.2745 93.6992 15.4231 93.6992 15.6063V28.9131C93.6992 29.0963 93.5528 29.2451 93.3723 29.2451H91.5742C91.3937 29.2451 91.2473 29.0964 91.2473 28.9131V15.6063C91.2473 15.4231 91.3937 15.2745 91.5742 15.2745H93.3723ZM108.102 15.2745C108.282 15.2746 108.429 15.4238 108.429 15.6063V17.4313C108.429 17.6137 108.282 17.763 108.102 17.7631H103.256V28.9131C103.256 29.0956 103.109 29.2451 102.929 29.2451H101.131C100.951 29.2451 100.804 29.0956 100.804 28.9131V17.7631H95.9068C95.727 17.763 95.5799 17.6137 95.5799 17.4313V15.6063C95.5799 15.4238 95.727 15.2745 95.9068 15.2745H108.102ZM78.4214 26.7582H84.6538V26.7566C85.5365 26.7566 86.2558 26.0265 86.2558 25.1306C86.2558 24.2348 85.5381 23.5049 84.6538 23.5049H78.4214V26.7582ZM49.1618 17.783C46.7983 17.783 44.8744 19.7522 44.8744 22.1726V22.3468C44.8744 24.7673 46.7966 26.7366 49.1618 26.7367H51.55C53.9135 26.7367 55.8374 24.7673 55.8374 22.3468V22.1726C55.8374 19.7521 53.9151 17.783 51.55 17.783H49.1618ZM78.4214 21.0163H84.6538V21.0148C85.5365 21.0148 86.2558 20.2847 86.2558 19.3888C86.2558 18.493 85.5381 17.7631 84.6538 17.7631H78.4214V21.0163Z" fill="#fff"/><path d="M16.0902 11.6343C18.3769 9.81273 21.9313 9.03989 24.3073 9.16274C27.1297 9.30867 27.842 9.5029 30.8131 10.4161L27.9719 14.308C26.4422 13.1962 24.6211 12.5523 22.7296 12.4546C20.8381 12.3568 18.9575 12.8092 17.3158 13.757L16.0902 11.6343Z" fill="#fff"/><path d="M32.8554 16.0902C34.6769 18.3769 35.4498 21.9314 35.3269 24.3073C35.181 27.1298 34.9868 27.842 34.0736 30.8131L30.1817 27.9719C31.2935 26.4422 31.9373 24.6211 32.0351 22.7296C32.1329 20.8381 31.6805 18.9575 30.7326 17.3158L32.8554 16.0902Z" fill="#fff"/><path d="M28.3994 32.8554C26.1128 34.6769 22.5583 35.4498 20.1824 35.3269C17.3599 35.181 16.6477 34.9868 13.6765 34.0736L16.5177 30.1817C18.0475 31.2935 19.8686 31.9373 21.7601 32.0351C23.6516 32.1329 25.5322 31.6805 27.1738 30.7326L28.3994 32.8554Z" fill="#fff"/><path d="M11.6343 28.3994C9.81273 26.1128 9.03989 22.5583 9.16274 20.1824C9.30867 17.3599 9.5029 16.6477 10.4161 13.6765L14.308 16.5177C13.1962 18.0475 12.5523 19.8686 12.4546 21.7601C12.3568 23.6516 12.8092 25.5322 13.757 27.1739L11.6343 28.3994Z" fill="#fff"/><path d="M26.7058 22.1407C26.7058 24.662 24.662 26.7058 22.1407 26.7058C19.6195 26.7058 17.5756 24.662 17.5756 22.1407C17.5756 19.6195 19.6195 17.5756 22.1407 17.5756C24.662 17.5756 26.7058 19.6195 26.7058 22.1407Z" fill="#fff"/></svg>';

$glow_left = '<svg class="arch__glow-img" viewBox="0 0 999 1902" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><g filter="url(#arch-glow-l)"><ellipse cx="499.5" cy="951" rx="287.45" ry="257.57" fill="#FF3131" fill-opacity="0.2"/></g><defs><filter id="arch-glow-l" x="0" y="0" width="999" height="1902" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="70" result="effect1_foregroundBlur"/></filter></defs></svg>';
$glow_right = '<svg class="arch__glow-img" viewBox="0 0 1061 1600" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><g filter="url(#arch-glow-r)"><ellipse cx="530.5" cy="800" rx="305.57" ry="191.36" fill="#316BFF" fill-opacity="0.4"/></g><defs><filter id="arch-glow-r" x="0" y="0" width="1061" height="1600" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="70" result="effect1_foregroundBlur"/></filter></defs></svg>';

$arch_node = static function ( $label, $icon, $well_class, $mark_class, $node_class ) {
	echo '<div class="arch-node ' . esc_attr( $node_class ) . '">';
	echo '<span class="arch-well ' . esc_attr( $well_class ) . '">';
	echo '<span class="arch-mark ' . esc_attr( $mark_class ) . '">' . $icon . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</span>';
	echo '<span class="arch-node__label">' . esc_html( $label ) . '</span>';
	echo '</div>';
};

$arch_wsvg = static function ( $uid, $view_box, $path, $stroke_attrs, $gx1, $gy1, $gx2, $gy2 ) {
	return '<svg viewBox="' . $view_box . '" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" overflow="visible" aria-hidden="true"><path d="' . $path . '" stroke="url(#arch-lg-' . $uid . ')" ' . $stroke_attrs . '/><defs><linearGradient id="arch-lg-' . $uid . '" x1="' . $gx1 . '" y1="' . $gy1 . '" x2="' . $gx2 . '" y2="' . $gy2 . '" gradientUnits="userSpaceOnUse"><stop stop-color="#528CED"/><stop offset="1" stop-color="#528CED" stop-opacity="0"/></linearGradient></defs></svg>';
};

$arch_wire = static function ( $left, $top, $box_w, $box_h, $inner_w, $inner_h, $rot, $inset, $svg, $center_x = false ) {
	$class    = 'arch-wire' . ( $center_x ? ' arch-wire--cx' : '' );
	$left_css = $center_x ? '50%' : ( $left . 'px' );
	echo '<div class="' . esc_attr( $class ) . '" style="left:' . esc_attr( $left_css ) . ';top:' . esc_attr( $top . 'px' ) . ';width:' . esc_attr( $box_w . 'px' ) . ';height:' . esc_attr( $box_h . 'px' ) . '" aria-hidden="true">';
	echo '<div class="arch-wire__rot arch-wire__rot--' . esc_attr( $rot ) . '">';
	echo '<div class="arch-wire__src" style="width:' . esc_attr( $inner_w . 'px' ) . ';height:' . esc_attr( $inner_h . 'px' ) . '">';
	echo '<div class="arch-wire__img" style="inset:' . esc_attr( $inset ) . '">';
	echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</div></div></div></div>';
};

$sw_dash = 'stroke-linecap="round" stroke-dasharray="4 4"';
$sw_2    = 'stroke-width="2" stroke-linecap="round"';
$sw_4    = 'stroke-width="4" stroke-linecap="round"';
?>
<section class="arch" id="architecture">
	<div class="arch__frame">
		<div class="arch__stage">
			<div class="arch__intro" data-animate="fade">
				<p class="arch__eyebrow">
					<span class="arch__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="arch__headline"><?php echo esc_html( $headline ); ?></h2>
			</div>

			<p class="arch__col-label arch__col-label--left"><?php echo esc_html( $left_label ); ?></p>
			<p class="arch__col-label arch__col-label--right"><?php echo esc_html( $right_label ); ?></p>

			<div class="arch-col arch-col--trad">
			<div class="arch__glow arch__glow--left" aria-hidden="true">
				<?php echo $glow_left; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="arch-panel-fit arch-panel-fit--trad">
			<div class="arch-panel arch-panel--trad" data-animate="group">
				<?php
				$arch_wire( 86, 132, 213, 101, 101, 213, 'neg90', '-0.47% -0.99%', $arch_wsvg( '1606', '0 0 103 215', 'M1 1C28.1135 1 50.8676 21.4367 53.7688 48.3945L68.3375 183.766C70.1882 200.963 84.7036 214 102 214', $sw_2, '2.34924', '-34.5', '109.601', '-30.7695' ) );
				$arch_wire( 235, 132, 64, 101, 101, 64, 'neg90', '-1.56% -0.99%', $arch_wsvg( '1605', '0 0 103 66', 'M1 1H14.6775C35.065 1 53.2552 13.8065 60.1298 33L61.3376 36.3722C67.4877 53.543 83.761 65 102 65', $sw_2, '2.34924', '-9.66667', '108.311', '2.59952' ) );
				$arch_wire( 299, 132, 69, 101, 101, 69, 'neg90-flip', '-1.45% -0.99%', $arch_wsvg( '1594', '0 0 103 71', 'M1 1H12.3142C34.0201 1 53.2864 14.9011 60.1298 35.5L62.0042 41.1421C67.7284 58.3723 83.8438 70 102 70', $sw_2, '2.34924', '-10.5', '108.507', '0.898385' ) );
				$arch_wire( 299, 132, 212, 101, 101, 212, 'neg90-flip', '-0.47% -0.99%', $arch_wsvg( '1604', '0 0 103 214', 'M1 1C28.117 1 50.8775 21.4321 53.7926 48.392L68.3223 182.768C70.1819 199.966 84.7014 213 102 213', $sw_2, '2.34924', '-34.3333', '109.6', '-30.5853' ) );
				$arch_wire( 235, 262, 64, 121, 121, 64, '90-flip', '-0.78% -0.41%', $arch_wsvg( '1607', '0 0 122 65', 'M0.5 0.5H22.7859C43.9124 0.5 63.0078 13.0854 71.3386 32.5C79.6694 51.9146 98.7649 64.5 119.891 64.5H121.5', $sw_dash, '2.11641', '-10.1667', '128.334', '7.33765' ) );
				$arch_wire( 235, 262, 227, 121, 121, 227, '90-flip', '-0.22% -0.41%', $arch_wsvg( '1608', '0 0 122 228', 'M0.5 0.5C32.8733 0.5 60.5321 24.6744 64.4202 56.8134L80.6943 191.333C83.1915 211.974 100.709 227.5 121.5 227.5', $sw_dash, '2.11641', '-37.3333', '130.565', '-32.311' ) );
				$arch_wire( 363, 262, 99, 121, 121, 99, '90-flip', '-0.51% -0.41%', $arch_wsvg( '1609', '0 0 122 100', 'M0.5 0.5H8.9441C37.7018 0.5 62.9283 19.6813 70.6153 47.3926L75.3318 64.3953C81.0865 85.1405 99.9715 99.5 121.5 99.5', $sw_dash, '2.11641', '-16', '129.736', '-4.5584' ) );
				$arch_wire( 145, 262, 218, 121, 121, 218, '90', '-0.23% -0.41%', $arch_wsvg( '1615', '0 0 122 219', 'M0.5 0.5H1.16395C33.4173 0.5 60.6309 24.5005 64.6621 56.5009L80.5165 182.355C83.1183 203.009 100.683 218.5 121.5 218.5', $sw_dash, '2.11641', '-35.8333', '130.549', '-30.6043' ) );
				$arch_wire( 299, 262, 64, 121, 121, 64, '90', '-0.78% -0.41%', $arch_wsvg( '1613', '0 0 122 65', 'M0.5 0.5H22.7859C43.9123 0.5 63.0078 13.0854 71.3386 32.5C79.6694 51.9146 98.7649 64.5 119.891 64.5H121.5', $sw_dash, '2.11641', '-10.1667', '128.334', '7.33766' ) );
				$arch_wire( 462, 262, 47, 121, 121, 47, '90', '-1.06% -0.41%', $arch_wsvg( '1610', '0 0 122 48', 'M0.5 0.5H30.3899C47.2457 0.5 62.8349 9.44649 71.3386 24C79.8423 38.5535 95.4315 47.5 112.287 47.5H121.5', $sw_dash, '2.11641', '-7.33333', '126.332', '16.1242' ) );
				$arch_wire( 299, 262, 210, 121, 121, 210, '90', '-0.24% -0.41%', $arch_wsvg( '1616', '0 0 122 211', 'M0.5 0.5H1.43198C33.5702 0.5 60.7244 24.3343 64.8917 56.2012L80.3459 174.377C83.0484 195.043 100.658 210.5 121.5 210.5', $sw_dash, '2.11641', '-34.5', '130.532', '-29.0725' ) );
				$arch_wire( 88, 262, 57, 121, 121, 57, '90-flip', '-0.88% -0.41%', $arch_wsvg( '1611', '0 0 122 58', 'M0.5 0.5H25.9721C45.3125 0.5 62.944 11.5765 71.3386 29C79.7332 46.4236 97.3647 57.5 116.705 57.5H121.5', $sw_dash, '2.11641', '-9', '127.716', '10.5578' ) );
				$arch_wire( 145, 262, 90, 121, 121, 90, '90', '-0.56% -0.41%', $arch_wsvg( '1614', '0 0 122 91', 'M0.5 0.5H10.5591C38.511 0.5 63.1808 18.765 71.3386 45.5L74.4375 55.6558C80.7542 76.3571 99.8564 90.5 121.5 90.5', $sw_dash, '2.11641', '-14.5', '129.523', '-1.93528' ) );
				$arch_wire( 88, 262, 211, 121, 121, 211, '90-flip', '-0.24% -0.41%', $arch_wsvg( '1612', '0 0 122 212', 'M0.5 0.5H1.39744C33.5505 0.5 60.7124 24.3557 64.8622 56.2399L80.3679 175.374C83.0574 196.039 100.661 211.5 121.5 211.5', $sw_dash, '2.11641', '-34.6667', '130.534', '-29.2648' ) );
				$arch_node( 'Company', $icon_company, 'arch-well--muted', 'arch-mark--building', 'arch-node--company' );
				$arch_node( 'SMS/MMS', $icon_sms, 'arch-well--sms', 'arch-mark--sms', 'arch-node--sms' );
				$arch_node( 'Messenger', $icon_msg, 'arch-well--msg', 'arch-mark--msg', 'arch-node--msg' );
				$arch_node( 'WhatsApp', $icon_wa, 'arch-well--wa', 'arch-mark--wa', 'arch-node--wa' );
				$arch_node( 'Email', $icon_email, 'arch-well--email', 'arch-mark--email', 'arch-node--email' );
				$arch_node( 'Customer C', $icon_person, 'arch-well--muted', 'arch-mark--person', 'arch-node--c' );
				$arch_node( 'Customer B', $icon_person, 'arch-well--muted', 'arch-mark--person', 'arch-node--b' );
				$arch_node( 'Customer A', $icon_person, 'arch-well--muted', 'arch-mark--person', 'arch-node--a' );
				?>
			</div>
			</div>
			</div>

			<div class="arch-col arch-col--orbit">
			<div class="arch__glow arch__glow--right" aria-hidden="true">
				<?php echo $glow_right; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="arch-panel-fit arch-panel-fit--orbit">
			<div class="arch-panel arch-panel--orbit" data-animate="group">
				<?php
				$arch_wire( 0, 136, 0, 72, 72, 0, 'neg90', '-2px -2.78%', $arch_wsvg( '1617', '0 0 76 4', 'M2 2H52.3225H74', $sw_4, '2.96183', '-12', '67.0892', '16.2237' ), true );
				$arch_wire( 300, 276, 157, 98, 98, 157, '90-flip', '-1.27% -2.04%', $arch_wsvg( '1618', '0 0 102 161', 'M2 2C28.5318 2 51.0185 21.5256 54.7401 47.795L66.3558 129.786C68.7299 146.544 83.0747 159 100 159', $sw_4, '3.30916', '-24.1667', '107.283', '-19.406' ) );
				$arch_wire( 141, 276, 159, 98, 98, 159, '90', '-1.26% -2.04%', $arch_wsvg( '1619', '0 0 102 163', 'M2 2C28.5203 2 50.986 21.5418 54.6601 47.8063L66.4069 131.779C68.7506 148.534 83.0821 161 100 161', $sw_4, '3.30916', '-24.5', '107.289', '-19.7989' ) );
				$arch_wire( 300, 275, 0, 97, 97, 0, '90', '-2px -2.06%', $arch_wsvg( '1620', '0 0 101 4', 'M2 2H69.7956H99', $sw_4, '3.2958', '-12', '79.5984', '33.2428' ) );
				$arch_node( 'Company', $icon_company, 'arch-well--muted', 'arch-mark--building', 'arch-node--company arch-node--company-orbit' );
				?>
				<div class="arch-hub">
					<?php echo $icon_orbit; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<?php
				$arch_node( 'Customer C', $icon_person, 'arch-well--muted', 'arch-mark--person', 'arch-node--oc' );
				$arch_node( 'Customer B', $icon_person, 'arch-well--muted', 'arch-mark--person', 'arch-node--ob' );
				$arch_node( 'Customer A', $icon_person, 'arch-well--muted', 'arch-mark--person', 'arch-node--oa' );
				?>
			</div>
			</div>
			</div>

			<p class="arch-caption arch-caption--bad">
				<span class="arch-caption__icon"><?php echo $icon_x; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<span><?php echo esc_html( $left_caption ); ?></span>
			</p>
			<p class="arch-caption arch-caption--good">
				<span class="arch-caption__icon"><?php echo $icon_check; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<span><?php echo esc_html( $right_caption ); ?></span>
			</p>
		</div>
	</div>
</section>
