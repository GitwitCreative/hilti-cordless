/*
 * Navigation for scroller
 *
 * @version:
 * @author: Hans Christian Reinl <info@drublic.de>
 *
 */
(function ( $, sections ) {

  var _$sections = $( '.js-video-scroll__wrapper .slide' );
  var headerHeight = 68;

  // Section offsets
  var offsets = [];

  /**
   * Offsets
   */
  var _calculateSectionOffsets = function () {
    offsets = [];

    _$sections.each(function ( index ) {
      var $section = $( this );
      var offsetTop = $section.offset().top;
      var offsetBottom = offsetTop + $section.outerHeight();

      offsets.push({
        top: offsetTop,
        bottom: offsetBottom
      });
    });
  };

  /**
   * Show element based on index
   */
  var _showCurrentSection = function ( index ) {
    $( '#animation__content--scene-' + (index - 1) )
      .addClass( 'is-active' );
  };

  var _hideCurrentSection = function ( index ) {
    $( '#animation__content--scene-' + (index - 1) )
      .removeClass( 'is-active' );
  }

  /**
   * Show element according to scroll position
   */
  var findCurrentSection = function ( currentScrollTop ) {
    offsets.forEach(function ( element, index ) {
      var top = element.top;

      if ( index === sections.offsets.length - 1 ) {
        top -= headerHeight;
      }

      if ( currentScrollTop >= top + 50 && currentScrollTop < element.bottom - 50 ) {
        _showCurrentSection( index );
      } else {
        _hideCurrentSection( index );
      }
    });
  };

  var _initIds = function () {
    _$sections.each(function ( index ) {
      var id = sections.navigation[ index ];

      $( this ).attr( 'id', id );
    });
  };

  /**
   * Initialize sections on page
   */
  var init = function () {
    if ( !$( 'body' ).hasClass( 'technologyVideo' ) ) {
      return;
    }

    _calculateSectionOffsets();
    _initIds();
  };

  // Init call
  $( window ).on( 'resize orientationchange', init ).trigger( 'resize' );

  // Public API
  sections.offsets = offsets;
  sections.findCurrentSection = findCurrentSection;
  sections.headerHeight = headerHeight;

  window.sections = sections;

}( window.jQuery, window.sections || {} ));
