<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col"
    id="pagedata-video">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Tile</h2>
  </div>
  <form method="POST"
      action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo get_current_page_name(); ?>#pagedata-tile">
    <div class="mdl-card__supporting-text __card__content--full-width">
      <?php $page__section_name = 'tile'; ?>
      <?php
        $message__text = $page__message[$page__section_name];
        include('partials/message.php');
      ?>

      Edit all content sections.

      <?php $page = get_current_page(); ?>
      <?php include('partials/page/page__tile_categories.php'); ?>
    </div>

    <div class="mdl-card__actions mdl-card--border">
      <button
          name="pagedata[tile]"
          class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Save
      </button>
    </div>
  </form>
</div>
