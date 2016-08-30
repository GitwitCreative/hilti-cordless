<?php
function copy_directory($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copy_directory($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}

function get_json_content($filename)
{
    $file = file_get_contents($filename);

    return json_decode($file);
}

function get_json_content_to_array($filename) {
    $file = file_get_contents($filename);

    return json_decode($file, true);
}

function get_files_in_directory($directory)
{
    $files = [];

    if (is_dir($directory)) {
        if ($directory_handle = opendir($directory)) {

            while (($file = readdir($directory_handle)) !== false) {
                if (!is_dir($directory . $file) && $file != '.' && $file != '..') {
                    array_push($files, $file);
                }
            }

            closedir($directory_handle);
        }
    }

    return $files;
}

function save_to_json($filename, $identifier, $content)
{
    $current_content = get_json_content_to_array($filename);

    if ($identifier) {
        $cc = $current_content[$identifier] ? : [];
        $n = array_replace_recursive($cc, $content);

        $current_content[$identifier] = $n;
    } else {
        $current_content = $content;
    }

    $content = json_encode($current_content);

    return save_to_file($filename, $content);
}

function save_product_to_json($filename, $identifier, $section, $content)
{
    $current_content = get_json_content_to_array($filename);

    if ($identifier) {
        $cc = $current_content[$identifier] ? : [];

        if ($section == 'slide_content'){
            $keys = array_keys($content);
            $cc[$section][$keys[0]] = $content[$keys[0]];
        } else {
            $cc[$section] = $content;
        }
//        $n = array_replace_recursive($cc, $content);

        $current_content[$identifier] = $cc;
    } else {
        $current_content = $content;
    }

    $content = json_encode($current_content);

    return save_to_file($filename, $content);
}

function save_to_file($filename, $content)
{
    $filehandle = fopen($filename, 'w');
    fwrite($filehandle, $content);

    return fclose($filehandle);
}
