<?php if ($content_cover->switch == 1) : ?>
    <div class="content-cover">
        <div class="slide-content">
            <h1 class="uppercase"><?php echo $content_cover->title; ?></h1>
            <h2 class="dark-gray hiltiSmallExtended"><?php echo $content_cover->sub_title; ?></h2>
            <h2 class="text hiltiSmallBold"><?php echo $content_cover->description; ?></h2>
            <h4 class="text hiltiSmall italic gray small"><?php echo $content_cover->footnote; ?></h4>
        </div>
        <?php if (isset($content_cover->list)) : ?>
            <div class="slide-icons">
                <?php foreach ($content_cover->list as $item): ?>
                    <div class="hiltiSmallHeavyExtended">
                        <div class="icon"><img src="<?php echo $item->icon;?>"></div>
                        <div class="icon-text"><?php echo $item->description;?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>