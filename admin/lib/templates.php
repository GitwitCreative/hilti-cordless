<?php

// Return the current file path
// @return string file path
function get_file_path()
{
    global $page_action, $page_path_error;

    // Get properties of current page
    $page = get_page_properties();

    // Load error page when action does not exist
    if (empty($page) || $page == null) {
            $file = $page_path_error;
    } else {
        $file = $page->content;
    }

    // If file exists
    if (file_exists($file)) {
        return $file;
    }
}

// Set stucture
$structure = get_json_content($pages_file);

// Convenience function to return page properies for action
// @param $action
// @return object with page structure or NULL
function get_page_properties()
{
    global $structure, $page_action;

    $actions = explode('/', $page_action);

    // Check if action is allowed
    for ($i = 0; $i < count($structure); $i++) {
        if ($structure[$i]->action == $actions[0]) {
            return $structure[$i];
        }
    }

    // If action isn't available, return NULL
    return null;
}

function item_child($child, $form__children__classes, $form__item__section, $page__section_name, $form__children__title, $form__children__name, $form__children__id_base, $k, $i)
{
    $content = '<div class="__list__item';

    if ($form__children__classes && $child[0]['value'] == '') {
        $content = $content . ' ' . $form__children__classes;
    }
    $content .= ' __list__item--' . $i . '-' . $k . '">';

    $toggle__header__id        = $page__section_name . '__section-' . $i . '--' . $form__children__name . '-' . $k;
    $toggle__header__title     = $form__children__title . ' ' . $k;
    $toggle__header__subtitle  = ($child->headline) ? $child->headline : $child[0]['value'];
    $toggle__header__show_icon = true;

    $content .= '<a href="#"
    class="__list__item__toggle mdl-color-text--grey-800"
    data-js-toggle
    data-js-target="#' . $toggle__header__id . '">';

    if (isset($toggle__header__show_icon) && $toggle__header__show_icon) {
        $content .= '<i class="material-icons __list__item__toggle-button" role="presentation">keyboard_arrow_right</i>';
    }

    $content .= '<div class="mdl-typography--title js-toggle-title-' . $toggle__header__id . '">' . $toggle__header__title . '</div>';

    if (isset($toggle__header__subtitle) && $toggle__header__subtitle) {
        $content .= '<p class="__list__item__link">' . strip_tags($toggle__header__subtitle) . '</p>';
    }
    $content .= '</a><div class="__list__item__content hidden" id="' . $toggle__header__id . '">';

    $form__item__items = $child;
    $form__item__id    = $form__children__id_base . '][' . $form__children__name . '][child-' . $k;
    $content .= items($form__item__items, $form__item__id, $form__item__section, $form__children__name . $k, $i);

    $content .= '</div></div>';

    return $content;
}

function items($form__item__items, $form__item__id, $form__item__section, $page__section_name, $i) {
    $content = '';

    foreach ($form__item__items as $key => $item) {
        ob_start();

        switch ($item['type']) {
            case 'title':
                include('partials/form/title.php');
                break;
            case 'textarea':
                include('partials/form/textarea.php');
                break;
            case 'checkbox':
                include('partials/form/checkbox.php');
                break;
            case 'radio':
                include('partials/form/radio.php');
                break;
            case 'hidden':
                include('partials/form/hidden.php');
                break;
            case 'icons':
                include('partials/form/icons.php');
                break;
            case 'button':
                include('partials/form/button.php');
                break;
            case 'link':
                include('partials/form/link.php');
                break;
            case 'number':
                include('partials/form/number.php');
                break;
            case 'select':
                include('partials/form/select.php');
                break;
            default:
                include('partials/form/input.php');
        }

        $content .= ob_get_clean();

        if ($item['children']) {
            $form__children__title   = $item['title'];
            $form__children__name    = $item['name'];
            $form__children__classes = $item['child-classes'];
            $form__children__id_base = $form__item__id;

            $content .=  '<div class="__list__children">';

            $k = 0;

            foreach ($item['children'] as $child) {
                $k++;
                $content .= item_child($child, $form__children__classes, $form__item__section, $page__section_name, $form__children__title, $form__children__name, $form__children__id_base, $k, $i);
            }

            $content .= '</div>';
        }
    }
    return $content;
}