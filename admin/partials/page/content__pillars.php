<?php
  $section = $page->content->pillars;
?>
<div class="__list__item">
  <?php
    $toggle__header__id = 'content__pillars';
    $toggle__header__title = 'Pillars';
    $toggle__header__subtitle = $section->headline;
    $toggle__header__show_icon = true;

    include('partials/toggle__header.php');
  ?>

  <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
    <?php
      $pillars_children = array();

      for ($j = 1; $j <= 4; $j++) {
        $pillar = $section->pillars->{'child-' . $j};

        array_push($pillars_children, array(
          array(
            'id' => 'headline',
            'name' => 'Headline',
            'value' => $pillar->headline
          ),
          array(
            'id' => 'solutions-1',
            'name' => 'Content 1',
            'value' => $pillar->{'solutions-1'}
          ),
          array(
            'id' => 'solutions-2',
            'name' => 'Content 2',
            'value' => $pillar->{'solutions-2'}
          ),
          array(
            'id' => 'solutions-3',
            'name' => 'Content 3',
            'value' => $pillar->{'solutions-3'}
          ),
        ));
      }

      $form__item__section = 'content';
      $form__item__id = 'pillars';
      $form__item__items = array(
        array(
          'id' => 'headline',
          'name' => 'Headline',
          'value' => $section->headline
        ),
        array(
          'id' => 'navigation_name',
          'name' => 'Navigation Name',
          'value' => $section->navigation_name
        ),
        array(
          'id' => 'navigation_title',
          'name' => 'Navigation Title',
          'value' => $section->navigation_title
        ),
        array(
          'id' => 'pillar-title',
          'type' => 'title',
          'value' => 'Pillars',
          'title' => 'Pillar',
          'name' => 'pillars',
          'children' => $pillars_children
        )
      );

      include('partials/form/items.php');
    ?>
  </div>
</div>
