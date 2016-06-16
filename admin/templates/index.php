<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
  <div class="mdl-grid __layout__max-width">
    <div class="mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
      <h3>Microsites</h3>
    </div>
  </div>

  <?php if ($index__message) : ?>
    <div class="mdl-grid __layout__max-width">
      <div class="mdl-cell mdl-cell--12-col">
        <?php
          $message__text = $index__message;
          include('partials/message.php');
        ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="mdl-grid __layout__max-width">
    <?php foreach($SITE['sites'] as $site) : ?>
      <?php if (user_has_permission_for_site($site->general->lang)) : ?>
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--4-col">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Microsite: <?php echo $site->general->lang; ?></h2>
          </div>
          <div class="mdl-card__supporting-text">
            <?php echo $site->general->{'meta.description'}; ?>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <form action="?action=<?php echo $page_action ?>" method="POST">
              <a
                  href="?action=site&amp;site=<?php echo $site->general->lang; ?>"
                  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Edit site
              </a>

              <div class="__layout__align-right">
                <?php if ($site->general->domain) : ?>
                  <a href="<?php echo $site->general->domain; ?>"
                      target="_blank"
                      class="mdl-button mdl-js-button mdl-button--icon"
                      title="View Site">
                    <i class="material-icons" role="presentation">remove_red_eye</i>
                    <span class="visuallyhidden">View Site</span>
                  </a>
                <?php endif; ?>

                <!--
                <input type="hidden" name="page" value="<?php echo $site->general->lang; ?>">
                <button class="mdl-button mdl-js-button mdl-button--icon"
                    data-js-prevent-delete
                    name="delete">
                  <i class="material-icons" role="presentation">delete</i>
                  <span class="visuallyhidden">Delete file</span>
                </button>
                -->
              </div>
            </form>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <!--<div class="__page__add">
    <a href="?action=add"
        class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--red-600 __page__add__button">
      <i class="material-icons" role="presentation">add</i>
      <span class="visuallyhidden">Add new Site</span>
    </a>
  </div>-->
</div>
