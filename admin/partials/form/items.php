<?php
  foreach($form__item__items as $item) {
    switch ($item['type']) {
      case 'title':
        include('partials/form/title.php');
        break;
      case 'textarea':
        include('partials/form/textarea.php');
        break;
      case 'checkbox':
        include('partials/form/checkbox.php');
        break;
      case 'radio':
        include('partials/form/radio.php');
        break;
      case 'hidden':
        include('partials/form/hidden.php');
        break;
      case 'icons':
        include('partials/form/icons.php');
        break;
      case 'button':
        include('partials/form/button.php');
        break;
      default:
        include('partials/form/input.php');
    }

    if ($item['children']) {
      $form__children__title = $item['title'];
      $form__children__name = $item['name'];
      $form__children__classes = $item['child-classes'];
      $form__children__id_base = $form__item__id;

      echo '<div class="__list__children">';

      $k = 0;
      foreach ($item['children'] as $child) {
        $k++;
        include('partials/form/item__child.php');
      }

      echo '</div>';
    }
  }
