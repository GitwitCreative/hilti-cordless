/*
 * COMMON PLUGINS
 *
 * @version: 0.1beta
 * @author: hhofmann@fork.de
 *
 */

var $navigation;
var $verticalNavigation;
var $verticalNavigationContentContainer;
var $body = $( 'body' );
var $html = $( 'html' );
var $header = $('.header');
var isNavigation = false;
var currentSlideIndex = 0;
var numberOfSlides = 0;

// enableKnightRider();

/* --------------------------------
 * FOUNDATION INIT
 * --------------------------------*/
$( document ).foundation();

$( document ).ready(function($) {

    var ie_th_10 = $('html').hasClass('lt-ie10');

    var isIE11 = '-ms-scroll-limit' in document.documentElement.style && '-ms-ime-align' in document.documentElement.style;
    if ( isIE11 ) {
        $('html').addClass('isIE11');
    }

    /*
     * EXTERNAL VIDEO LOAD
     */

    loadExternalVideos();

    /*
     * SCROLL CONTENT NAVIGATION
     */

    initVerticalNavigation();

    /*
     * MOFIDY CLICK / HOVER on NAVIGATION
     */

    modifyNavigation();

    /*
     * SCROLL HANDLER FOR NAV SHOW/HIDE
     */
    var previousScrollTop = 0;

    $( window ).on( 'scroll', function(e){
        if ( Modernizr.touch || !Modernizr.mq(Foundation.media_queries.xxlarge) ) {
            return;
        }

        var direction = null;
        var currentScrollTop = window.pageYOffset || window.scrollY;

        //check if scrolling down
        if( currentScrollTop > previousScrollTop ) {
            direction = 'down';
        } else if( currentScrollTop < previousScrollTop ) {
            direction = 'up';
        }

        //handle the header display
        handleHeaderDisplay(direction);

        //update the previous scroll top
        previousScrollTop = currentScrollTop;
    });


    /*
     * Video autoplay on layer open
     */
    $('.video a[data-jsinit="Layer"]').on('click', function(){
        var layerContentSelector = $(this).data('content');
        var layerContent = $body.find(layerContentSelector);

        var video = layerContent.find('[data-video="true"]');
        video
            .clone()
            .attr( 'src', video.data( 'src' ) + '&flashvars[autoPlay]=true' )
            .insertAfter(video);
        video.remove();
    });

    /*
     * Video stop on layer close
     */
    function stopLayerVideoPlayback(){
        var video = $body.find('[data-video="true"]');

        video
            .clone()
            .attr( 'src', video.data( 'src' ) + '&flashvars[autoPlay]=false' )
            .insertAfter(video);
        video.remove();
    }

    $('.video .closer, .dimBackground__closerLayer').on('click', function(){

        stopLayerVideoPlayback();
    });

    $(window).on('keyup', function (event) {

        //check for ESC key
        if(event.keyCode === 27) {

            stopLayerVideoPlayback();
        }
    });

});

var debug = false;
var plugins = Array(
  'Layer'
);

// Complete Page has loaded
$( window ).on( 'load', function () {

    // Initializer on window load event
    // via data-jsinit Selector
    $.each( plugins, function ( index, value ) {

        var pluginName = value;

        $('[data-jsinit*="'+ pluginName +'"]').each(function () {
            var $element = $(this);

            if ( debug && window.console )
                console.log( 'INIT Plugin', $element, $element.data() );

            $element[pluginName]($element.data())
        });
    });

    // disableKnightRider();

});

function loadExternalVideos () {
    var videos = $( document ).find('[data-video="true"]');

    $( '.layer' ).each(function ( index ) {
        if ( index !== 0 && $( this ).attr( 'id' ) === 'video--layer' ) {
            $( this ).remove();
        }
    });

    $body.on( 'isLoaded', function () {
        $.each( videos, function ( index, video ) {
            $( video ).attr( 'src', $( video ).data( 'src' ) + '&flashvars[autoPlay]=false' );
        });
    });
}

function preloader ( arrayOfImages ) {
  var $storage = $( '<div />', { 'class': 'preloadedImages', 'style': 'height:0; width:0; overflow:hidden; position: absolute; z-index: -1;' } );
      $body.prepend( $storage );

  $preloadedImages = [];
  $( arrayOfImages ).each( function ( index, value ){

    $storage.append( $( '<img>', { 'src': this }) );

    // Alternatively you could use:
    $preloadedImages[ index ] = new Image();
    $preloadedImages[ index ].src = value;
  });

  callPreloader();
}

function callPreloader() {

    /*
     * PRELOADER
     */

    // Add KnightRider
    $body.data( 'layer', 'visible' );
    $body.attr( 'data-layer', 'visible' );
    $body.addClass( 'isLoading' );

    width = 120;

    var line_background = $( '.knightrider .knightrider--animation__line--background' ),
        canvas_background  = $( '.knightrider .knightrider--animation__line--background' )[0],
        context_background = canvas_background.getContext( '2d' );

    var line = $( '.knightrider .knightrider--animation__line' ),
        canvas  = $( '.knightrider .knightrider--animation__line' )[0],
        context = canvas.getContext( '2d' ),
        percentage = $( '.knightrider .knightrider--animation__percent' );

    context_background.beginPath();
    context_background.arc(width, width, width - 20, Math.PI * 1.5, Math.PI * 1.6);
    context_background.strokeStyle = '#666';
    context_background.lineWidth = 3;
    context_background.arc(width, width, width - 20, Math.PI * 1.5, Math.PI * (1.5 + 100 / 50), false);
    context_background.stroke();

    context.beginPath();
    context.arc(width, width, width - 20, Math.PI * 1.5, Math.PI * 1.6);
    context.strokeStyle = '#df001b';
    context.lineWidth = 3;
    context.stroke();

    var loader = $body.DEPreLoad({
        OnStep: function( percent ) {
            // console.log( percent + '%' );

            line.animate({ opacity: 1 });
            percentage.text( percent + '%' );

            if ( percent > 5 ) {
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.beginPath();
                context.arc(width, width, width - 20, Math.PI * 1.5, Math.PI * (1.5 + percent / 50), false);
                context.stroke();
            }
        },
        OnComplete: function() {
            // percentage.text( 'done' );

            // Remove KnightRider
            $body.data( 'layer', 'hidden' );
            $body.attr( 'data-layer', 'hidden' );
            $body.removeClass( 'isLoading' );

            // Trigger LoadedEvent
            $body.trigger( 'isLoaded' );
        }
    });
}

function modifyNavigation () {

    if ( !$navigation )
        $navigation = $body.find( '#nav' );

    var $modifyItems = $navigation.find('[data-modify="true"]');

    $modifyItems.on( 'click', function ( event ) {
        event.preventDefault();

        var itemWrapper = $( this ).parent();

        itemWrapper.addClass( 'hover' );

    });

    $modifyItems.on( 'dblclick, focusout', function ( event ) {
        event.preventDefault();

        var itemWrapper = $( this ).parent();

        itemWrapper.removeClass( 'hover' );

    });

    /*
     * RESIZE / ORIENTATION CHANGE LOCK
     */

    $( window ).on( 'resize.modifyNavigation', function () {
        $.each( $modifyItems, function ( index, item) {
            $( item ).focusout();
        });
    });

    $( window ).on( 'orientationchange.modifyNavigation', function () {
        $.each( $modifyItems, function ( index, item) {
            $( item ).focusout();
        });
    });
}

function initVerticalNavigation () {
    if ( $( '.js-video-scroll' ).length > 0 ) {
        return;
    }

    if ( isNavigation ) {

        // destroy navigation
        $.fn.fullpage.destroy( 'all' );

        // Reset variables
        $verticalNavigation = null;
        $verticalNavigationContentContainer = null;
    }

    // Only init animation for Desktop (1260) and NO-Touch Devices
    if ( !Modernizr.touch && matchMedia(Foundation.media_queries.xxlarge).matches ){
        $body.addClass( 'hasAnimation' );
    } else {
        $body.removeClass( 'hasAnimation' );
    }

    // Only init fullpage navigation for Desktop (1260) and NO-Touch Devices
    if ( !Modernizr.touch && matchMedia(Foundation.media_queries.xxlarge).matches ) {

        //get the number of slides
        numberOfSlides = $body.find('.slide').length;

        var showScrollbar = true;
        var useScrollOverflow = true;
        var doFitToSection = false;
        if($body.is('.technologyVideo')){
            showScrollbar = true;
            useScrollOverflow = false;
            doFitToSection = false;
        }


        // Desktop Navigation
        $( '.container' ).fullpage({

            //Navigation
            menu: false,
            lockAnchors: false,
            anchors: sections.navigation,
            navigation: true,
            navigationPosition: 'right',
            navigationTooltips: sections.tooltip,
            showActiveTooltip: false,
            slidesNavigation: true,
            slidesNavPosition: 'bottom',

            //Scrolling
            css3: false,
            scrollingSpeed: 500,
            autoScrolling: true,
            fitToSection: doFitToSection,
            scrollBar: showScrollbar,
            easing: 'easeInOutCubic',
            easingcss3: 'ease',
            loopBottom: false,
            loopTop: false,
            loopHorizontal: true,
            continuousVertical: false,
            normalScrollElements: sections.exclude,
            scrollOverflow: useScrollOverflow,
            touchSensitivity: 5,
            normalScrollElementTouchThreshold: 5,

            //Accessibility
            keyboardScrolling: true,
            animateAnchor: true,
            recordHistory: true,

            //Design
            controlArrows: true,
            verticalCentered: true,
            resize : true,
            fixedElements: '.header',
            responsiveWidth: 0,
            responsiveHeight: 0,
            // paddingTop: '68px',

            //Custom selectors
            sectionSelector: '#main > .slide, #main > .scrollmagic-pin-spacer',
            slideSelector: '.slide',

            //events
            onLeave: function( index, nextIndex, direction ){

                //Handling for going from last to second to last element
                if(direction == 'up' && index == numberOfSlides){

                    var secondToLastElementIndex = nextIndex - 1; //because fullpage counts starting by 1 instead of 0
                    var secondToLastElement = $('.slide').eq(secondToLastElementIndex);
                    var secondToLastElementTopOffset = secondToLastElement.offset().top;

                    $('html, body').animate({
                        scrollTop: secondToLastElementTopOffset
                    });

                    if($body.is('.technologyVideo')){
                        $batteryVideoObject.goToLastCuepointForDirection($.fn.videoCtrl.playbackDirections.FORWARD );
                    }
                }

                //remember the current index
                currentSlideIndex = index;


                /*
                 * NAVIGATION ITEMS
                 */

                if ( !$verticalNavigation )
                    $verticalNavigation = $body.find( '#fp-nav' );

                // $verticalNavigation.addClass( 'verticalNavigation' );

                var navigationItems = $verticalNavigation.find( 'li' );

                var currentNavItem = navigationItems.eq( index - 1 );
                var nextNavItem = navigationItems.eq( nextIndex - 1 );

                // Mark current Navigation Position

                currentNavItem.removeClass( 'current' );
                nextNavItem.addClass( 'current' );

                /*
                 * CONTENT ITEMS
                 */

                if ( !$verticalNavigationContentContainer )
                    $verticalNavigationContentContainer = $body.find( '#main' );

                var contentItems = $verticalNavigationContentContainer.find( 'article' );

                var currentContentItem = contentItems.eq( index - 1 );
                var nextContentItem = contentItems.eq( nextIndex - 1 );

                // Fade Out Battery Animation when leaving section

                if ( currentContentItem.find( '.animation--container' ).length > 0 ) {
                    currentContentItem.find( '.animation--container' ).fadeOut();
                }

                if ( nextContentItem.find( '.animation--container' ).length > 0 ) {
                    nextContentItem.find( '.animation--container' ).fadeIn();
                }

                // Hide Navigation in Footer Section

                if ( currentContentItem.hasClass( 'footer' ) && ( $body.is('.technology') || $body.is('.technologyVideo') ) ) {
                    $body.removeClass( 'hideNavigation' );
                }

                if ( nextContentItem.hasClass( 'footer' ) && ( $body.is('.technology') || $body.is('.technologyVideo') ) ) {
                    $body.addClass( 'hideNavigation' );
                }

                //hide/show the header based on scrolling
                handleHeaderDisplay(direction);

            },
            afterLoad: function( anchorLink, index ){

                $.fn.fullpage.setScrollingSpeed(500);
            },
            afterRender: function(){

                /*
                 * VERTICAL NAVIGATION - RESTRUCTURE
                 */

                if ( !$verticalNavigation )
                    $verticalNavigation = $body.find( '#fp-nav' );

                $verticalNavigation.hover( function () {
                    $body.addClass( 'isNavigation' );
                    $body.data( 'layer', 'visible' );
                    $body.attr( 'data-layer', 'visible' );
                }, function () {
                    $body.removeClass( 'isNavigation' );
                    $body.data( 'layer', 'hidden' );
                    $body.attr( 'data-layer', 'hidden' );
                })

                $verticalNavigation.addClass( 'verticalNavigation' );
                var navigationItems = $verticalNavigation.find( 'li' );

                $.each( navigationItems, function ( index, item ) {
                    var navItem = $( item );
                    var tooltip = navItem.find( '.fp-tooltip' );
                    var link = navItem.find( 'a' );
                    link.html( tooltip.text() );
                    tooltip.remove();
                });

                /*
                 * VIDEO
                 */

                playVideo();

                /*
                 * CONTENT HEIGHT
                 */

                reHeightContent();

            },
            afterResize: function () {
                initVerticalNavigation();
            },
            afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex ){},
            onSlideLeave: function( anchorLink, index, slideIndex, direction, nextSlideIndex ){}

        });

        if(location.hash){
            $.fn.fullpage.setScrollingSpeed(0);
        }

    } else {

        // Touch Navigation
        $( '.container' ).fullpage({

            // fixedElements: '.header',
            scrollBar: false,
            autoScrolling: false,
            fitToSection: false,
            // loopTop: true,
            anchors: sections.navigation,
            normalScrollElements: '#main > .slide',

            //Design
            resize : true,
            fixedElements: '.header',
            responsiveWidth: 40000,
            responsiveHeight: 40000,
            paddingTop: '0px',

            //Custom selectors
            sectionSelector: '#main > .slide',
            slideSelector: '.slide',

            //events

            afterLoad: function ( anchorLink, index ) { },
            onLeave: function ( index, nextIndex, direction ) {
                /*
                 * NAVIGATION
                 *
                 * Close Navigation for on page navigation
                 */

                $html.removeClass( 'js-nav' );

                //handle the header display
                handleHeaderDisplay(direction);
            },
            onSlideLeave: function( anchorLink, index, slideIndex, direction, nextSlideIndex ){ },
            afterSlideLoad: function ( anchorLink, index, slideAnchor, slideIndex ) { },
            afterRender: function () {

                /*
                 * CONTENT HEIGHT
                 */

                reHeightContent();

                /*
                 * VIDEO
                 */

                playVideo();

                /*
                 * TOP FIX
                 */

                // Fix for scrolling issue after page load in first section
                // $body.scrollTop( 0 );
                $( 'body,html' ).scrollTop( 0 );
            },
            afterResize: function () {
                initVerticalNavigation();
            }

        });

        $.fn.fullpage.setFitToSection( false );
        $.fn.fullpage.setAutoScrolling( false );

        console.log( $.fn.fullpage );

    } // if media_queries.medium

    isNavigation = true;
}

function playVideo () {
    /*
     * VIDEO
     */

    // playing preview video after render
    var previewVideo = $('video#previewVideo');

    if ( window.console ) {
        console.log(previewVideo);
    }

    if ( previewVideo.length > 0 ) {

        var video = document.getElementById( 'previewVideo' );
        video.play();

    }
}

function reHeightContent() {

    if ( !$verticalNavigationContentContainer )
        $verticalNavigationContentContainer = $body.find( '#main' );

    /*
     * CONTENT HEIGHT
     */

    // Reduce Content height of header height
    var headerHeight = 68;

    if ( matchMedia(Foundation.media_queries.medium).matches ){
        headerHeight = 116;
    }

    var contentItems = $verticalNavigationContentContainer.find( 'article' );

    if ( !Modernizr.touch && matchMedia(Foundation.media_queries.xxlarge).matches ){

        // Reheight all Container on large Viewport
        $.each( contentItems, function( index, item ) {

            var $item = $( item );

            // get height
            var curHeight = $item.height();

            //calculate the new height
            var newHeight = curHeight - headerHeight;

            // set height
            if($item.is('.batteryVideo--wrapper')){
                $item.height( curHeight );
            }
            else {
                $item.height( newHeight );
            }

            //IE reheight also the fp-tableCell
            if(navigator.userAgent.indexOf('MSIE 9') > -1){
                $item.find( '.fp-tableCell' ).height( newHeight );
            }
        });


    } else if ( matchMedia(Foundation.media_queries.xxlarge).matches ){

        // Reheight all Container on large Viewport
        $.each( contentItems, function( index, item ) {

            var $item = $( item );

            // get height
            var curHeight = $item.height();
            var newHeight = curHeight - headerHeight;

            // set height
            $item.height( newHeight );
            $item.find( '.fp-tableCell' ).height( newHeight );
        });

    } else {

        // // reheight only the first container (video) for all other viewports
        // var $item = contentItems.first();

        // // get height
        // var curHeight = $item.height();
        // var newHeight = curHeight - headerHeight;

        // // set height
        // $item.height( newHeight );
        // $item.find( '.fp-tableCell' ).height( newHeight );

        // reheight only first container and remove height from others
        $.each( contentItems, function( index, item ) {

            var $item = $( item );

            if ( index === 0 ) {

                // get height
                var curHeight = $item.height();
                var newHeight = curHeight - headerHeight;

                // set height
                $item.height( newHeight );
                $item.find( '.fp-tableCell' ).height( newHeight );

            } else {

                // set height
                $item.height( 'auto' );
                $item.find( '.fp-tableCell' ).height( 'auto' );

            }

        });
    }
}

function handleHeaderDisplay(direction) {

    // Hide mainnav on scrolling down and show it on scrolling up
    if(direction === 'down' && $header.is(':visible')){
        $header.fadeOut();
        $body.data('header','hidden');
        $body.attr('data-header', 'hidden');
    }
    else if(direction === 'up' && !$header.is(':visible')){
        $header.fadeIn();
        $body.data('header','visible');
        $body.attr('data-header', 'visible');
    }
}

window._plugins = {
    handleHeaderDisplay: handleHeaderDisplay
};
