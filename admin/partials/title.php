<div class="mdl-grid __layout__max-width">
  <div class="mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">

    <?php if (is_page()) : ?>
      <a
          href="../site/?action=page&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo get_current_page_name(); ?>"
          target="_blank"
          class="mdl-button mdl-js-button __layout__align-right __layout__header__button"
          title="Open Preview">
        View Page
        <i class="material-icons" role="presentation">remove_red_eye</i>
        <span class="visuallyhidden">Open page</span>
      </a>
    <?php endif; ?>

    <h3>
      <?php if ($title__back) : ?>
        <a href="<?php echo $title__back; ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect __title__back-link">
          <i class="material-icons" role="presentation">arrow_back</i>
          <span class="visuallyhidden">Back</span>
        </a>
      <?php endif; ?>

      <?php echo $title__title; ?>
    </h3>
  </div>
</div>
