<?php
  $section = $page->video->products;
?>
<div class="__list__item">
  <?php
    $toggle__header__id = 'video__products';
    $toggle__header__title = 'Products';
    $toggle__header__subtitle = $section->name;
    $toggle__header__show_icon = true;

    include('partials/toggle__header.php');
  ?>

  <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
    <?php
      $products_children = array();

      for ($j = 1; $j <= 30; $j++) {
        $child = $section->products->{'child-' . $j};

        array_push($products_children, array(
          array(
            'id' => 'headline',
            'name' => 'Headline',
            'value' => $child->headline
          ),
          array(
            'id' => 'subheadline',
            'name' => 'Sub-Headline',
            'value' => $child->subheadline
          ),
          array(
            'id' => 'link_text',
            'name' => 'Link Text',
            'value' => $child->link_text
          ),
          array(
            'id' => 'link_link',
            'name' => 'Link URL',
            'value' => $child->link_link
          ),
          array(
            'id' => 'image_thumbnail',
            'name' => 'Image Thumbnail',
            'value' => $child->image_thumbnail
          ),
          array(
            'id' => 'image_slider',
            'name' => 'Image slider',
            'value' => $child->image_slider
          ),
          array(
            'name' => 'Delete',
            'type' => 'button',
            'data-attributes' => array(
              'js-remove' => '',
              'js-target' => '.__list__item--' . $i . '-' . $j
            )
          )
        ));
      }

      $form__item__section = $page__section_name;
      $form__item__id = 'products';
      $form__item__items = array(
        array(
          'id' => 'navigation_title',
          'name' => 'Navigation Title',
          'value' => $section->navigation_title
        ),
        array(
          'id' => 'headline',
          'name' => 'Headline',
          'value' => $section->headline
        ),
        array(
          'id' => 'subline',
          'name' => 'Subline',
          'value' => $section->subline
        ),
        array(
          'id' => 'side_element_headline',
          'name' => 'Side Element: Headline',
          'value' => $section->side_element_headline
        ),
        array(
          'id' => 'side_element_image',
          'name' => 'Side Element: Image',
          'value' => $section->side_element_image
        ),
        array(
          'id' => 'makeitfit_text',
          'name' => 'Make It Fit: Text',
          'value' => $section->makeitfit_text,
          'type' => 'textarea',
          'editor' => true
        ),
        array(
          'id' => 'makeitfit_link',
          'name' => 'Make It Fit: Link',
          'value' => $section->makeitfit_link
        ),
        array(
          'id' => 'makeitfit_image',
          'name' => 'Make It Fit: Image',
          'value' => $section->makeitfit_image
        ),
        array(
          'id' => 'makeitfit_trackingId',
          'name' => 'Make It Fit: Tracking ID',
          'value' => $section->makeitfit_trackingId
        ),
        array(
          'id' => 'product-title',
          'type' => 'title',
          'value' => 'Products',
          'title' => 'Product',
          'name' => 'products',
          'child-classes' => 'hidden',
          'children' => $products_children
        )
      );

      include('partials/form/items.php');
    ?>

    <div class="mdl-card__supporting-text">
      <a href="#"
          class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
          data-js-add
          data-js-parent=".__list__item"
          data-js-target=".__list__children .__list__item.hidden:first">
        Add another Product
      </a>
    </div>
  </div>
</div>

