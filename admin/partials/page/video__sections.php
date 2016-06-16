<?php

  $sections_information_map = array(
    array('bottom'),
    array('top', 'bottom'),
    array('top', 'bottom'),
    array('top', 'bottom'),
    array('top', 'bottom', 'bottom'),
    array('top', 'bottom', 'bottom')
  );

  for ($i = 1; $i <= 6; $i++) :
    $section = $page->video->{'section-' . $i};
?>

  <div class="__list__item">
    <?php
      $toggle__header__id = 'video__section-' . $i;
      $toggle__header__title = 'Section ' . $i;
      $toggle__header__subtitle = $section->name;
      $toggle__header__show_icon = true;

      include('partials/toggle__header.php');
    ?>

    <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
      <?php
        $information_children = array();

        for ($j = 1; $j <= count($sections_information_map[$i - 1]); $j++) {
          $child = $section->information->{'child-' . $j};

          array_push($information_children, array(
            array(
              'id' => 'headline',
              'name' => 'Headline',
              'value' => $child->headline
            ),
            array(
              'id' => 'subline',
              'name' => 'Subline',
              'value' => $child->subline
            ),
            array(
              'id' => 'icon',
              'name' => 'Icon',
              'value' => $child->icon,
              'type' => 'icons'
            ),
            array(
              'id' => 'content',
              'name' => 'Content',
              'value' => $child->content,
              'type' => 'textarea'
            ),
            array(
              'id' => 'position',
              'name' => 'Position',
              'value' => $sections_information_map[$i - 1][$j - 1],
              'type' => 'hidden'
            ),
            array(
              'id' => 'html',
              'name' => 'HTML Content',
              'value' => $child->html
            )
          ));
        }

        $form__item__section = $page__section_name;
        $form__item__id = 'section-' . $i;
        $form__item__items = array(
          array(
            'id' => 'name',
            'value' => $section->name,
            'classes' => 'js-watch-video-navigation-' . $i,
            'type' => 'hidden'
          ),
          array(
            'id' => 'navigation_title',
            'name' => 'Navigation Title',
            'value' => $section->navigation_title,
            'data-attributes' => array(
              'js-watch' => '',
              'js-watch-target' => '.js-watch-video-navigation-' . $i,
              'js-watch-filter' => 'machinereadable'
            )
          ),
          array(
            'id' => 'image_fallback',
            'name' => 'Image fallback',
            'value' => $section->image_fallback
          ),
          array(
            'id' => 'image_highresolution',
            'name' => 'Image Highresolution',
            'value' => $section->image_highresolution
          ),
          array(
            'id' => 'information-title',
            'type' => 'title',
            'value' => 'Information',
            'title' => 'Information',
            'name' => 'information',
            'children' => $information_children
          )
        );

        include('partials/form/items.php');
      ?>
    </div>
  </div>
<?php endfor; ?>
