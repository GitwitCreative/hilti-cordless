<?php

require_once('file-helpers.php');

function is_site()
{
    global $page_action;

    if (isset($_REQUEST['site'])) {
        return true;
    }

    return false;
}

function is_page()
{
    global $page_action;

    if (isset($_REQUEST['page']) && $_REQUEST['page'] != '') {
        return true;
    }

    return false;
}

function get_current_site()
{
    if (isset($_REQUEST['site'])) {
        return $_REQUEST['site'];
    }

    return null;
}

function get_current_page()
{
    global $SITE;

    if (isset($_REQUEST['page'])) {
        switch ($_REQUEST['page']) {
            case 'product' :
                return get_current_product();
            case 'category' :
                return get_current_category();
            case 'tile' :
                return get_tile();
            default: {
                if (is_array($SITE['current-site']->pages)) {
                    $page = $SITE['current-site']->pages[$_REQUEST['page']];
                } else {
                    $page = $SITE['current-site']->pages->$_REQUEST['page'];
                }

                if ($page) {
                    return $page;
                }

                return null;
            }
        }
    }
    return null;
}

function get_current_category()
{
    global $SITE;

    if (!isset($_REQUEST['category'])) {
        return null;
    }

    $id = $_REQUEST['category'];

    $categories = is_array($SITE['current-site']->pages) ? $SITE['current-site']->pages['categories'] : $SITE['current-site']->pages->categories;

    if (is_array($categories)) {
        return $categories[$id];
    }

    return $categories->$id;
}

function get_current_product()
{
    global $SITE;

    if (!isset($_REQUEST['product'])) {
        return null;
    }

    $id = $_REQUEST['product'];

    $products = is_array($SITE['current-site']->pages) ? $SITE['current-site']->pages['products'] : $SITE['current-site']->pages->products;

    if (is_array($products)) {
        return $products[$id];
    }

    return $products->$id;
}

function get_tile()
{
    global $SITE;

    return is_array($SITE['current-site']->pages) ? $SITE['current-site']->pages['tile'] : $SITE['current-site']->pages->tile;
}



function get_categories()
{
    global $content_directory;

    return get_json_content_to_array($content_directory . get_current_site() . '/categories.json');
}

function get_category_by_id($id)
{
    $categories = get_categories();

    return isset($categories[$id]) ? $categories[$id] : null;
}

function get_products()
{
    global $content_directory;

    return get_json_content_to_array($content_directory . get_current_site() . '/products.json');
}

function get_products_by_category_id($id)
{
    $products = get_products();

    return array_filter($products, function($item) use ($id) {
        return (isset($item['general']['category']) && $item['general']['category'] == $id);
    });
}

function get_current_page_name()
{
    $page = get_current_page();

    if ($page) {
        return $page->name;
    }

    return null;
}

function get_languages()
{
    global $SITE;

    $languages = [];

    foreach ($SITE['site-files'] as $_site) {
        $language = str_replace('.json', '', $_site);

        array_push($languages, $language);
    }

    return $languages;
}

function get_sites()
{
    global $SITE, $content_directory;

    $sites = [];

    foreach ($SITE['site-files'] as $_site) {
        $site = get_json_content($content_directory . 'i18n/' . $_site);

        $sites[$site->general->lang] = $site;
    }

    return $sites;
}

function get_pages()
{
    global $content_directory;

    $full_pages = [];
    $pages      = get_files_in_directory($content_directory . get_current_site() . '/');

    foreach ($pages as $page) {
        $file_content = get_json_content($content_directory . get_current_site() . '/' . $page);
        $pagename     = str_replace('.json', '', $page);

        $full_pages[$pagename]       = $file_content;
        $full_pages[$pagename]->name = $pagename;
    }

    return $full_pages;
}

function get_human_filesize($size, $unit = '')
{
    if ((!$unit && $size >= 1 << 30) || $unit == 'GB') {
        return number_format($size / (1 << 30), 2) . 'GB';
    }

    if ((!$unit && $size >= 1 << 20) || $unit == 'MB') {
        return number_format($size / (1 << 20), 2) . 'MB';
    }

    if ((!$unit && $size >= 1 << 10) || $unit == 'KB') {
        return number_format($size / (1 << 10), 2) . 'KB';
    }

    return number_format($size) . ' bytes';
}

function sortByName($a, $b)
{
    return strcasecmp($a['name'], $b['name']);
}

function get_site_files()
{
    global $files_directory;

    $site  = get_current_site();
    $files = get_files_in_directory($files_directory . $site);

    foreach ($files as $key => $file) {
        $files[$key] = [
            'name' => $file,
            'path' => $files_directory . $site . '/' . $file,
            'size' => get_human_filesize(filesize($files_directory . $site . '/' . $file)),
            'type' => mime_content_type($files_directory . $site . '/' . $file)
        ];
    }

    usort($files, 'sortByName');

    return $files;
}

