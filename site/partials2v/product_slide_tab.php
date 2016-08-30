<?php
if (get_page_propery('slide_tab', 'switch') == 1):
    $slide = get_page_propery('slide_tab', 'slide_tab');
    ?>
    <div class="section">
        <div class="content">
            <div class="content-cover">
                <div class="slide-content">
                    <h1 class="uppercase"><?php echo $slide->title; ?></h1>
                    <h2 class="dark-gray hiltiSmallExtended"><?php echo $slide->sub_title; ?></h2>
                </div>

            </div>
            <?php if (count((array)$slide->images) > 0):
                ?>
                <div class="gear-switch-animation">
                    <?php $index = 'child-1';
                    if (isset($slide->images->$index->image_link)): ?>
                        <img src="<?php echo $slide->images->$index->image_link; ?>">
                    <?php endif; ?>

                    <?php $i = 0;
                    foreach ($slide->images as $image): ?>
                        <div class="gear-animation-frames gear-<? echo ++$i; ?>">
                            <img src=" <?php echo $image->image_link; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php
            if (count((array)$slide->tabs) > 0):
                $i = 0;
                ?>
                <div class="make-tab">
                    <ol>
                        <?php
                        foreach ($slide->tabs as $tab) : ?>
                            <li>
                                <div class="tab-title">
                                    <h1 data-gear="gear-<? echo ++$i; ?>">
                                        <?php echo $tab->title; ?>
                                    </h1>
                                </div>
                                <div class="tab-content">
                                    <div class="line_under_tab "><?php echo $tab->description; ?></div>
                                    <div class="tab_each_content">
                                        <?php
                                        if (count((array)$tab->block) > 0)
                                            foreach ($tab->block as $block):
                                                if (isset($block->image_link) && isset($block->description)):
                                                    ?>
                                                    <div class="">
                                                        <img src="<?php echo $block->image_link; ?>">

                                                        <div class="text">
                                                            <?php echo $block->description; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                endif;
                                            endforeach; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
endif;
?>