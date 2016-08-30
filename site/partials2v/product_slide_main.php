<div class="section fp-auto-height">
    <div class="content">
        <?php
        $category_id = get_page_propery('general', 'category');
        $product_id  = get_page_propery('general', 'id');

        include('submenu.php');

        if (get_page_propery('slide_main', 'switch') == 1) :
            $slide_main = get_page_propery('slide_main', 'slide_main');
            $left    = get_page_propery('slide_main', 'left');
            $right   = get_page_propery('slide_main', 'right');
            ?>
            <div class="video-container video-container-middle">
                <video autoplay loop muted class="w100p" data-keepplaying>
                    <source src="<?php echo $slide_main->video_link; ?>" type="video/mp4">
                </video>
                <div class="video-content h100p w100p textured"></div>
                <div class="video-content h100p">
                    <div class="video-text">
                        <?php echo $left->description; ?>
                        <?php echo $right->description; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>