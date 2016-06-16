<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label __textfield--full-width is-dirty <?php
    if ($item['wrapper-classes']) {
      echo $item['wrapper-classes'];
    }
?>">
  <label class="mdl-textfield__label">Icon:</label>

  <?php
    $icons = array(
      'linkedin',
      'arrow-left',
      'arrow-right',
      'charging',
      'close',
      'cold',
      'compability',
      'durability',
      'email',
      'environment',
      'facebook',
      'monitor',
      'navi_inactive',
      'navi',
      'performance',
      'play_full',
      'play',
      'power',
      'reload',
      'runtime',
      'twitter',
      'water'
    );
  ?>

  <?php foreach ($icons as $icon) : ?>
    <input type="radio"
        class="__icon__input"
        id="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] . '__' . $icon; ?>"
        name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
        value="<?php echo $icon; ?>"
        <?php if ($item['value'] == $icon) echo 'checked'; ?>>
    <label class="__icon __icon-<?php echo $icon; ?>"
        for="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] . '__' . $icon; ?>"
        id="label-<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] . '__' . $icon; ?>"></label>
    <div class="mdl-tooltip"
        for="label-<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] . '__' . $icon; ?>">
      <?php echo $icon; ?>
    </div>
  <?php endforeach; ?>
</div>

<input type="radio"
    class="hidden"
    name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
    value=""
    id="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id']; ?>]__empty">

<label
    for="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id']; ?>]__empty"
    class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect">
  Delete Icon
</label>
