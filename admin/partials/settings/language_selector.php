<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Language Selector</h2>
  </div>
  <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>" method="POST" class="language_selector">
    <div class="mdl-card__supporting-text __card__content--full-width js-copy-target">

      You can edit the Language Selector here.

      <?php
        $message__text = $settings_message['language_selector'];
        include('partials/message.php');
      ?>



      <?php $i = 0; foreach($SITE['current-site']->language_selector as $item) : $i++ ?>
        <div class="__list__item">
          <?php
            $settings__language_selector__item = $item;
            $settings__language_selector__id = $i;
            $settings__language_selector__show_title = true;
            $settings__language_selector__name = '[' . $settings__language_selector__id . ']';
            $settings__language_selector__delete = true;
            $settings__language_selector__add_child = true;

            $section = $SITE['current-site']->language_selector->$settings__language_selector__id;
            include('partials/settings/language_selector__item.php');
          ?>
        </div>
      <?php endforeach; ?>
    </div>

    <script type="x/template" class="js-copy-element hidden">
      <div class="__list__item">
        <?php
          $settings__language_selector__item = array();
          $settings__language_selector__id = '{{id}}';
          $settings__language_selector__show_title = true;
          $settings__language_selector__name = '[' . $settings__language_selector__id . ']';
          $settings__language_selector__delete = false;
          $settings__language_selector__add_child = true;

          $section = '';
          include('partials/settings/language_selector__item.php');
        ?>
      </div>
    </script>

    <div class="mdl-card__actions mdl-card--border">
      <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent __card__add"
          type="button"
          data-js-copy
          data-js-target=".language_selector .js-copy-target"
          data-js-element=".language_selector .js-copy-element"
          data-js-index="<?php echo ($i + 1); ?>">
        <i class="material-icons mdl-color-text--white" role="presentation">add</i>
        <span class="visuallyhidden">add</span>
      </button>

      <button
          name="settings[language_selector]"
          class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Save
      </button>
    </div>
  </form>
</div>
