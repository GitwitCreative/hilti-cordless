<?php check_permission(); ?>
<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width product_page">
    <?php
    $title__back  = '?action=products&amp;site=' . get_current_site();
    $title__title = 'List of products';

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


    <?php
    $product_id = isset($_REQUEST['product']) ? $_REQUEST['product'] : date('U');

    include_once 'partials/page/product__general.php';
    include_once 'partials/page/product__description_for_category.php';
    include_once 'partials/page/product__slide_main.php';
    include_once 'partials/page/product__slide_videos.php';
    include_once 'partials/page/product__slide_icons.php';
    include_once 'partials/page/product__slide_tab.php';
    include_once 'partials/page/product__slide_animation.php';
    include_once 'partials/page/product__slide_content.php';
    include_once 'partials/page/product__slide_footer.php';
    ?>
</main>
