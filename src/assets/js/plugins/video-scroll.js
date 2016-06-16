/*
 * Video scroll bind
 *
 * @version:
 * @author: Hans Christian Reinl <info@drublic.de>
 *
 */
(function ( $, sections, helper ) {
  var _video;
  var _duration;
  var _height;
  var _ticking = false;
  var _previousScrollTop = 0;

  var _$loader = $( '.js-video-scroller__loader' );
  var _$sectionWrapper = $( '.js-video-scroll__wrapper' );

  /**
   * Request ticks for rAF
   */
  var _requestTick = function () {
    if ( !_ticking ) {
      window.requestAnimationFrame( _update );
    }

    _ticking = true;
  };

  var _headerToggle = function () {
    var direction = null;
    var currentScrollTop = _$sectionWrapper.scrollTop();

    // Check if scrolling down
    if ( currentScrollTop > _previousScrollTop ) {
      direction = 'down';
    } else if ( currentScrollTop < _previousScrollTop ) {
      direction = 'up';
    }

    // Handle the header display
    window._plugins.handleHeaderDisplay( direction );

    // Update the previous scroll top
    _previousScrollTop = currentScrollTop;
  };

  var _throttleEvent = helper.throttle(function () {
    $( document ).trigger( 'videoScroll:update' );
  }, 160);

  var _throttleHeaderToggle = helper.throttle(function () {
    _headerToggle();
  }, 160);

  /**
   * Update function to set correct video time
   */
  var _update = function () {
    var currentScrollTop = _$sectionWrapper.scrollTop() - sections.offsets[0].bottom;
    var currentTime = (currentScrollTop * _duration / _height);

    if ( currentScrollTop > 0 ) {
      _setCurrentTime( currentTime );

      helper.throttle(function () {
        sections.findCurrentSection( _$sectionWrapper.scrollTop() );
      }, 160)();
    }

    _throttleEvent();
    _throttleHeaderToggle();

    _ticking = false;
  };

  /**
   * Get the video
   */
  var _getVideo = function () {
    return $( '.js-video-scroll' )[0];
  };

  /**
   * Get the video's duration
   */
  var _getDuration = function () {
    return _video.duration;
  };

  /**
   * Set the current time of the video
   */
  var _setCurrentTime = function ( time ) {
    if ( time > _duration ) {
      return;
    }

    _video.currentTime = time.toFixed(2);
  };

  /**
   * Set height and duration
   */
  var _setMapping = function () {
    _duration = _getDuration();
    _height = _getScrollHeight();
  };

  /**
   * Get maximum scroll height
   */
  var _getScrollHeight = function () {
    var height = 0;
    var $children = _$sectionWrapper.children();

    $children.each(function ( index ) {
      if ( index === $children.length - 1 ) {
        return;
      }

      height += $( this ).outerHeight();
    });

    height -= _$sectionWrapper.outerHeight();

    return height;
  };

  /**
   * Load a video via XHR
   */
  var _loadVideo = function ( source ) {
    var xhr = new XMLHttpRequest();

    // For IE9, don't load video as Blob
    var getIeVersion = function () {
      var myNav = navigator.userAgent.toLowerCase();
      return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
    };

    if ( getIeVersion() && getIeVersion() <= 9 ) {
      _video.src = source;
      $( _video ).attr( 'preload', true );

      return;
    }

    xhr.open( 'GET', source, true );
    xhr.responseType = 'blob';
    xhr.onload = function () {
      var videoUrl;

      if (this.status === 200) {
        videoUrl = URL.createObjectURL( this.response );
        _video.src = videoUrl;
      }
    };

    xhr.send();
  };

  /**
   * Find supported video formats
   */
  var _getVideoSource = function ( sources ) {
    var source;

    sources = sources.split( ',' );

    sources.forEach(function ( element ) {
      var extension = element.split('.').slice(-1)[0];

      if ( extension === 'webm' && Modernizr.video.webm !== '' ) {
        source = element;
      } else if ( extension === 'mp4' && Modernizr.video.h264 !== '' ) {
        source = element;
      }
    });

    return source;
  };

  var initPreloader = function () {
    var imagesToLoad = $( 'img' ).map( function () {
      return $( this ).attr( 'src' );
    });

    preloader( imagesToLoad );
  };

  /**
   * Initialize video loading
   */
  var init = function () {
    var source;

    // Only technology site
    if ( $( '.technologyVideo' ).length === 0 ) {
      return;
    }

    _video = _getVideo();
    source = _getVideoSource( _video.getAttribute( 'data-src' ) );

    _loadVideo( source );

    $( _video ).on( 'loadedmetadata', function () {
      _$sectionWrapper.on( 'scroll', _requestTick ).trigger( 'scroll' );
      _setCurrentTime( 0.01 ); // Set time so video doesn't show poster anymore

      _$loader.addClass( 'is-hidden' );
      $( this ).removeClass( 'is-hidden' );

      $( window ).on( 'resize orientationchange', function () {
        _setMapping();
      }).trigger( 'resize' );

      // Remove KnightRider
      $body.data( 'layer', 'hidden' );
      $body.attr( 'data-layer', 'hidden' );
      $body.removeClass( 'isLoading' );
    });

    initPreloader();
  };

  // Init call
  init();

}( window.jQuery, window.sections, window.helper ));
