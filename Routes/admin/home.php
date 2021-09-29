<?php

use App\Controller\Admin\HomeController;
use \App\Http\Response;

//ROTA ADMIN HOME
$obRouter->get('/admin', [
    'middlewares' => [
        'required-admin-login'
    ],
    function(){
        return new Response(200, HomeController::getHome($request));
    }
]);
