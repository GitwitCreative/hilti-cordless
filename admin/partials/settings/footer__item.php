<?php
$settings__footer__id = str_replace('][', '--', $settings__footer__id);

$toggle__header__id        = 'settings__footer__' . $settings__footer__id;
$toggle__header__title     = ($settings__footer__item->title) ? $settings__footer__item->title : 'Block' . $i;
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
            'id'              => 'title',
            'name'            => 'Title',
            'value'           => $section->title,
            'data-attributes' => [
                'js-watch'        => '',
                'js-watch-target' => '.js-toggle-title-' . $toggle__header__id
            ]
        ],
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
