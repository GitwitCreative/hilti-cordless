<?php check_permission(); ?>
<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
  <?php
    $title__back = '?action=index';
    $title__title = 'Site: ' . get_current_site() ;

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
    <?php if (count($SITE['current-site']->pages) === 0) : ?>
      <div class="mdl-cell mdl-cell--12-col">
        <p class="mdl-typography--title">You haven't created any pages yet.</p>
      </div>
    <?php endif; ?>

    <?php
      $pagenames = array();
      foreach($SITE['current-site']->pages as $page) :
        array_push($pagenames, $page->general->name);
    ?>
      <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--4-col">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">
            <?php echo ($page->general->name) ? $page->general->name : $page->name; ?>
          </h2>
        </div>
        <div class="mdl-card__supporting-text">
          <strong>Pagetype:</strong>
          <i><?php echo $page->general->type; ?></i>
          <br>

          <?php if ($page->general->title) : ?>
            <strong>Title:</strong>
            <?php echo $page->general->title; ?>
            <br>
          <?php else : ?>
            <i>Title missing.</i>
          <?php endif; ?>

          <?php if ($page->general->description) : ?>
            <strong>Description:</strong>
            <?php echo $page->general->description; ?>
            <br>
          <?php else : ?>
            <i>Description missing.</i>
          <?php endif; ?>
        </div>
        <div class="mdl-card__actions mdl-card--border">

          <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>"
              method="POST">

            <a
                href="?action=page&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo $page->name; ?>"
                class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              Edit page
            </a>

            <div class="__layout__align-right">
              <a
                  href="../site/?action=page&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo $page->name; ?>"
                  target="_blank"
                  class="mdl-button mdl-js-button mdl-button--icon"
                  title="Open Preview">
                <i class="material-icons" role="presentation">remove_red_eye</i>
                <span class="visuallyhidden">Open page</span>
              </a>

              <input type="hidden" name="page" value="<?php echo $page->name; ?>">
              <button class="mdl-button mdl-js-button mdl-button--icon"
                  data-js-prevent-delete
                  name="delete">
                <i class="material-icons" role="presentation">delete</i>
                <span class="visuallyhidden">Delete file</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!--<div class="__page__add">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--8dp mdl-color--red-600 __page__add__button __page__add__button--base">
      <i class="material-icons" role="presentation">add</i>
      <span class="visuallyhidden">Add</span>
    </button>

    <a href="?action=page&amp;site=<?php echo get_current_site(); ?>&amp;page="
        class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored mdl-shadow--6dp mdl-color--red-600 __page__add__button __page__add__button--edit __page__add__button--small">
      <i class="material-icons" role="presentation">mode_edit</i>
      <span class="visuallyhidden">Add a new page</span>
    </a>

    <button
        data-js-action="copy-page"
        data-js-action-data="<?php echo implode(',', $pagenames); ?>"
        class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored mdl-shadow--6dp mdl-color--red-600 __page__add__button __page__add__button--copy __page__add__button--small">
      <i class="material-icons" role="presentation">content_copy</i>
      <span class="visuallyhidden">Copy a page</span>
    </button>
  </div>-->

</main>
