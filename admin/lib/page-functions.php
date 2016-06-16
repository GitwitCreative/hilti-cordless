<?php
  $content_directory = dirname(__FILE__) . '/../../data/';
  $pages_file = dirname(__FILE__) . '/../../pages.json';
  $page_path_error = dirname(__FILE__) . '/../../site/pages/error.php';
  $page_files_base = dirname(__FILE__) . '/../templates/';

  require_once('file-helpers.php');

  $SITE = array(
    'site-files' => get_files_in_directory($content_directory . 'i18n/')
  );

  require('content.php');

  $SITE['sites'] = get_sites();
  $SITE['current-site'] = $SITE['sites'][get_current_site()];
  $SITE['current-site']->pages = (object) get_pages();
  $SITE['page'] = get_current_page();

  require('site/page-action.php');
  $page_action = get_site_page_action();

  require('templates.php');
  require('set-headers.php');

  function get_site_section ($section) {
    global $SITE;

    return $SITE['current-site']->$section;
  }

  function get_site_propery ($section, $property) {
    return get_site_section($section)->$property;
  }

  function get_page_section ($section) {
    global $SITE;

    return $SITE['page']->$section;
  }

  function get_page_propery ($section, $property) {
    if(!empty(get_page_section($section)->$property)) {
      return get_page_section($section)->$property;
    } else {
      return "";
    }

  }
