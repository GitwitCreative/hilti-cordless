<div class="animation__battery animation__battery--scene-<?php echo $i - 1; ?>"
    id="animation__content--scene-<?php echo $i - 1; ?>">
  <a name="animation" class="animation--trigger" id="battery--scene_<?php echo $i - 1; ?>--trigger"></a>

  <div class="animation--container battery--scene_<?php echo $i - 1; ?>--pin">
    <?php $j = 0; foreach ($section->information as $information) : ?>
      <?php if ($information->position == 'top') : ?>
        <?php include('partials/page/video__section__information.php'); ?>
        <?php $j++; ?>
      <?php endif; ?>
    <?php endforeach; ?>

    <img src="<?php echo $section->image_fallback ?>" class="animation--image animation--battery--scene_<?php echo $i; ?> hide-for-xxlarge-up" alt="">

    <?php $j = 0; foreach ($section->information as $information) : ?>
      <?php if ($information->position == 'bottom') : ?>
        <?php include('partials/page/video__section__information.php'); ?>
        <?php $j++; ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
