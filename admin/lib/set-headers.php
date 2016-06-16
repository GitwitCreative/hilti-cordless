<?php

  // Send Header if necessary
  function set_headers () {
    $page = get_page_properties();

    // Send 404 if empty
    if (empty($page) || $page == null) {
      header('HTTP/1.0 404 Not Found');
    }
  }

  // Build page
  set_headers();
