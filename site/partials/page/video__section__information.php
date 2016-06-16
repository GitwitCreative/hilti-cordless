<div class="animation--information animation--information__<?php echo $information->position; ?>-<?php echo $j; ?> icon icon-<?php echo $information->icon; ?>">
  <h4><?php echo $information->subline; ?></h4>
  <h3><?php echo $information->headline; ?></h3>
  <p><?php echo $information->content; ?></p>

  <?php if ($information->html) : ?>
    <?php echo $information->html; ?>
  <?php endif; ?>
</div>
