<!doctype html>
<html lang="<?php echo get_site_propery('general', 'lang'); ?>">

<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php
    if (get_page_propery('general', 'description')) {
        echo get_page_propery('general', 'description');
    } else {
        echo get_site_propery('general', 'meta.description');
    }
    ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
        if (get_page_propery('general', 'title')) {
            echo get_page_propery('general', 'title');
        } else {
            echo get_site_propery('general', 'meta.title');
        }
        ?></title>

    <base href="<?php
    if ($_REQUEST['deploy'] == '1') {
        if($_SERVER['SERVER_NAME'] == 'localhost') {
            echo '../';
        } elseif($_SERVER['SERVER_NAME'] == 'hilti.sndbx.r8tin.net') {
            echo '../';
        }
        else {
            echo 'https://cdn.microsites-by-hilti.com/';
        }
    } else {
        echo '../dist/';
    }
    ?>">
    <link rel="canonical" href="<?php echo get_site_propery('general', 'domain') . get_page_propery('general', 'export') ?>" />
    <link rel="shortcut icon" href="assets/layout/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/layout/favicon.ico" type="image/x-icon">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="/assets/fe/bower_components/csshake/dist/csshake.css" />
    <link rel="stylesheet" href="/assets/fe/bower_components/fullpage.js/dist/jquery.fullpage.css" />
    <!-- endbower -->
    <!-- endbuild -->

    <!-- build:css styles/main.css -->
    <link rel="stylesheet" href="/assets/fe/app/fonts/HiltiSmallBold/fonts.css">
    <link rel="stylesheet" href="/assets/fe/app/fonts/HiltiSmallExtended/fonts.css">
    <link rel="stylesheet" href="/assets/fe/app/fonts/HiltiSmallHeavyExtended/fonts.css">
    <link rel="stylesheet" href="/assets/fe/app/fonts/HiltiSmallRoman/fonts.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/fonts.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/preloader.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/submenu.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/submenu.mobile.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/imageSequence.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/imageSequence.mobile.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/tab.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/tab.mobile.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/bar.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/main.css">
    <link rel="stylesheet" href="/assets/fe/app/styles/main.mobile.css">
    <!-- endbuild -->

    <!-- build:js scripts/vendor/modernizr.js -->
    <script src="/assets/fe/bower_components/modernizr/modernizr.js"></script>
    <!-- endbuild -->

    <?php include('partials/tracking.php'); ?>
</head>

<body class="isLoading product">
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="preloader_cover">
    <div id="canvas_round"></div>
</div>


<div id="<? echo $_GET['page'] == 'product' ? 'fullpage' : '';?>">

    <?php include('partials2v/navigation.php'); ?>

    <?php
    $page_secion_name = get_page_propery('general', 'type');

    include(get_file_path());
    ?>
</div>



<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="/assets/fe/bower_components/jquery/dist/jquery.js"></script>
<script src="/assets/fe/bower_components/radialIndicator/radialIndicator.js"></script>
<script src="/assets/fe/bower_components/fullpage.js/dist/jquery.fullpage.js"></script>
<script src="/assets/fe/bower_components/fullpage.js/vendors/jquery.easings.min.js"></script>
<script src="/assets/fe/bower_components/fullpage.js/vendors/scrolloverflow.min.js"></script>
<script src="/assets/fe/bower_components/image-map-resizer/js/imageMapResizer.min.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js scripts/main.js -->
<script src="/assets/fe/app/scripts/preloader.js"></script>
<?php if ($page_secion_name == 'product') :?>
<script src="/assets/fe/app/scripts/imageSequence.js"></script>
<?php endif;?>
<script src="/assets/fe/app/scripts/switch.js"></script>
<script src="/assets/fe/app/scripts/tab.js"></script>
<script src="/assets/fe/app/scripts/bar.js"></script>
<script src="/assets/fe/app/scripts/main.js"></script>
<!-- endbuild -->
</body>

</html>
