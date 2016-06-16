/*
 * Helper functions
 *
 * @version:
 * @author: Hans Christian Reinl <info@drublic.de>
 *
 */
(function ( $ ) {
  var debounce = function ( func, wait, immediate ) {
    var timeout;

    return function() {
      var context = this;
      var args = arguments;
      var later = function() {
        timeout = null;
        if ( !immediate ) {
          func.apply( context, args );
        }
      };

      var callNow = immediate && !timeout;

      clearTimeout( timeout );
      timeout = setTimeout( later, wait );

      if ( callNow ) {
        func.apply( context, args );
      }
    };
  };

  var throttle = function ( fn, threshhold, scope ) {
    threshhold || (threshhold = 250);
    var last;
    var deferTimer;
    return function () {
      var context = scope || this;

      var now = +new Date();
      var args = arguments;

      if ( last && now < last + threshhold ) {
        // hold on to it
        clearTimeout( deferTimer );
        deferTimer = setTimeout(function () {
          last = now;
          fn.apply( context, args );
        }, threshhold );
      } else {
        last = now;
        fn.apply( context, args );
      }
    };
  };

  /**
   * Initialize Helpers
   */
  var init = function () {
  };

  // Init call
  init();

  // Public API
  window.helper = {
    debounce: debounce,
    throttle: throttle
  };

}( window.jQuery ));
