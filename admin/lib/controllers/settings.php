<?php

  $settings_message;

  function save_settings ($section) {
    global $content_directory, $settings_message;

    $data = validate_all_fields($_REQUEST[$section]);
    $filename = $content_directory . 'i18n/' . $_REQUEST['site'] . '.json';

    $saved = save_to_json($filename, $section, $data);

    if ($saved) {
      $settings_message[$section] = 'Data saved.';
    } else {
      $settings_message[$section] = 'Saving failed. Please try again.';
    }
  }

  if (isset($_REQUEST['settings']) && isset($_REQUEST['settings']['general'])) {
    save_settings('general');
  }

  if (isset($_REQUEST['settings']) && isset($_REQUEST['settings']['navigation'])) {
    save_settings('navigation');
  }

  if (isset($_REQUEST['settings']) && isset($_REQUEST['settings']['language_selector'])) {
    save_settings('language_selector');
  }
