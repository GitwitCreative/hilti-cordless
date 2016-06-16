<?php

  // Return the current file path
  // @return string file path
  function get_file_path () {
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
  function get_page_properties () {
    global $structure, $page_action;

    $actions = explode('/', $page_action);

    // Check if action is allowed
    for ($i = 0; $i < count($structure); $i++) {
      if ($structure[$i]->action == $actions[0]) {
        return $structure[$i];
      }
    }

    // If action isn't available, return NULL
    return NULL;
  }

