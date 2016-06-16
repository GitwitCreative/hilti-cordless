<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--6-col">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">General</h2>
  </div>
  <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>" method="POST">
    <div class="mdl-card__supporting-text">
      <div>General settings for this page.</div>

      <?php
        $message__text = $settings_message['general'];
        include('partials/message.php');
      ?>

      <?php
        $section = $SITE['current-site']->general;

        $form__item__section = 'general';
        $form__item__id = false;
        $form__item__items = array(
          array(
            'id' => 'lang',
            'name' => 'Language',
            'value' => $section->lang
          ),
          array(
            'id' => 'language_html',
            'name' => 'Language for HTML Tag',
            'value' => $section->language_html
          ),
          array(
            'id' => 'domain',
            'name' => 'Domain',
            'value' => $section->domain
          ),
          array(
            'id' => 'asset_domain',
            'name' => 'Asset Domain',
            'value' => $section->asset_domain
          ),
          array(
            'id' => 'meta.title',
            'name' => 'Meta Title',
            'value' => $section->{'meta.title'}
          ),
          array(
            'id' => 'meta.description',
            'name' => 'Meta Description',
            'value' => $section->{'meta.description'},
            'type' => 'textarea'
          ),
          array(
            'id' => 'header.title',
            'name' => 'Title in Header',
            'value' => $section->{'header.title'}
          ),
          array(
            'id' => 'navigation_mobile_title',
            'name' => 'Navigation: Open title on mobile',
            'value' => $section->navigation_mobile_title
          ),
          array(
            'id' => 'navigation_title',
            'name' => 'Navigation: Title',
            'value' => $section->navigation_title
          ),
          array(
            'id' => 'navigation_close_button',
            'name' => 'Navigation: Navigation Close Button',
            'value' => $section->navigation_close_button
          ),
          array(
            'id' => 'language_selector_mobile_title',
            'name' => 'Language Selector: Title on mobile',
            'value' => $section->language_selector_mobile_title
          ),
          array(
            'id' => 'orientationcheck',
            'name' => 'Orientation Check Text',
            'value' => $section->orientationcheck,
            'type' => 'textarea'
          ),
          array(
            'id' => 'knightrider',
            'name' => 'Knightrider Text',
            'value' => $section->knightrider
          ),
          array(
            'id' => 'legazy_browser_hint',
            'name' => 'Legazy Browser Hint',
            'value' => $section->legazy_browser_hint,
            'type' => 'textarea'
          ),
          array(
            'id' => 'tracking_code',
            'name' => 'Tracking Code',
            'value' => $section->tracking_code
          ),
          array(
            'id' => 'tracking_element_1',
            'name' => 'Tracking Element 1',
            'value' => $section->tracking_element_1
          ),
          array(
            'id' => 'tracking_element_2',
            'name' => 'Tracking Element 2',
            'value' => $section->tracking_element_2
          ),
        );

        include('partials/form/items.php');
      ?>
    </div>

    <div class="mdl-card__actions mdl-card--border">
      <button
          name="settings[general]"
          class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Save
      </button>
    </div>
  </form>
</div>
