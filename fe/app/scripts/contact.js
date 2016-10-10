$(window).bind("load", function () {
    var main_swiper;
    var get_sizes = function () {
        var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        return [w, h];
    };
    // Get active slide
    var get_active_slide = function () {
        var active;
        try {
            active = $(main_swiper.container).find('.swiper-slide-active')
        } catch (e) {
        }
        return active ? active : $();
    };
    // Clone active slide to "click box"
    var clone_slide = function () {
        if (get_sizes()[0] > 768) {
            var $active_slide = get_active_slide();
            var $box = $('.slider .slider-controller').empty();
            $active_slide.clone().css({
                width: $active_slide.width(),
                height: $active_slide.height(),
                background: '#cccccc'
            }).data('parent', $active_slide).appendTo($box);
        }
    };


    main_swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        // slidesPerView: 'auto',
        slidesPerView: (get_sizes()[0] > 768 ? 3 : 'auto'),
        paginationClickable: true,
        spaceBetween: (get_sizes()[0] > 768 ? 30 : 10),
        nextButton: '.button-next',
        prevButton: '.button-prev',
        touchEventsTarget: 'wrapper',
        centeredSlides: true,
        onSlideChangeEnd: clone_slide
    });
    // Run clone slide on startup
    if (get_active_slide().length) {
        clone_slide();
    } else {
        var slider_interval = setInterval(function () {
            if (get_active_slide().length) {
                clone_slide();
                clearInterval(slider_interval);
            }
        }, 100);
    }
    $(window).resize(function () {
        main_swiper.params.slidesPerView = (get_sizes()[0] > 768 ? 3 : 'auto');
        main_swiper.params.spaceBetween = (get_sizes()[0] > 768 ? 30 : 10);
        main_swiper.update();
    });

    
    // Video player
    var vo = $('.video-overlay');
    var vo_prev = vo.find('.button-left');
    var vo_next = vo.find('.button-right');
    // closes button
    var vo_close = vo.find('.close').click(function () {
        vo.find('.video-container').empty();
        vo.data('play_list', []);
        $(vo).hide();
    });
    // prev button
    vo_prev.click(function () {
        var play_list = vo.data('play_list');
        var playing_num = vo.data('playing_num');
        if (!play_list || play_list.length == 0)return;
        if (playing_num > 0) {
            vo.data('play')(--playing_num);
        }
    });
    // next button
    vo_next.click(function () {
        var play_list = vo.data('play_list');
        var playing_num = vo.data('playing_num');
        if (!play_list || play_list.length == 0)return;
        if (playing_num < play_list.length - 1) {
            vo.data('play')(++playing_num);
        }
    });
    // on slider clicked play
    $('body').on('click', '.play-video-tag', function () {
        var $this = $(this);
        var $active_slide;
        if ($(this).closest('.swiper-slide').data('parent')) {
            $active_slide = $(this).closest('.swiper-slide').data('parent');
            $this = $active_slide.find('.play-video-tag');
        } else {
            $active_slide = $(this).closest('.swiper-slide');
        }
        var $top_box = $active_slide.closest('.swiper-wrapper');
        var play_list = [];
        $top_box.find('.play-video-tag').each(function () {
            try {
                play_list.push({sources: JSON.parse($(this).data('video-sources-array').replace(new RegExp("'",'img'),'"')), playing: $this.is($(this))})
            } catch (e) {
                alert('Wrong sources!')
            }
        });
        $('.video-overlay').data('play_list', play_list).data('play')();
    });
    // plays function
    vo.data('play',function (video_num) {
        var play_list = vo.data('play_list');
        if (!play_list || play_list.length == 0)return;
        var playing_num;
        // found "playing" video
        if(video_num == undefined){
            playing_num = -1;
            play_list.forEach(function (obj, num) {
                if(obj.playing){
                    playing_num = num;
                }
            });
        } else {
            playing_num = video_num;
        }
        if (playing_num == -1 || video_num != undefined){
            playing_num = video_num || 0;
            play_list.forEach(function (obj, num) {
                play_list[num].playing = (num == playing_num);
            });
        }
        vo.data('playing_num', playing_num);
        var video_html = '<video tabindex="0" controls="controls" preload="auto" autoplay="autoplay" id="modal-video">';
        play_list[playing_num].sources.forEach(function (obj, num) {
            video_html += $('<source src="" type="">').attr('src', obj.src).attr('type', obj.type)[0].outerHTML;
        });
        video_html += '</video>';

        if (playing_num == 0) {
            vo_prev.addClass('button-disabled')
        } else {
            vo_prev.removeClass('button-disabled')
        }
        if (!(playing_num < play_list.length - 1)) {
            vo_next.addClass('button-disabled')
        } else {
            vo_next.removeClass('button-disabled')
        }
        vo.find('.video-container').html(video_html);
        vo.find('.video-container video').on('ended', function () {
            if (!(playing_num < play_list.length - 1)) {
                vo_close.click();
            } else {
                vo_next.click();
            }
        });
        vo.show();
    });

    // contact overlay
    var co = $('.contact-overlay');
    var co_close = co.find('.close');
    co_close.on('click', function () {
        co.hide();
    });

    $('.contact-footer').click(function () {
        co.show();
    });
});