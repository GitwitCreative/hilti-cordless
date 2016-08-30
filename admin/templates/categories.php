<?php check_permission(); ?>
<?php include('partials/header.php'); ?>

<main class="mdl-layout__content mdl-color--grey-100 __layout--full-width">
    <?php
    $title__back  = '?action=site&amp;site=' . get_current_site();
    $title__title = 'Site';

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

        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">List of categories</h2>
            </div>
            <?php $categories = get_categories(); ?>
            <div class="__list__item">
                <?php
                $toggle__header__id        = 'categories';
                $toggle__header__title     = 'Categories';
                $toggle__header__subtitle  = '';
                $toggle__header__show_icon = true;
                ?>

                <div class="__list__item__content" id="<?php echo $toggle__header__id; ?>">
                    <?php
                    $categories_children = [];

                    $j = 0;

                    foreach ($categories as $id => $child) {
                        $j++;
                        array_push($categories_children, [
                            [
                                'id'    => 'title',
                                'name'  => 'Title',
                                'value' => $child['general']['title'] ?: $id,
                                'type'  => 'title'
                            ],
                            [
                                'type' => 'link',
                                'name' => 'Edit',
                                'href' => '?action=edit_category&site=' . get_current_site() . '&category=' . $id,
                            ],
                            [
                                'name' => 'Delete',
                                'type' => 'link',
                                'href' => '?action=delete_category&site=' . get_current_site() . '&category=' . $id,
                            ]
                        ]);
                    }

                    $form__item__section = $page__section_name;
                    $form__item__id      = 'categories';
                    $form__item__items   = [
                        [
                            'id'            => 'category-title',
                            'type'          => 'title',
                            'title'         => 'Category',
                            'name'          => 'category',
                            'child-classes' => 'show',
                            'children'      => $categories_children
                        ]
                    ];

                    include('partials/form/items.php');
                    ?>

                    <div class="mdl-card__actions mdl-card--border">
                        <a href="/?action=add_category&amp;site=<?php echo get_current_site(); ?>"
                           class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent __card__add"
                           type="button"
                           data-js-index="<?php echo($i + 1); ?>">
                            <i class="material-icons mdl-color-text--white" role="presentation">add</i>
                            <span class="visuallyhidden">add</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
