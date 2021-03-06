<?php

use App\Http\Response;
use App\Controller\Admin\LoginController;

//ROTA LOGIN
$obRouter->get('/admin/login', [
    'middlewares' => [
        'required-admin-logout'
    ],
    function($request){
        return new Response(200, LoginController::getLogin($request));
    }
]);

//ROTA LOGIN POST
$obRouter->post('/admin/login', [
    'middlewares' => [
        'required-admin-logout'
    ],
    function($request){
        return new Response(200, LoginController::setLogin($request));
    }
]);

//ROTA LOGOUT
$obRouter->get('/admin/logout', [
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200, LoginController::setLogout($request));
    }
]);