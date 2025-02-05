/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

    // Site title
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title' ).text( to );
        } );
    } );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative',
                    'color': to
				} );
			}
		} );
	} );

} )( jQuery );


const myFunction = () => {
  document.getElementById("first").style.display ='block';
  document.getElementById("second").style.display ='none'
  document.getElementById("third").style.display ='none'
}

const myFunction2 = () => {
  document.getElementById("second").style.display ='block'
  document.getElementById("first").style.display ='none'
  document.getElementById("third").style.display ='none'
}

const myFunction3 = () => {
  document.getElementById("third").style.display ='block'
  document.getElementById("first").style.display ='none'
  document.getElementById("second").style.display ='none'
}



