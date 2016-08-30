<?php
error_reporting(0);

require_once('../admin/lib/page-functions.php');

// absolute URI to prepend the navigation links
$absUriPreVar = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(!empty($_GET['deploy']) && $_GET['deploy'] == '1') {
    //$absUriPreVar = get_site_propery('general', 'domain');
    $absUriPreVar = '';
}

$section_names = array();
$section_tooltips = array();

switch (get_page_propery('general', 'type')) {
    case 'tile' : include_once 'landing2v.php'; break;
    case 'category' :
    case 'product' : include_once 'index2v.php'; break;
    default :include_once 'index1v.php';
}