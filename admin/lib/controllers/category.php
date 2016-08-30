<?php

$page__message;

function save_category($section)
{
    global $content_directory, $page__message;

    $data = validate_all_fields($_REQUEST[$section]);

    $filename   = $content_directory . $_REQUEST['site'] . '/categories.json';
    $identifier = $_REQUEST['category'];
    $saved      = save_to_json($filename, $identifier, [$section => $data]);

    if ($saved) {
        $page__message[$section] = 'Data saved.';

//        header('Location: ./?action=edit_category&site=' . get_current_site() . '&category=' . $identifier);
//        exit();
    } else {
        $page__message[$section] = 'Saving failed. Please try again.';
    }
}

function delete_category($identifier)
{
    global $content_directory;

    $filename = $content_directory . get_current_site() . '/categories.json';

    $categories = get_categories();

    unset($categories[$identifier]);

    $categories = $categories ?: null;

    save_to_file($filename, json_encode($categories));

    header('Location: ./?action=categories&site=' . get_current_site());
    exit();
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_category' && isset($_REQUEST['category'])) {
    delete_category($_REQUEST['category']);
}

if (isset($_REQUEST['categorydata']) && isset($_REQUEST['categorydata']['save_general'])) {
    save_category('general');
}

if (isset($_REQUEST['categorydata']) && isset($_REQUEST['categorydata']['save_main'])) {
    save_category('main');
}

if (isset($_REQUEST['categorydata']) && isset($_REQUEST['categorydata']['save_first'])) {
    save_category('first');
}

if (isset($_REQUEST['categorydata']) && isset($_REQUEST['categorydata']['save_second'])) {
    save_category('second');
}

if (isset($_REQUEST['categorydata']) && isset($_REQUEST['categorydata']['save_third'])) {
    save_category('third');
}