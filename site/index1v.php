<!doctype html>
<!--[if IE]> <html class="no-js isIE" lang="<?php echo get_site_propery('general', 'lang'); ?>"> <![endif]-->
<!--[if !IE]><!--> <html class="no-js" lang="<?php echo get_site_propery('general', 'lang'); ?>"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php
      if (get_page_propery('general', 'title')) {
          echo get_page_propery('general', 'title');
      } else {
          echo get_site_propery('general', 'meta.title');
      }
    ?></title>
    <meta name="description" content="<?php
        if (get_page_propery('general', 'description')) {
            echo get_page_propery('general', 'description');
        } else {
            echo get_site_propery('general', 'meta.description');
        }
    ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php
        if ($_REQUEST['deploy'] == '1') {
          if($_SERVER['SERVER_NAME'] == 'localhost') {
            echo '../';
          } elseif($_SERVER['SERVER_NAME'] == 'hilti.sndbx.r8tin.net') {
              echo '../';
          }
          else {
//            echo 'https://cdn.microsites-by-hilti.com/';
              echo '../';
          }
        } else {
            echo '../dist/';
        }
    ?>">
    <link rel="canonical" href="<?php echo get_site_propery('general', 'domain') . get_page_propery('general', 'export') ?>" />
    <link rel="shortcut icon" href="assets/layout/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/layout/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/app.min.css">
    <!--[if IE 9]>
    <link rel="stylesheet" href="assets/css/ancient-ie.min.css">
    <![endif]-->
    <script src="assets/js/vendor/modernizr.js"></script>

  </head>
  <body class="microsite <?php
        if (get_page_propery('general', 'type') == 'video') {
            echo 'technologyVideo';
        } elseif (get_page_propery('general', 'type') == 'content') {
            echo 'solutions';
        } elseif (get_page_propery('general', 'type') == 'tile') {
            echo 'tile';
        }
    ?> isLoading navdirection--right"
        data-layer="visible"
        data-header="visible">
    <?php include('partials/tracking.php'); ?>

    <div id="outer-wrap">
        <div id="inner-wrap">
            <?php include('partials/legacy_browser_hint.php'); ?>

            <div id="top" class="container">
                <section class="header">
                    <?php include('partials/header.php'); ?>
                    <?php include('partials/navigation.php'); ?>
                </section>

                <section class="content">
                    <div id="main" class="full">
                        <?php
                            $page_secion_name = get_page_propery('general', 'type');

                            include(get_file_path());
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include('partials/dimmer.php'); ?>
    <?php include('partials/orientationcheck.php'); ?>
    <?php include('partials/knightrider.php'); ?>

    <?php
    //print_r($section_names);
    //exit;
    ?>
    <script>

        <?php
        $navigationLinks = array();

        //if (get_page_propery('general', 'type') == 'video') {
            $count = 0;
            $numberOfSections = count($section_names);
            $headerLinkList = get_page_propery($page_secion_name, 'header')->linklist;

            foreach($section_names as $sectionName) {
                if($count == 0) {
                    array_push($navigationLinks,'video');
                }
                elseif($count == ($numberOfSections - 1)) {
                    array_push($navigationLinks,$sectionName);
                } else {
                    array_push($navigationLinks,preg_replace('/#/','',$headerLinkList->{"child-".$count}->link));
                }
                $count++;
            }
        /*} else {
            $navigationLinks = $section_names;
        }*/
        ?>

        window.sections = {
            <?php if (!empty($section_names) || !empty($section_tooltips)) : ?>
                navigation: [ "<?php echo implode('","', $navigationLinks); ?>" ],
                tooltip: [ "<?php echo implode('","', $section_tooltips); ?>" ],
            <?php endif; ?>
            exclude: '.slide.footer'
        };
    </script>

    <script src="<?php
        if (!empty($_REQUEST['deploy']) && $_REQUEST['deploy'] == '1') {
          if($_SERVER['SERVER_NAME'] == 'localhost') {
            echo 'assets/js/app.min.js';
          }
          else {
            echo 'https://cdn.microsites-by-hilti.com/assets/js/app.min.js';
          }
        } else {
            echo 'assets/js/app.js';
        }
    ?>"></script>
  </body>
</html>
