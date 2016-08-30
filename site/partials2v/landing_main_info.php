<?php
$lending = get_page_propery('tile', 'categories');
?>

<div class="overlay">
    <div id="videoPopup">
        <div class="close_video"><a href="javascript:void(0);" class="close_video">&times;</a></div>
        <video loop="loop" tabindex="0" controls="controls" preload="auto" autoplay="autoplay">
            <source src="<?php echo $lending->video;?>" type='video/mp4;' />
        </video>
    </div>
</div>

<?php
include('navigation.php');
get_page_propery('slide_footer', 'switch');
?>

<div class="subheader-cover">
    <div class="subheader-data">
        <div class="right-border">
            <div class="header red uppercase"><?php echo $lending->title;?></div>
            <div class="label uppercase"><?php echo $lending->sub_title;?></div>
        </div>
        <div class="subheader-text">
            <div class=""><?php echo $lending->description;?></div>
        </div>
        <div class="">
            <button class="videoPopup_open uppercase">watch video</button>
        </div>
    </div>
</div>