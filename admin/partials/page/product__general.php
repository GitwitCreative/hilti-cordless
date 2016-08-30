<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id; ?>"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">General</h2>
            </div>

            <div class="mdl-card__supporting-text __card__content--full-width">
                <div>Change this page.</div>
                <?php
                $message__text = $page__message['general'];
                include('partials/message.php');

                $section = $SITE['product']->general;

                $categories        = get_categories();
                $categoriesForForm = [];

                foreach ($categories as $categoryID => $category) {
                    array_push($categoriesForForm, [
                        'id'   => $categoryID,
                        'name' => $category['general']['name'] ?: $categoryID
                    ]);
                }

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
                        'value' => $product_id,
                        'type'  => 'hidden',
                    ], [
                        'id'    => 'type',
                        'value' => 'product',
                        'type'  => 'hidden',
                    ], [
                        'id'    => 'title',
                        'required' => true,
                        'name'  => 'Meta Title (SEO)',
                        'value' => $section->title
                    ], [
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
                    ], [
                        'id'      => 'category',
                        'name'    => 'Category',
                        'options' => $categoriesForForm,
                        'value'   => $section->category,
                        'help'    => 'Select the product\'s category.',
                        'classes' => 'js-watch-category',
                        'type'    => 'select',
                    ], [
                        'id'    => 'main_image',
                        'required' => true,
                        'name'  => 'Main image',
                        'value' => $section->main_image
                    ],[
                        'id'              => 'animation_images',
                        'name'            => 'Images for page\'s animation',
                        'value'           => implode(PHP_EOL, $section->animation_images),
                        'type'            => 'textarea',
                        'data-attributes' => [
                            'wrap' => 'soft'
                        ],
                        'help'            => 'Type addresses of images on new line.',
                    ]
                ];
                include('partials/form/items.php');
                ?>
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_general]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>