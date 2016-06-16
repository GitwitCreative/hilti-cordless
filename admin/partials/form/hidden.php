<div class="hidden">
  <input type="hidden"
      name="<?php echo $form__item__section . ($form__item__id ? '[' . $form__item__id . ']' : '') . '[' . $item['id'] ?>]"
      class="<?php if ($item['classes']) echo ' ' . $item['classes']; ?>"
      value="<?php echo $item['value'] ?>"<?php
        if ($item['data-attributes']) :
          foreach ($item['data-attributes'] as $name => $value) :
            echo ' data-' . $name . '="' . $value . '"';
          endforeach;
        endif;
      ?>>
</div>
