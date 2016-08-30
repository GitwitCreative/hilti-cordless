<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id;?>"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Main slide</h2>
            </div>

            <?php
            $slideName = 'slide_main';

            $slide   = $SITE['product']->$slideName;
            $section = $slide->slide_main;

            include 'partials/page/off_on_slide.php';
            ?>
            <div class="mdl-card__supporting-text __card__content--full-width">
                <?php
                $message__text = $page__message[$slideName];
                include('partials/message.php');

                $form__item__section = $slideName;
                $form__item__id      = 'slide_main';
                $form__item__items   = [
                    /*[
                        'id'    => 'position',
                        'name'  => 'Position',
                        'type'  => 'number',
                        'value' => $section->position
                    ], */[
                        'id'    => 'video_link',
                        'name'  => 'Video URL',
                        'value' => $section->video_link
                    ],
                ];
                include('partials/form/items.php');

                $section = $SITE['product']->slide_main->left;
                ?>
                <div class="mdl-grid">
                    <div class="mdl-cell--6-col">
                        <div class="__list__item__content" id="main__left">
                            <?php
                            $form__item__section = $slideName;
                            $form__item__id      = 'left';
                            $form__item__items   = [
                                [
                                    'id'    => 'main_block_left',
                                    'name'  => 'Left',
                                    'value' => 'Left Block',
                                    'type'  => 'title',
                                ], /*[
                                    'id'    => 'title',
                                    'name'  => 'Title',
                                    'value' => $section->title
                                ], */[
                                    'id'    => 'description',
                                    'name'  => 'Text',
                                    'value' => $section->description,
                                    'type'  => 'textarea',
                                ],
                            ];
                            include('partials/form/items.php');
                            ?>
                        </div>
                    </div>

                    <?php

                    $section = $SITE['product']->slide_main->right;
                    ?>
                    <div class="mdl-cell--6-col">
                        <div class="__list__item__content" id="main__right">
                            <?php
                            $form__item__section = $slideName;
                            $form__item__id      = 'right';
                            $form__item__items   = [
                                [
                                    'id'    => 'main_block_right',
                                    'name'  => 'Right',
                                    'value' => 'Right Block',
                                    'type'  => 'title',
                                ],/* [
                                    'id'    => 'title',
                                    'name'  => 'Title',
                                    'value' => $section->title
                                ], */[
                                    'id'    => 'description',
                                    'name'  => 'Text',
                                    'value' => $section->description,
                                    'type'  => 'textarea',
                                ],
                            ];
                            include('partials/form/items.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_slide_main]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>