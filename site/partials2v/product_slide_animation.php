<?php
if (get_page_propery('slide_animation', 'switch') == 1):
    $slide = get_page_propery('slide_animation', 'content');
    ?>
    <div class="section fp-auto-height">
        <div class="content">
            <div class="inset-shadow h100vh flex-row-center-left">
                <!--<div class="rumble h100vh overflow-hidden">
                    <div class="progress-bar">
                        <div class="progress-bar-scale w100p"></div>
                        <div class="progress-bar-pointer"></div>
                        <div class="captions">
                            <div class="wood uppercase">Wood</div>
                            <div class="red-alert">!</div>
                            <div class="wood uppercase">Wood</div>
                        </div>
                        <div class="scale-center segment-red"></div>
                        <div class="obstruction uppercase">obstruction</div>
                    </div>
                    <div class="shake-container shake shake-constant">
                        <img class="shake-drill-img" src="<?php /*echo $slide->image;*/?>">
                        <div class="shake-vawes"></div>
                    </div>
                </div>-->
                <div class="slide-content">
                    <h1 class="uppercase"><?php echo $slide->title;?></h1>
                    <h2 class="dark-gray hiltiSmallExtended"><?php echo $slide->sub_title;?></h2>
                    <h2 class="text hiltiSmallBold"><?php echo $slide->description;?></h2>
                </div>
                <img src="/assets/fe/app/images/animation/sid-rumble.gif" class="sid-rumble redundant" alt="" />
<!--                <div class="siluet"><img src="/fe/app/images/bar/siluet.png"></div>-->
            </div>
        </div>
    </div>
    <?php
endif;
?>