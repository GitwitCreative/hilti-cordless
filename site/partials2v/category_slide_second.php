<?php
$slide = get_page_section('second');
?>
<div class="section fp-auto-height">
    <div class="gray-line w100p tested-leadership">
        <div class="flex-column">
            <h1><?php echo $slide->title;?></h1>
            <p><?php echo $slide->sub_title;?></p>
        </div>
        <div class="flex-row">
            <div class="flex-column">
                <img class="award" src="<?php echo $slide->left_image;?>">
                <?php echo $slide->left_description;?>
            </div>
            <div class="flex-column">
                <img class="award" src="<?php echo $slide->right_image;?>">
                <?php echo $slide->right_description;?>
            </div>
        </div>
    </div>
</div>