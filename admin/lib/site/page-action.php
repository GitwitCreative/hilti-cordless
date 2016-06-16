<?php
  function get_site_page_action () {
    global $SITE;

    $page_action = $SITE['page']->general->type;

    // When no file is requested, use index method
    if ($page_action === null) {
      $page_action = 'index';
    }

    return $page_action;
  }
