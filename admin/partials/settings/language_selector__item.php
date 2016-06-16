<?php
  $settings__language_selector__id = str_replace('][', '--', $settings__language_selector__id);

  $toggle__header__id = 'settings__language_selector__' . $settings__language_selector__id;
  $toggle__header__title = ($settings__language_selector__item->name) ? $settings__language_selector__item->name : '{{title}}';
  $toggle__header__subtitle = $settings__language_selector__item->link;
  $toggle__header__show_icon = $settings__language_selector__show_title;

  include('partials/toggle__header.php');
?>
<div class="__list__item__content hidden" id="settings__language_selector__<?php echo $settings__language_selector__id; ?>">
  <?php

    $form__item__section = 'language_selector';
    $form__item__id = $settings__language_selector__id;
    $form__item__items = array(
      array(
        'id' => 'name',
        'name' => 'Name',
        'value' => $section->name
      ),
      array(
        'id' => 'abbreviation',
        'name' => 'Abbreviated Name',
        'value' => $section->abbreviation
      ),
      array(
        'id' => 'code',
        'name' => 'Country Code',
        'value' => $section->code
      ),
      array(
        'id' => 'link',
        'name' => 'Link',
        'value' => $section->link
      ),
      array(
        'id' => 'trackingId',
        'name' => 'Tracking ID',
        'value' => $section->trackingId
      )
    );
    include('partials/form/items.php');
  ?>

  <?php if ($settings__language_selector__delete) : ?>
    <button class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect __layout__align-right"
        type="button"
        data-js-remove
        data-js-target=".__list__item">
      Delete
    </button>
  <?php endif; ?>
</div>
