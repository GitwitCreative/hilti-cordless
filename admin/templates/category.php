<?php check_permission(); ?>
<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
    <?php
    $title__back  = '?action=categories&amp;site=' . get_current_site();
    $title__title = 'List of categories';
    $category_id  = isset($_REQUEST['category']) ? $_REQUEST['category'] : date('U');

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
    <form
        action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;category=<?php echo $category_id;?>#general"
        id="general"
        method="POST">

        <div class="mdl-grid __layout__max-width">
            <div class="mdl-cell mdl-cell--2-col"></div>

            <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">General</h2>
                </div>

                <div class="mdl-card__supporting-text __card__content--full-width">
                    <div>Change this page.</div>
                    <?php
                    $message__text = $page__message['general'];
                    include('partials/message.php');

                    $section = $SITE['category']->general;

                    $form__item__section = 'general';
                    $form__item__id      = false;
                    $form__item__items   = [
                        [
                            'id'              => 'name',
                            'required' => true,
                            'name'            => 'Page Name',
                            'value'           => $section->name,
                            'data-attributes' => [
                                'js-watch'               => '',
                                'js-watch-filter'        => 'machinereadable append',
                                'js-watch-filter-append' => '.html',
                                'js-watch-target'        => '.js-watch-export'
                            ]
                        ], [
                            'id'    => 'id',
                            'value' => $category_id,
                            'type'  => 'hidden',
                        ], [
                            'id'    => 'type',
                            'value' => 'category',
                            'type'  => 'hidden',
                        ], [
                            'id'    => 'title',
                            'required' => true,
                            'name'  => 'Meta Title (SEO)',
                            'value' => $section->title
                        ],
                        [
                            'id'    => 'description',
                            'required' => true,
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
                        name="categorydata[save_general]"
                        class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
    <form
        action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;category=<?php echo $category_id; ?>#main"
        id="main"
        method="POST">
        <div class="mdl-grid __layout__max-width">
            <div class="mdl-cell mdl-cell--2-col"></div>

            <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">Main information</h2>
                </div>

                <div class="mdl-card__supporting-text __card__content--full-width">
                    <div>Change this page.</div>
                    <?php
                    $message__text = $page__message['main'];
                    include('partials/message.php');

                    $section = $SITE['category']->main;

                    $form__item__section = 'main';
                    $form__item__id      = false;
                    $form__item__items   = [
                        [
                            'id'    => 'title',
                            'required' => true,
                            'name'  => 'Category Title',
                            'value' => $section->title
                        ],
                        [
                            'id'    => 'description',
                            'required' => true,
                            'name'  => 'Category Description',
                            'value' => $section->description,
                            'type'  => 'textarea',
                        ],
                    ];
                    include('partials/form/items.php');
                    ?>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <button
                        name="categorydata[save_main]"
                        class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
    <form
        action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;category=<?php echo $category_id; ?>#first"
        id="first"
        method="POST">

        <div class="mdl-grid __layout__max-width">
            <div class="mdl-cell mdl-cell--2-col"></div>

            <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">First slide</h2>
                </div>
                <div class="mdl-card__supporting-text __card__content--full-width">
                    <?php
                    $message__text = $page__message['first'];
                    include('partials/message.php');

                    $section = $SITE['category']->first;

                    $form__item__section = 'first';
                    $form__item__id      = false;
                    $form__item__items   = [
                        [
                            'id'    => 'title',
                            'required' => true,
                            'name'  => 'Title',
                            'value' => $section->title
                        ],
                        [
                            'id'    => 'sub_title',
                            'required' => true,
                            'name'  => 'Sub Title',
                            'value' => $section->sub_title
                        ],
                        [
                            'id'    => 'video',
                            'required' => true,
                            'name'  => 'Video',
                            'value' => $section->video
                        ],
                        [
                            'id'    => 'description',
                            'required' => true,
                            'name'  => 'Category Description',
                            'value' => $section->description,
                            'type'  => 'textarea',
                        ],
                    ];
                    include('partials/form/items.php');
                    ?>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <button
                        name="categorydata[save_first]"
                        class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
    <form
        action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;category=<?php echo $category_id; ?>#second"
        id="second"
        method="POST">

        <div class="mdl-grid __layout__max-width">
            <div class="mdl-cell mdl-cell--2-col"></div>

            <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">Second slide</h2>
                </div>

                <div class="mdl-card__supporting-text __card__content--full-width">
                    <?php
                    $message__text = $page__message['second'];
                    include('partials/message.php');

                    $section = $SITE['category']->second;

                    $form__item__section = 'second';
                    $form__item__id      = false;
                    $form__item__items   = [
                        [
                            'id'       => 'title',
                            'name'     => 'Title',
                            'value'    => $section->title,
                            'required' => true,
                        ],
                        [
                            'id'    => 'sub_title',
                            'name'  => 'Sub Title',
                            'value' => $section->sub_title,
                            'required' => true,
                        ],
                        [
                            'id'    => 'left_image',
                            'name'  => 'Left image',
                            'value' => $section->left_image,
                            'required' => true,
                        ],
                        [
                            'id'    => 'left_description',
                            'name'  => 'Left Description',
                            'value' => $section->left_description,
                            'type'  => 'textarea',
                            'required' => true,
                        ],
                        [
                            'id'    => 'right_image',
                            'name'  => 'Right image',
                            'value' => $section->right_image,
                            'required' => true,
                        ],
                        [
                            'id'    => 'right_description',
                            'name'  => 'Right Description',
                            'value' => $section->right_description,
                            'type'  => 'textarea',
                            'required' => true,
                        ],
                    ];
                    include('partials/form/items.php');
                    ?>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <button
                        name="categorydata[save_second]"
                        class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Save
                    </button>
                </div>

            </div>
        </div>
    </form>
    <form
        action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;category=<?php echo $category_id; ?>#third"
        id="third"
        method="POST">

        <div class="mdl-grid __layout__max-width">
            <div class="mdl-cell mdl-cell--2-col"></div>

            <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">Third slide</h2>
                </div>


                <div class="mdl-card__supporting-text __card__content--full-width">
                    <?php
                    $message__text = $page__message['third'];
                    include('partials/message.php');

                    $section = $SITE['category']->third;

                    $form__item__section = 'third';
                    $form__item__id      = false;
                    $form__item__items   = [
                        [
                            'id'    => 'title',
                            'required' => true,
                            'name'  => 'Title',
                            'value' => $section->title
                        ],
                        [
                            'id'    => 'description',
                            'required' => true,
                            'name'  => 'Description',
                            'value' => $section->description,
                            'type'  => 'textarea',
                        ],
                    ];
                    include('partials/form/items.php');
                    ?>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <button
                        name="categorydata[save_third]"
                        class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</main>