<a href="#"
    class="__list__item__toggle mdl-color-text--grey-800"
    data-js-toggle
    data-js-target="#<?php echo $toggle__header__id; ?>">

  <?php if (isset($toggle__header__show_icon) && $toggle__header__show_icon) : ?>
    <i class="material-icons __list__item__toggle-button" role="presentation">keyboard_arrow_right</i>
  <?php endif; ?>

  <div class="mdl-typography--title js-toggle-title-<?php echo $toggle__header__id; ?>"><?php echo $toggle__header__title; ?></div>

  <?php if (isset($toggle__header__subtitle) && $toggle__header__subtitle) : ?>
    <p class="__list__item__link"><?php echo strip_tags($toggle__header__subtitle); ?></p>
  <?php endif; ?>
</a>
