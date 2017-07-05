<?php

define('ENV', 'dev');

if(ENV === 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

// Urls

define('PROTOCOL', 'http://');
define('DOMAIN', '192.168.0.35');
define('SUBFOLDER', '/simplecalendar/'); // if your page is not in a subfolder, put a / here
define('URL', PROTOCOL . DOMAIN . SUBFOLDER);

// Database Settings

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'simplecalendar');
define('DB_USER', 'root');
define('DB_PASS', 'Password123');
define('DB_CHARSET', 'utf8');

// Paths

define('ROOT', rtrim($_SERVER['DOCUMENT_ROOT'], '/') . SUBFOLDER );

define('CTRL_PATH', ROOT . 'private/controllers/');
define('MODEL_PATH', ROOT . 'private/models/');
define('VIEW_PATH', ROOT . 'private/views/');
define('CORE_PATH', ROOT . 'private/core/');