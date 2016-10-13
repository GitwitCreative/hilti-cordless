/*
 * hoverTile
 */
(function($) {
    $.fn.hiltiHoverTile = function() {
        /*
        // must be one class
        */
        var objects = this;
        /**
         * mouseover function
         */



        var $closeBtn = $('<a href="#" class="close_hover_info">&times;</a>');
        $closeBtn.on('click', function(e) {

            //console.log($(this).parent().parent());
            $(this).parent().parent().removeClass('active');
            //console.log($(this).parent().parent());
            e.preventDefault();
            e.stopPropagation();
        });
        $('.content_cover').append($closeBtn);

        var mouseOver = function() {
            this.myClass = $(this).parent().parent().attr('class').split('_class')[0] + '_class';
            this.rel = $(this).attr('rel');
            this.imgUrl = $('div.' + this.myClass + '_' + this.rel + ' img').first().attr('src');
            $(this).parent().parent().css('backgroundImage', 'url(' + this.imgUrl + ')');
            $('.' + this.myClass + ' img.mapped').addClass('opaced');
        }

        /**
         * mouseleave function
         */
        var mouseLeave = function() {
            $('.opaced').removeClass('opaced');

        }

        var onClick = function(e) {
            $('.' + this.myClass + '_' + this.rel).addClass('active');
        }

        var buttonClick = function() {
            var $target = $(arguments[0].currentTarget);
            if (typeof $target.attr('data-href') != 'undefined' && $target.attr('data-href') != '') {
                document.location.href = $target.attr('data-href');
            }
        }

        /**
         * function to apply hover behavior
         **/
        var applyHover = function(item, i, arr) {
            $(item).find('area').on('mouseenter', mouseOver).on('mouseleave', mouseLeave).on('click', onClick);
            $(item).find('button').on('click', buttonClick);
        };
        [].forEach.call(objects, applyHover);
    };
})(jQuery);


// /*
//  * hoverVideo
//  */

(function($) {
    $.fn.hiltiHoverVideo = function() {
        /*
        // must be one class
        */
        var objects = this;

        //         /**
        //          * mouseover function
        //          */
        //         var mouseOver = function() {
        //             var $target = $(arguments[0].target);
        //             var $video = $target.get(0);
        //             $video.play();
        //         }

        //         /**
        //          * mouseleave function
        //          */
        //         var mouseLeave = function() {
        //                 var $target = $(arguments[0].target);
        //                 var $video = $target.get(0);
        //                 $video.pause();
        //                 $video.load();
        //             }
        //             /**
        //              * mouseclick function
        //              */
        var mouseClick = function() {
            var $target = $(arguments[0].currentTarget);
            if (typeof $target.attr('href') != 'undefined' && $target.attr('href') != '') {
                document.location.href = $target.attr('href');
            }
        }


        /**
         * function to apply hover behavior
         **/
        var applyHover = function(item, i, arr) {
            var myClass = $(item).attr('class');
            //$(item).on('mouseover', mouseOver);
            //$(item).on('mouseleave', mouseLeave);
            $(item).on('click tap', mouseClick)
        };
        [].forEach.call(objects, applyHover);


    };
})(jQuery);
/**
 ** imagemap resize
 */
var $body = $('body');
$(document).ready(function() {
    if ($body.hasClass('landing')) {
        $("area[href=\"#\"],a[href=\"#\"]").on('click', function(e){
            e.preventDefault();
        });
        var tiles = $('.tile_element');
        $('map').imageMapResize();
        $('.power_class, .compact_class, .subcompact_class').hiltiHoverTile();
        $('.ultimate_class').hiltiHoverVideo();
        $('.close_video').on('click', function() {
            $('.overlay video').get(0).pause();
            $('.overlay').removeClass('opened');
            $('.tile_element video').first().get(0).load();
            $('.tile_element video').first().get(0).play();
        });
        $('.videoPopup_open').on('click', function() {
            $('.overlay').addClass('opened');
            $('.overlay video').get(0).load();
            $('.tile_element video').first().get(0).pause();
        });
        setTimeout(function() {
            $('.overlay').addClass('opened')
        }, 500);

        $('body').on('keyup', function(e) {
            if (e.which == 27) {
                $('.close_video').trigger('click');
            }
        });

        /*
         ** scroll
         */

        var $scrollBtnR = $('.scroll_btn_right');
        var $scrollBtnL = $('.scroll_btn_left');

        var myScroll = new IScroll('.wrapper-inner', {
            scrollX: true,
            scrollY: false,
            mouseWheel: true,
            keyBindings: {
                pageUp: 33,
                pageDown: 34,
                end: 35,
                home: 36,
                left: 37,
                up: 38,
                right: 39,
                down: 40
            },
            probeType: 3
        });

        var scrollHandler = function() {
            var bounds = this.wrapper.getBoundingClientRect();
            tiles.each(function() {
                var obj = $(this);
                var coords = obj.offset();
                if (coords.left + obj.width() > bounds.left && coords.left < bounds.right) {
                    if (obj.not("bubble")) {
                        obj.addClass("bubble");
                    }
                }
                else {
                    obj.removeClass("bubble");
                }
            });
            
            if (this.x <= this.maxScrollX) {
                $scrollBtnR.removeClass('hasScroll');
            }
            else {
                $scrollBtnR.addClass('hasScroll');
            }

            if (this.x < 0) {
                $scrollBtnL.addClass('hasScroll');
            }
            else {
                $scrollBtnL.removeClass('hasScroll');
            }
        }
        myScroll.runScrollHandler = function() {
            scrollHandler.apply(myScroll, arguments);
        }


        myScroll.on('scroll', myScroll.runScrollHandler);
        $('body').on('keydown', myScroll.runScrollHandler );
        $('body').on('keyup', myScroll.runScrollHandler );

        myScroll.runScrollHandler();

        $('.scroll_btn_right').on('mouseup', function() {

        });

        $('.scroll_btn_right').on('mousedown', function() {
            if (myScroll.x > myScroll.maxScrollX) {
                if (myScroll.x + myScroll.maxScrollX / 8 > myScroll.maxScrollX) {
                    myScroll.scrollBy(myScroll.maxScrollX / 8, 0, 500, IScroll.utils.ease.circular);
                }
                else {
                    myScroll.scrollTo(myScroll.maxScrollX, 0, 500, IScroll.utils.ease.circular);
                }
            }
        });

        $('.scroll_btn_left').on('mouseup', function() {

        });

        $('.scroll_btn_left').on('mousedown', function() {
            if (myScroll.x <= 0) {
                if (myScroll.x - myScroll.maxScrollX / 8 <= 0) {
                    myScroll.scrollBy(-myScroll.maxScrollX / 8, 0, 500, IScroll.utils.ease.circular);
                }
                else {
                    myScroll.scrollTo(0, 0, 500, IScroll.utils.ease.circular);
                }
            }
        });


    }

});
