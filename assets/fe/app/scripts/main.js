;
(function($) {
	// var $video = $('div.video-container').first();
	// // определение IE
	// function iedetect(v) {

	// 	var r = RegExp('msie' + (!isNaN(v) ? ('\\s' + v) : ''), 'i');
	// 	return r.test(navigator.userAgent);

	// }

	// if (screen.width < 800 || iedetect(8) || iedetect(7) || 'ontouchstart' in window) {

	// 	(adjSize = function() {

	// 		$width = $(window).width();
	// 		$height = $(window).height();
	// 		$video.css({
	// 			'background-image': 'url(poster.jpg)',
	// 			'background-size': 'cover',
	// 			'width': $width + 'px',
	// 			'height': $height + 'px'
	// 		});
	// 		$('video').hide();

	// 	})();
	// 	$(window).resize(adjSize);
	// }
	// else {

	// 	$video.find('video').on('loadedmetadata', function() {

	// 		var $width, $height,
	// 			$vidwidth = this.videoWidth,
	// 			$vidheight = this.videoHeight,
	// 			$aspectRatio = $vidwidth / $vidheight;

	// 		(adjSize = function() {

	// 			$width = $(window).width();
	// 			$height = $(window).height();

	// 			$boxRatio = $width / $height;

	// 			$adjRatio = $aspectRatio / $boxRatio;


	// 			$video.css({
	// 				'width': $width + 'px',
	// 				'height': $height + 'px'
	// 			});

	// 			if ($boxRatio < $aspectRatio) {
	// 				$vid = $video.find('video').css({
	// 					'width': $width * $adjRatio + 'px'
	// 				});
	// 			}
	// 			else {
	// 				$vid = $video.find('video').css({
	// 					'width': $width + 'px'
	// 				});
	// 			}

	// 		})();
	// 		$(window).resize(adjSize);

	// 	});
	// }

})(jQuery);

;
(function($) {
	var $body = $('body');
	var $hamburger = $('<div class="hamburger"><div></div><div></div><div></div></div>');
	var $close = $('<li class="close">&times;</li>');
	var $topMenu = $('.top-menu').first();
	var $ulTopMenu = $('.top-menu>ul').first();
	var videoContainers = $(".video-player-one video, .video-player-two video");
	videoContainers.each(function(index){
		var $v=$(this).find("source").first();
		var w=$(this).width();
		var h=$(this).height();
		var ww = $(window).width();
		var hvw = h/w*w/ww*100+'vw';
		$(this).replaceWith('<iframe class="'+$(this).attr("class")+'" src="'+$v.attr("src")+'" style="height: '+hvw+';"></iframe>');
	})
	$hamburger.off('click').on('click', function(e) {
		$body.toggleClass("translated");
	});
	$close.off('click').on('click', function(e) {
		$body.removeClass("translated");
	});
	$ulTopMenu.prepend($close);
	$body.addClass('slidemenu');
	if ($body.not('landing')) {
		var topMenuHeight = $($topMenu).height();
		var scrollMenu = function() {
			this.oldScroll = this.oldScroll || 0;
			var newScroll = $(this).scrollTop();
			// $($topMenu).css('top',newScroll);
			if (newScroll > this.oldScroll) {
				if (newScroll >= topMenuHeight) {
					$($topMenu).addClass('go-hide');
				}
			}
			else {
				$($topMenu).removeClass('go-hide');
			}
			this.oldScroll = newScroll;
		}
		

		$(window).scroll(scrollMenu);
	}
	$topMenu.append($hamburger);
})(jQuery);