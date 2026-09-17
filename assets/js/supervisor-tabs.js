/**
 * Supervisor feature tabs — vertical list, one open panel, fade in.
 * Auto-advances while the section is on screen.
 */
( function () {
	var list = document.querySelector( '.sup-list' );
	if ( ! list ) {
		return;
	}

	if ( window.__orbitSupTabsStop ) {
		window.__orbitSupTabsStop();
	}

	var tabs = list.querySelectorAll( '[role="tab"]' );
	var reduce = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var dwell = 5000;
	var timer = null;
	var lastAdvance = 0;
	var paused = false;
	var inView = false;

	function activate( next ) {
		if ( ! next || next.getAttribute( 'aria-selected' ) === 'true' ) {
			return;
		}

		tabs.forEach( function ( tab ) {
			var selected = tab === next;
			var feat = tab.closest( '.sup-feat' );
			tab.setAttribute( 'aria-selected', selected ? 'true' : 'false' );
			tab.tabIndex = selected ? 0 : -1;
			if ( feat ) {
				feat.classList.toggle( 'is-active', selected );
			}

			var panel = document.getElementById( tab.getAttribute( 'aria-controls' ) );
			if ( ! panel ) {
				return;
			}
			if ( selected ) {
				panel.removeAttribute( 'hidden' );
			} else {
				panel.setAttribute( 'hidden', '' );
			}
		} );
	}

	function currentIndex() {
		var i;
		for ( i = 0; i < tabs.length; i++ ) {
			if ( tabs[ i ].getAttribute( 'aria-selected' ) === 'true' ) {
				return i;
			}
		}
		return 0;
	}

	function markTick( now ) {
		lastAdvance = now;
		list.setAttribute( 'data-sup-tick', String( now ) );
	}

	function advance() {
		var now = Date.now();
		var prev = parseInt( list.getAttribute( 'data-sup-tick' ) || String( lastAdvance ), 10 );
		if ( ! tabs.length || now - prev < dwell - 50 ) {
			return;
		}
		markTick( now );
		activate( tabs[ ( currentIndex() + 1 ) % tabs.length ] );
	}

	function stop() {
		if ( timer ) {
			clearTimeout( timer );
			timer = null;
		}
	}

	window.__orbitSupTabsStop = stop;

	function tick() {
		timer = null;
		if ( reduce || paused || ! inView ) {
			return;
		}
		advance();
		play();
	}

	function play() {
		if ( reduce || paused || ! inView || tabs.length < 2 || timer ) {
			return;
		}
		timer = setTimeout( tick, dwell );
	}

	function restart() {
		stop();
		markTick( Date.now() );
		play();
	}

	list.addEventListener( 'click', function ( event ) {
		var tab = event.target.closest( '[role="tab"]' );
		if ( tab && list.contains( tab ) ) {
			activate( tab );
			restart();
		}
	} );

	list.addEventListener( 'keydown', function ( event ) {
		var current = document.activeElement;
		if ( ! current || current.getAttribute( 'role' ) !== 'tab' || ! list.contains( current ) ) {
			return;
		}

		var index = Array.prototype.indexOf.call( tabs, current );
		var nextIndex = -1;

		if ( event.key === 'ArrowDown' || event.key === 'ArrowRight' ) {
			nextIndex = ( index + 1 ) % tabs.length;
		} else if ( event.key === 'ArrowUp' || event.key === 'ArrowLeft' ) {
			nextIndex = ( index - 1 + tabs.length ) % tabs.length;
		} else if ( event.key === 'Home' ) {
			nextIndex = 0;
		} else if ( event.key === 'End' ) {
			nextIndex = tabs.length - 1;
		}

		if ( nextIndex < 0 ) {
			return;
		}

		event.preventDefault();
		tabs[ nextIndex ].focus();
		activate( tabs[ nextIndex ] );
		restart();
	} );

	function syncPause() {
		var canHover = window.matchMedia( '(hover: hover)' ).matches;
		paused = ( canHover && list.matches( ':hover' ) ) || list.contains( document.activeElement );
		if ( paused ) {
			stop();
		} else {
			play();
		}
	}

	list.addEventListener( 'mouseenter', syncPause );
	list.addEventListener( 'mouseleave', syncPause );
	list.addEventListener( 'focusin', syncPause );
	list.addEventListener( 'focusout', syncPause );

	document.addEventListener( 'visibilitychange', function () {
		if ( document.hidden ) {
			stop();
		} else {
			play();
		}
	} );

	if ( reduce ) {
		return;
	}

	var section = list.closest( '.sup' ) || list;

	function sectionInView() {
		var r = section.getBoundingClientRect();
		return r.bottom > 80 && r.top < window.innerHeight - 80;
	}

	function syncView() {
		inView = sectionInView();
		if ( inView ) {
			play();
		} else {
			stop();
		}
	}

	syncView();
	window.addEventListener( 'scroll', syncView, { passive: true } );
	window.addEventListener( 'resize', syncView );

	if ( 'IntersectionObserver' in window ) {
		var io = new IntersectionObserver( syncView, { threshold: 0.15 } );
		io.observe( section );
	}
} )();
