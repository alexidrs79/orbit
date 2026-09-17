/**
 * Mobile header menu — hamburger toggle, slide-in panel, backdrop.
 * Same contract as Snap / Lucibook. Breakpoint matches style.css
 * @media (max-width: 900px).
 */
( function () {
	var toggle = document.querySelector( '.site-header__menu-toggle' );
	var panel = document.querySelector( '.mobile-menu-panel' );
	var backdrop = document.querySelector( '.mobile-menu-backdrop' );

	if ( ! toggle || ! panel || ! backdrop ) {
		return;
	}

	var closeButton = panel.querySelector( '.mobile-menu-panel__close' );
	var panelLinks = panel.querySelectorAll( 'a' );
	var lastFocus = null;
	var SCROLL_KEYS = [ 'ArrowUp', 'ArrowDown', 'PageUp', 'PageDown', 'Home', 'End', ' ' ];
	var FOCUSABLE = 'a[href], button:not([disabled])';

	function isOpen() {
		return panel.classList.contains( 'is-open' );
	}

	function getFocusables() {
		return panel.querySelectorAll( FOCUSABLE );
	}

	function preventBackgroundScroll( event ) {
		if ( ! panel.contains( event.target ) ) {
			event.preventDefault();
		}
	}

	function preventScrollKeys( event ) {
		if ( SCROLL_KEYS.indexOf( event.key ) !== -1 && ! panel.contains( event.target ) ) {
			event.preventDefault();
		}
	}

	function trapFocus( event ) {
		if ( ! isOpen() || event.key !== 'Tab' ) {
			return;
		}

		var nodes = getFocusables();
		if ( ! nodes.length ) {
			return;
		}

		var first = nodes[ 0 ];
		var last = nodes[ nodes.length - 1 ];

		if ( event.shiftKey && document.activeElement === first ) {
			event.preventDefault();
			last.focus();
		} else if ( ! event.shiftKey && document.activeElement === last ) {
			event.preventDefault();
			first.focus();
		}
	}

	function openMenu() {
		lastFocus = document.activeElement;
		panel.classList.add( 'is-open' );
		backdrop.classList.add( 'is-open' );
		toggle.setAttribute( 'aria-expanded', 'true' );
		toggle.setAttribute( 'aria-label', 'Close menu' );
		panel.setAttribute( 'aria-hidden', 'false' );

		document.documentElement.classList.add( 'mobile-menu-lock' );
		document.body.classList.add( 'mobile-menu-lock' );
		document.addEventListener( 'wheel', preventBackgroundScroll, { passive: false } );
		document.addEventListener( 'touchmove', preventBackgroundScroll, { passive: false } );
		document.addEventListener( 'keydown', preventScrollKeys, false );

		var first = getFocusables()[ 0 ];
		if ( first ) {
			first.focus();
		}
	}

	function closeMenu() {
		panel.classList.remove( 'is-open' );
		backdrop.classList.remove( 'is-open' );
		toggle.setAttribute( 'aria-expanded', 'false' );
		toggle.setAttribute( 'aria-label', 'Open menu' );
		panel.setAttribute( 'aria-hidden', 'true' );

		document.documentElement.classList.remove( 'mobile-menu-lock' );
		document.body.classList.remove( 'mobile-menu-lock' );
		document.removeEventListener( 'wheel', preventBackgroundScroll );
		document.removeEventListener( 'touchmove', preventBackgroundScroll );
		document.removeEventListener( 'keydown', preventScrollKeys );

		if ( lastFocus && typeof lastFocus.focus === 'function' ) {
			lastFocus.focus();
		} else {
			toggle.focus();
		}
	}

	toggle.addEventListener( 'click', function () {
		if ( isOpen() ) {
			closeMenu();
		} else {
			openMenu();
		}
	} );

	if ( closeButton ) {
		closeButton.addEventListener( 'click', closeMenu );
	}

	backdrop.addEventListener( 'click', closeMenu );

	panelLinks.forEach( function ( link ) {
		link.addEventListener( 'click', closeMenu );
	} );

	document.addEventListener( 'keydown', function ( event ) {
		if ( ! isOpen() ) {
			return;
		}

		if ( 'Escape' === event.key ) {
			closeMenu();
			return;
		}

		trapFocus( event );
	} );

	var aboveMobileBreakpoint = window.matchMedia( '(min-width: 901px)' );

	function handleBreakpointChange( event ) {
		if ( event.matches && isOpen() ) {
			closeMenu();
		}
	}

	if ( aboveMobileBreakpoint.addEventListener ) {
		aboveMobileBreakpoint.addEventListener( 'change', handleBreakpointChange );
	} else if ( aboveMobileBreakpoint.addListener ) {
		aboveMobileBreakpoint.addListener( handleBreakpointChange );
	}
} )();
