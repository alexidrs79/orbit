<?php
/**
 * Template part: Verify — Verify & identity.
 * Figma: 607:11496, 1440 × 1092.
 * Trust gate panel (login attempt checks + risk verdict) + 4 capability rows.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'verify_eyebrow' );
$headline = get_field( 'verify_headline' );
$body     = get_field( 'verify_body' );
$rows     = get_field( 'verify_rows' );

if ( ! $eyebrow ) {
	$eyebrow = 'Verify & identity';
}
if ( ! $headline ) {
	$headline = 'Verify users and check identity on the same platform';
}
if ( ! $body ) {
	$body = 'Send one-time passcodes and passwordless prompts, then confirm a number is real and its owner has not changed — before you trust a signup, login, or payout. There is no separate verification vendor to integrate.';
}

$verify_src = static function ( $file ) {
	echo esc_url( get_template_directory_uri() . '/assets/img/verify/' . $file );
};

$default_rows = array(
	array(
		'title' => 'One-time passcodes & passwordless',
		'body'  => 'Deliver OTPs over SMS, voice, WhatsApp, email, and RCS, or skip the password with authenticator (TOTP) codes, push approvals, passkeys, magic links, and backup codes. Delivery, retries, and per-recipient rate limits are handled for you.',
		'badge' => 'Delivery',
		'icon'  => 'icon-otp.svg',
	),
	array(
		'title' => 'Number lookup',
		'body'  => 'Check whether a number is valid, reachable, and roaming, and read its carrier, line type, and porting history before you send — so you stop paying to message dead or mistyped numbers.',
		'badge' => 'Pre-send',
		'icon'  => 'icon-lookup.svg',
	),
	array(
		'title' => 'SIM-swap & silent authentication',
		'body'  => 'Verify a phone with no SMS at all using operator silent authentication, and flag a recent SIM swap before you trust a login or high-value action. Subscribe to continuous monitoring for the accounts that matter most.',
		'badge' => 'Network',
		'icon'  => 'icon-sim-swap.svg',
	),
	array(
		'title' => 'Identity & KYC signals',
		'body'  => 'Match a name, address, or date of birth against carrier records, confirm a device is reachable, and score account-takeover risk from network signals — all through one identity API.',
		'badge' => 'Carrier data',
		'icon'  => 'icon-kyc.svg',
	),
);

if ( ! $rows ) {
	$rows = $default_rows;
}

$checks = array(
	array( 'name' => 'OTP delivered', 'detail' => 'SMS · 1.2 s', 'warn' => false ),
	array( 'name' => 'Number lookup', 'detail' => 'Mobile · T-Mobile US', 'warn' => false ),
	array( 'name' => 'SIM swap check', 'detail' => 'Swapped 6h ago', 'warn' => true ),
	array( 'name' => 'Identity match', 'detail' => 'Name + DOB', 'warn' => false ),
);
?>
<section class="verify" id="verify">
	<div class="verify__frame">
		<div class="verify__header">
			<div class="verify__text">
				<p class="verify__eyebrow" data-animate="fade">
					<span class="verify__dot orbit-pulse-dot" aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</p>
				<h2 class="verify__headline" data-animate="fade"><?php echo esc_html( $headline ); ?></h2>
				<p class="verify__subcopy" data-animate="fade"><?php echo esc_html( $body ); ?></p>
			</div>
			<div class="verify__visual">
				<div class="verify__deco" aria-hidden="true">
					<span class="verify__blob verify__blob--a"></span>
					<span class="verify__blob verify__blob--b"></span>
					<span class="verify__dots verify__dots--a"></span>
					<span class="verify__dots verify__dots--b"></span>
				</div>
				<div class="verify__glow" aria-hidden="true"></div>
				<div class="verify__panel">
					<div class="verify__panel-head">
						<div class="verify__attempt">
							<p class="verify__attempt-title">Login attempt</p>
							<p class="verify__attempt-meta">+1 415 ••• 0122 · 2:46 PM</p>
						</div>
						<p class="verify__attempt-count">4 checks</p>
					</div>
					<div class="verify__checks">
						<?php foreach ( $checks as $check ) : ?>
							<div class="verify-check<?php echo $check['warn'] ? ' verify-check--warn' : ''; ?>">
								<span class="verify-check__status">
									<img src="<?php $verify_src( $check['warn'] ? 'status-warn.svg' : 'status-check.svg' ); ?>" alt="" width="11" height="11">
								</span>
								<span class="verify-check__name"><?php echo esc_html( $check['name'] ); ?></span>
								<span class="verify-check__detail"><?php echo esc_html( $check['detail'] ); ?></span>
							</div>
						<?php endforeach; ?>
						<div class="verify__verdict">
							<p class="verify__verdict-label">Risk verdict</p>
							<p class="verify__verdict-value">Step up to passkey</p>
							<p class="verify__verdict-note">SMS suppressed — recent SIM swap on this number</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="verify__rows">
			<?php
			foreach ( $rows as $row ) :
				?>
				<div class="verify__row" data-animate="fade">
					<div class="verify__row-title">
						<span class="verify__row-icon">
							<?php if ( is_array( $row ) && ! empty( $row['row_icon'] ) ) : ?>
								<?php echo wp_get_attachment_image( $row['row_icon'], 'full', false, array( 'class' => 'verify__row-icon-img' ) ); ?>
							<?php else : ?>
								<img src="<?php $verify_src( isset( $row['icon'] ) ? $row['icon'] : 'icon-otp.svg' ); ?>" alt="" width="19" height="19">
							<?php endif; ?>
						</span>
						<h3 class="verify__row-heading"><?php echo esc_html( $row['row_title'] ?? $row['title'] ); ?></h3>
					</div>
					<p class="verify__row-body"><?php echo esc_html( $row['row_body'] ?? $row['body'] ); ?></p>
					<?php if ( ! empty( $row['row_badge'] ) || ! empty( $row['badge'] ) ) : ?>
						<span class="verify__row-badge"><?php echo esc_html( ! empty( $row['row_badge'] ) ? $row['row_badge'] : $row['badge'] ); ?></span>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
