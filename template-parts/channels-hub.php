<?php
/**
 * Template part: Channel hub + Shop24 chat.
 * Figma: 1:6025, 1442 × 854 at (−1, 4017).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow     = get_field( 'hub_eyebrow' );
$headline    = get_field( 'hub_headline' );
$body        = get_field( 'hub_body' );
$items       = array_values(
	array_filter(
		(array) get_field( 'hub_items' ),
		function ( $item ) {
			return ! empty( $item['label'] );
		}
	)
);
$avatar_id   = (int) get_field( 'hub_chat_avatar' );
$chat_name   = get_field( 'hub_chat_name' );
$chat_status = get_field( 'hub_chat_status' );
$placeholder = get_field( 'hub_chat_placeholder' );
$messages    = array_values(
	array_filter(
		(array) get_field( 'hub_chat_messages' ),
		function ( $message ) {
			return ! empty( $message['text'] );
		}
	)
);

if ( ! $avatar_id ) {
	$avatar_id = orbit_get_attachment_id_by_filename( ORBIT_HUB_CHAT_AVATAR_ID );
}

if ( ! $headline && ! $items ) {
	return;
}
?>
<section class="hub" id="channel-hub">
	<div class="hub__frame">
		<div class="hub__stage">
			<div class="hub__copy" data-animate="fade">
				<?php if ( $eyebrow ) : ?>
					<p class="hub__eyebrow">
						<span class="hub__dot orbit-pulse-dot" aria-hidden="true"></span>
						<?php echo esc_html( $eyebrow ); ?>
					</p>
				<?php endif; ?>
				<?php if ( $headline ) : ?>
					<h2 class="hub__headline"><?php echo esc_html( $headline ); ?></h2>
				<?php endif; ?>
				<?php if ( $body ) : ?>
					<p class="hub__body"><?php echo esc_html( $body ); ?></p>
				<?php endif; ?>
			</div>

			<div class="hub__wires" data-animate="hub-lines" aria-hidden="true">
				<svg class="hub__curve hub__curve--top" viewBox="0 0 252 172" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2 2H72.9926C100.504 2 124.937 19.5821 133.677 45.6684L160.702 126.332C169.442 152.418 193.876 170 221.387 170H250" stroke="url(#hub-curve-top)" stroke-width="4" stroke-linecap="round"/>
					<defs>
						<linearGradient id="hub-curve-top" x1="5.31298" y1="-26" x2="265.927" y2="2.22016" gradientUnits="userSpaceOnUse">
							<stop stop-color="#D1E2FF"/>
							<stop offset="1" stop-color="#528CED" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
				<svg class="hub__curve hub__curve--mid" viewBox="0 0 252 62" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2 2H91.9732C109.28 2 125.849 9.00902 137.901 21.4288L156.478 40.5713C168.531 52.991 185.1 60 202.407 60H250" stroke="url(#hub-curve-mid)" stroke-width="4" stroke-linecap="round"/>
					<defs>
						<linearGradient id="hub-curve-mid" x1="5.31298" y1="-7.66667" x2="245.367" y2="67.626" gradientUnits="userSpaceOnUse">
							<stop stop-color="#D1E2FF"/>
							<stop offset="1" stop-color="#528CED" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
				<svg class="hub__curve hub__curve--low" viewBox="0 0 252 60" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2 2H92.6326C109.55 2 125.779 8.69812 137.772 20.6299L156.608 39.3701C168.601 51.3019 184.83 58 201.747 58H250" stroke="url(#hub-curve-low)" stroke-width="4" stroke-linecap="round"/>
					<defs>
						<linearGradient id="hub-curve-low" x1="5.31298" y1="-7.33334" x2="243.814" y2="70.1438" gradientUnits="userSpaceOnUse">
							<stop stop-color="#D1E2FF"/>
							<stop offset="1" stop-color="#528CED" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
				<svg class="hub__curve hub__curve--bottom" viewBox="0 0 252 172" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2 2H72.9926C100.504 2 124.937 19.5821 133.677 45.6684L160.702 126.332C169.442 152.418 193.876 170 221.387 170H250" stroke="url(#hub-curve-bottom)" stroke-width="4" stroke-linecap="round"/>
					<defs>
						<linearGradient id="hub-curve-bottom" x1="5.31298" y1="-26" x2="265.927" y2="2.22016" gradientUnits="userSpaceOnUse">
							<stop stop-color="#D1E2FF"/>
							<stop offset="1" stop-color="#528CED" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
				<svg class="hub__line" viewBox="0 0 172 22.0919" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.5 9.54594C0.671573 9.54594 0 10.2175 0 11.0459C0 11.8744 0.671573 12.5459 1.5 12.5459V11.0459V9.54594ZM171.561 12.1066C172.146 11.5208 172.146 10.5711 171.561 9.98528L162.015 0.439341C161.429 -0.146446 160.479 -0.146446 159.893 0.439341C159.308 1.02513 159.308 1.97487 159.893 2.56066L168.379 11.0459L159.893 19.5312C159.308 20.117 159.308 21.0668 159.893 21.6525C160.479 22.2383 161.429 22.2383 162.015 21.6525L171.561 12.1066ZM1.5 11.0459V12.5459H170.5V11.0459V9.54594H1.5V11.0459Z" fill="url(#hub-line-grad)"/>
					<defs>
						<linearGradient id="hub-line-grad" x1="10.6802" y1="11.5459" x2="170.5" y2="11.5459" gradientUnits="userSpaceOnUse">
							<stop stop-color="#2269FF" stop-opacity="0"/>
							<stop offset="1" stop-color="#91C6FF"/>
						</linearGradient>
					</defs>
				</svg>
			</div>
			<div class="hub__nodes" aria-hidden="true">
				<?php
				$hub_nodes = array(
					array( 545, 349 ),
					array( 609, 493 ),
					array( 532, 566 ),
					array( 598, 599 ),
					array( 943, 509 ),
				);
				foreach ( $hub_nodes as $node ) :
					?>
					<span class="hub__node" style="left:<?php echo (int) $node[0]; ?>px;top:<?php echo (int) $node[1]; ?>px"></span>
				<?php endforeach; ?>
			</div>

			<div class="hub__core" data-animate="group" aria-hidden="true">
				<div class="hub__rings">
					<span class="hub__ring hub__ring--outer"></span>
					<span class="hub__ring hub__ring--inner"></span>
				</div>
				<span class="hub__core-disc">
					<svg class="hub__core-mark" viewBox="190.9 189.6 62.4 63.7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M207.45 195.648C212.894 191.219 221.358 189.34 227.015 189.639C233.736 189.994 235.432 190.466 242.506 192.686L235.741 202.148C232.099 199.445 227.762 197.88 223.259 197.642C218.755 197.404 214.277 198.504 210.368 200.809L207.45 195.648Z" fill="white"/>
						<path d="M247.369 206.481C251.706 212.041 253.546 220.682 253.254 226.459C252.906 233.321 252.444 235.052 250.27 242.276L241.003 235.368C243.65 231.649 245.183 227.222 245.416 222.623C245.649 218.024 244.571 213.452 242.315 209.461L247.369 206.481Z" fill="white"/>
						<path d="M236.759 247.241C231.314 251.669 222.851 253.548 217.193 253.25C210.473 252.895 208.777 252.423 201.703 250.203L208.468 240.741C212.11 243.444 216.446 245.009 220.95 245.247C225.454 245.484 229.932 244.384 233.841 242.08L236.759 247.241Z" fill="white"/>
						<path d="M196.84 236.407C192.503 230.848 190.662 222.207 190.955 216.43C191.302 209.568 191.765 207.836 193.939 200.613L203.206 207.521C200.559 211.24 199.026 215.667 198.793 220.266C198.56 224.864 199.637 229.437 201.894 233.428L196.84 236.407Z" fill="white"/>
						<path d="M232.726 221.191C232.726 227.321 227.86 232.29 221.857 232.29C215.853 232.29 210.987 227.321 210.987 221.191C210.987 215.062 215.853 210.093 221.857 210.093C227.86 210.093 232.726 215.062 232.726 221.191Z" fill="white"/>
					</svg>
				</span>
			</div>

			<?php if ( $items ) : ?>
				<ul class="hub__tiles" data-animate="stagger">
					<?php foreach ( $items as $item ) : ?>
						<?php
						$icon_id = ! empty( $item['icon'] ) ? (int) $item['icon'] : 0;
						$well    = ! empty( $item['well'] ) ? $item['well'] : '';
						$mark    = ! empty( $item['mark'] ) ? $item['mark'] : 'none';
						$tight   = ( 'Apple Business' === $item['label'] );
						?>
						<li class="hub-tile">
							<div
								class="hub-tile__well<?php echo 'full' === $mark ? ' hub-tile__well--full' : ''; ?>"
								<?php if ( $well && 'full' !== $mark ) : ?>
									style="background: <?php echo esc_attr( $well ); ?>"
								<?php endif; ?>
							>
								<?php if ( in_array( $mark, array( 'gradient', 'brand', 'white' ), true ) ) : ?>
									<span class="hub-tile__mark hub-tile__mark--<?php echo esc_attr( $mark ); ?>">
										<?php
										if ( $icon_id ) {
											echo wp_get_attachment_image(
												$icon_id,
												'full',
												false,
												array(
													'class' => 'hub-tile__icon hub-tile__icon--glyph',
													'alt'   => '',
												)
											);
										}
										?>
									</span>
								<?php elseif ( $icon_id ) : ?>
									<?php
									echo wp_get_attachment_image(
										$icon_id,
										'full',
										false,
										array(
											'class' => 'hub-tile__icon',
											'alt'   => '',
										)
									);
									?>
								<?php endif; ?>
							</div>
							<p class="hub-tile__label<?php echo $tight ? ' hub-tile__label--tight' : ''; ?>"><?php echo esc_html( $item['label'] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( $messages || $chat_name ) : ?>
				<figure class="hub-chat" data-animate="chat" aria-label="<?php esc_attr_e( 'Shop24 live support conversation', 'orbit' ); ?>">
					<div class="hub-chat__head">
						<div class="hub-chat__person">
							<?php if ( $avatar_id ) : ?>
								<?php
								echo wp_get_attachment_image(
									$avatar_id,
									'full',
									false,
									array(
										'class' => 'hub-chat__avatar',
										'alt'   => '',
									)
								);
								?>
							<?php endif; ?>
							<div class="hub-chat__meta">
								<?php if ( $chat_name ) : ?>
									<p class="hub-chat__name"><?php echo esc_html( $chat_name ); ?></p>
								<?php endif; ?>
								<?php if ( $chat_status ) : ?>
									<p class="hub-chat__status">
										<span class="hub-chat__online" aria-hidden="true"></span>
										<?php echo esc_html( $chat_status ); ?>
									</p>
								<?php endif; ?>
							</div>
						</div>
						<span class="hub-chat__menu" aria-hidden="true"></span>
					</div>

					<?php
					$bubble_i = 0;
					foreach ( $messages as $message ) :
						$bubble_i++;
						$role = ( 'user' === ( $message['role'] ?? '' ) ) ? 'user' : 'agent';
						$slot = 'user' === $role ? 'user' : ( 2 === $bubble_i ? 'reply' : 'delivery' );
						?>
						<div class="hub-chat__bubble hub-chat__bubble--<?php echo esc_attr( $role ); ?> hub-chat__bubble--<?php echo esc_attr( $slot ); ?>">
							<p class="hub-chat__text"><?php echo nl2br( esc_html( $message['text'] ) ); ?></p>
							<?php if ( ! empty( $message['time'] ) ) : ?>
								<span class="hub-chat__time"><?php echo esc_html( $message['time'] ); ?></span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>

					<div class="hub-chat__composer" aria-hidden="true">
						<div class="hub-chat__field">
							<span class="hub-chat__placeholder"><?php echo esc_html( $placeholder ? $placeholder : 'Message...' ); ?></span>
							<svg class="hub-chat__attach" viewBox="0 0 20.1871 18.2372" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="M5.27147 18.2371C4.22884 18.2375 3.20955 17.9285 2.34258 17.3493C1.4756 16.7702 0.799908 15.9468 0.40099 14.9835C0.00207076 14.0203 -0.102142 12.9603 0.101537 11.9377C0.305216 10.9152 0.807633 9.97606 1.54522 9.23914L9.32313 1.46031C9.45211 1.33134 9.62703 1.25888 9.80942 1.25888C9.99182 1.25888 10.1667 1.33134 10.2957 1.46031C10.4247 1.58928 10.4971 1.76421 10.4971 1.9466C10.4971 2.129 10.4247 2.30392 10.2957 2.43289L2.51688 10.2108C2.14029 10.5692 1.83923 10.9993 1.63144 11.4759C1.42366 11.9524 1.31335 12.4657 1.30702 12.9855C1.30069 13.5054 1.39846 14.0212 1.59457 14.5027C1.79069 14.9841 2.08118 15.4214 2.44894 15.7889C2.81669 16.1563 3.25427 16.4465 3.73589 16.6422C4.21751 16.8379 4.73343 16.9352 5.25325 16.9285C5.77308 16.9217 6.28629 16.811 6.76265 16.6028C7.23902 16.3946 7.6689 16.0932 8.02697 15.7163L18.0736 5.66964C18.534 5.19423 18.7891 4.55689 18.7838 3.89511C18.7784 3.23334 18.5132 2.60017 18.0452 2.13221C17.5773 1.66425 16.9441 1.399 16.2823 1.39369C15.6206 1.38838 14.9832 1.64342 14.5078 2.10381L6.4063 10.2108C6.19139 10.4257 6.07065 10.7172 6.07065 11.0211C6.07065 11.3251 6.19139 11.6166 6.4063 11.8315C6.62121 12.0464 6.9127 12.1671 7.21663 12.1671C7.52057 12.1671 7.81205 12.0464 8.02697 11.8315L13.2107 6.64681C13.2741 6.58112 13.3499 6.52871 13.4338 6.49264C13.5177 6.45657 13.6079 6.43756 13.6992 6.43672C13.7904 6.43589 13.881 6.45324 13.9655 6.48777C14.05 6.5223 14.1268 6.57331 14.1914 6.63783C14.2559 6.70235 14.307 6.77909 14.3416 6.86356C14.3762 6.94804 14.3937 7.03856 14.3929 7.12984C14.3922 7.22113 14.3733 7.31135 14.3373 7.39524C14.3013 7.47914 14.2489 7.55503 14.1833 7.61848L8.99863 12.8041C8.5259 13.2769 7.88468 13.5426 7.21604 13.5427C6.5474 13.5428 5.90612 13.2773 5.43326 12.8045C4.9604 12.3318 4.6947 11.6906 4.69461 11.0219C4.69453 10.3533 4.96006 9.712 5.4328 9.23914L13.5361 1.14131C14.2667 0.410627 15.2576 8.59677e-05 16.2909 1.34997e-08C17.3241 -8.59407e-05 18.3151 0.410291 19.0458 1.14085C19.7764 1.87141 20.187 2.86231 20.1871 3.89557C20.1872 4.92882 19.7768 5.9198 19.0462 6.65048L8.99955 16.6935C8.51103 17.1844 7.93001 17.5737 7.29009 17.8386C6.65017 18.1036 5.96407 18.2391 5.27147 18.2371Z" fill="#6B7280"/>
							</svg>
						</div>
						<span class="hub-chat__send">
							<svg viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M15.7379 6.26216L8.47781 11.3028L0.884122 8.77121C0.35407 8.59417 -0.00303035 8.09686 1.9383e-05 7.53816C0.00310925 6.97945 0.364302 6.4852 0.896401 6.31433L20.3109 0.062168C20.7723 -0.0861856 21.2789 0.0355631 21.6217 0.378378C21.9645 0.721192 22.0863 1.22769 21.9379 1.6892L15.6857 21.1036C15.5148 21.6357 15.0206 21.9969 14.4619 22C13.9032 22.0031 13.4059 21.646 13.2288 21.1159L10.685 13.4854L15.7379 6.26216Z" fill="white"/>
							</svg>
						</span>
					</div>
				</figure>
			<?php endif; ?>
		</div>
	</div>
</section>
