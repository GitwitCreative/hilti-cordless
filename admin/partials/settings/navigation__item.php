<?php
  $settings__navigation__id = str_replace('][', '--', $settings__navigation__id);

  $toggle__header__id = 'settings__navigation__' . $settings__navigation__id;
  $toggle__header__title = ($settings__navigation__item->title) ? $settings__navigation__item->title : '{{title}}';
  $toggle__header__subtitle = $settings__navigation__item->link;
  $toggle__header__show_icon = $settings__navigation__show_title;

  include('partials/toggle__header.php');
?>
<div class="__list__item__content hidden" id="settings__navigation__<?php echo $settings__navigation__id; ?>">
  <?php
    $navigation_children = array();

    for ($j = 1; $j <= 6; $j++) {
      $child = $section->children->{'child-' . $j};

      array_push($navigation_children, array(
        array(
          'id' => 'title',
          'name' => 'Title',
          'value' => $child->title
        ),
        array(
          'id' => 'link',
          'name' => 'Link',
          'value' => $child->link
        ),
        array(
          'id' => 'trackingId',
          'name' => 'Tracking ID',
          'value' => $child->trackingId
        ),
        array(
          'id' => 'class',
          'name' => 'Class',
          'value' => $child->class
        ),
        array(
          'id' => 'real_link',
          'name' => 'Link in CMS Site',
          'value' => $child->real_link
        )
      ));
    }

    $form__item__section = 'navigation';
    $form__item__id = $settings__navigation__id;
    $form__item__items = array(
      array(
        'id' => 'title',
        'name' => 'Title',
        'value' => $section->title,
        'data-attributes' => array(
          'js-watch' => '',
          'js-watch-target' => '.js-toggle-title-' . $toggle__header__id
        )
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
      ),
      array(
        'id' => 'class',
        'name' => 'Class',
        'value' => $section->class
      ),
      array(
        'id' => 'real_link',
        'name' => 'Link in CMS Site',
        'value' => $section->real_link
      ),
      array(
        'id' => 'children-title',
        'type' => 'title',
        'value' => 'Sub Navigation',
        'title' => 'Item',
        'name' => 'children',
        'child-classes' => 'hidden',
        'children' => $navigation_children
      )
    );
    include('partials/form/items.php');
  ?>

  <a href="#"
      class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
      data-js-add
      data-js-target=".__list__children .__list__item.hidden:first">
    Add Child Page
  </a>

  <?php if ($settings__navigation__delete) : ?>
    <button class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect __layout__align-right"
        type="button"
        data-js-remove
        data-js-target=".__list__item">
      Delete
    </button>
  <?php endif; ?>
</div>
