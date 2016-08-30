<?php

$page__message;

/**
 * @param $section
 */
function save_product($section)
{
    global $content_directory, $page__message;

    $data = validate_all_fields($_REQUEST[$section]);

    if (isset($_POST['general']['animation_images'])) {
        $data['animation_images'] = explode("\n" , str_replace("\r", '', $_POST['general']['animation_images']));
    }

    $filename   = $content_directory . $_REQUEST['site'] . '/products.json';
    $identifier = $_REQUEST['product'];
    $saved      = save_product_to_json($filename, $identifier, $section, $data);

    if ($saved) {
        $page__message[$section] = 'Data saved.';

//        header('Location: ./?action=edit_product&site=' . get_current_site() . '&product=' . $identifier);
//        exit();
    } else {
        $page__message[$section] = 'Saving failed. Please try again.';
    }
}

function delete_section($section)
{
    global $content_directory, $page__message;

    $filename   = $content_directory . $_REQUEST['site'] . '/products.json';
    $identifier = $_REQUEST['product'];

    $products = get_json_content_to_array($filename);

    if ($identifier && isset($products[$identifier])) {
        unset($products[$identifier][$section]);

        $content = json_encode($products);

        $saved = save_to_file($filename, $content);

        $page__message[$section] = ($saved) ? 'Data saved.' : 'Saving failed. Please try again.';
    }
}

function delete_content_section($section)
{
    global $content_directory, $page__message;

    $filename   = $content_directory . $_REQUEST['site'] . '/products.json';
    $identifier = $_REQUEST['general']['id'];

    $products = get_json_content_to_array($filename);

    if ($identifier && isset($products[$identifier])) {
        unset($products[$identifier]['slide_content'][$section]);

        $content = json_encode($products);

        $saved = save_to_file($filename, $content);

        $page__message[$section] = ($saved) ? 'Data saved.' : 'Saving failed. Please try again.';
    }

    header('Location: ./?action=edit_product&site=' . get_current_site() . '&product=' . $identifier);
    exit();
}

function delete_product($identifier)
{
    global $content_directory;

    $filename = $content_directory . get_current_site() . '/products.json';

    $products = get_json_content_to_array($filename);

    unset($products[$identifier]);

    $products = $products ?: null;

    save_to_file($filename, json_encode($products));

    header('Location: ./?action=products&site=' . get_current_site());
    exit();
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_product' && isset($_REQUEST['product'])) {
    delete_product($_REQUEST['product']);
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_general'])) {
    save_product('general');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_footer'])) {
    save_product('slide_footer');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_main'])) {
    save_product('slide_main');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_icons'])) {
    delete_section('slide_icons');
    save_product('slide_icons');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_category_description'])) {
    save_product('category_description');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_videos'])) {
    delete_section('slide_videos');
    save_product('slide_videos');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_animation'])) {
    delete_section('slide_animation');
    save_product('slide_animation');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_tab'])) {
    delete_section('slide_tab');
    save_product('slide_tab');
}

if (isset($_REQUEST['productdata']) && isset($_REQUEST['productdata']['save_slide_content'])) {
    save_product('slide_content');
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_section' && isset($_REQUEST['general']['id']) && isset($_REQUEST['section'])) {
    delete_content_section($_REQUEST['section']);
}