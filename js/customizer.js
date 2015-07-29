/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	wp.customize( 'intemporel_text_color', function ( value ) {
		value.bind ( function ( to ) {
			$( 'body, input, select, textarea' ).css( 'color', to );
		});
	}); 

	wp.customize( 'intemporel_primary_light', function ( value ) {
		value.bind ( function ( to ) {
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"], .site-branding' ).css( 'background', to );
			$( '.entry-content a, .site-footer a, .widget-area a, .entry-title a:hover' ).css( 'color', to );
			$( '.site-footer' ).css( 'border-color', to );
		});
	}); 

	wp.customize( 'intemporel_primary_dark', function ( value ) {
		value.bind ( function ( to ) {
			$( 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .menu-toggle:hover span, .menu-toggle:active span, .search-toggle:hover span, .search-toggle:active span, .search-field' ).css( 'background', to );
			$( '.search-field' ).css( 'border-color', to );
		});
	}); 

	wp.customize( 'intemporel_secondary_light', function ( value ) {
		value.bind ( function ( to ) {
			$( 'a:hover, a:focus, a:active, .excerpt .entry-meta a' ).css( 'color', to );
			$( '.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a' ).css( 'border-color', to );
		});
	}); 

	wp.customize( 'intemporel_menu_hover_border', function ( value ) {
		value.bind ( function ( to ) {
			$( 'main-navigation a:hover' ).css( 'border-color', to );
		});
	});

} )( jQuery );
