<?php
if (get_page_propery('slide_icons', 'switch') == 1):
    $slide = get_page_propery('slide_icons', 'icons');
    if (!is_null($slide->title) || !is_null($slide->description) || count((array)$slide->icon) > 0) :
        ?>
        <div class="section fp-auto-height">
            <div class="content">
                <div class="dark-gray-line">
                    <div class="title">
                        <h1 class="white uppercase"><?php echo $slide->title; ?></h1>
                        <div class="gray"><?php echo $slide->description; ?></div>
                    </div>
                    <div class="dark-gray-line-icons">
                        <?php foreach ($slide->icon as $icon) : ?>
                            <div class="icon">
                                <img src="<?php echo $icon->icon; ?>">
                                <h2 class="white hiltiSmallExtended normal"><?php echo $icon->title; ?></h2>
                                <div class="gray"><?php echo $icon->description; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endif;
endif;
?>