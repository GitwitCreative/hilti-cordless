<?php
if (get_page_propery('slide_videos', 'switch') == 1) :
    $videos = get_page_propery('slide_videos', 'videos');
    ?>
    <div class="section fp-auto-height">
        <div class="content">
            <?php if (count((array) $videos) == 1) : ?>
                <div class="video-player-one h100vh">
                    <?php foreach ($videos as $video) : ?>
                        <video controls="controls" muted class="w80p player-shadow">
                            <source src="<?php echo $video->video_link; ?>"
                                    type="video/mp4">
                        </video>
                    <?php endforeach; ?>
                </div>
            <?php elseif (count((array) $videos) > 1) : ?>
                <div class="video-player-two h40vh">
                    <?php foreach ($videos as $video) : ?>
                        <video controls="controls" muted class="w40p player-shadow">
                            <source src="<?php echo $video->video_link; ?>" type="video/mp4">
                        </video>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>