<?php

use \App\Http\Response;
use \App\Controller\Pages;

//ROTA HOME
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\HomeController::getHome());
    }
]);

//ROTA SOBRE
$obRouter->get('/sobre', [
    function(){
        return new Response(200, Pages\SobreController::getAbout());
    }
]);

//ROTA de DEPOIMENTOS
$obRouter->get('/depoimentos', [
    function(){
        return new Response(200, Pages\DepoimentoController::getDepoimentos());
    }
]);

//ROTA de DEPOIMENTOS INSERT
$obRouter->post('/depoimentos', [
    function($request){
        return new Response(200, Pages\DepoimentoController::insertDepoimento($request));
    }
]);