(function($) {
    $(document).ready(function() {
        if ($('#fullpage').length) {
            if ($('.image-sequence .animation_frames>img').length && $('.slide_animation').length && $('.section.start-slide').length) {
                var direction = 'down';
                var sections = $('.section');
                var $images = $('.image-sequence .animation_frames>img');
                var $animation = $('.slide_animation').first();
                var $animationImg = $animation.find('img').first();
                var $animationClone = $animationImg[0].cloneNode(true);
                var animationSrc = [].map.apply($images, [function(i) {
                    return $(i).attr('src');
                }]);
                var is = $('.animation_frames');
                // is.detach();
                $animation.append(is);

                var windowPos = $(window).scrollTop();
                var animationImgHeight = $animationImg.height();
                var animationPosition = ''; // fixes || absolute
                var position = 0;
                var slideHeight;
                var slideLeft;
                var slideWidth;
                var winWidth = $(window).innerWidth();
                var startSlide = $('.section.start-slide').first();
                var startSlide1 = $('.section.start-slide')[0];
                var endSlide = $('.section.end-slide').first();

                /* initialized in afterRender */
                var startSlideTop;
                var endSlideTop;
                var sequence;
                var prevPos = 0;
                var offset;



                var animateSequence = function() {

                    windowPos = $(window).scrollTop();
                    var posStart = startSlideTop - windowPos;
                    var posEnd = endSlideTop - windowPos;


                    if (posStart > 0) {
                        $animation[0].style.top = (posStart + offset) + "px";
                    }
                    if (posEnd < 0) {
                        $animation[0].style.top = (posEnd + offset) + "px";
                    }

                    windowPos > (startSlideTop - slideHeight) && windowPos <= endSlideTop && (prevPos = position, position = Math.round((windowPos + slideHeight - startSlideTop) / sequence), position < 0 && (position = 0), position > $images.length - 1 && (position = $images.length - 1), position != prevPos && ($images[position].style.opacity = 1, $images[prevPos].style.opacity = 0));
                }

                if ($(document).width() >= 768) {
                    $('#fullpage').fullpage({
                        // autoScrolling: true,
                        fitToSection: false,
                        css3: true,
                        fitToSectionDelay: 400000,
                        scrollingSpeed: 400,
                        // scrollOverflowOptions: false,
                        scrollBar: true,

                        touchSensitivity: 5,
                        normalScrollElementTouchThreshold: 3,
                        bigSectionsDestination: null,

                        //Design
                        controlArrows: true,
                        verticalCentered: true,
                        sectionsColor: [],
                        paddingTop: 0,
                        paddingBottom: 0,
                        fixedElements: '.top-menu',
                        // responsiveWidth: 0,
                        // responsiveHeight: 0,

                        //Custom selectors
                        sectionSelector: '.section',
                        slideSelector: '.slide',

                        //events
                        onLeave: function(a, b, c) {
                            direction = c;
                            var current = $('.section').eq(a - 1);
                            var next = $('.section').eq(b - 1);

                            if (direction == "up" && $(current).hasClass('end-slide')) {
                                $(current).removeClass('noHide');
                            }
                            if (direction == "down" && $(current).hasClass('end-slide')) {
                                $(current).addClass('noHide');
                            }
                        },
                        afterLoad: function(a, b, c) {},
                        afterRender: function() {
                            winWidth = $(window).innerWidth();
                            slideHeight = startSlide.height() || 0;
                            slideLeft = startSlide.offset().left || 0;
                            slideWidth = startSlide.width() || 0;
                            startSlideTop = startSlide.offset().top || 0;
                            endSlideTop = endSlide.first().offset().top || 0;
                            sequence = (endSlideTop - (startSlideTop - slideHeight)) / $images.length;
                            // $animation.detach();
                            // $("#fullpage").after($animation);
                            animationImgHeight = $animationImg.height();
                            offset = (slideHeight - animationImgHeight) / 2;
                            animateSequence();
                            $(window).on('scroll', animateSequence);
                        },
                        afterResize: function() {
                            winWidth = $(window).innerWidth();
                            slideHeight = startSlide.height() || 0;
                            slideLeft = startSlide.offset().left || 0;
                            slideWidth = startSlide.width() || 0;
                            startSlideTop = startSlide.offset().top || 0;
                            endSlideTop = endSlide.first().offset().top || 0;
                            animationImgHeight = $animationImg.height();
                            sequence = (endSlideTop - (startSlideTop - slideHeight)) / $images.length;
                            offset = (slideHeight - animationImgHeight) / 2;
                            animateSequence();
                        },
                        afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {},
                        onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {}
                    });
                }
            }
            else {
                $('#fullpage').attr('id', '');
            }
        }
    });


})(jQuery);
