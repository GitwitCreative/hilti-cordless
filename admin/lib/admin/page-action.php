<?php
  $login_message;

  function get_admin_page_action () {
    global $login_message;

    $_file = '';

    if (isset($_GET['action'])) {
      $_file = $_GET['action'];
    }

    $page_action = '';

    // If login form was submitted
    if (isset($_REQUEST['login']) && $_REQUEST['login'] == '1') {
      if (check_user($_REQUEST['username'], $_REQUEST['password'])) {
        login_user($_REQUEST['username']);

        header('Location: ./');

        die();
      } else {
        $login_message = 'Sadly, this user and password are not valid.';
      }
    }

    // If logout
    if (isset($_REQUEST['logout'])) {
      logout();

      header('Location: ./');
    }

    // Check login state
    if (!is_loggedin()) {
      $page_action = 'login';
    } else {
      $page_action = trim($_file, '/');

      // When no file is requested, use index method
      if (empty($page_action)) {
        $page_action = 'index';
      }
    }

    return $page_action;
  }
