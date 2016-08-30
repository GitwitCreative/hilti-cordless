<?php
$s = (array)get_page_section('slide_content');
if (count($s) > 0) :
    uasort($s, function ($a, $b) {
        if ($a->position == $b->position) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    });
    $first = array_shift($s);
    $last  = array_pop($s);
    ?>

    <div class="section start-slide">
        <div class="content">
            <?php
            $images = get_page_propery('general', 'animation_images');
            if (count($images) > 0 && !empty($images[0])) :
                ?>
                <div class="image-sequence">
                    <div id="drill" class="slide_animation">
                        <img src="<?php echo array_shift($images); ?>">
                    </div>
                    <div class="animation_frames">
                        <?php if (count($images) > 0) foreach ($images as $image): ?>
                            <img src="<?php echo $image; ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php
            endif;
            if (!is_null($first)) {
                $content_cover = $first;
                include "product_content_cover.php";
            }
            ?>
        </div>
    </div>
    <?php if (count((array)$s) > 0) foreach ($s as $slide) : ?>
    <div class="section">
        <div class="content">
            <?php
            $content_cover = $slide;
            include "product_content_cover.php";
            ?>
        </div>
    </div>
<?php endforeach; ?>
    <?php if (!is_null($last)): ?>
    <div class="section noHide end-slide">
        <div class="content">
            <?php
            $content_cover = $last;
            include "product_content_cover.php";
            ?>
        </div>
    </div>
    <?php
    endif;
endif;
?>