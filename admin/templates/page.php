<?php check_permission(); ?>
<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
    <?php
    $title__back  = '?action=site&amp;site=' . get_current_site();
    $title__title = 'Edit page';

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
        <div class="mdl-cell mdl-cell--2-col"></div>

        <?php include('partials/page/general.php'); ?>
    </div>

    <div class="mdl-grid __layout__max-width js-content-toggle
      <?php if ($SITE['page']->general->type != 'content') {
        echo 'hidden';
    } ?>"
         data-js-content-toggle-value="content">
        <?php include('partials/page/content.php'); ?>
    </div>

    <div class="mdl-grid __layout__max-width js-content-toggle
      <?php if ($SITE['page']->general->type != 'video') {
        echo 'hidden';
    } ?>"
         data-js-content-toggle-value="video">
        <?php include('partials/page/video.php'); ?>
    </div>

    <div class="mdl-grid __layout__max-width js-content-toggle
      <?php if ($SITE['page']->general->type != 'tile') {
        echo 'hidden';
    } ?>"
         data-js-content-toggle-value="video">
        <?php include('partials/page/tile.php'); ?>
    </div>

    <?php if (in_array($SITE['page']->general->type, ['content', 'video'])) : ?>
        <div class="mdl-grid __layout__max-width">
            <div class="mdl-cell mdl-cell--2-col"></div>

            <?php include('partials/page/footer.php'); ?>
        </div>
    <? endif; ?>
</main>
