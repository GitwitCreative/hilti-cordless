<div class="mdl-color--white mdl-shadow--2dp mdl-color-text--grey-800 mdl-cell mdl-cell--6-col">
    <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Footer</h2>
    </div>
    <form action="?action=<?php echo $page_action; ?>&amp;site=<?php echo get_current_site(); ?>" method="POST"
          class="footer">
        <div class="mdl-card__supporting-text __card__content--full-width js-copy-target">

            You can edit footer's blocks here.

            <?php
            $message__text = $settings_message['footer'];
            include('partials/message.php');
            ?>

            <?php
            $i = 0;

            $footer = $SITE['current-site']->footer;

            ?>
            <div class="__list__item">
                <?php
                $i = 1;

                $settings__footer__item       = isset($footer->$i) ? $footer->$i : [];
                $settings__footer__id         = $i;
                $settings__footer__show_title = true;
                $settings__footer__name       = '[' . $settings__footer__id . ']';
                $settings__footer__delete     = true;
                $settings__footer__add_child  = false;

                $section = $SITE['current-site']->footer->$settings__footer__id;
                include('partials/settings/footer__item.php');
                ?>
            </div>
            <div class="__list__item">
                <?php
                $i = 2;

                $settings__footer__item       = isset($footer->$i) ? $footer->$i : [];
                $settings__footer__id         = $i;
                $settings__footer__show_title = true;
                $settings__footer__name       = '[' . $settings__footer__id . ']';
                $settings__footer__delete     = true;
                $settings__footer__add_child  = false;

                $section = $SITE['current-site']->footer->$settings__footer__id;
                include('partials/settings/footer__item.php');
                ?>
            </div>
            <div class="__list__item">
                <?php
                $i = 3;

                $settings__footer__item       = isset($footer->$i) ? $footer->$i : [];
                $settings__footer__id         = $i;
                $settings__footer__show_title = true;
                $settings__footer__name       = '[' . $settings__footer__id . ']';
                $settings__footer__delete     = true;
                $settings__footer__add_child  = false;

                $section = $SITE['current-site']->footer->$settings__footer__id;
                include('partials/settings/footer__item.php');
                ?>
            </div>
            <div class="__list__item">
                <?php
                $i = 4;

                $settings__footer__item       = isset($footer->$i) ? $footer->$i : [];
                $settings__footer__id         = $i;
                $settings__footer__show_title = true;
                $settings__footer__name       = '[' . $settings__footer__id . ']';
                $settings__footer__delete     = true;
                $settings__footer__add_child  = false;

                $section = $SITE['current-site']->footer->$settings__footer__id;
                include('partials/settings/footer__item.php');
                ?>
            </div>
            <div class="__list__item">
                <?php
                $i = 5;

                $settings__footer__item       = isset($footer->$i) ? $footer->$i : [];
                $settings__footer__id         = $i;
                $settings__footer__show_title = true;
                $settings__footer__name       = '[' . $settings__footer__id . ']';
                $settings__footer__delete     = true;
                $settings__footer__add_child  = false;

                $section = $SITE['current-site']->footer->$settings__footer__id;

                $settings__footer__id = str_replace('][', '--', $settings__footer__id);

                $toggle__header__id        = 'settings__footer__' . $settings__footer__id;
                $toggle__header__title     = 'Text block';
                $toggle__header__subtitle  = $settings__footer__item->link;
                $toggle__header__show_icon = $settings__footer__show_title;

                include('partials/toggle__header.php');
                ?>
                <div class="__list__item__content hidden" id="settings__footer__<?php echo $settings__footer__id; ?>">
                    <?php
                    $footer_children = [];

                    $form__item__section = 'footer';
                    $form__item__id      = $settings__footer__id;
                    $form__item__items   = [
                        [
                            'id'    => 'description',
                            'name'  => 'Description',
                            'value' => $section->description,
                            'type'  => 'textarea'
                        ],
                    ];
                    include('partials/form/items.php');
                    ?>
                </div>
            </div>
        </div>


        <?php include('partials/settings/footer__social_block.php'); ?>

        <div class="mdl-card__actions mdl-card--border">
            <button
                name="settings[footer]"
                class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Save
            </button>
        </div>
    </form>
</div>
