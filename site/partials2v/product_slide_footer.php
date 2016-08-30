<?php
if (get_page_propery('slide_footer', 'switch') == 1) :
    $left = get_page_propery('slide_footer', 'left');
    $right = get_page_propery('slide_footer', 'right');
    ?>
    <div class="section fp-auto-height">
        <div class="red-black-block">
            <div class="red-block">
                <h1 class="uppercase"><?php echo $left->title; ?></h1>
                <div class="red-block-text"><?php echo $left->description; ?></div>
            </div>
            <div class="black-block">
                <h1 class="uppercase"><?php echo $right->title; ?></h1>
                <div class="red-block-text"><?php echo $right->description; ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>