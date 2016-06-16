/*
 * LAYER
 *
 * @version: 0.1beta
 * @author: hhofmann@fork.de
 *
 */

(function(jQuery){

  var pluginName = 'Layer'

  jQuery.fn.Layer = function( _options ){

    var defaults = {
      data: {
        body: {
          status: 'layer'
        }
      },
      body: {
        tag: 'body',
        status: {
          hidden: 'hidden',
          visible: 'visible'
        }
      },
      openlayer: {
        classes: {
          wrapper: 'dimBackground',
          content: 'dimBackground__contentWrapper',
          closelayer: 'dimBackground__closerLayer',
          item: 'layer',
          close: 'js_closeLayer',
          status: {
            hidden: 'hidden',
            visible: 'visible'
          }
        },
        close: {
          tag: '<div>'
        }
      },
      content: '',
      pagecontainer: ''
    };

    var _self       = this;
    var _content;
    var options     = jQuery.extend(defaults, _options);
    var debug       = false;

    var isNativeAndroidBrowser = false;
    var isAncientIE = false;
    var isEventdefault = false;

    var body = {
      object: null
    }

    var openlayer = {
      wrapper: null,
      content: null,
      item: null,
      trigger: {
        close: null
      }
    };

    var methods = {
      init: function() {

        // Init if debug logging is enabled
        debug = ( _self.data( 'debug' ) && window.console ) ? _self.data( 'debug' ) : false;

        // Init body tag
        body.object = jQuery( options.body.tag );

        // Set preventDefault flag
        isEventdefault = ( _self.data( 'eventdefault' ) ) ? _self.data( 'eventdefault' ) : false;

        // Init openlayer
        openlayer.wrapper = jQuery( '.' + options.openlayer.classes.wrapper );
        openlayer.item = jQuery( '.' + options.openlayer.classes.item );

        if ( !openlayer.wrapper ) {
          if ( debug )
            console.log( 'Error: Missing Layer Structure', _self );
          return;
        }

        // Init openlayer content
        openlayer.content = jQuery( '.' + options.openlayer.classes.content );

        // Init openlayer close triggers
        var contentCloser = jQuery( '.' + options.openlayer.classes.close );
        var layerCloser = jQuery( '.' + options.openlayer.classes.closelayer );
        openlayer.wrapper.append( layerCloser );
        openlayer.trigger.close = layerCloser.add( contentCloser );

        if ( debug )
          console.log( 'Closing Triggers: ', openlayer.trigger.close );

        // Init instance dependencies
        _content = jQuery( options.content );

        if ( debug )
          console.log( 'Related Content: ', _content );

        if ( !_content ) {
          if ( debug )
            console.log( 'Error: Missing Layer Content', _self );
          return;
        }

        methods.detectNativeAndroidBrowser();
        methods.detectAncientIE();
        methods.setStatus( options.body.status.hidden );
        methods.create();
      },

      create: function () {

        if ( debug )
          console.log( 'Create Layer' );

        //native android browser fix
        if( !isNativeAndroidBrowser && !isAncientIE) {
            jQuery( '.' + options.openlayer.classes.content).addClass( 'zoomable' );
        }

        // Add layer content to dimmer
        _content.addClass( options.openlayer.classes.status.hidden ).appendTo( openlayer.content );

        // Init layer opening
        _self.on( 'click', function ( event ) {

          if ( !isEventdefault ) {
            event.preventDefault();
          }

          //toggle the visibility of the layer
          methods.toggleLayerVisibility();

          // Trigger resize event for sameHeight-Plugin
          jQuery( window ).resize();

          // init sliders
          openlayer.content.find( '[data-jsinit]' ).trigger( 'create', { doReset: true });

        });

        // Init layer closers
        openlayer.trigger.close.on( 'click', function( event ) {
          event.preventDefault();

          if ( debug )
            console.log( 'Closer click', event );

          methods.hideLayer();
        });

        jQuery( document ).on( 'click', '.closeGlobalLayer', function ( event ) {
          methods.hideLayer();
        });


        //init ESC key
        jQuery(window).on('keyup', function (event) {

          if ( debug )
            console.log( 'ESC key press', event );

          //check for ESC key
          if(event.keyCode === 27) {

            //hide the layer
            methods.hideLayer();
          }

        });


        //check if the layer should be opened directly
        if(options.forceshow) {

          //show the layer
          methods.toggleLayerVisibility();
        }

      },

      setStatus: function ( status ) {

        if ( debug )
          console.log( 'Set Status (before)', status, body.object.data() );

        // Set data status of body tag
        body.object.data( options.data.body.status, status );
        body.object.attr( 'data-' + options.data.body.status, status );

        if ( debug )
          console.log( 'Set Status (after)', status, body.object.data() );

        // Toggle layer status depending on body status
        if ( status == options.body.status.hidden ) {
          _content.addClass( options.openlayer.classes.status.hidden );
        } else {
          _content.removeClass( options.openlayer.classes.status.hidden );
        }


        //apply the height/overflow fix on windows mobile
        if(navigator.userAgent.match(/Windows Phone/gi) != null){

            //change the body height depending in the body status
            if(status == options.body.status.hidden) {
                jQuery(options.pagecontainer).removeAttr( 'style' );
            }
            else {
                jQuery(options.pagecontainer).css({
                    height: '100vh',      // window.innerHeight + 'px',
                    overflow: 'hidden'
                });
            }
        }
      },

      /**
       *
       */
      toggleLayerVisibility : function() {

        //check if the layer is hidden
        if ( jQuery( options.body.tag ).data( options.data.body.status ) === options.body.status.hidden ) {

          //set the status to visible
          methods.setStatus( options.body.status.visible );

          //set the content to visible
          openlayer.content.addClass( options.openlayer.classes.status.visible );

        } else {

          //set the status to hidden
          openlayer.item.addClass( options.openlayer.classes.status.hidden );

          //set the content to hidden
          _content.removeClass( options.openlayer.classes.status.hidden );
        }

      },

      /**
       *
       */
      hideLayer: function() {

        methods.setStatus( options.body.status.hidden );
        openlayer.content.removeClass( options.openlayer.classes.status.visible );
      },

      /**
       * Method trying to detect the native android browser called internet
       */
      detectNativeAndroidBrowser: function(){

          var userAgent = navigator.userAgent;
          if(
              // (userAgent.indexOf('Mozilla/5.0') > -1 && userAgent.indexOf('Android ') > -1 && userAgent.indexOf('AppleWebKit') > -1) && !(userAgent.indexOf('Chrome') > -1)
              (userAgent.indexOf('Mozilla/5.0') > -1 && userAgent.indexOf('Android ') > -1 && userAgent.indexOf('AppleWebKit') > -1)
          ) {
              isNativeAndroidBrowser = true;
          }
      },

      /**
       * Method detecting ancient IE Browsers
       */
      detectAncientIE: function(){

          var userAgent = navigator.userAgent;
          if( userAgent.indexOf('Mozilla/4.0') > -1 && (userAgent.indexOf('MSIE 8') > -1 || userAgent.indexOf('MSIE 7') > -1 || userAgent.indexOf('MSIE 6') > -1) ){
              isAncientIE = true;
          }
      }
    };

    return this.each(function(){
      methods.init(options);
    });

  }

})(jQuery);
