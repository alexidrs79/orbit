<?php
/**
 * Template part: Developers.
 * Figma: 1:6329, 1441 × 745 at (0, 11487). 17px gap after Network CTA.
 * Glow 1:6330 rounded-rect #325FEC blur 94.1, outside the scaled stage.
 * Binary pattern 1:6331 / 1:6332 from Media Library. Code 1:6340. Copy 48:107.
 * Motion empty — fade copy only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = get_field( 'dev_eyebrow' );
$headline = get_field( 'dev_headline' );
$body     = get_field( 'dev_body' );
$footnote = get_field( 'dev_footnote' );
$pattern  = orbit_get_attachment_id_by_filename( ORBIT_DEV_PATTERN_ID );

if ( ! $eyebrow ) {
	$eyebrow = 'Developers';
}
if ( ! $headline ) {
	$headline = 'Build the way your team works.';
}
if ( ! $body ) {
	$body = 'Visual builders for the whole team — journeys, IVRs, WhatsApp Flows, and AI agents, no code required. Typed SDKs and MCP for your engineers.';
}
if ( ! $footnote ) {
	$footnote = "An MCP server, both ways — your agents call Orbit, and Orbit's AI calls your tools.";
}

$glow_svg = '<svg class="dev-glow__img" viewBox="0 0 1120 981" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><g filter="url(#dev-glow-f)"><rect x="283" y="283" width="554" height="415" rx="163" fill="#325FEC"/></g><defs><filter id="dev-glow-f" x="0" y="0" width="1120" height="981" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="94.1" result="effect1_foregroundBlur"/></filter></defs></svg>';
/*
 * Page-level Ellipse 7479 — 531×531 at (−205, 12037), fill #316BFF
 * opacity 0.3. Developers is at y 11487, so local (−205, 550).
 * Blur pad 62.71% ≈ 333px (stdDeviation 111). Spans into Pricing.
 */
$wash_svg = '<svg class="dev-wash__img" viewBox="0 0 1197 1197" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"><g filter="url(#dev-wash-f)"><ellipse cx="598.5" cy="598.5" rx="265.5" ry="265.5" fill="#316BFF"/></g><defs><filter id="dev-wash-f" x="0" y="0" width="1197" height="1197" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="111" result="effect1_foregroundBlur"/></filter></defs></svg>';
?>
<section class="dev" id="developers">
	<div class="dev__frame">
		<div class="dev__glows" aria-hidden="true">
			<div class="dev-wash">
				<?php echo $wash_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
		<div class="dev__stage">
			<?php if ( $pattern ) : ?>
				<div class="dev-pattern dev-pattern--a" aria-hidden="true">
					<?php
					echo wp_get_attachment_image(
						$pattern,
						'full',
						false,
							array(
								'class'    => 'dev-pattern__img',
								'alt'      => '',
								'loading'  => 'lazy',
								'decoding' => 'async',
								'sizes'    => '440px',
							)
					);
					?>
				</div>
				<div class="dev-pattern dev-pattern--b" aria-hidden="true">
					<?php
					echo wp_get_attachment_image(
						$pattern,
						'full',
						false,
							array(
								'class'    => 'dev-pattern__img',
								'alt'      => '',
								'loading'  => 'lazy',
								'decoding' => 'async',
								'sizes'    => '440px',
							)
					);
					?>
				</div>
			<?php endif; ?>
			<div class="dev-copy" data-animate="fade">
				<div class="dev-copy__lead">
					<p class="dev-copy__eyebrow">
						<span class="dev-copy__dot orbit-pulse-dot" aria-hidden="true"></span>
						<?php echo esc_html( $eyebrow ); ?>
					</p>
					<div class="dev-copy__text">
						<h2 class="dev-copy__headline"><?php echo esc_html( $headline ); ?></h2>
						<p class="dev-copy__body"><?php echo esc_html( $body ); ?></p>
					</div>
				</div>
				<p class="dev-copy__footnote"><?php echo esc_html( $footnote ); ?></p>
			</div>
			<div class="dev-code-fit">
			<div class="dev-glow" aria-hidden="true">
				<?php echo $glow_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="dev-code">
				<div class="dev-code__header">
					<div class="dev-code__lights" aria-hidden="true">
						<span class="dev-code__light"></span>
						<span class="dev-code__light"></span>
						<span class="dev-code__light"></span>
					</div>
					<div class="dev-code__tabs" role="tablist" aria-label="Code examples">
						<button class="dev-code__tab is-active" type="button" role="tab" id="dev-tab-ts" aria-controls="dev-pane-ts" aria-selected="true" tabindex="0">stream.ts</button>
						<button class="dev-code__tab" type="button" role="tab" id="dev-tab-py" aria-controls="dev-pane-py" aria-selected="false" tabindex="-1">send.py</button>
						<button class="dev-code__tab" type="button" role="tab" id="dev-tab-curl" aria-controls="dev-pane-curl" aria-selected="false" tabindex="-1">cURL</button>
					</div>
				</div>
				<div class="dev-code__panes">
					<div class="dev-code__content" id="dev-pane-ts" role="tabpanel" aria-labelledby="dev-tab-ts">
						<p class="dev-code__line"><span class="dev-k">import</span><span class="dev-p"> { </span><span class="dev-i">OrbitClient</span><span class="dev-p"> } </span><span class="dev-k">from</span><span class="dev-p"> </span><span class="dev-s">"@devotel/orbit"</span><span class="dev-p">;</span></p>
						<p class="dev-code__line dev-code__line--blank">&nbsp;</p>
						<p class="dev-code__line"><span class="dev-k">const</span><span class="dev-p"> </span><span class="dev-i">orbit</span><span class="dev-p"> = </span><span class="dev-k">new</span><span class="dev-p"> </span><span class="dev-f">OrbitClient</span><span class="dev-p">({</span></p>
						<p class="dev-code__line"><span class="dev-p">  </span><span class="dev-i">apiKey</span><span class="dev-p">: process.env.</span><span class="dev-i">ORBIT_API_KEY</span><span class="dev-p">,</span></p>
						<p class="dev-code__line"><span class="dev-p">});</span></p>
						<p class="dev-code__line dev-code__line--blank">&nbsp;</p>
						<p class="dev-code__line"><span class="dev-c">// AsyncGenerator&lt;AgentStreamEvent&gt;</span></p>
						<p class="dev-code__line"><span class="dev-k">for await</span><span class="dev-p"> (</span><span class="dev-k">const</span><span class="dev-p"> </span><span class="dev-i">e</span><span class="dev-p"> </span><span class="dev-k">of</span><span class="dev-p"> orbit.agents.</span><span class="dev-f">stream</span><span class="dev-p">(id, {</span></p>
						<p class="dev-code__line"><span class="dev-p">  </span><span class="dev-i">message</span><span class="dev-p">: </span><span class="dev-s">"Where's my order?"</span><span class="dev-p">,</span></p>
						<p class="dev-code__line"><span class="dev-p">})) {</span></p>
						<p class="dev-code__line"><span class="dev-p">  </span><span class="dev-k">if</span><span class="dev-p"> (e.type === </span><span class="dev-s">"token"</span><span class="dev-p">)</span></p>
						<p class="dev-code__line"><span class="dev-p">    process.stdout.</span><span class="dev-f">write</span><span class="dev-p">(e.text);</span></p>
						<p class="dev-code__line"><span class="dev-p">  </span><span class="dev-k">if</span><span class="dev-p"> (e.type === </span><span class="dev-s">"done"</span><span class="dev-p">)</span></p>
						<p class="dev-code__line"><span class="dev-p">    console.</span><span class="dev-f">log</span><span class="dev-p">(</span><span class="dev-s">`cost: ${e.costCents}¢`</span><span class="dev-p">);</span></p>
						<p class="dev-code__line"><span class="dev-p">}</span></p>
					</div>
					<div class="dev-code__content" id="dev-pane-py" role="tabpanel" aria-labelledby="dev-tab-py" hidden>
						<p class="dev-code__line"><span class="dev-k">from</span><span class="dev-p"> os </span><span class="dev-k">import</span><span class="dev-p"> </span><span class="dev-i">environ</span></p>
						<p class="dev-code__line"><span class="dev-k">from</span><span class="dev-p"> orbit </span><span class="dev-k">import</span><span class="dev-p"> </span><span class="dev-i">OrbitClient</span></p>
						<p class="dev-code__line dev-code__line--blank">&nbsp;</p>
						<p class="dev-code__line"><span class="dev-i">orbit</span><span class="dev-p"> = </span><span class="dev-f">OrbitClient</span><span class="dev-p">(</span></p>
						<p class="dev-code__line"><span class="dev-p">    </span><span class="dev-i">api_key</span><span class="dev-p">=environ[</span><span class="dev-s">"ORBIT_API_KEY"</span><span class="dev-p">],</span></p>
						<p class="dev-code__line"><span class="dev-p">)</span></p>
						<p class="dev-code__line dev-code__line--blank">&nbsp;</p>
						<p class="dev-code__line"><span class="dev-c"># AsyncIterator[AgentStreamEvent]</span></p>
						<p class="dev-code__line"><span class="dev-k">async for</span><span class="dev-p"> </span><span class="dev-i">e</span><span class="dev-p"> </span><span class="dev-k">in</span><span class="dev-p"> orbit.agents.</span><span class="dev-f">stream</span><span class="dev-p">(</span></p>
						<p class="dev-code__line"><span class="dev-p">    id,</span></p>
						<p class="dev-code__line"><span class="dev-p">    </span><span class="dev-i">message</span><span class="dev-p">=</span><span class="dev-s">"Where's my order?"</span><span class="dev-p">,</span></p>
						<p class="dev-code__line"><span class="dev-p">):</span></p>
						<p class="dev-code__line"><span class="dev-p">    </span><span class="dev-k">if</span><span class="dev-p"> e.type == </span><span class="dev-s">"token"</span><span class="dev-p">:</span></p>
						<p class="dev-code__line"><span class="dev-p">        </span><span class="dev-f">print</span><span class="dev-p">(e.text, </span><span class="dev-i">end</span><span class="dev-p">=</span><span class="dev-s">""</span><span class="dev-p">)</span></p>
						<p class="dev-code__line"><span class="dev-p">    </span><span class="dev-k">if</span><span class="dev-p"> e.type == </span><span class="dev-s">"done"</span><span class="dev-p">:</span></p>
						<p class="dev-code__line"><span class="dev-p">        </span><span class="dev-f">print</span><span class="dev-p">(</span><span class="dev-s">f"cost: {e.cost_cents}¢"</span><span class="dev-p">)</span></p>
					</div>
					<div class="dev-code__content" id="dev-pane-curl" role="tabpanel" aria-labelledby="dev-tab-curl" hidden>
						<p class="dev-code__line"><span class="dev-c"># POST /v1/agents/:id/stream → AgentStreamEvent</span></p>
						<p class="dev-code__line"><span class="dev-f">curl</span><span class="dev-p"> -N https://api.devotel.com/v1/agents/</span><span class="dev-i">$id</span><span class="dev-p">/stream \</span></p>
						<p class="dev-code__line"><span class="dev-p">  -H </span><span class="dev-s">"Authorization: Bearer $ORBIT_API_KEY"</span><span class="dev-p"> \</span></p>
						<p class="dev-code__line"><span class="dev-p">  -H </span><span class="dev-s">"Accept: text/event-stream"</span><span class="dev-p"> \</span></p>
						<p class="dev-code__line"><span class="dev-p">  -H </span><span class="dev-s">"Content-Type: application/json"</span><span class="dev-p"> \</span></p>
						<p class="dev-code__line"><span class="dev-p">  -d </span><span class="dev-s">"{\"message\": \"Where's my order?\"}"</span></p>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
