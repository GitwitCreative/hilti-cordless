<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id; ?>&amp;slide_index=slide_<?php echo $i; ?>"
    id="slide_content_<?php echo $i; ?>"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text"><?php echo $contentSlideTitle; ?></h2>
            </div>
            <?php
            $page__section_name = 'slide_content';

            $slideName = "slide_content[{$slideIndex}]";

            include 'partials/page/off_on_slide.php';
            ?>

            <div class="mdl-card__supporting-text __card__content--full-width">
                <?php
                $urlArr = parse_url($_SERVER['QUERY_STRING']);

                if (isset($_REQUEST['slide_index']) && $_REQUEST['slide_index'] == $slideIndex) {
                    $message__text = $page__message[$page__section_name];

                    include('partials/message.php');
                }
                $form__item__section = $page__section_name;
                $form__item__id      = $slideIndex;
                $form__item__items   = [
                    [
                        'id'    => 'position',
                        'name'  => 'Position',
                        'type'  => 'number',
                        'value' => $section->position
                    ], [
                        'id'    => 'title',
                        'name'  => 'Title',
                        'value' => $section->title
                    ], [
                        'id'    => 'sub_title',
                        'name'  => 'Sub Title',
                        'value' => $section->sub_title
                    ], [
                        'id'    => 'description',
                        'name'  => 'Description',
                        'value' => $section->description,
                        'type'  => 'textarea'
                    ], [
                        'id'    => 'footnote',
                        'name'  => 'Footnote',
                        'value' => $section->footnote,
                    ]
                ];
                include('partials/form/items.php');
                ?>

                <!--<div class="__list__item">
                    <div class="__list__item__content">
                        <?php
/*                        $images = [];

                        for ($j = 1; $j <= 50; $j++) {
                            $child = $section->images->{'child-' . $j};

                            array_push($images, [
                                [
                                    'id'    => 'image_link',
                                    'name'  => 'Image URL',
                                    'value' => $child->image_link
                                ], [
                                    'name'            => 'Delete',
                                    'type'            => 'button',
                                    'data-attributes' => [
                                        'js-remove' => '',
                                        'js-target' => '.__list__item--' . $i . '-' . $j
                                    ]
                                ]
                            ]);
                        }

                        $form__item__section = $page__section_name;
                        $form__item__id      = $slideIndex;
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
                                'child-classes' => 'hidden',
                                'children'      => $images
                            ]
                        ];
                        include('partials/form/items.php');
                        */?>
                    </div>

                    <div class="mdl-card__supporting-text">
                        <a href="#"
                           class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                           data-js-add
                           data-js-parent=".__list__item"
                           data-js-target=".__list__children .__list__item.hidden:first">
                            Add Image
                        </a>
                    </div>
                </div>-->

                <div class="__list__item lists">
                    <div class="__list__item__content">
                        <?php
                        $list = [];

                        for ($j = 1; $j <= 50; $j++) {
                            $child = $section->list->{'child-' . $j};

                            array_push($list, [
                                [
                                    'id'    => 'description',
                                    'name'  => 'Description',
                                    'value' => $child->description
                                ], [
                                    'id'    => 'icon',
                                    'name'  => 'Icon',
                                    'value' => $child->icon,
                                ], [
                                    'name'            => 'Delete',
                                    'type'            => 'button',
                                    'data-attributes' => [
                                        'js-remove' => '',
                                        'js-target' => '.__list__item--' . $i . '-' . $j
                                    ]
                                ]
                            ]);
                        }

                        $form__item__section = $page__section_name;
                        $form__item__id      = $slideIndex;
                        $form__item__items   = [
                            [
                                'name'  => 'List',
                                'value' => 'List',
                                'type'  => 'title',
                            ], [
                                'id'            => 'list',
                                'type'          => 'title',
                                'title'         => 'List',
                                'name'          => 'list',
                                'child-classes' => 'hidden',
                                'children'      => $list
                            ]
                        ];
                        include('partials/form/items.php');
                        ?>
                    </div>

                    <div class="mdl-card__supporting-text">
                        <a href="#"
                           class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                           data-js-add
                           data-js-parent=".__list__item"
                           data-js-target=".__list__children .__list__item.hidden:first">
                            Add list
                        </a>
                            <a href="#"
                               class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect "
                               data-js-target="#slide_content_<?php echo $i; ?> .lists .__list__children .__list__item"
                               data-js-remove-group="">
                                Remove lists
                            </a>
                    </div>
                </div>

                <!--<div class="__list__item tabs">
                    <div class="__list__item__content">
                        <?php
/*                        $tabs = [];

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

                        $form__item__section = $page__section_name;
                        $form__item__id      = $slideIndex;
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
                        echo items($form__item__items, $form__item__id, $form__item__section, $page__section_name, $i);
                        */?>
                    </div>

                    <a href="#"
                       class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect "
                       data-js-target="#slide_content_<?php /*echo $i; */?> .tabs"
                       data-js-remove-tabs="">
                        Remove Tabs
                    </a>
                </div>-->
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_slide_content]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>

                <a href="/?action=delete_section&amp;site=<?php echo get_current_site(); ?>&amp;section=<?php echo $slideIndex; ?>&amp;general[id]=<?php echo $_REQUEST['product']; ?>"
                   class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Delete
                </a>
            </div>
        </div>
    </div>
</form>