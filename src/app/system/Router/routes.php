<?php

Router::get('/', ['HomeController', 'index']);
Router::get('/login', ['AuthController', 'login']);
Router::post('/login', ['AuthController', 'auth']);
Router::get('/register', ['AuthController', 'register']);
Router::post('/register', ['AuthController', 'registerProcess']);
Router::get('/users', ['UsersController', 'index']);


//[
//    '/login' => ['GET' => ['AuthController', 'login'], 'POST' => ['AuthController', 'auth']],
//]