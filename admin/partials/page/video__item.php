<?php
$settings__video_selector__id = str_replace('][', '--', $settings__video_selector__id);

$toggle__header__id        = 'settings__video_selector__' . $settings__video_selector__id;
$toggle__header__title     = 'Video';
$toggle__header__subtitle  = $settings__video_selector__item->video_link;
$toggle__header__show_icon = $settings__video_selector__show_title;

include('partials/toggle__header.php');
?>
<div class="__list__item__content hidden"
     id="settings__video_selector__<?php echo $settings__video_selector__id; ?>">
    <?php

    $form__item__section = 'slide_videos[videos]';
    $form__item__id      = $settings__video_selector__id;
    $form__item__items   = [
        [
            'id'    => 'video_link',
            'name'  => 'Video URL',
            'value' => $item->video_link
        ]
    ];
    include('partials/form/items.php');
    ?>

    <?php if ($settings__video_selector__delete) : ?>
        <button class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect __layout__align-right"
                type="button"
                data-js-remove
                data-js-target=".__list__item">
            Delete
        </button>
    <?php endif; ?>
</div>
