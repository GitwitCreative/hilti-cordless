<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id; ?>#slide_videos"
    id="slide_videos"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Videos slide</h2>
            </div>

            <?php
            $slideName = 'slide_videos';

            $slide   = $SITE['product']->$slideName;
            $section = $slide->videos;

            include 'partials/page/off_on_slide.php';
            ?>

            <div class="mdl-card__supporting-text __card__content--full-width">
                <?php

                $message__text = $page__message[$slideName];
                include('partials/message.php');
                ?>
                <div class="mdl-card__supporting-text __card__content--full-width js-copy-target">
                    <?php
                    $i = 0;
                    foreach ($SITE['product']->$slideName->videos as $item) : $i++ ?>
                        <div class="__list__item">
                            <?php
                            $settings__video_selector__item       = $item;
                            $settings__video_selector__id         = $i;
                            $settings__video_selector__show_title = true;
                            $settings__video_selector__delete     = true;
                            $settings__video_selector__add_child  = true;

                            include('partials/page/video__item.php');
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mdl-card__supporting-text">
                <button
                    class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                    type="button"
                    data-js-copy
                    data-js-target="#slide_videos .js-copy-target"
                    data-js-element="#slide_videos .js-copy-element"
                    data-js-index="<?php echo($i + 1); ?>">
                    Add Video
                </button>
            </div>

            <script type="x/template" class="js-copy-element hidden">
                <div class="__list__item">
                    <?php
                    $settings__video_selector__item       = [];
                    $settings__video_selector__id         = '{{id}}';
                    $settings__video_selector__show_title = true;
                    $settings__video_selector__add_child  = true;

                    $section = '';
                    include('partials/page/video__item.php');
                    ?>
                </div>
            </script>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_slide_videos]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>
            </div>
        </div>
    </div>


</form>
<!--<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet">
    <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Video Selector</h2>
    </div>
    <form
        action="?action=<?php /*echo $page_action; */?>&amp;site=<?php /*echo get_current_site(); */?>&amp;product=<?php /*echo $product_id; */?>#slide_videos"
        method="POST"
        class="video_selector">
        <div class="mdl-card__supporting-text __card__content--full-width js-copy-target">

            You can edit the Video slide.

            <?php
/*            $message__text = $settings_message[$slideName];
            include('partials/message.php');

            $i = 0;
            foreach ($SITE['product']->$slideName->videos as $item) : $i++ */?>
                <div class="__list__item">
                    <?php
/*                    $settings__video_selector__item       = $item;
                    $settings__video_selector__id         = $i;
                    $settings__video_selector__show_title = true;
                    $settings__video_selector__delete     = true;
                    $settings__video_selector__add_child  = true;

                    include('partials/page/video__item.php');
                    */?>
                </div>
            <?php /*endforeach; */?>
        </div>

        <div class="mdl-card__supporting-text">
            <button
                class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                type="button"
                data-js-copy
                data-js-target=".video_selector .js-copy-target"
                data-js-element=".video_selector .js-copy-element"
                data-js-index="<?php /*echo($i + 1); */?>">
                Add Video
            </button>
        </div>

        <script type="x/template" class="js-copy-element hidden">
            <div class="__list__item">
                <?php
/*                $settings__video_selector__item       = [];
                $settings__video_selector__id         = '{{id}}';
                $settings__video_selector__show_title = true;
                $settings__video_selector__add_child  = true;

                $section = '';
                include('partials/page/video__item.php');
                */?>
            </div>
        </script>

        <div class="mdl-card__actions mdl-card--border">
            <button
                name="productdata[save_slide_videos]"
                class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Save
            </button>
        </div>
    </form>
</div>-->