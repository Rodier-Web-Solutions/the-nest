/**
 * Nest Theme — Global JS
 */
( function () {
	'use strict';

	// ── Lucide Icons ──────────────────────────────────────────────────────
	// Renders any <i data-lucide="icon-name"></i> elements on the page.
	// The lucide script is enqueued in functions.php and loaded before this file.
	if ( typeof lucide !== 'undefined' ) {
		lucide.createIcons();
	}

	// ── Hamburger icon swap ────────────────────────────────────────────────
	// Replace WP's default open-menu SVG with a Lucide "menu" (3-bar) icon.
	// Done in JS so we don't interfere with the button's click handler or
	// its display state (which WP toggles via its own CSS/JS).
	var hamburgerBtn = document.querySelector(
		'.site-header .wp-block-navigation__responsive-container-open'
	);
	if ( hamburgerBtn && typeof lucide !== 'undefined' ) {
		var oldSvg = hamburgerBtn.querySelector( 'svg' );
		if ( oldSvg ) {
			var menuIcon = document.createElement( 'i' );
			menuIcon.setAttribute( 'data-lucide', 'menu' );
			menuIcon.setAttribute( 'aria-hidden', 'true' );
			oldSvg.parentNode.replaceChild( menuIcon, oldSvg );
			lucide.createIcons( { nodes: [ hamburgerBtn ] } );
		}
	}

	// ── Layout offsets ────────────────────────────────────────────────────
	// Both the alerts bar and the fixed header sit at the top of the viewport.
	// JS measures their combined height and writes two CSS custom properties:
	//   --nest-alerts-height  → used by .site-header { top: var(...) }
	//   --nest-header-height  → used by body { padding-top: var(...) }
	// This keeps the page content below both elements at all viewport widths.

	var alertsBar = document.querySelector( '.nest-alerts-bar' );
	var header    = document.querySelector( '.site-header' );

	function updateOffsets() {
		var alertsH = ( alertsBar && ! alertsBar.hidden ) ? alertsBar.offsetHeight : 0;
		var headerH = header ? header.offsetHeight : 0;

		document.documentElement.style.setProperty( '--nest-alerts-height', alertsH + 'px' );
		document.documentElement.style.setProperty( '--nest-header-height', ( alertsH + headerH ) + 'px' );
	}

	// Run immediately, after fonts load (can shift heights), and on resize
	updateOffsets();

	if ( document.fonts && document.fonts.ready ) {
		document.fonts.ready.then( updateOffsets );
	}

	window.addEventListener( 'resize', updateOffsets );

	// ── Header: shrink logo on scroll ────────────────────────────────────
	// Adds .is-scrolled to the header once the page is scrolled past a small
	// threshold. CSS transitions the logo from scale(1.5) → scale(1).
	// Offsets are recalculated after the transition so body padding stays correct.

	if ( header ) {
		var scrolled = false;

		function onScroll() {
			var shouldScroll = window.scrollY > 10;
			if ( shouldScroll === scrolled ) return;

			scrolled = shouldScroll;
			header.classList.toggle( 'is-scrolled', scrolled );

			// Re-measure after the 0.4s CSS transition finishes
			setTimeout( updateOffsets, 420 );
		}

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll(); // handle case where page is already scrolled on load
	}

	// ── Alert dismissal ───────────────────────────────────────────────────
	// Dismissed alerts are stored in localStorage so they stay hidden
	// across page loads until the browser storage is cleared.

	if ( alertsBar ) {
		// On load: hide any alerts the visitor already dismissed
		alertsBar.querySelectorAll( '.nest-alert[data-alert-id]' ).forEach( function ( el ) {
			if ( localStorage.getItem( 'nest-alert-dismissed-' + el.dataset.alertId ) ) {
				el.hidden = true;
			}
		} );

		// Hide the entire bar when no alerts remain visible; recalculate offsets
		function syncAlertsBar() {
			var anyVisible = alertsBar.querySelector( '.nest-alert:not([hidden])' );
			alertsBar.hidden = ! anyVisible;
			updateOffsets();
		}

		syncAlertsBar();

		// Wire each dismiss button
		alertsBar.querySelectorAll( '.nest-alert__dismiss' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var alert = btn.closest( '.nest-alert' );
				if ( ! alert ) return;

				alert.hidden = true;

				var id = alert.dataset.alertId;
				if ( id ) {
					localStorage.setItem( 'nest-alert-dismissed-' + id, '1' );
				}

				syncAlertsBar();
			} );
		} );
	}

} )();
