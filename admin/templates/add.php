<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
  <?php
    $title__back = '?action=index';
    $title__title = 'Add a new microsite';

    include('partials/title.php');
  ?>

  <div class="mdl-grid __layout__max-width" id="add__select">
    <div class="mdl-cell mdl-cell--3-col"></div>
    <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--6-col">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Copy from…</h2>
      </div>
      <div class="mdl-card__supporting-text">
        <?php
          $message__text = $index__message;
          include('partials/message.php');
        ?>
        <?php
          $message__text = $add_message;
          include('partials/message.php');
        ?>

        You can copy from all existing pages.

        <ul class="__list">
          <?php foreach($SITE['sites'] as $site) : ?>
            <li>
              <a href="#"
                  data-js-toggle
                  data-js-target="#add__copy, #add__select"
                  data-js-data-selector=".add__data-element"
                  data-js-data="<?php echo $site->general->lang; ?>"
                  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                <?php echo $site->general->lang; ?>
              </a>
            </li>
          <?php endforeach; ?>
          <li>
            <a href="#"
                data-js-toggle
                data-js-target="#add__new, #add__select"
                class="mdl-button mdl-button--colored mdl-button--accent mdl-js-button mdl-js-ripple-effect">
              Or just start from scratch
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <?php
    $add__copy = true;
    include('partials/add/add.php');
  ?>
  <?php
    $add__copy = false;
    include('partials/add/add.php');
  ?>
</div>
