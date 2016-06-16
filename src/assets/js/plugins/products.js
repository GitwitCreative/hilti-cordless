/*
 * PRODUCTSLIDER
 *
 * @version: 0.1beta
 * @author: hhofmann@fork.de
 *
 */

 $( document ).ready( function (){

  var monitor = $('.products--slider__monitor').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    fade: false,
    asNavFor: '.products--slider__navigation'
  });

  var navigation = $('.products--slider__navigation').slick({
    asNavFor: '.products--slider__monitor',
    dots: false,
    arrows: false,
    infinite: true,
    centerMode: true,
    centerPadding: '0',
    focusOnSelect: true,
    slidesToShow: 9,
    slidesToScroll: 9,
    // edge: function ( event, slick, direction ) {
    //   console.log( 'EDGE' );
    // },
    // setPosition: function ( event, slick ) {
    //   console.log( 'EDGE' );
    // },
    // reInit: function ( slick ) {
    //   console.log( 'TEST' );

    // },
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 6
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 568,
        settings: 'unslick'
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

});