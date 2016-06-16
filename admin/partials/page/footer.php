<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--8-col"
    id="pagedata-footer">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Footer</h2>
  </div>
  <form method="POST"
      action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo get_current_page_name(); ?>#pagedata-footer">
    <div class="mdl-card__supporting-text __card__content--full-width">
      <?php
        $message__text = $page__message['footer'];
        include('partials/message.php');
      ?>

      <p>Edit the page's footer here.</p>

      <?php
        $page = get_current_page();

        for ($i = 1; $i <= 2; $i++) :
          $section = $page->footer->{'section-' . $i};
      ?>

        <div class="__list__item">
          <?php
            $toggle__header__id = 'footer__section-' . $i;
            $toggle__header__title = 'Section ' . $i;
            $toggle__header__subtitle = $section->cta;
            $toggle__header__show_icon = true;

            include('partials/toggle__header.php');
          ?>

          <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
            <?php
              $form__item__section = 'footer';
              $form__item__id = 'section-' . $i;
              $form__item__items = array(
                array(
                  'id' => 'image',
                  'name' => 'Image',
                  'value' => $section->image
                ),
                array(
                  'id' => 'cta',
                  'name' => 'Text',
                  'value' => $section->cta,
                  'type' => 'textarea',
                  'editor' => true
                ),
                array(
                  'id' => 'phone',
                  'name' => 'Sub-Text',
                  'value' => $section->phone,
                  'type' => 'textarea',
                  'editor' => true
                ),
                array(
                  'id' => 'link',
                  'name' => 'Link',
                  'value' => $section->link
                ),
                array(
                  'id' => 'target',
                  'name' => 'Open in new window',
                  'value' => $section->target,
                  'type' => 'checkbox'
                ),
                array(
                  'id' => 'trackingId',
                  'name' => 'Tracking ID',
                  'value' => $section->trackingId
                )
              );
              include('partials/form/items.php');
            ?>
          </div>
        </div>
      <?php endfor; ?>
    </div>

    <div class="mdl-card__actions mdl-card--border">
      <button
          name="pagedata[footer]"
          class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Save
      </button>
    </div>
  </form>
</div>
