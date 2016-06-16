<?php

  $add_message;

  function save_add () {
    global $content_directory, $add_message;

    $data = array(
      'general' => validate_all_fields($_REQUEST['add'])
    );
    $copy_from = $data['general']['copy-from'];
    $language = $data['general']['lang'];
    $filename = $content_directory . 'i18n/' . $language . '.json';

    if ($copy_from) {
      $copyfile = $content_directory . 'i18n/' . $copy_from . '.json';

      if (file_exists($copyfile)) {
        $current_content = get_json_content($copyfile);
        unset($data['general']['copy-from']);

        $data = array_merge_recursive((array) $current_content, (array) $data);
        $data['general']['lang'] = $language;
      } else {
        $add_message = 'Project you want to copy from does not exists.';
      }
    }

    if (file_exists($filename)) {
      $add_message = 'Project already exists.';
    } else {
      $saved = save_to_json($filename, null, $data);

      if ($saved) {
        if ($copy_from) {
          copy_directory($content_directory . $copy_from, $content_directory . $language);
        } else {
          @mkdir($content_directory . $language);
        }

        allow_site_for_current_user($language);

        header('Location: ./?action=site&site=' . $language);
      } else {
        $add_message = 'Saving failed. Please try again.';
      }
    }
  }

  if (isset($_REQUEST['add']) && isset($_REQUEST['add']['add'])) {
    save_add();
  }
