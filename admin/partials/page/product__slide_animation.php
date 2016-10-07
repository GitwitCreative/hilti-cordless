<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id; ?>"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Animation slide</h2>
            </div>

            <?php
            $slideName = 'slide_animation';

            $slide   = $SITE['product']->$slideName;
            $section = $slide->content;

            include 'partials/page/off_on_slide.php';
            ?>

            <div class="mdl-card__supporting-text __card__content--full-width">
                <?php
                $message__text = $page__message[$slideName];
                include('partials/message.php');


                $form__item__section = 'slide_animation';
                $form__item__id      = 'content';
                $form__item__items   = [
                    /*[
                        'id'    => 'position',
                        'name'  => 'Position',
                        'value' => $section->position,
                        'type'  => 'number',
                    ], */[
                        'id'    => 'title',
                        'required' => true,
                        'name'  => 'Title',
                        'value' => $section->title
                    ], [
                        'id'    => 'sub_title',
                        'name'  => 'Sub Title',
                        'value' => $section->sub_title
                    ], [
                        'id'     => 'description',
                        'name'   => 'Description',
                        'value'  => $section->description,
                        'type'   => 'textarea'
                    ], [
                        'id' => 'image',
                        'required' => true,
                        'name'=>'Image',
                        'value'=> $section->image,
                    ],
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

                        $form__item__section = 'slide_animation';
                        $form__item__id      = 'images';
                        $form__item__items   = [
                            [
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
                            Add another Image
                        </a>
                    </div>
                </div>-->
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_slide_animation]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>