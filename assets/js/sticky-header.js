/**
 * Toggles .is-stuck on .site-header once the page has scrolled past its
 * resting position. CSS fades the bar in and out both ways.
 */
( function () {
	var header = document.querySelector( '.site-header' );
	if ( ! header ) {
		return;
	}

	var ENTER_THRESHOLD = 12;
	var EXIT_THRESHOLD = 4;

	function update() {
		var isStuck = header.classList.contains( 'is-stuck' );

		if ( ! isStuck && window.scrollY > ENTER_THRESHOLD ) {
			header.classList.add( 'is-stuck' );
		} else if ( isStuck && window.scrollY < EXIT_THRESHOLD ) {
			header.classList.remove( 'is-stuck' );
		}
	}

	update();
	window.addEventListener( 'scroll', update, { passive: true } );
} )();
