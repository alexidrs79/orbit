/**
 * Entrance observers + reduced-motion. Hover/pulse live in CSS.
 * Triggers once; never re-fires on scroll back.
 */
( function () {
	window.addEventListener( 'unhandledrejection', function ( event ) {
		var reason = event.reason;
		var message = reason && ( reason.message || String( reason ) );
		if ( reason && reason.name === 'AbortError' && String( message ).indexOf( 'Transition was skipped' ) !== -1 ) {
			event.preventDefault();
		}
	} );

	var reduce = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var nodes = document.querySelectorAll( '[data-animate]' );

	if ( ! nodes.length ) {
		return;
	}

	if ( reduce || ! ( 'IntersectionObserver' in window ) ) {
		nodes.forEach( function ( el ) {
			el.classList.add( 'is-in' );
		} );
		return;
	}

	function reveal( el ) {
		el.classList.add( 'is-in' );
	}

	function alreadyInView( el ) {
		var r = el.getBoundingClientRect();
		return r.bottom > 40 && r.top < window.innerHeight - 40;
	}

	var io = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting ) {
					return;
				}
				reveal( entry.target );
				io.unobserve( entry.target );
			} );
		},
		{ threshold: 0.05, rootMargin: '0px 0px -40px 0px' }
	);

	nodes.forEach( function ( el ) {
		if ( alreadyInView( el ) ) {
			reveal( el );
			return;
		}
		io.observe( el );
	} );
} )();
