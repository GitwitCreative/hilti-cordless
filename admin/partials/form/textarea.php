<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label __textfield--full-width <?php
    if ($item['wrapper-classes']) {
      echo $item['wrapper-classes'];
    }

    if ($item['editor']) {
      echo ' has-editor';
    }
?>">
  <textarea class="mdl-textfield__input"<?php
      if ($item['editor']) {
        echo 'data-js-textarea';
      }
  ?>
      type="text"
      rows="4"
      name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
      id="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] ?>"><?php
    echo $item['value'] ?></textarea>
  <label class="mdl-textfield__label" for="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] ?>"><?php echo $item['name'] ?></label>
</div>

<?php if ($item['help']): ?>
  <p class="mdl-color-text--grey-500 __form__help"><?php echo $item['help'] ?></p>
<?php endif; ?>
