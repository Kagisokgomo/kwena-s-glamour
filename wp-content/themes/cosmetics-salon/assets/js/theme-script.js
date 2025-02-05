function cosmetics_salon_openNav() {
  jQuery(".sidenav").addClass('show');
}
function cosmetics_salon_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function cosmetics_salon_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const cosmetics_salon_nav = document.querySelector( '.sidenav' );

      if ( ! cosmetics_salon_nav || ! cosmetics_salon_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...cosmetics_salon_nav.querySelectorAll( 'input, a, button' )],
        cosmetics_salon_lastEl = elements[ elements.length - 1 ],
        cosmetics_salon_firstEl = elements[0],
        cosmetics_salon_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && cosmetics_salon_lastEl === cosmetics_salon_activeEl ) {
        e.preventDefault();
        cosmetics_salon_firstEl.focus();
      }

      if ( shiftKey && tabKey && cosmetics_salon_firstEl === cosmetics_salon_activeEl ) {
        e.preventDefault();
        cosmetics_salon_lastEl.focus();
      }
    } );
  }
  cosmetics_salon_keepFocusInMenu();
} )( window, document );

var cosmetics_salon_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    cosmetics_salon_btn.addClass('show');
  } else {
    cosmetics_salon_btn.removeClass('show');
  }
});

cosmetics_salon_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('#top-slider .owl-carousel');
      owl.owlCarousel({
      margin: 0,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: true,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        },
        1200: {
          items: 1
        }
      },
      autoplayHoverPause : false,
      mouseDrag: true,
      onInitialized: cosmetics_salon_addNumberedDots,
      onChanged: cosmetics_salon_addNumberedDots
    });

    var owl = jQuery('#about-us .owl-carousel');
      owl.owlCarousel({
      margin: 25,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        },
        1000: {
          items: 4
        },
        1200: {
          items: 4
        }
      },
      autoplayHoverPause : false,
      mouseDrag: true,
    });

    function cosmetics_salon_addNumberedDots(event) {
      jQuery('#top-slider .owl-carousel .owl-dot').each(function(index) {
          jQuery(this).html('<span>' + (index + 1) + '</span>');
      });
    }
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery('.header-search-wrapper .search-main').click(function(){
  jQuery('.search-form-main').toggleClass('active-search');
  jQuery('.search-form-main .search-field').focus();
});
