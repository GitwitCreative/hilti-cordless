<?php

// Load helpers
require_once('file-helpers.php');
require_once('validator.php');

// Config
$users_file        = dirname(__FILE__) . '/../users.json';
$content_directory = dirname(__FILE__) . '/../../data/';
$sites_directory   = dirname(__FILE__) . '/../../dist/';
$files_directory   = dirname(__FILE__) . '/../../dist/files/';
$pages_file        = dirname(__FILE__) . '/../pages.json';
$page_path_error   = dirname(__FILE__) . '/../templates/error.php';
$page_files_base   = dirname(__FILE__) . '/../templates/';

$SITE = [
    'site-files' => get_files_in_directory($content_directory . 'i18n/')
];

// Set User
require('user.php');

// Get Content
require('content.php');

// Controllers
require('controllers/settings.php');
require('controllers/add.php');
require('controllers/page.php');
require('controllers/category.php');
require('controllers/product.php');
require('controllers/upload.php');

// Set global config
require('set-site-content.php');

// Deploy action
require('controllers/index.php');

require('admin/page-action.php');
$page_action = get_admin_page_action();

require('templates.php');
require('set-headers.php');
