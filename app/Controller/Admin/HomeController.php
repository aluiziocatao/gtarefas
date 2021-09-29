<?php

namespace App\Controller\Admin;

use \App\Utils\View;

class HomeController extends PageController{
    
    /**
     * Método responsável por renderizar a página HOME do Painel
     * @param Request $request
     * @return string
     */
    public static function getHome($request){
        //CONTEÚDO DA HOME
        $content = View::render('admin/modules/home/index');

        //RETORNAR A PÁGINA COMPLETA
        return parent::getPanel('Painel Admin', $content, 'home');
    }
}