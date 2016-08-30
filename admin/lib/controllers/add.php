<?php

$add_message;

function save_add()
{
    global $content_directory, $add_message;

    $data      = [
        'general' => validate_all_fields($_REQUEST['add'])
    ];
    $copy_from = $data['general']['copy-from'];
    $language  = $data['general']['lang'];
    $filename  = $content_directory . 'i18n/' . $language . '.json';

    if ($copy_from) {
        $copyfile = $content_directory . 'i18n/' . $copy_from . '.json';

        if (file_exists($copyfile)) {
            $current_content = get_json_content($copyfile);
            unset($data['general']['copy-from']);

            $data                    = array_merge_recursive((array)$current_content, (array)$data);
            $data['general']['lang'] = $language;
        } else {
            $add_message = 'Project you want to copy from does not exists.';
        }
    }

    if (file_exists($filename)) {
        $add_message = 'Project already exists.';
    } else {
        $saved = save_to_json($filename, null, $data);

        $dir = $content_directory . $language;

        if ($saved) {
            if ($copy_from) {
                copy_directory($content_directory . $copy_from, $dir);

            }
            @mkdir($dir);

            if (!createCategories($dir)
                || !createProducts($dir)
                || !createTile($dir)
                || !createSolutions($dir)
            ) {
                $add_message = 'Saving failed. Please try again.';

                return false;
            }

            allow_site_for_current_user($language);

            header('Location: /?action=site&site=' . $language);
            exit();
        } else {
            $add_message = 'Saving failed. Please try again.';
        }
    }
}

function createCategories($dir)
{
    $file = $dir . '/categories.json';

    if (!file_exists($file)) {
        return save_to_json($file, null, null);
    } else {
        return true;
    }
}

function createProducts($dir)
{
    $file = $dir . '/products.json';

    if (!file_exists($file)) {
        return save_to_json($file, null, null);
    } else {
        return true;
    }
}

function createTile($dir)
{
    $file = $dir . '/tile.json';

    if (!file_exists($file)) {
        $landing = [
            'general' => ['type' => 'tile', 'name' => 'Tile', 'trackingId_prefix' => '', 'export' => 'tile.html'],
            'tile'    => [
                'categories' => [
                    'categories' => [
                        'child-1' => ['link_link' => '', 'image_thumbnail' => '', 'video_url' => ''],
                        'child-2' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-3' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-4' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-5' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-6' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-7' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-8' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-9' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-10' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-11' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-12' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-13' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-14' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-15' => ['link_link' => '', 'image_thumbnail' => ''],
                        'child-16   ' => ['link_link' => '', 'image_thumbnail' => ''],
                    ]
                ]
            ]
        ];

        return save_to_json($file, null, $landing);
    } else {
        return true;
    }
}

function createSolutions($dir)
{
    $file = $dir . '/solutions.json';

    if (!file_exists($file)) {
        $landing = ["general" => ["type" => "content", "name" => "Solutions", "body_classes" => "solutions"]];

        return save_to_json($file, null, $landing);
    } else {
        return true;
    }
}

if (isset($_REQUEST['add']) && isset($_REQUEST['add']['add'])) {
    save_add();
}
