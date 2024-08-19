<?php

session_start();

define('APP_URL', 'http://localhost:8080/');
define('APP_DIR', __DIR__ . '/');
define('CONTROLLER_DIR', APP_DIR . 'app/Controllers/');

require_once APP_DIR . 'app/system/Cookie.php';
require_once APP_DIR . 'app/system/Session.php';
require_once APP_DIR . 'app/system/Request.php';
require_once APP_DIR . 'app/system/Enums/HttpMethod.php';
require_once APP_DIR . 'app/system/Router/Router.php';
require_once APP_DIR . 'app/system/Router/routes.php';
require_once APP_DIR . 'app/system/Functions.php';
require_once APP_DIR . 'app/system/Validator.php';
require_once APP_DIR . 'app/system/Response.php';
require_once APP_DIR . 'app/Calculator/Calculator.php';

//Cookie::set('mycookie', 'lesson is over');

Router::process(HttpMethod::from(Request::method()), Request::url());


