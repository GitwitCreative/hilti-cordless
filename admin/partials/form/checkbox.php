<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label __textfield--full-width <?php
    if ($item['wrapper-classes']) {
      echo $item['wrapper-classes'];
    }
?>">
  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
      for="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] ?>">
    <input type="checkbox" class="mdl-checkbox__input"
        name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
        id="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] ?>"
        <?php if ($item['value'] === 'on') echo 'checked'; ?><?php
        if ($item['data-attributes']) :
          foreach ($item['data-attributes'] as $name => $value) :
            echo ' data-' . $name . '="' . $value . '"';
          endforeach;
        endif;
      ?>>
    <span class="mdl-checkbox__label"><?php echo $item['name']; ?></span>
  </label>
</div>
