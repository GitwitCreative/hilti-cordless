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
                <h2 class="mdl-card__title-text">List of products</h2>
            </div>
            <?php $products = get_products(); ?>
            <div class="__list__item">
                <?php
                $toggle__header__id        = 'products';
                $toggle__header__title     = 'Products';
                $toggle__header__subtitle  = '';
                $toggle__header__show_icon = true;
                ?>

                <div class="__list__item__content" id="<?php echo $toggle__header__id; ?>">
                    <?php
                    $products_children = [];

                    $j = 0;

                    foreach ($products as $id => $child) {
                        $j++;
                        array_push($products_children, [
                            [
                                'id'    => 'title',
                                'name'  => 'Title',
                                'value' => $child['general']['title'] ?: $id,
                                'type'  => 'title'
                            ],
                            [
                                'type' => 'link',
                                'name' => 'Edit',
                                'href' => '?action=edit_product&site=' . get_current_site() . '&product=' . $id,
                            ],
                            [
                                'name' => 'Delete',
                                'type' => 'link',
                                'href' => '?action=delete_product&site=' . get_current_site() . '&product=' . $id,
                            ]
                        ]);
                    }

                    $form__item__section = $page__section_name;
                    $form__item__id      = 'products';
                    $form__item__items   = [
                        [
                            'id'            => 'product-title',
                            'type'          => 'title',
                            'title'         => 'Product',
                            'name'          => 'product',
                            'child-classes' => 'show',
                            'children'      => $products_children
                        ]
                    ];

                    include('partials/form/items.php');
                    ?>

                    <div class="mdl-card__actions mdl-card--border">
                        <a href="/?action=add_product&amp;site=<?php echo get_current_site(); ?>"
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
