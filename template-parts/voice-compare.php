<?php
/**
 * Template part: Voice compare.
 * Figma: copy 48:120 (499 × 412 at 119, 6523) + table 1:6989 (659 × 567 at 681, 6445).
 * Table is HTML. Marks are Figma SVG paths. Motion empty — fade + group.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline  = get_field( 'vcmp_headline' );
$body      = get_field( 'vcmp_body' );
$point_one = get_field( 'vcmp_point_built' );
$point_two = get_field( 'vcmp_point_live' );
$col_req   = get_field( 'vcmp_col_req' );
$col_asm   = get_field( 'vcmp_col_assemble' );
$col_orb   = get_field( 'vcmp_col_orbit' );
$rows      = array_values(
	array_filter(
		(array) get_field( 'vcmp_rows' ),
		function ( $row ) {
			return ! empty( $row['label'] );
		}
	)
);

if ( ! $headline ) {
	$headline = 'Building it yourself costs more than you think.';
}
if ( ! $body ) {
	$body = 'Number porting, compliance recording, predictive dialing, CRM sync, quality management, supervisor controls — enterprises spend months assembling what Orbit ships as a single production-ready platform. And every capability you piece together separately is another vendor contract, another integration point, another failure surface to manage. The real cost of "building it yourself" isn\'t the build. It\'s everything that comes after.';
}
if ( ! $point_one ) {
	$point_one = 'Every capability in this table, built in';
}
if ( ! $point_two ) {
	$point_two = 'Live in 3–5 business days';
}
if ( ! $col_req ) {
	$col_req = 'Production-layer requirement';
}
if ( ! $col_asm ) {
	$col_asm = 'Assemble';
}
if ( ! $col_orb ) {
	$col_orb = 'Orbit';
}
if ( ! $rows ) {
	$rows = array(
		array( 'label' => 'Number procurement & porting' ),
		array( 'label' => 'TCPA-compliant recording with consent gating' ),
		array( 'label' => 'Predictive dialer with DNC scrubbing' ),
		array( 'label' => 'CRM write-back (HubSpot, Salesforce)' ),
		array( 'label' => 'Native QM loop (humans + LLMs, one rubric)' ),
		array( 'label' => 'Supervisor desktop (mute, hold, barge, whisper)' ),
		array( 'label' => 'Mid-call AI-to-human handoff with full context' ),
		array( 'label' => 'Per-chunk barge-in watchdog, DTMF allowlist' ),
	);
}

$x_path = 'M12 0C18.6275 0 24 5.37258 24 12C24 18.6275 18.6275 24 12 24C5.37258 24 0 18.6275 0 12C0 5.37258 5.37258 0 12 0ZM9.35538 7.78561C8.91695 7.42802 8.27061 7.45327 7.86192 7.86192C7.45337 8.27061 7.42805 8.91698 7.78561 9.35538L7.86192 9.44041L10.4215 12L7.86301 14.5596C7.42724 14.9955 7.4271 15.7023 7.86301 16.138C8.29894 16.5736 9.00567 16.5738 9.4415 16.138L12 13.5785L14.5585 16.138L14.6436 16.2144C15.0818 16.5719 15.7283 16.5465 16.137 16.138C16.5456 15.7296 16.5716 15.0831 16.2144 14.6446L16.137 14.5596L13.5774 12L16.138 9.44041L16.2144 9.35538C16.5719 8.91697 16.5466 8.27061 16.138 7.86192C15.7294 7.45327 15.0831 7.42802 14.6446 7.78561L14.5596 7.86192L12 10.4215L9.44041 7.86192L9.35538 7.78561Z';
?>
<section class="vcmp" id="voice-compare">
	<div class="vcmp__frame">
		<div class="vcmp__stage">
			<div class="vcmp__copy" data-animate="fade">
				<div class="vcmp__lead">
					<h2 class="vcmp__headline"><?php echo esc_html( $headline ); ?></h2>
					<p class="vcmp__body"><?php echo esc_html( $body ); ?></p>
				</div>
				<ul class="vcmp__points">
					<li class="vcmp__point">
						<span class="vcmp__point-icon" aria-hidden="true">
							<svg viewBox="0 0 16 16" width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="#007BFF"/>
							</svg>
						</span>
						<span class="vcmp__point-text"><?php echo esc_html( $point_one ); ?></span>
					</li>
					<li class="vcmp__point">
						<span class="vcmp__point-icon" aria-hidden="true">
							<svg viewBox="0 0 16 16" width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6 1V12.9999L9.99998 14.9999V3.00191L6 1Z" fill="#007BFF"/>
								<path d="M5 12.9999L4.99998 1L1.40251 3.04557C1.15509 3.17493 1 3.43102 1 3.71022V14.25C1 14.5202 1.14535 14.7695 1.38048 14.9026C1.61562 15.0358 1.90419 15.0321 2.13588 14.8931L5 12.9999Z" fill="#007BFF"/>
								<path d="M14.6935 12.1049L11 15V3.002L13.8641 1.10688C14.0958 0.967862 14.3844 0.964221 14.6195 1.09735C14.8547 1.23048 15 1.4798 15 1.75V11.5001C15 11.739 14.8862 11.9636 14.6935 12.1049Z" fill="#007BFF"/>
							</svg>
						</span>
						<span class="vcmp__point-text"><?php echo esc_html( $point_two ); ?></span>
					</li>
				</ul>
			</div>

			<div class="vcmp-table" data-animate="group" role="table" aria-label="<?php esc_attr_e( 'Production-layer requirements compared', 'orbit' ); ?>">
				<div class="vcmp-table__orbit" aria-hidden="true"></div>
				<div class="vcmp-table__head" role="row">
					<p class="vcmp-table__h vcmp-table__h--req" role="columnheader"><?php echo esc_html( $col_req ); ?></p>
					<p class="vcmp-table__h vcmp-table__h--asm" role="columnheader"><?php echo esc_html( $col_asm ); ?></p>
					<p class="vcmp-table__h vcmp-table__h--orb" role="columnheader"><?php echo esc_html( $col_orb ); ?></p>
				</div>
				<?php foreach ( $rows as $row ) : ?>
					<div class="vcmp-table__row" role="row">
						<p class="vcmp-table__label" role="cell"><?php echo esc_html( $row['label'] ); ?></p>
						<span class="vcmp-table__mark vcmp-table__mark--x" role="cell" aria-label="<?php esc_attr_e( 'Not included', 'orbit' ); ?>">
							<svg viewBox="0 0 24 24" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="<?php echo esc_attr( $x_path ); ?>" fill="#52525B"/>
							</svg>
						</span>
						<span class="vcmp-table__mark vcmp-table__mark--check" role="cell" aria-label="<?php esc_attr_e( 'Included', 'orbit' ); ?>">
							<svg viewBox="0 0 24 24" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<circle cx="12" cy="12" r="12" fill="#fff"/>
								<path d="M7.39062 12.5026L10.6747 15.7867L17.8422 8.61719" stroke="#325FEC" stroke-width="1.93955" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
