<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Correct path to maintenance mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Correct path to autoload
require __DIR__.'/../vendor/autoload.php';

// Correct path to bootstrap
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle request
$app->handleRequest(Request::capture());