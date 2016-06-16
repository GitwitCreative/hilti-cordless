<div class="__textfield--full-width __form__radio-button <?php
    if ($item['wrapper-classes']) {
      echo $item['wrapper-classes'];
    }
?>">
  <p class="__form__radio-button__title"><?php echo $item['name']; ?>:</p>

  <?php foreach ($item['options'] as $option) : ?>
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
        for="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] . $option['id']; ?>">
      <input type="radio" class="mdl-radio__button"
          name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
          id="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] . $option['id']; ?>"
          value="<?php echo $option['value'] ?>"
          <?php if ($item['value'] === $option['value']) echo 'checked'; ?>>
      <span class="mdl-radio__label"><?php echo $option['name']; ?></span>
    </label>
  <?php endforeach; ?>
</div>
