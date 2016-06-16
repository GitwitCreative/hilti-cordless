<?php
  error_reporting(0);
  require('lib/index.php');
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Design Lite</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../dist/admin/app.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header <?php
        if (get_page_properties()->sidebar) {
          echo 'mdl-layout--fixed-drawer';
        }
    ?>">
      <?php include(get_file_path()); ?>
    </div>

    <script src="../dist/admin/app.js"></script>
  </body>
</html>
