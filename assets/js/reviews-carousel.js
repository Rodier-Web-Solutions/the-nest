/**
 * Nest Reviews Carousel
 *
 * Shows 3 cards at a time, advances 1 at a time, infinite loop via cloning.
 * Auto-plays every data-interval ms. Pauses on hover or focus.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		document.querySelectorAll( '.nest-reviews' ).forEach( initCarousel );
	} );

	function initCarousel( root ) {
		var track    = root.querySelector( '.nest-reviews__track' );
		var viewport = root.querySelector( '.nest-reviews__viewport' );
		var btnPrev  = root.querySelector( '.nest-reviews__btn--prev' );
		var btnNext  = root.querySelector( '.nest-reviews__btn--next' );
		var dotsWrap = root.querySelector( '.nest-reviews__dots' );
		var INTERVAL = parseInt( root.dataset.interval, 10 ) || 3000;
		var CLONES   = 3; // clones prepended/appended for seamless wrap

		var realCards = Array.from( track.querySelectorAll( '.nest-reviews__card' ) );
		var total     = realCards.length;

		// Need at least 2 cards to bother with a carousel
		if ( total < 2 ) {
			btnPrev.hidden = true;
			btnNext.hidden = true;
			dotsWrap.hidden = true;
			return;
		}

		// ── Clone cards for infinite scroll ────────────────────────────────
		// Prepend clones of the last N real cards (so sliding backward wraps)
		realCards.slice( -CLONES ).forEach( function ( card ) {
			var clone = card.cloneNode( true );
			clone.setAttribute( 'aria-hidden', 'true' );
			track.insertBefore( clone, track.firstChild );
		} );

		// Append clones of the first N real cards (so sliding forward wraps)
		realCards.slice( 0, CLONES ).forEach( function ( card ) {
			var clone = card.cloneNode( true );
			clone.setAttribute( 'aria-hidden', 'true' );
			track.appendChild( clone );
		} );

		var allCards = Array.from( track.querySelectorAll( '.nest-reviews__card' ) );

		// ── Dot indicators ─────────────────────────────────────────────────
		var dots = realCards.map( function ( _, i ) {
			var btn = document.createElement( 'button' );
			btn.className = 'nest-reviews__dot';
			btn.setAttribute( 'role', 'tab' );
			btn.setAttribute( 'aria-label', 'Go to review ' + ( i + 1 ) );
			btn.setAttribute( 'tabindex', i === 0 ? '0' : '-1' );
			btn.addEventListener( 'click', function () {
				stopAuto();
				goTo( i, true );
				startAuto();
			} );
			dotsWrap.appendChild( btn );
			return btn;
		} );

		// ── State ──────────────────────────────────────────────────────────
		var current  = 0;   // index into realCards (0-based)
		var moving   = false;
		var timerId  = null;

		// ── Helpers ────────────────────────────────────────────────────────

		/**
		 * Returns pixels from left edge of card[0] to left edge of card[1].
		 * This is cardWidth + gap, regardless of what CSS produced them.
		 */
		function cardStep() {
			var a = allCards[ 0 ].getBoundingClientRect();
			var b = allCards[ 1 ].getBoundingClientRect();
			return Math.round( b.left - a.left );
		}

		/** Move track to show realCard[index] as the first visible card. */
		function translate( index, animate ) {
			var step   = cardStep();
			var offset = ( CLONES + index ) * step;
			track.style.transition = animate
				? 'transform 0.55s cubic-bezier(0.25, 0.46, 0.45, 0.94)'
				: 'none';
			track.style.transform = 'translateX(' + ( -offset ) + 'px)';
		}

		function syncDots() {
			dots.forEach( function ( dot, i ) {
				var active = ( i === current );
				dot.classList.toggle( 'is-active', active );
				dot.setAttribute( 'aria-selected', active ? 'true' : 'false' );
				dot.setAttribute( 'tabindex', active ? '0' : '-1' );
			} );
		}

		/** Jump straight to index (no slide animation unless animate=true). */
		function goTo( index, animate ) {
			current = ( ( index % total ) + total ) % total;
			translate( current, animate );
			syncDots();
		}

		/**
		 * Slide one step in direction dir (+1 = forward, -1 = backward).
		 * Handles infinite wrap by animating to a clone, then snapping to
		 * the equivalent real card once the CSS transition ends.
		 */
		function slide( dir ) {
			if ( moving ) return;
			moving = true;

			var next     = current + dir;
			var step     = cardStep();
			var offset   = ( CLONES + next ) * step;

			track.style.transition = 'transform 0.55s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
			track.style.transform  = 'translateX(' + ( -offset ) + 'px)';

			var wrapped = ( ( next % total ) + total ) % total;

			track.addEventListener( 'transitionend', function onEnd() {
				track.removeEventListener( 'transitionend', onEnd );
				// If we landed on a clone position, snap silently to the real card
				if ( next < 0 || next >= total ) {
					current = wrapped;
					translate( current, false );
				} else {
					current = wrapped;
				}
				syncDots();
				moving = false;
			}, { once: true } );
		}

		// ── Auto-play ──────────────────────────────────────────────────────

		function startAuto() {
			if ( timerId ) return;
			timerId = setInterval( function () {
				slide( 1 );
			}, INTERVAL );
		}

		function stopAuto() {
			clearInterval( timerId );
			timerId = null;
		}

		// ── Init ───────────────────────────────────────────────────────────
		// Use rAF so cards have been laid out and getBoundingClientRect works
		requestAnimationFrame( function () {
			translate( 0, false );
			syncDots();
			startAuto();
		} );

		// ── Controls ───────────────────────────────────────────────────────
		btnPrev.addEventListener( 'click', function () {
			stopAuto();
			slide( -1 );
			startAuto();
		} );

		btnNext.addEventListener( 'click', function () {
			stopAuto();
			slide( 1 );
			startAuto();
		} );

		// Pause on hover or keyboard focus entering the carousel
		root.addEventListener( 'mouseenter', stopAuto );
		root.addEventListener( 'mouseleave', startAuto );
		root.addEventListener( 'focusin',    stopAuto );
		root.addEventListener( 'focusout', function ( e ) {
			if ( ! root.contains( e.relatedTarget ) ) startAuto();
		} );

		// Recalculate translation on resize (card widths change)
		var resizeTimer;
		window.addEventListener( 'resize', function () {
			clearTimeout( resizeTimer );
			resizeTimer = setTimeout( function () {
				translate( current, false );
			}, 150 );
		} );
	}

} )();
