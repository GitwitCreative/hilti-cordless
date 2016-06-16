<div class="__list__item">
  <?php
    $section = $page->$page__section_name->header;

    $toggle__header__id = $page__section_name . '__header';
    $toggle__header__title = 'Header';
    $toggle__header__subtitle = $section->cta;
    $toggle__header__show_icon = true;

    include('partials/toggle__header.php');
  ?>

  <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
    <?php
      $linklist_children = array();
      $linklist_count = 6;

      if ($page->general->type == 'content') {
        $linklist_count = 5;
      }

      for ($j = 1; $j <= $linklist_count; $j++) {
        $link = $section->linklist->{'child-' . $j};

        array_push($linklist_children, array(
          array(
            'id' => 'text',
            'name' => 'Text',
            'value' => $link->text
          ),
          array(
            'id' => 'description',
            'name' => 'Description',
            'value' => $link->description
          ),
          array(
            'id' => 'link',
            'name' => 'Link',
            'value' => $link->link
          ),
          array(
            'id' => 'icon',
            'name' => 'Icon',
            'value' => $link->icon,
            'type' => 'icons'
          ),
          array(
            'id' => 'trackingId',
            'name' => 'Tracking ID',
            'value' => $link->trackingId
          ),
          array(
            'id' => 'background',
            'name' => 'Background Image',
            'value' => $link->background
          ),
          array(
            'id' => 'background_hover',
            'name' => 'Background Image Hover',
            'value' => $link->background_hover
          ),
        ));
      }

      $form__item__section = $page__section_name;
      $form__item__id = 'header';
      $form__item__items = array(
        array(
          'id' => 'navigation_name',
          'value' => $section->navigation_name,
          'classes' => 'js-watch-header-navigation',
          'type' => 'hidden'
        ),
        array(
          'id' => 'navigation_title',
          'name' => 'Navigation Title',
          'value' => $section->navigation_title,
          'data-attributes' => array(
            'js-watch' => '',
            'js-watch-target' => '.js-watch-header-navigation',
            'js-watch-filter' => 'machinereadable'
          )
        ),
        array(
          'id' => 'video',
          'name' => 'Video',
          'value' => $section->video
        ),
        array(
          'id' => 'production',
          'name' => 'Video in Overlay',
          'value' => $section->production
        ),
        array(
          'id' => 'fallback',
          'name' => 'Fallback Image for Video',
          'value' => $section->fallback
        ),
        array(
          'id' => 'headline',
          'name' => 'Content Headline',
          'value' => $section->headline
        ),
        array(
          'id' => 'subheadline',
          'name' => 'Content Sub-Headline',
          'value' => $section->subheadline
        ),
        array(
          'id' => 'playtext',
          'name' => 'Content Play Text',
          'value' => $section->playtext
        ),
        array(
          'id' => 'linklist-title',
          'type' => 'title',
          'value' => 'Linklist',
          'title' => 'Link',
          'name' => 'linklist',
          'children' => $linklist_children
        )
      );
      include('partials/form/items.php');
    ?>
  </div>
</div>
