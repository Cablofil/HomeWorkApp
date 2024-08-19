<?php

Router::get('/', ['HomeController', 'index']);
Router::get('/login', ['AuthController', 'login']);
Router::post('/login', ['AuthController', 'auth']);
Router::get('/register', ['AuthController', 'register']);
Router::post('/register', ['AuthController', 'registerProcess']);
Router::get('/users', ['UsersController', 'index']);
Router::get('/hello', ['HomeWorkController', 'index']);
Router::get('/calculator', ['HomeWorkController', 'calculator']);
Router::post('/calculate', ['HomeWorkController', 'calculate']);


//[
//    '/login' => ['GET' => ['AuthController', 'login'], 'POST' => ['AuthController', 'auth']],
//]