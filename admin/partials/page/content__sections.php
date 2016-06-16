<?php
  for ($i = 1; $i <= 5; $i++) :
    $section = $page->content->{'section-' . $i};
?>

  <div class="__list__item">
    <?php
      $toggle__header__id = 'content__section-' . $i;
      $toggle__header__title = 'Section ' . $i;
      $toggle__header__subtitle = $section->cta;
      $toggle__header__show_icon = true;

      include('partials/toggle__header.php');
    ?>

    <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
      <?php
        $benefits_children = array();

        for ($j = 1; $j <= 3; $j++) {
          $benefit = $section->benefit->{'child-' . $j};

          array_push($benefits_children, array(
            array(
              'id' => 'title',
              'name' => 'Title',
              'value' => $benefit->title
            ),
            array(
              'id' => 'relatedlink_shorttext',
              'name' => 'Link Text',
              'value' => $benefit->relatedlink_shorttext
            ),
            array(
              'id' => 'relatedlink_href',
              'name' => 'Link',
              'value' => $benefit->relatedlink_href
            ),
            array(
              'id' => 'relatedlink_newWindow',
              'name' => 'Open in new window',
              'value' => $benefit->relatedlink_newWindow,
              'type' => 'checkbox'
            ),
            array(
              'id' => 'headline',
              'name' => 'Headline',
              'value' => $benefit->headline
            ),
            array(
              'id' => 'copy',
              'name' => 'Text (max. 300 characters, including spaces)',
              'value' => $benefit->copy,
              'type' => 'textarea'
            ),
            array(
              'id' => 'trackingId',
              'name' => 'Tracking ID',
              'value' => $benefit->trackingId
            ),
            array(
              'id' => 'show_service_layer',
              'name' => 'Show service layer',
              'value' => $benefit->show_service_layer,
              'type' => 'checkbox',
              'data-attributes' => array(
                'js-toggle' => '',
                'js-target' => '.js-toggle-service-layer-' . $i . '-' . $j
              )
            ),
            array(
              'id' => 'service_headline',
              'name' => 'Service Layer: Headline',
              'value' => $benefit->service_headline,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden'),
              'data-attributes' => array(
                'js-watch' => '',
                'js-watch-target' => '.js-watch-service-name-' . $i . '-' . $j,
                'js-watch-filter' => 'machinereadable append',
                'js-watch-filter-append' => '-' . $i . '-' . $j,
              )
            ),
            array(
              'id' => 'service_name',
              'value' => $benefit->service_name,
              'classes' => 'js-watch-service-name-' . $i . '-' . $j,
              'type' => 'hidden'
            ),
            array(
              'id' => 'service_subheadline',
              'name' => 'Service Layer: Subheadline',
              'value' => $benefit->service_subheadline,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_copy',
              'name' => 'Service Layer: Text',
              'value' => $benefit->service_copy,
              'type' => 'textarea',
              'editor' => true,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_contactlink_text',
              'name' => 'Service Layer: Primary Link Text',
              'value' => $benefit->service_contactlink_text,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_contactlink_href',
              'name' => 'Service Layer: Primary Link',
              'value' => $benefit->service_contactlink_href,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_contactlink_trackingId',
              'name' => 'Service Layer: Primary Link Tracking ID',
              'value' => $benefit->service_contactlink_trackingId,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_relatedlink_text',
              'name' => 'Service Layer: Secondary Link Text',
              'value' => $benefit->service_relatedlink_text,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_relatedlink_href',
              'name' => 'Service Layer: Secondary Link',
              'value' => $benefit->service_relatedlink_href,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
            array(
              'id' => 'service_relatedlink_trackingId',
              'name' => 'Service Layer: Secondary Link Tracking ID',
              'value' => $benefit->service_relatedlink_trackingId,
              'wrapper-classes' => 'js-toggle-service-layer-' . $i . '-' . $j .
                  ($benefit->show_service_layer == 'on' ? '' : ' hidden')
            ),
          ));
        }

        $form__item__section = 'content';
        $form__item__id = 'section-' . $i;
        $form__item__items = array(
          array(
            'id' => 'name',
            'name' => 'Title',
            'value' => $section->name,
            'data-attributes' => array(
              'js-watch' => '',
              'js-watch-target' => '.js-watch-content-navigation-' . $i,
              'js-watch-filter' => 'machinereadable'
            )
          ),
          array(
            'id' => 'persona_id',
            'value' => $section->persona_id,
            'classes' => 'js-watch-content-navigation-' . $i,
            'type' => 'hidden'
          ),
          array(
            'id' => 'image_small',
            'name' => 'Image small',
            'value' => $section->image_small
          ),
          array(
            'id' => 'image_medium',
            'name' => 'Image Medium',
            'value' => $section->image_medium
          ),
          array(
            'id' => 'image_large',
            'name' => 'Image large',
            'value' => $section->image_large
          ),
          array(
            'id' => 'image_alt',
            'name' => 'Image Title (SEO)',
            'value' => $section->image_alt
          ),
          array(
            'id' => 'quote',
            'name' => 'Quote',
            'value' => $section->quote,
            'type' => 'textarea'
          ),
          array(
            'id' => 'statement',
            'name' => 'Statement',
            'value' => $section->statement,
            'type' => 'textarea'
          ),
          array(
            'id' => 'moreLink_trackingId',
            'name' => 'More Link: Tracking ID',
            'value' => $section->moreLink_trackingId
          ),
          array(
            'id' => 'moreLink_text',
            'name' => 'More Link: Text',
            'value' => $section->moreLink_text
          ),
          array(
            'id' => 'backLink_text',
            'name' => 'Back Link: Text',
            'value' => $section->backLink_text
          ),
          array(
            'id' => 'benefits_background',
            'name' => 'Background image for "Benefits" section',
            'value' => $section->benefits_background
          ),
          array(
            'id' => 'benefit-title',
            'type' => 'title',
            'value' => 'Benefits',
            'title' => 'Benefit',
            'name' => 'benefit',
            'children' => $benefits_children
          )
        );

        include('partials/form/items.php');
      ?>
    </div>
  </div>
<?php endfor; ?>
