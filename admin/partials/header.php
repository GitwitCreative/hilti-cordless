<header class="mdl-layout__header __header">
  <div class="mdl-layout__header-row __header--row">
    <a href="?action=index" class="mdl-layout-title __header__logo">
      Microsites
      <?php if (is_site()) : ?>
        - <?php echo get_current_site(); ?>
      <?php endif; ?>
    </a>

    <div class="mdl-layout-spacer"></div>

    <form method="POST"
        action="?action=<?php echo $page_action ?>&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo get_current_page_name(); ?>">
      <nav class="mdl-navigation">
        <?php if (is_site()) : ?>

          <?php if ($SITE['current-site']->general->domain) : ?>
            <a href="<?php echo $SITE['current-site']->general->domain; ?>"
                target="_blank"
                class="mdl-navigation__link">
              View Site
            </a>
          <?php endif; ?>

          <a href="?action=upload&amp;site=<?php echo get_current_site(); ?>"
              class="mdl-navigation__link">
            Upload file
          </a>

          <a href="?action=settings&amp;site=<?php echo get_current_site(); ?>"
              class="mdl-navigation__link">
            Settings
          </a>

          <input type="hidden" name="site" value="<?php echo $SITE['current-site']->general->lang; ?>">
          <button
              name="deploy"
              class="mdl-navigation__link mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect __header__navigation__button">
            Deploy site
          </button>
        <?php endif; ?>

        <a href="?logout" class="mdl-navigation__link">
          Logout
        </a>
      </nav>
    </form>
  </div>
</header>
