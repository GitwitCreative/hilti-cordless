<?php

  function upload_files() {
    global $files_directory;

    $upload_dir = $files_directory . get_current_site() . '/';

    if (!is_dir($upload_dir)) {
      $success = @mkdir($upload_dir);

      if (!$success) {
        return false;
      }
    }

    if (!empty($_FILES)) {
      foreach($_FILES as $file) {
        $name = preg_replace('/[^A-Z0-9._-]/i', '_', $file['name']);

        // don't overwrite an existing file
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists($upload_dir . $name)) {
          $i++;
          $name = $parts['filename'] . '-' . $i . '.' . $parts['extension'];
        }

        // preserve file from temporary directory
        $success = move_uploaded_file($file['tmp_name'], $upload_dir . $name);

        // set proper permissions on the new file
        if ($success) {
          chmod($upload_dir . $name, 0644);

          return true;
        }

        return false;
      }
    }
  }

  function delete_file ($filename) {
    global $files_directory;

    $file = $files_directory . get_current_site() . '/' . $filename;

    unlink($file);
  }

  if (isset($_FILES['file'])) {
    $saved = upload_files();

    if ($saved) {
      echo json_encode(array(
        'success' => true
      ));

      die();
    }

    header('HTTP/1.1 404 Not Found');
    echo json_encode(array(
      'success' => false
    ));

    die();
  }

  if (isset($_REQUEST['delete']) && isset($_REQUEST['file'])) {
    delete_file($_REQUEST['file']);
  }
