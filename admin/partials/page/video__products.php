<?php
$section = $page->video->products;
?>
<div class="__list__item">
    <?php
    $toggle__header__id        = 'video__products';
    $toggle__header__title     = 'Products';
    $toggle__header__subtitle  = $section->name;
    $toggle__header__show_icon = true;

    include('partials/toggle__header.php');
    ?>

    <div class="__list__item__content hidden" id="<?php echo $toggle__header__id; ?>">
        <?php
        $products_children = [];

        for ($j = 1; $j <= 30; $j++) {
            $child = $section->products->{'child-' . $j};

            array_push($products_children, [
                [
                    'id'    => 'headline',
                    'name'  => 'Headline',
                    'value' => $child->headline
                ],
                [
                    'id'    => 'subheadline',
                    'name'  => 'Sub-Headline',
                    'value' => $child->subheadline
                ],
                [
                    'id'    => 'link_text',
                    'name'  => 'Link Text',
                    'value' => $child->link_text
                ],
                [
                    'id'    => 'link_link',
                    'name'  => 'Link URL',
                    'value' => $child->link_link
                ],
                [
                    'id'    => 'image_thumbnail',
                    'name'  => 'Image Thumbnail',
                    'value' => $child->image_thumbnail
                ],
                [
                    'id'    => 'image_slider',
                    'name'  => 'Image slider',
                    'value' => $child->image_slider
                ],
                [
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
        $form__item__id      = 'products';
        $form__item__items   = [
            [
                'id'    => 'navigation_title',
                'name'  => 'Navigation Title',
                'value' => $section->navigation_title
            ],
            [
                'id'    => 'headline',
                'name'  => 'Headline',
                'value' => $section->headline
            ],
            [
                'id'    => 'subline',
                'name'  => 'Subline',
                'value' => $section->subline
            ],
            [
                'id'    => 'side_element_headline',
                'name'  => 'Side Element: Headline',
                'value' => $section->side_element_headline
            ],
            [
                'id'    => 'side_element_image',
                'name'  => 'Side Element: Image',
                'value' => $section->side_element_image
            ],
            [
                'id'     => 'makeitfit_text',
                'name'   => 'Make It Fit: Text',
                'value'  => $section->makeitfit_text,
                'type'   => 'textarea',
                'editor' => true
            ],
            [
                'id'    => 'makeitfit_link',
                'name'  => 'Make It Fit: Link',
                'value' => $section->makeitfit_link
            ],
            [
                'id'    => 'makeitfit_image',
                'name'  => 'Make It Fit: Image',
                'value' => $section->makeitfit_image
            ],
            [
                'id'    => 'makeitfit_trackingId',
                'name'  => 'Make It Fit: Tracking ID',
                'value' => $section->makeitfit_trackingId
            ],
            [
                'id'            => 'product-title',
                'type'          => 'title',
                'value'         => 'Products',
                'title'         => 'Product',
                'name'          => 'products',
                'child-classes' => 'hidden',
                'children'      => $products_children
            ]
        ];

        include('partials/form/items.php');
        ?>

        <div class="mdl-card__supporting-text">
            <a href="#"
               class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
               data-js-add
               data-js-parent=".__list__item"
               data-js-target=".__list__children .__list__item.hidden:first">
                Add another Product
            </a>
        </div>
    </div>
</div>

