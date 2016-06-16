/*
 * PERSONA ANIMATION
 *
 * @version: 0.1beta
 * @author: scremer@fork.de
 *
 */

/* --------------------------------
 * PERSONA ANIMATION INIT
 * --------------------------------*/

function callback ( event ) {
  var scene = this;
  var type = event.type;
  var state = scene.state();

  if ( window.console ) {
    console.log( '-------------- Event fired!  -----------------');
    console.log( type.toUpperCase() +', CURRENT STATE: ' + state, event );
  }
}

function displayImagesAppropriateForViewport() {

  if ( matchMedia(Foundation.media_queries.large).matches && !matchMedia(Foundation.media_queries.xxlarge).matches ) {

    //display the medium images
    $('.persona--image.'+imageSizeClasses.medium).each(function(){
      $(this).attr('src', $(this).data('image'))
    });

  }
  else if (matchMedia(Foundation.media_queries.xxlarge).matches) {

    //display the large images
    $('.persona--image.'+imageSizeClasses.large).each(function(){
      $(this).attr('src', $(this).data('image'))
    });
  }
}

function setBodyLayerStatus( status ) {

  var bodyObject = $( 'body' );
  var hiddenClass = 'hidden';

  // Set data status of body tag
  bodyObject.data( 'layer', status );
  bodyObject.attr( 'data-layer', status );

  //prevent the scrolling of the page
  if(status == hiddenClass) {

    //enable scrolling
    $.fn.fullpage.setAllowScrolling(true);

    //enable all keyboard scrolling
    $.fn.fullpage.setKeyboardScrolling(true);
  }
  else {

    //disabling scrolling
    $.fn.fullpage.setAllowScrolling(false);

    //disabling all keyboard scrolling
    $.fn.fullpage.setKeyboardScrolling(false);
  }

  //apply the height/overflow fix on windows mobile
  if(navigator.userAgent.match(/Windows Phone/gi) != null){

    //change the body height depending in the body status
    if(status == hiddenClass) {
      jQuery(options.pagecontainer).removeAttr( 'style' );
    }
    else {
      jQuery(options.pagecontainer).css({
        height: '100vh',      // window.innerHeight + 'px',
        overflow: 'hidden'
      });
    }
  }
}

function showServiceDetailLayer(event) {

  //get the clicked benefit
  var clickedBenefit = $(this);

  if (clickedBenefit.is('[data-details]')) {

    //block the default behaviour
    event.preventDefault();

    //get the related details
    var relatedDetails = $('.service-detail[data-service="' + clickedBenefit.data('details') + '"]');

    //set the data-layer on the body to "visible"
    setBodyLayerStatus('visible');

    //show the benefit details
    relatedDetails.fadeIn();//.show();
  }

}

function hideServiceDetailLayer(event) {

  //block the default behaviour
  event.preventDefault();

  //get the clicked close button
  var clickedCloseButton = $(this);

  //set the data-layer on the body to "hidden"
  setBodyLayerStatus('hidden');

  //hide the parent benefit details content
  $('.service-detail:visible').fadeOut();//.hide();

}


var run_preloader = false;
var viewportOffset,
    controller,
    personaElements = null;
var personas = [];
var personaTimelines = [];
var personaScenes = [];

var imageSizeClasses = {
  'small': 'show-for-small-up',
  'medium': 'show-for-large-up',
  'large': 'show-for-xxlarge-up'
};
var imageSizeToShow = imageSizeClasses.small;

var personaImages = {
  'small': [
    'files/us/img/personas/executive_small.png',
    'files/us/img/personas/executive_small_grey.png',
    'files/us/img/personas/projectmanager_small.png',
    'files/us/img/personas/projectmanager_small_grey.png',
    'files/us/img/personas/toolcribmanager_small.png',
    'files/us/img/personas/toolcribmanager_small_grey.png',
    'files/us/img/personas/jobsitesupervisor_small.png',
    'files/us/img/personas/jobsitesupervisor_small_grey.png',
    'files/us/img/personas/tradesman_small.png',
    'files/us/img/personas/tradesman_small_grey.png',
    'files/us/img/personas/executive-benefits_bg.jpg',
    'files/us/img/personas/jobsitesupervisor-benefits_bg.jpg',
    'files/us/img/personas/projectmanager-benefits_bg.jpg',
    'files/us/img/personas/toolcribmanager-benefits_bg.jpg',
    'files/us/img/personas/tradesman-benefits_bg.jpg'
  ],
  'medium': [
    'files/us/img/personas/executive_medium.png',
    'files/us/img/personas/projectmanager_medium.png',
    'files/us/img/personas/toolcribmanager_medium.png',
    'files/us/img/personas/jobsitesupervisor_medium.png',
    'files/us/img/personas/tradesman_medium.png',
  ],
  'large': [
    'files/us/img/personas/executive_large.png',
    'files/us/img/personas/projectmanager_large.png',
    'files/us/img/personas/toolcribmanager_large.png',
    'files/us/img/personas/jobsitesupervisor_large.png',
    'files/us/img/personas/tradesman_large.png'
  ]
}


$( document ).ready(function($) {
    run_preloader = true;

    if ( run_preloader && $body.is('.solutions')) {
      setTimeout( function() {

        var imagesToLoad = [];

        //preload small images (always required)
        imagesToLoad = imagesToLoad.concat(personaImages.small);

        //preload medium images (for medium and up)
        if ( matchMedia(Foundation.media_queries.large).matches && !matchMedia(Foundation.media_queries.xxlarge).matches ) {
          imagesToLoad = imagesToLoad.concat(personaImages.medium);
        }

        //preload large images (for xxlarge and up)
        if ( matchMedia(Foundation.media_queries.xxlarge).matches ) {
          imagesToLoad = imagesToLoad.concat(personaImages.large);
        }

        preloader( imagesToLoad );

      }, 1);
    }

    /* --------------------------------
     * SCROLL ACTIVATED ANIMATIONS
     * --------------------------------*/
    var ie_th_10 = $('html').hasClass('lt-ie10');

    if ( matchMedia(Foundation.media_queries.xlarge).matches ) {

      //determine the image size to show
      imageSizeToShow = imageSizeClasses.medium;

    }


    if( !Modernizr.touch && matchMedia(Foundation.media_queries.xxlarge).matches ){
      //viewportOffset = -68
      viewportOffset = -(68 + 1);

      //determine the image size to show
      imageSizeToShow = imageSizeClasses.large;

      //Get the Personas
      personaElements = $('.persona');

      //If there are any Personas
      if( personaElements.length > 0 ){

        //Create the ScrollMagic Controller
        controller = new ScrollMagic.Controller({
          loglevel: 2,
          globalSceneOptions: {
            triggerHook: 'onLeave',
            reverse: false,
            offset: viewportOffset
          }
        });

        //For each persona
        personaElements.each(function(index, element){

          //add a new object to the personas array
          personas.push({});

          //remember the element
          personas[index].persona = $(element);

          //get the persona elements
          personas[index].quoteStatement = personas[index].persona.find('.persona--quote_statement');
          personas[index].image = personas[index].persona.find('.persona--image.'+imageSizeToShow);
          personas[index].quote = personas[index].persona.find('.persona--quote');
          personas[index].statement = personas[index].persona.find('.persona--statement');
          personas[index].arrowDetails = personas[index].persona.find('.persona--arrow__details');
          personas[index].arrowProfile = personas[index].persona.find('.persona--arrow__profile');
          personas[index].benefitContent = personas[index].persona.find('.persona--benefit_content');
          personas[index].benefit1 = personas[index].persona.find('.persona--benefit:nth-of-type(1)');
          personas[index].benefit2 = personas[index].persona.find('.persona--benefit:nth-of-type(2)');
          personas[index].benefit3 = personas[index].persona.find('.persona--benefit:nth-of-type(3)');

          //set the status variables
          personas[index].isBenefitContentVisible = false;


/* START: Quote Statement Animation In */

          //add a new object to the personaTimelines array
          personaTimelines.push({});

          //create the timeline for the quote_statement screen
          personaTimelines[index].quoteStatementTimelineIn = new TimelineMax();

          //add tween per timeline.to() instead of using a tween object created before
          personaTimelines[index].quoteStatementTimelineIn.from(personas[index].image, 0.7, {left: '-15%', opacity: 0});
          personaTimelines[index].quoteStatementTimelineIn.from(personas[index].quote, 0.6, {left: '44%', opacity: 0, delay: 0.2});
          personaTimelines[index].quoteStatementTimelineIn.from(personas[index].statement, 0.6, {left: '44%', opacity: 0});
          personaTimelines[index].quoteStatementTimelineIn.from(personas[index].arrowDetails, 0.3, {right: -202});

          //add a new object to the persona scenes array
          personaScenes.push({});

          //create the scene for the quote_statement screen
          personaScenes[index].quoteStatementScene = new ScrollMagic.Scene({
            triggerElement: element
          })
          .setTween(personaTimelines[index].quoteStatementTimelineIn)
          //.addIndicators()
          .addTo( controller );

/* END: Quote Statement Animation In */


/* START: Benefit Content Animation In */

          //create the timeline for the benefit_content screen
          personaTimelines[index].benefitContentTimelineIn = new TimelineMax();

          //bring the timeline to a halt
          personaTimelines[index].benefitContentTimelineIn.pause();

          //update the status variable at the end of the timeline
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].isBenefitContentVisible = true; });

          //add tween per timeline.to() instead of using a tween object created before
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].benefit1.addClass('hover'); });
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].benefit2.addClass('hover'); });
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].benefit3.addClass('hover'); });
          personaTimelines[index].benefitContentTimelineIn.to(personas[index].quoteStatement, 0, {zIndex: 5});
          personaTimelines[index].benefitContentTimelineIn.to(personas[index].benefitContent, 0, {zIndex: 10, opacity: 0});
          personaTimelines[index].benefitContentTimelineIn.to(personas[index].benefitContent, 0.7, {opacity: 1}, 'transitionToBenefit');  // animations can be startet simultaneously by
          personaTimelines[index].benefitContentTimelineIn.to(personas[index].statement, 0.4, {left: '17%'}, 'transitionToBenefit');      // giving them the same "name"/"key"
          personaTimelines[index].benefitContentTimelineIn.from(personas[index].arrowProfile, 0.3, {left: -202}, '-=0.4');                // or by giving them a negative 'waiting' time
          personaTimelines[index].benefitContentTimelineIn.from(personas[index].benefit1, 0.5, {right: '10.5%', opacity: 0, delay: 0.4});
          personaTimelines[index].benefitContentTimelineIn.from(personas[index].benefit2, 0.5, {right: '10.5%', opacity: 0});
          personaTimelines[index].benefitContentTimelineIn.from(personas[index].benefit3, 0.5, {right: '10.5%', opacity: 0});
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].benefit1.removeClass('hover'); }, '+=0.3');
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].benefit2.removeClass('hover'); }, '+=0.15');
          personaTimelines[index].benefitContentTimelineIn.addCallback(function(){ personas[index].benefit3.removeClass('hover'); }, '+=0.15');


          //bind an event handler to the details arrow
          personas[index].arrowDetails.on('click', function(event){

           //suppress the standard link behaviour
            event.preventDefault();

            //play the benefit_content IN timeline
            personaTimelines[index].benefitContentTimelineIn.restart();

            //deactivate scrolling up
            $.fn.fullpage.setAllowScrolling(false, 'up');

            //attach the new "scrollup" mouse handler to the benefit content
            $(window).on('wheel mousewheel DOMMouseScroll', function(mouseWheelEvent){

              //check if benefit content is visible
              if(personas[index].isBenefitContentVisible){

                // get the event
                var e = window.event || mouseWheelEvent; // old IE support

                //get the real event (xBrowser)
                var realEvent = e;
                if(typeof realEvent.originalEvent !== 'undefined' && realEvent.originalEvent != null){
                  realEvent = realEvent.originalEvent;
                }

                //get the delta (xbrowser)
                var delta = Math.max(-1, Math.min(1, (realEvent.deltaY || -realEvent.detail)));

                //if the mouse wheel was used to scroll up
                if(delta === -1 && $body.attr('data-layer') !== 'visible'){

                  //"click" the profile arrow
                  personas[index].arrowProfile.click();
                }

              }

            });

          });

/* END: Benefit Content Animation In */


/* START: Benefit Content Animation Out */

          //create the timeline for the benefit_content screen
          personaTimelines[index].benefitContentTimelineOut = new TimelineMax();

          //bring the timeline to a halt
          personaTimelines[index].benefitContentTimelineOut.pause();

          //add tween per timeline.to() instead of using a tween object created before
          personaTimelines[index].benefitContentTimelineOut.to(personas[index].arrowProfile, 0.3, {left: -202});
          personaTimelines[index].benefitContentTimelineOut.to(personas[index].statement, 0.4, {left: '46.5%'}, 'transitionToBenefit');
          personaTimelines[index].benefitContentTimelineOut.to(personas[index].benefitContent, 0.7, {opacity: 0}, 'transitionToBenefit');
          personaTimelines[index].benefitContentTimelineOut.to(personas[index].benefitContent, 0, {zIndex: -1});
          personaTimelines[index].benefitContentTimelineOut.to(personas[index].quoteStatement, 0, {zIndex: 5});

          //update the status variable at the end of the timeline
          personaTimelines[index].benefitContentTimelineOut.addCallback(function(){ personas[index].isBenefitContentVisible = false; }, 'benefitContentTimelineOutEnd');


          //reactivate scrolling up
          personaTimelines[index].benefitContentTimelineOut.addCallback(function(){
            $.fn.fullpage.setAllowScrolling(true, 'up');
          });


          //bind an event handler to the preofile arrow
          personas[index].arrowProfile.on('click', function(event){

            //suppress the standard link behaviour
            event.preventDefault();

            //play the benefit_content OUT timeline
            personaTimelines[index].benefitContentTimelineOut.restart();

          });

/* END: Benefit Content Animation Out */


/* START: Service Detail Stuff */

          //click on detail
          personas[index].persona.on('click', '.persona--benefit', showServiceDetailLayer);

          //click on close or darkened area
          $('body.microsite').on('click', '.service-detail .icon-close, .dimBackground__closerLayer', hideServiceDetailLayer);

          //hitting esc key
          $(window).on('keyup', function (event) {

            //check for ESC key
            if(event.keyCode === 27) {

              //hide the layer
              hideServiceDetailLayer(event);
            }

          });

/* END: Service Detail Stuff */


/* START: Leaving the scene handler */

          personaScenes[index].quoteStatementScene.on('update', function( event ){

            //echeck if the benefit content is visible
            if(personas[index].isBenefitContentVisible) {

              //check if the benefit content for the current scene is shown and scrollpos is out of bounds of the scene
              if(event.scrollPos < event.startPos || event.scrollPos > event.endPos) {

                //stop the benefit_content IN timeline if currently running
                if(personaTimelines[index].benefitContentTimelineIn.isActive()){
                  personaTimelines[index].benefitContentTimelineIn.stop();
                }

                //play the benefit_content OUT timeline if not already running
                if(!personaTimelines[index].benefitContentTimelineOut.isActive()){
                  personaTimelines[index].benefitContentTimelineOut.restart();
                }

                //set the benefit content visible status to false
                personas[index].isBenefitContentVisible = false;
              }
            }

            //reactivate scrolling up
            $.fn.fullpage.setAllowScrolling(true, 'up');

          });

/* END: Leaving the scene handler */

          //Todo: REMOVE THE CALL BELOW AS THEY ARE ONY DEBUG
          //log the events given
          //personaScenes[index].quoteStatementScene.on('add change enter leave start end progress', callback);

        }); //END personas each

      } //END personas.length > 0

    } //END if media_queries.large



    //show images on pageload
    displayImagesAppropriateForViewport();

    //show images on resize
    $( window ).on('resize', function() {
      displayImagesAppropriateForViewport();
    });

});
