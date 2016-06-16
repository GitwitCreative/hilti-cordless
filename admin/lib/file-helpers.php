<?php
  function copy_directory ($src, $dst) {
      $dir = opendir($src);
      @mkdir($dst);
      while(false !== ( $file = readdir($dir)) ) {
          if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
              copy_directory($src . '/' . $file, $dst . '/' . $file);
            } else {
              copy($src . '/' . $file, $dst . '/' . $file);
            }
          }
      }

      closedir($dir);
  }

  function get_json_content ($filename) {
    $file = file_get_contents($filename);

    return json_decode($file);
  }

  function get_files_in_directory ($directory) {
    $files = array();

    if (is_dir($directory)) {
      if ($directory_handle = opendir($directory)) {

        while (($file = readdir($directory_handle)) !== false) {
          if (!is_dir($directory . $file) && $file != '.' && $file != '..') {
            array_push($files, $file);
          }
        }

        closedir($directory_handle);
      }
    }

    return $files;
  }

  function save_to_json ($filename, $identifier, $content) {
    $current_content = get_json_content($filename);

    if ($identifier) {
      $current_content->$identifier = $content;
    } else {
      $current_content = $content;
    }

    $content = json_encode($current_content);

    $filehandle = fopen($filename, 'w');
    fwrite($filehandle, $content);

    return fclose($filehandle);
  }

  function save_to_file ($filename, $content) {
    $filehandle = fopen($filename, 'w');
    fwrite($filehandle, $content);

    return fclose($filehandle);
  }
