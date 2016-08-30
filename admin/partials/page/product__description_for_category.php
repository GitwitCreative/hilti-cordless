<form
    action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>&amp;product=<?php echo $product_id;?>"
    method="POST">
    <div class="mdl-grid __layout__max-width">
        <div class="mdl-cell mdl-cell--2-col"></div>

        <div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Description for category</h2>
            </div>
            <div class="mdl-card__supporting-text __card__content--full-width">
                <?php

                $slideName = 'category_description';

                $message__text = $page__message[$slideName];
                include('partials/message.php');

                $slide   = $SITE['product']->$slideName;
                $section = $slide;

                $form__item__section = $slideName;
                $form__item__id      = false;
                $form__item__items   = [
                    [
                        'id'    => 'title',
                        'required' => true,
                        'name'  => 'Title',
                        'value' => $section->title
                    ], [
                        'id'    => 'sub_title',
                        'required' => true,
                        'name'  => 'Sub Title',
                        'value' => $section->sub_title
                    ], [
                        'id'    => 'description',
                        'required' => true,
                        'name'  => 'Description',
                        'type'  => 'textarea',
                        'value' => $section->description
                    ], [
                        'id'    => 'image_link',
                        'required' => true,
                        'name'  => 'Image URL',
                        'value' => $section->image_link
                    ], [
                        'id'    => 'link',
                        'name'  => 'Link',
                        'value' => $section->link
                    ],
                ];
                include('partials/form/items.php');

                ?>
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <button
                    name="productdata[save_category_description]"
                    class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>