<?php
$footer = get_site_section('footer');
?>
<div class="section fp-auto-height">
    <div class="content">
        <div class="black-line footer">
            <div>
                <h4 class="white uppercase"><?php $i = 1;
                    echo $footer->$i->title; ?></h4>
                <ul>
                    <?php echo $footer->$i->description; ?>
                </ul>
            </div>
            <div>
                <h4 class="white uppercase"><?php $i = 2;
                    echo $footer->$i->title; ?></h4>
                <ul>
                    <?php echo $footer->$i->description; ?>
                </ul>
            </div>
            <div>
                <h4 class="white uppercase"><?php $i = 3;
                    echo $footer->$i->title; ?></h4>
                <ul>
                    <?php echo $footer->$i->description; ?>
                </ul>
            </div>
            <div>
                <h4 class="white uppercase"><?php $i = 4;
                    echo $footer->$i->title; ?></h4>
                <ul>
                    <?php echo $footer->$i->description; ?>
                </ul>
            </div>
            <div class="text">
                <p class="gray"><?php $i = 5;
                    echo $footer->$i->description; ?></p>
            </div>
            <div class="icons">
                <p>
                    <?php
                    $i = 'social_links';
                    $links = (array) $footer->$i->social_link;
                    if (count($links) > 0)
                        foreach ($links as $link):?>
                            <a href="<?php echo $link->link_link; ?>"><i class="fa <?php echo $link->icon; ?> red"></i></a>
                        <?php endforeach; ?>
                </p>
            </div>
        </div>
    </div>
</div>