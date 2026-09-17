/**
 * Developers code card tabs — stream.ts / send.py / cURL.
 */
( function () {
	var list = document.querySelector( '.dev-code__tabs' );
	if ( ! list ) {
		return;
	}

	var tabs = list.querySelectorAll( '[role="tab"]' );

	function activate( next ) {
		tabs.forEach( function ( tab ) {
			var selected = tab === next;
			tab.classList.toggle( 'is-active', selected );
			tab.setAttribute( 'aria-selected', selected ? 'true' : 'false' );
			tab.tabIndex = selected ? 0 : -1;

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

	list.addEventListener( 'click', function ( event ) {
		var tab = event.target.closest( '[role="tab"]' );
		if ( tab && list.contains( tab ) ) {
			activate( tab );
		}
	} );

	list.addEventListener( 'keydown', function ( event ) {
		var current = document.activeElement;
		if ( ! current || current.getAttribute( 'role' ) !== 'tab' || ! list.contains( current ) ) {
			return;
		}

		var index = Array.prototype.indexOf.call( tabs, current );
		var nextIndex = -1;

		if ( event.key === 'ArrowRight' ) {
			nextIndex = ( index + 1 ) % tabs.length;
		} else if ( event.key === 'ArrowLeft' ) {
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
	} );
} )();
