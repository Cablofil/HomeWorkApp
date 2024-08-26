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
Router::get('/manufacturers-list', ['HomeWork19Controller', 'index']);
Router::get('/show', ['HomeWork19Controller', 'show']);
Router::get('/create-manufacturer', ['HomeWork19Controller', 'createManufacturer']);
Router::post('/create', ['HomeWork19Controller', 'create']);



//[
//    '/login' => ['GET' => ['AuthController', 'login'], 'POST' => ['AuthController', 'auth']],
//]