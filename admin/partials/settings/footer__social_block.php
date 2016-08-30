<?php
?>
<div class="__list__item">
    <?php
    $toggle__header__id        = 'footer__soc';
    $toggle__header__title     = 'Social links';
    $toggle__header__subtitle  = '';
    $toggle__header__show_icon = true;

//        include('partials/toggle__header.php');
    ?>

    <div class="__list__item__content" id="<?php echo $toggle__header__id; ?>">
        <?php
        $icon_children = [];

        /*foreach ($footer->social_links->social_link as $key => $child) {
            array_push($icon_children, [
                [
                    'id'    => 'link_link',
                    'name'  => 'Link URL',
                    'value' => $child->link_link
                ], [
                    'id'    => 'social_link',
                    'name'  => 'Social link',
                    'value' => $child->social_link,
                    'type'  => 'icons',
                ], [
                    'name'            => 'Delete social link',
                    'type'            => 'button',
                    'data-attributes' => [
                        'js-remove' => '',
                        'js-target' => '.__list__item--' . $i . '-' . $j
                    ]
                ]
            ]);
        }

        $pattern = '/^child-(.*)/Us';
        preg_match($pattern, $key, $matches, PREG_OFFSET_CAPTURE);

        $start = isset($matches[1][1]) ? $matches[1][1] : 0;
        */
        for ($j = 1; $j <= 4; $j++) {
            $child = $footer->social_links->social_link->{'child-' . $j};

            array_push($icon_children, [
                [
                    'id'    => 'link_link',
                    'name'  => 'Link URL',
                    'value' => $child->link_link
                ], [
                    'id'    => 'icon',
                    'name'  => 'Icon',
                    'value' => $child->icon,
                ], [
                    'name'            => 'Delete social link',
                    'type'            => 'button',
                    'data-attributes' => [
                        'js-remove' => '',
                        'js-target' => '.__list__item--' . $i . '-' . $j
                    ]
                ]
            ]);
        }

        $form__item__section = 'footer';
        $form__item__id      = 'social_links';
        $form__item__items   = [
            [
                'id'            => 'social-title',
                'type'          => 'title',
                'value'         => 'Social links',
                'title'         => 'Social link',
                'name'          => 'social_link',
                'child-classes' => 'hidden',
                'children'      => $icon_children
            ]
        ];

        include('partials/form/items.php');
        ?>

        <div class="mdl-card__supporting-text">
            <a href="#"
               class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
               data-js-add
               data-js-parent=".__list__item"
               data-js-target=".__list__children .__list__item.hidden:first">
                Add social link
            </a>
        </div>
    </div>
</div>

