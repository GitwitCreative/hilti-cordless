;
(function($) {
	var $video = $('div.video-container-wide').first();
	// определение IE
	function iedetect(v) {

		var r = RegExp('msie' + (!isNaN(v) ? ('\\s' + v) : ''), 'i');
		return r.test(navigator.userAgent);

	}

	// Для мобильных экранов просто покажите изображение под названием 'poster.jpg'. Мобильные
	// экраны не поддерживают автопроигрывание видео, или для IE.
	if (screen.width < 800 || iedetect(8) || iedetect(7) || 'ontouchstart' in window) {

		(adjSize = function() { // Создайте функцию с названием adjSize

			$width = $(window).width(); // Ширина экрана
			$height = $(window).height(); // Высота экрана

			// Соответственно масштабируйте изображение
			$video.css({
				'background-image': 'url(poster.jpg)',
				'background-size': 'cover',
				'width': $width + 'px',
				'height': $height + 'px'
			});

			// Скройте видео
			$('video').hide();

		})(); // Немедленно запустите

		// Запустите также масштабирование
		$(window).resize(adjSize);
	}
	else {

		// Подождите, пока загрузятся метаданные видео
		$video.find('video').on('loadedmetadata', function() {

			var $width, $height, // Ширина и высота экрана
				$vidwidth = this.videoWidth, // Ширина видео (настоящая)
				$vidheight = this.videoHeight, // Высота видео (настоящая)
				$aspectRatio = $vidwidth / $vidheight; // Соотношение высоты и ширины видео

			(adjSize = function() { // Создайте функцию с названием adjSize

				$width = $(window).width(); // Ширина экрана
				$height = $(window).height(); // Высота экрана

				$boxRatio = $width / $height; // Соотношение экрана

				$adjRatio = $aspectRatio / $boxRatio; // Соотношение видео, разделенное на размер экрана

				// Установите контейнер на ширину и высоту экрана
				$video.css({
					'width': $width + 'px',
					'height': $height + 'px'
				});

				if ($boxRatio < $aspectRatio) { // Если соотношение экрана меньше соотношения размеров...
					// Установите ширину видео на размер экрана, умноженный на $adjRatio
					$vid = $video.find('video').css({
						'width': $width * $adjRatio + 'px'
					});
				}
				else {
					// Еще раз установите видео на ширину экрана/контейнера
					$vid = $video.find('video').css({
						'width': $width + 'px'
					});
				}

			})(); // Немедленно запустите функцию

			// Запустите функцию также при изменении размера окна.
			$(window).resize(adjSize);

		});
	}

})(jQuery);

;
(function($) {
	var container = $(window);
	var $menu = $('.top-menu').first();
	var currentY = 0;
	var flag = true;
	/*
	container.on("scroll", function(e) {
		if (flag) {
			flag = false;
			setTimeout(function() {
				if (e.currentTarget.scrollY - currentY > 0) {
					$menu.addClass("scrolled-down");
					setTimeout(function() {
						$menu.addClass("hidden");
						$menu.removeClass("scrolled-down");
						flag = true;
					}, 500);
				}
				else {
					$menu.addClass("scrolled-up");
					$menu.removeClass("hidden");
					setTimeout(function() {
						$menu.removeClass("scrolled-up");
						flag = true;
					}, 500);
				}
				currentY = e.currentTarget.scrollY;
			}, 100);
		}
	})*/
})(jQuery);