<?php
  // Start a new session
  session_start();

  $users = get_json_content($users_file);
  $user_permissions = get_permissions_by_current_user();

  function is_loggedin () {
    return $_SESSION['loggedin'];
  }

  function login_user ($user) {
    $_SESSION['username'] = $user;
    $_SESSION['loggedin'] = true;
  }

  function logout () {
    session_destroy();
  }

  function check_user ($user, $password) {
    global $users;
    $found = false;

    foreach ($users as $member) {
      if ($member->username == $user && $member->password == hash('sha512', $password)) {
        $found = true;
        break;
      }
    }

    if ($found) {
      return true;
    }

    return false;
  }

  function get_permissions_by_user ($user) {
    global $users;

    foreach($users as $member) {
      if ($member->username == $user) {
        $permissions = $member->sites;
        break;
      }
    }

    return $permissions;
  }

  function get_permissions_by_current_user () {
    $user = $_SESSION['username'];

    return get_permissions_by_user($user);
  };

  function user_has_permission_for_site ($site_id) {
    global $user_permissions;

    if (in_array($site_id, $user_permissions)) {
      return true;
    }

    return false;
  }

  function check_permission () {
    if (!user_has_permission_for_site($_REQUEST['site'])) {
      header('Location: ./');
      exit();
    }
  }

  function allow_site_for_current_user ($site) {
    global $users, $users_file;

    $user = $_SESSION['username'];

    foreach($users as $key => $member) {
      if ($member->username == $user) {
        $users[$key]->sites[] = $site;
        break;
      }
    }

    save_to_json($users_file, null, $users);
  }
