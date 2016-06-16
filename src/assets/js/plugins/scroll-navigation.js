/*
 * Navigation for scroller
 *
 * @version:
 * @author: Hans Christian Reinl <info@drublic.de>
 *
 */
(function ( $, sections, helper ) {
  var _$navigation;

  var _constructNavigation = function () {
    var $navigation = $( '<div id="fp-nav" class="right verticalNavigation">' ).append( '<ul />' );

    sections.navigation.forEach(function ( element, index ) {
      $navigation.find( 'ul' )
        .append( '<li><a href="#' + element + '">' + sections.tooltip[ index ] + '</a></li>' );
    });

    return $navigation;
  };

  var _setNavigationPosition = function ( $navigation ) {
    $navigation.css({
      marginTop: '-' + ( $navigation.height() / 2 ) + 'px'
    });
  };

  var _setHash = helper.throttle(function ( hash ) {
    var href = window.location.href.split('#')[0];
    if ( Modernizr.history ) {
      window.history.pushState( null, null, href + '#' + hash );
    }
  }, 500);

  var _activateSection = function ( id ) {
    _$navigation.find( '.current' )
        .removeClass( 'current' )
    _$navigation.find( '.active' )
          .removeClass( 'active' )
    _$navigation.find( 'a[href="#' + id + '"]' )
        .addClass( '1' )
        .parent()
          .addClass( 'current' );

    _setHash( id );
  };

  var _toggleNavigation = function ( hide ) {
    $( '#fp-nav' ).toggleClass( 'is-hidden', hide );
  };

  var _updateCurrentPosition = function ( event ) {
    var currentScrollTop = $( '.js-video-scroll__wrapper' ).scrollTop();

    sections.offsets.forEach(function ( element, index ) {
      var top = element.top;

      if ( index === sections.offsets.length - 1 ) {
        top -= sections.headerHeight;
      }

      if ( currentScrollTop >= top && currentScrollTop < element.bottom ) {
        _activateSection( sections.navigation[ index ] );

        _toggleNavigation( index === sections.offsets.length - 1 );
      }

    });
  };

  var _scrollToSection = function ( selector ) {
    var valid = false;
    var offsetTop;

    sections.navigation.forEach(function ( element, index ) {
      if ( selector.replace( '#', '' ) === element ) {
        valid = index;
      }
    });

    if ( valid === false ) {
      return;
    }

    currentOffset = $( '.js-video-scroll__wrapper' ).scrollTop();

    if ( sections.offsets[ valid ] ) {
      offsetTop = sections.offsets[ valid ].top + 160;

      if ( selector === '#products' ) {
        offsetTop = $( selector ).offset().top + currentOffset;
      } else if ( selector === '#video' ) {
        offsetTop = 0;
      }
    }

    $( '.js-video-scroll__wrapper' ).animate({
      scrollTop: offsetTop
    }, Math.abs( currentOffset - offsetTop ));
  };


  /**
   * Initialize vertical scroll navigation
   */
  var init = function () {

    // Only technology site
    if ( $( '.technologyVideo' ).length === 0 ) {
      return;
    }

    if ( Modernizr.mq('screen and (max-width: 1259px)') ) {
      return;
    }

    _$navigation = _constructNavigation();
    _$navigation.appendTo( 'body' );

    _setNavigationPosition( _$navigation );

    // Listen to scroll events from video scroll
    $( document ).on( 'videoScroll:update', _updateCurrentPosition );

    _$navigation.on( 'click', 'a', function ( event ) {
      event.preventDefault();

      _scrollToSection( $( this ).attr( 'href' ) );
    });

    // Linklist in header
    $( document ).on( 'click', '.video--linklist a', function (event) {
      event.preventDefault();

      _scrollToSection( $( this ).attr( 'href' ) );
    });

    // If navigation is hovered
    _$navigation
      .on( 'mouseover', function () {
        $( 'body' ).attr( 'data-layer', 'visible' );
      })
      .on( 'mouseout', function () {
        $( 'body' ).attr( 'data-layer', 'hidden' );
      });

    // If hash is set
    if ( window.location.hash ) {
      _scrollToSection( window.location.hash );
    }
  };

  // Init call
  init();

}(window.jQuery, window.sections, window.helper));
