/**
 * Pricing snap strip — dots follow the visible card. Phone only.
 */
( function () {
	var grid = document.querySelector( '.price__grid' );
	var dots = document.querySelector( '.price__dots' );
	if ( ! grid || ! dots ) {
		return;
	}

	var cards = grid.querySelectorAll( '.price-card' );
	if ( cards.length < 2 ) {
		return;
	}

	function isPhone() {
		return window.matchMedia( '(max-width: 560px)' ).matches;
	}

	function currentIndex() {
		var left = grid.scrollLeft;
		var i;
		var best = 0;
		var bestDist = Infinity;
		for ( i = 0; i < cards.length; i++ ) {
			var dist = Math.abs( cards[ i ].offsetLeft - left );
			if ( dist < bestDist ) {
				bestDist = dist;
				best = i;
			}
		}
		return best;
	}

	function paint() {
		if ( ! isPhone() ) {
			dots.hidden = true;
			return;
		}
		dots.hidden = false;
		var active = currentIndex();
		var buttons = dots.querySelectorAll( 'button' );
		buttons.forEach( function ( btn, i ) {
			btn.setAttribute( 'aria-current', i === active ? 'true' : 'false' );
		} );
	}

	if ( ! dots.children.length ) {
		cards.forEach( function ( card, i ) {
			var btn = document.createElement( 'button' );
			btn.type = 'button';
			btn.className = 'price__dot-btn';
			btn.setAttribute( 'aria-label', 'Rate ' + ( i + 1 ) );
			btn.addEventListener( 'click', function () {
				try {
					var scrolled = card.scrollIntoView( { inline: 'start', block: 'nearest', behavior: 'smooth' } );
					if ( scrolled && typeof scrolled.catch === 'function' ) {
						scrolled.catch( function () {} );
					}
				} catch ( err ) {}
			} );
			dots.appendChild( btn );
		} );
	}

	grid.addEventListener( 'scroll', paint, { passive: true } );
	window.addEventListener( 'resize', paint );
	paint();
} )();
