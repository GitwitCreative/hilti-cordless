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
	if ($('body').not('landing')) {
		var $topMenu = $('.top-menu').first();
		var topMenuHeight = $($topMenu).height();
		var scrollMenu = function() {
			this.oldScroll=this.oldScroll || 0;
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
})(jQuery);