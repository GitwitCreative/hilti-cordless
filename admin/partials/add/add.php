<form action="?action=<?php echo $page_action; ?>"
    method="post"
    class="hidden"
    id="<?php
        if ($add__copy) {
          echo 'add__copy';
        } else {
          echo 'add__new';
        }
    ?>">
  <div class="mdl-grid __layout__max-width">
    <div class="mdl-cell mdl-cell--3-col"></div>
    <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--6-col">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Data for new site</h2>
      </div>
      <div class="mdl-card__supporting-text">
        <?php if ($add__copy) : ?>
          <p>You are about to create a new page by copying the existing page
            <i class="add__data-element"></i>.</p>
          <p>We only need a couple of information to copy the page for you.<br>
          Please fill out the information below and press "Copy page".</p>
        <?php endif; ?>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label __textfield--full-width">
          <input class="mdl-textfield__input"
              type="text"
              name="add[name]"
              id="add__name">
          <label class="mdl-textfield__label" for="add__name">Name</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label __textfield--full-width">
          <input class="mdl-textfield__input"
              type="text"
              name="add[lang]"
              id="add__language">
          <label class="mdl-textfield__label" for="add__language">Language</label>
        </div>
      </div>
      <div class="mdl-card__actions mdl-card--border">
        <?php if ($add__copy) : ?>
          <input type="hidden" name="add[copy-from]" class="add__data-element" value="">
        <?php endif; ?>

        <button
            name="add[add]"
            class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
          <?php
            if ($add__copy) {
              echo 'Copy site';
            } else {
              echo 'Create site';
            }
          ?>
        </button>
      </div>
    </div>
  </div>
</form>
