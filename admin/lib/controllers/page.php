<?php

$page__message;

function save_page($section)
{
    global $content_directory, $page__message;

    $data    = validate_all_fields($_REQUEST[$section]);
    $is_page = (bool)$_REQUEST['page'];
    $page    = $_REQUEST['page'];

    if (!$is_page) {
        if (!$data['name']) {
            $page__message[$section] = 'Could not create page. Please add a page name.';
        } else {
            $page = preg_replace('/[^A-Z0-9._-]/i', '_', $data['name']);

            @mkdir($content_directory . $_REQUEST['site']);
        }
    }

    $filename = $content_directory . $_REQUEST['site'] . '/' . $page . '.json';
    $saved    = save_to_json($filename, $section, $data);

    if ($saved) {
        $page__message[$section] = 'Data saved.';

        if (!$is_page) {
            header('Location: ./?action=page&site=' . get_current_site() . '&page=' . $page);
            exit();
        }
    } else {
        $page__message[$section] = 'Saving failed. Please try again.';
    }
}

function delete_page($page)
{
    global $content_directory;

    unlink($content_directory . get_current_site() . '/' . $page . '.json');
}

function copy_page($from)
{
    global $content_directory;

    $directory = $content_directory . get_current_site() . '/';
    $filename  = strtolower($from) . '.json';

    $source           = $directory . $filename;
    $destination_file = $filename;

    $i     = 0;
    $parts = pathinfo($destination_file);
    while (file_exists($directory . $destination_file)) {
        $i++;
        $destination_file = $parts['filename'] . '-' . $i . '.' . $parts['extension'];
    }

    copy($source, $directory . $destination_file);

    header('Location: ./?action=page&site=' . get_current_site() . '&page=' . str_replace('.' . $parts['extension'], '', $destination_file));
    exit();
}

if (isset($_REQUEST['pagedata']) && isset($_REQUEST['pagedata']['general'])) {
    save_page('general');
}

if (isset($_REQUEST['pagedata']) && isset($_REQUEST['pagedata']['tile'])) {
    save_page('tile');
}

if (isset($_REQUEST['pagedata']) && isset($_REQUEST['pagedata']['content'])) {
    save_page('content');
}

if (isset($_REQUEST['pagedata']) && isset($_REQUEST['pagedata']['video'])) {
    save_page('video');
}

if (isset($_REQUEST['pagedata']) && isset($_REQUEST['pagedata']['footer'])) {
    save_page('footer');
}

if (isset($_REQUEST['delete']) && isset($_REQUEST['page'])) {
    delete_page($_REQUEST['page']);
}

if (isset($_REQUEST['add']) && isset($_REQUEST['add']['copy-from'])) {
    copy_page($_REQUEST['add']['copy-from']);
}
