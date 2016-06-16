<div class="__list__item">
  <?php
    $section = $page->video->video;

    $toggle__header__id = $page__section_name . '__video';
    $toggle__header__title = 'Video';
    $toggle__header__show_icon = true;

    include('partials/toggle__header.php');
  ?>

  <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
    <?php
      $form__item__section = $page__section_name;
      $form__item__id = 'video';
      $form__item__items = array(
        array(
          'id' => 'poster',
          'name' => 'Poster image',
          'value' => $section->poster
        ),
        array(
          'id' => 'video_mp4',
          'name' => 'Video MP4 file',
          'value' => $section->video_mp4
        ),
        array(
          'id' => 'video_webm',
          'name' => 'Video WebM file',
          'value' => $section->video_webm
        ),
        array(
          'id' => 'loader',
          'name' => 'Loader Text',
          'value' => $section->loader
        )
      );
      include('partials/form/items.php');
    ?>
  </div>
</div>
