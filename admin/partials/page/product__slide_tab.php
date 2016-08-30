<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id; ?>"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Tab slide</h2>
            </div>
            <?php
            $slideName = 'slide_tab';

            $slide   = $SITE['product']->$slideName;
            $section = $slide->slide_tab;

            include 'partials/page/off_on_slide.php';
            ?>

            <div class="mdl-card__supporting-text __card__content--full-width">
                <?php
                $urlArr = parse_url($_SERVER['QUERY_STRING']);

                if (isset($_REQUEST['slide_index']) && $_REQUEST['slide_index'] == $slideIndex) {
                    $message__text = $page__message[$slideName];

                    include('partials/message.php');
                }
                $form__item__section = $slideName;
                $form__item__id      = 'slide_tab';
                $form__item__items   = [
                    /*[
                        'id'    => 'position',
                        'name'  => 'Position',
                        'type'  => 'number',
                        'value' => $section->position
                    ], */[
                        'id'    => 'title',
                        'name'  => 'Title',
                        'value' => $section->title
                    ], [
                        'id'    => 'sub_title',
                        'name'  => 'Sub Title',
                        'value' => $section->sub_title
                    /*], [
                        'id'    => 'description',
                        'name'  => 'Description',
                        'value' => $section->description,
                        'type'  => 'textarea'*/
                    ]
                ];
                include('partials/form/items.php');
                ?>

                <div class="__list__item">
                    <div class="__list__item__content">
                        <?php
                        $images = [];

                        for ($j = 1; $j <= 4; $j++) {
                            $child = $section->images->{'child-' . $j};

                            array_push($images, [
                                [
                                    'id'    => 'image_link',
                                    'name'  => 'Image URL',
                                    'value' => $child->image_link
                                /*], [
                                    'name'            => 'Delete',
                                    'type'            => 'button',
                                    'data-attributes' => [
                                        'js-remove' => '',
                                        'js-target' => '.__list__item--' . $i . '-' . $j
                                    ]*/
                                ]
                            ]);
                        }

                        $form__item__section = $slideName;
//                        $form__item__id      = 'images';
                        $form__item__items   = [
                            [
                                'name'  => 'Images',
                                'value' => 'Images',
                                'type'  => 'title',
                            ], [
                                'id'            => 'images',
                                'type'          => 'title',
                                'title'         => 'Images',
                                'name'          => 'images',
//                                'child-classes' => 'hidden',
                                'children'      => $images
                            ]
                        ];
                        include('partials/form/items.php');
                        ?>
                    </div>
                </div>

                <div class="__list__item tabs">
                    <div class="__list__item__content">
                        <?php
                        $tabs = [];

                        for ($j = 1; $j <= 4; $j++) {
                            $child = $section->tabs->{'child-' . $j};

                            $blocks = [];

                            for ($ij = 1; $ij <= 3; $ij++) {
                                $block = $child->block->{'child-' . $ij};

                                array_push($blocks, [
                                    [
                                        'id'    => 'image_link',
                                        'name'  => 'Image URL',
                                        'value' => $block->image_link,
                                    ], [
                                        'id'    => 'description',
                                        'name'  => 'Description',
                                        'value' => $block->description,
                                        'type'  => 'textarea',
                                    ]
                                ]);
                            }

                            array_push($tabs, [
                                [
                                    'id'    => 'title',
                                    'name'  => 'Title',
                                    'value' => $child->title,
                                ], [
                                    'id'    => 'description',
                                    'name'  => 'Description',
                                    'value' => $child->description,
                                ], [
                                    'id'       => 'block',
                                    'name'     => 'block',
                                    'title'    => 'Block',
                                    'type'     => 'title',
                                    'children' => $blocks
                                ]
                            ]);
                        }

                        $form__item__section = $slideName;
                        $form__item__id      = 'slide_tab';
                        $form__item__items   = [
                            [
                                'name'  => 'Tabs',
                                'value' => 'Tabs',
                                'type'  => 'title',
                            ], [
                                'id'       => 'tab',
                                'type'     => 'title',
                                'title'    => 'Tabs',
                                'name'     => 'tabs',
                                'children' => $tabs
                            ]
                        ];
                        echo items($form__item__items, $form__item__id, $form__item__section, $slideName, 0);
                        ?>
                    </div>
                </div>
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_slide_tab]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>
