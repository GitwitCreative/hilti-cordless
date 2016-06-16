<div class="__list__item<?php
    if ($form__children__classes && $child[0]['value'] == '') echo ' ' . $form__children__classes;
?> __list__item--<?php echo $i; ?>-<?php echo $k; ?>">
  <?php
    $toggle__header__id = $page__section_name . '__section-' . $i . '--' . $form__children__name . '-' . $k;
    $toggle__header__title = $form__children__title . ' ' . $k;
    $toggle__header__subtitle = ($child->headline) ? $child->headline : $child[0]['value'];
    $toggle__header__show_icon = true;

    include('partials/toggle__header.php');
  ?>

  <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
    <?php
      $form__item__items = $child;
      $form__item__id = $form__children__id_base . '][' . $form__children__name . '][child-' . $k;
      include('partials/form/items.php');
    ?>
  </div>
</div>
