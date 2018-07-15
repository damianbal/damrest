<?php

// We need that so we can access our REST API from different server
// List only domains that you will connect from, just for testing '*' will do.
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// We don't need notices
error_reporting(E_ALL & ~E_NOTICE);

$config = include('src/config.php');

include_once 'vendor/autoload.php';

use damianbal\enterium\DB;
use damrest\Core\App;

// Connect to database
DB::getInstance()->connect($config['dbname'], $config['host'], $config['user'], $config['pass']);

// ----------------------------------
// Bootstrap
// ----------------------------------
require 'bootstrap.php';

// ----------------------------------
// Create app
// ----------------------------------
$app = new App($router);

// ----------------------------------
// Run the app
// ----------------------------------
$app->run();
