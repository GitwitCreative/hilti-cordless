<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--6-col">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Navigation</h2>
  </div>
  <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>" method="POST" class="navigation">
    <div class="mdl-card__supporting-text __card__content--full-width js-copy-target">

      You can edit the navigation here.

      <?php
        $message__text = $settings_message['navigation'];
        include('partials/message.php');
      ?>

      <?php $i = 0; foreach($SITE['current-site']->navigation as $item) : $i++ ?>
        <div class="__list__item">
          <?php
            $settings__navigation__item = $item;
            $settings__navigation__id = $i;
            $settings__navigation__show_title = true;
            $settings__navigation__name = '[' . $settings__navigation__id . ']';
            $settings__navigation__delete = true;
            $settings__navigation__add_child = true;

            $section = $SITE['current-site']->navigation->$settings__navigation__id;
            include('partials/settings/navigation__item.php');
          ?>
        </div>
      <?php endforeach; ?>
    </div>

    <script type="x/template" class="js-copy-element hidden">
      <div class="__list__item">
        <?php
          $settings__navigation__item = array();
          $settings__navigation__id = '{{id}}';
          $settings__navigation__show_title = true;
          $settings__navigation__name = '[' . $settings__navigation__id . ']';
          $settings__navigation__delete = false;
          $settings__navigation__add_child = true;

          $section = '';
          include('partials/settings/navigation__item.php');
        ?>
      </div>
    </script>

    <div class="mdl-card__actions mdl-card--border">
      <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent __card__add"
          type="button"
          data-js-copy
          data-js-target=".navigation .js-copy-target"
          data-js-element=".navigation .js-copy-element"
          data-js-index="<?php echo ($i + 1); ?>">
        <i class="material-icons mdl-color-text--white" role="presentation">add</i>
        <span class="visuallyhidden">add</span>
      </button>

      <button
          name="settings[navigation]"
          class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Save
      </button>
    </div>
  </form>
</div>
