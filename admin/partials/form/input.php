<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label __textfield--full-width <?php
if ($item['wrapper-classes']) {
    echo $item['wrapper-classes'];
}
?>">
    <input type="text"
           name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
           id="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] ?>"
           class="mdl-textfield__input<?php if ($item['classes']) echo ' ' . $item['classes']; ?>"
           <?php if ($item['required'] === true) : ?>
           required="required"
           <?php endif;?>
           value="<?php echo $item['value'] ?>"<?php
    if ($item['data-attributes']) :
        foreach ($item['data-attributes'] as $name => $value) :
            echo ' data-' . $name . '="' . $value . '"';
        endforeach;
    endif;
    ?>>
    <label class="mdl-textfield__label"
           for="<?php echo $form__item__section . '__' . ($form__item__id ? $form__item__id . '__' : '') . $item['id'] ?>">
        <?php echo $item['name'] ?>
    </label>
</div>

<?php if ($item['help']): ?>
    <p class="mdl-color-text--grey-500 __form__help"><?php echo $item['help'] ?></p>
<?php endif; ?>
