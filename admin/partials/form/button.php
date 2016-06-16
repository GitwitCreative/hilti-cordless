<button class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect __layout__align-right"
    type="button"<?php
      if ($item['data-attributes']) :
        foreach ($item['data-attributes'] as $name => $value) :
          echo ' data-' . $name . '="' . $value . '"';
        endforeach;
      endif;
    ?>>
  <?php echo $item['name'] ?>
</button>
