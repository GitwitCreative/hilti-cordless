<video
    class="js-video-scroll video-scroll is-hidden"
    poster="<?php echo get_page_propery('video', 'video')->poster; ?>"
    data-src="<?php echo get_page_propery('video', 'video')->video_mp4; ?>,<?php echo get_page_propery('video', 'video')->video_webm; ?>"></video>
<div class="video-scroll__background"></div>

<div class="video-scroll__loader js-video-scroller__loader">
  <?php echo get_page_propery('video', 'loader'); ?>
</div>
