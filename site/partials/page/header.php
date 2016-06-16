<?php
if(!in_array(get_page_propery($page_secion_name, 'header')->navigation_name,$section_names)) {
    array_push($section_names, get_page_propery($page_secion_name, 'header')->navigation_name);
}
if(!in_array(get_page_propery($page_secion_name, 'header')->navigation_title,$section_tooltips)) {
    array_push($section_tooltips, get_page_propery($page_secion_name, 'header')->navigation_title);
}
?>
<div class="article video"
    style="background-image: url('<?php echo get_page_propery($page_secion_name, 'header')->fallback; ?>'); background-position: bottom center; background-repeat: no-repeat;">

  <div class="video--content">
    <div class="video--content__inner">
      <?php if (get_page_propery($page_secion_name, 'header')->headline) : ?>
        <h1><?php echo get_page_propery($page_secion_name, 'header')->headline; ?></h1>
      <?php endif; ?>

      <?php if (get_page_propery($page_secion_name, 'header')->subheadline) : ?>
        <h2><?php echo get_page_propery($page_secion_name, 'header')->subheadline; ?></h2>
      <?php endif; ?>

      <?php if (get_page_propery($page_secion_name, 'header')->production) : ?>
        <a class="play <?php echo get_site_propery('general', 'tracking_element_2'); ?>"
            href="<?php echo get_page_propery($page_secion_name, 'header')->subheadline; ?>"
            id="<?php echo get_page_propery('general', 'trackingId_prefix'); ?>HeroPlayVideo"
            data-jsinit="Layer"
            data-content="#video--layer"
            data-debug="false">
          <?php if (get_page_propery($page_secion_name, 'header')->playtext) : ?>
            <?php echo get_page_propery($page_secion_name, 'header')->playtext; ?>
          <?php endif; ?>
        </a>
      <?php endif; ?>

      <?php if (get_page_propery($page_secion_name, 'header')->linklist) : ?>
        <div class="video--linklist__wrapper <?php
            if (get_page_propery('general', 'type') == 'content') :
              echo 'solutionslist__wrapper';
            endif;
        ?>">
          <ul class="video--linklist  <?php
              if (get_page_propery('general', 'type') == 'content') :
                echo 'solutionslist solutionslist--zoom';
              else :
                echo 'technologylist';
              endif;
          ?>">
            <?php foreach (get_page_propery($page_secion_name, 'header')->linklist as $index => $link) : ?>
              <?php include('partials/page/header__link.php'); ?>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="video--layer"></div>

  <video id="previewVideo" autoplay loop muted
      src="<?php echo get_page_propery($page_secion_name, 'header')->video; ?>"></video>

  <div id="video--layer" class="layer hidden">
    <div class="layer__head">
      <div class="closer js_closeLayer"></div>
    </div>

    <div class="layer__content">
      <iframe id="kaltura_player"
          data-video="true"
          data-src="<?php echo get_page_propery($page_secion_name, 'header')->production; ?>&amp;flashvars[autoPlay]=false"
          data-src-autoplay="<?php echo get_page_propery($page_secion_name, 'header')->production; ?>&amp;flashvars[autoPlay]=true"
          allowfullscreen webkitallowfullscreen mozAllowFullScreen frameborder="0"></iframe>
    </div>
  </div>
</div>
