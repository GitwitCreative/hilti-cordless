<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
    <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">General</h2>
    </div>
    <form
        action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;page=<?php echo get_current_page_name(); ?>"
        method="POST">
        <div class="mdl-card__supporting-text __card__content--full-width">
            <div>Change this page.</div>
            <?php
            $message__text = $page__message['general'];
            include('partials/message.php');

            if (in_array($SITE['page']->general->type, ['content', 'video'])) :
            ?>

            <div class="__content__page-type __form__radio-button">
                <p class="__form__radio-button__title">Page type:</p>

                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="page__type--1">
                    <input type="radio"
                           id="page__type--1"
                           class="mdl-radio__button"
                           name="general[type]"
                           value="content"
                           data-js-content-toggle
                           data-js-content-toggle-input="general[type]"
                           data-js-content-toggle-target=".js-content-toggle"
                        <?php if ($SITE['page']->general->type == 'content') {
                            echo 'checked';
                        } ?>>
                    <span class="mdl-radio__label">Content</span>
                </label>

                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="page__type--2">
                    <input type="radio"
                           id="page__type--2"
                           class="mdl-radio__button"
                           name="general[type]"
                           value="video"
                           data-js-content-toggle
                           data-js-content-toggle-input="general[type]"
                           data-js-content-toggle-target=".js-content-toggle"
                        <?php if ($SITE['page']->general->type == 'video') {
                            echo 'checked';
                        } ?>>
                    <span class="mdl-radio__label">Video / Animation</span>
                </label>
            </div>

            <?php
            elseif ($SITE['page']->general->type == 'tile') :
            ?>
                <input type="hidden" name="general[type]" value="tile" />
            <?php
            endif;
            $section = $SITE['page']->general;

            $form__item__section = 'general';
            $form__item__id      = false;
            $form__item__items   = [
                [
                    'id'              => 'name',
                    'name'            => 'Page Name',
                    'value'           => $section->name,
                    'data-attributes' => [
                        'js-watch'               => '',
                        'js-watch-filter'        => 'machinereadable append',
                        'js-watch-filter-append' => '.html',
                        'js-watch-target'        => '.js-watch-export'
                    ]
                ],
                [
                    'id'    => 'title',
                    'name'  => 'Meta Title (SEO)',
                    'value' => $section->title
                ],
                [
                    'id'    => 'description',
                    'name'  => 'Meta Description (SEO)',
                    'value' => $section->description,
                    'type'  => 'textarea',
                    'help'  => 'Most search engines display up to 160 characters.',
                ],
                [
                    'id'    => 'trackingId_prefix',
                    'name'  => 'Tracking ID Page prefix',
                    'value' => $section->trackingId_prefix
                ],
                [
                    'id'      => 'export',
                    'name'    => 'Export as…',
                    'value'   => $section->export,
                    'help'    => 'This page is exported with this name. You can use it in the navigation or footer to link to the page.<br>Pattern: <i>page-name.html</i>.',
                    'classes' => 'js-watch-export'
                ]
            ];
            include('partials/form/items.php');
            ?>
        </div>

        <div class="mdl-card__actions mdl-card--border">
            <button
                name="pagedata[general]"
                class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Save
            </button>
        </div>
    </form>
</div>
