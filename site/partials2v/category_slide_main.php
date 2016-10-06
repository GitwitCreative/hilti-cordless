<div class="section fp-auto-height">
    <?php
    $category_id = get_page_propery('general', 'id');
    $product_id  = null;

    include('submenu.php');

    $slide = get_page_section('first');
    if (isset($slide->title)) :
        ?>
        <div class="video-container video-container-wide h100p w100p">

            <video autoplay loop muted class="w100p">
                <source src="<?php echo $slide->video; ?>" type="video/mp4">
            </video>

            <div class="video-content h100p w100p textured"></div>

            <div class="video-content h100p w100p">
                <div class="video-text">
                    <div class="flex1 border-right as-powerfull">
                        <div class="red header hiltiSmall uppercase"><?php echo $slide->title; ?></div>
                        <div class="black label hiltiSmallHeavyExtended uppercase"><?php echo $slide->sub_title; ?></div>
                    </div>
                    <div class="flex2  center as-powerfull">
                        <p><?php echo $slide->description; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endif;
    ?>
</div>
