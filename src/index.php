<?php

session_start();

define('APP_URL', 'http://localhost:8080/');
define('APP_DIR', __DIR__ . '/');
define('CONTROLLER_DIR', APP_DIR . 'app/Controllers/');

define('DB_HOST', 'mysql');
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8');
define('DB_NAME', 'HomeWork');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');

require_once 'Directions.php';


//Cookie::set('mycookie', 'lesson is over');

Router::process(HttpMethod::from(Request::method()), Request::url());




