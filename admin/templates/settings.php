<?php check_permission(); ?>
<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
  <?php
    $title__back = '?action=site&amp;site='. get_current_site();
    $title__title = 'Project Settings';

    include('partials/title.php');
  ?>

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
    <?php include('partials/settings/general.php'); ?>
    <?php include('partials/settings/navigation.php'); ?>
    <?php include('partials/settings/footer.php'); ?>
    <?php include('partials/settings/language_selector.php'); ?>
  </div>
</div>
