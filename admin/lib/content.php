<?php

  require_once('file-helpers.php');

  function is_site () {
    global $page_action;

    if (isset($_REQUEST['site'])) {
      return true;
    }

    return false;
  }

  function is_page () {
    global $page_action;

    if (isset($_REQUEST['page']) && $_REQUEST['page'] != '') {
      return true;
    }

    return false;
  }

  function get_current_site () {
    if (isset($_REQUEST['site'])) {
      return $_REQUEST['site'];
    }

    return null;
  }

  function get_current_page () {
    global $SITE;

    if (isset($_REQUEST['page'])) {
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

    return null;
  }

  function get_current_page_name () {
    $page = get_current_page();

    if ($page) {
      return $page->name;
    }

    return null;
  }

  function get_languages () {
    global $SITE;

    $languages = array();

    foreach($SITE['site-files'] as $_site) {
      $language = str_replace('.json', '', $_site);

      array_push($languages, $language);
    }

    return $languages;
  };

  function get_sites () {
    global $SITE, $content_directory;

    $sites = array();

    foreach($SITE['site-files'] as $_site) {
      $site = get_json_content($content_directory . 'i18n/' . $_site);

      $sites[$site->general->lang] = $site;
    }

    return $sites;
  }

  function get_pages () {
    global $content_directory;

    $full_pages = array();
    $pages = get_files_in_directory($content_directory . get_current_site() . '/');

    foreach ($pages as $page) {
      $file_content = get_json_content($content_directory . get_current_site() . '/' . $page);
      $pagename = str_replace('.json', '', $page);

      $full_pages[$pagename] = $file_content;
      $full_pages[$pagename]->name = $pagename;
    }

    return $full_pages;
  }

  function get_human_filesize ($size, $unit = '') {
      if( (!$unit && $size >= 1<<30) || $unit == 'GB') {
        return number_format($size/(1<<30),2) . 'GB';
      }

      if( (!$unit && $size >= 1<<20) || $unit == 'MB') {
        return number_format($size/(1<<20),2) . 'MB';
      }

      if( (!$unit && $size >= 1<<10) || $unit == 'KB') {
        return number_format($size/(1<<10),2) . 'KB';
      }

      return number_format($size) . ' bytes';
  }

  function sortByName($a, $b) {
    return strcasecmp($a['name'], $b['name']);
  }

  function get_site_files () {
    global $files_directory;

    $site = get_current_site();
    $files = get_files_in_directory($files_directory . $site);

    foreach ($files as $key => $file) {
      $files[$key] = array(
        'name' => $file,
        'path' => $files_directory . $site . '/' . $file,
        'size' => get_human_filesize(filesize($files_directory . $site . '/' . $file)),
        'type' => mime_content_type($files_directory . $site . '/' . $file)
      );
    }

    usort($files, 'sortByName');

    return $files;
  }

