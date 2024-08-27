<?php

session_start();

define('APP_URL', 'http://localhost:8080/');
define('APP_DIR', __DIR__ . '/');
define('CONTROLLER_DIR', APP_DIR . 'app/Controllers/');

require_once 'Directions.php';

//Cookie::set('mycookie', 'lesson is over');

Router::process(HttpMethod::from(Request::method()), Request::url());


