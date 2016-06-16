<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid __layout__max-width">
    <div class="mdl-color-text--grey-800 mdl-cell mdl-cell--12-col __typography--centered">
      <h3>Login</h3>
    </div>
  </div>

  <div class="mdl-grid __layout__max-width">
    <div class="mdl-cell mdl-cell--3-col"></div>
    <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--6-col">
      <div class="mdl-card__supporting-text">
        <form action="?action=login" method="POST">
          <?php
            $message__text = $login_message;
            include('partials/message.php');
          ?>

          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" name="username" id="username">
            <label class="mdl-textfield__label" for="username">Username</label>
          </div>

          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" name="password" id="password">
            <label class="mdl-textfield__label" for="password">Password</label>
          </div>

          <div>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
              Login
            </button>

            <input type="hidden" name="login" value="1">
          </div>
        </form>
      </div>

      <div class="mdl-card__supporting-text">
        <strong>Note</strong>: If you forgot your login, please contact <a href="mailto:info@fork.de">info@fork.de</a>.
      </div>
    </div>
  </div>
</div>
