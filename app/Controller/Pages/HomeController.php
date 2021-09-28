<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Models\Entity\Organization;

class HomeController extends PageController {
    /**
     * Método responsável por retornar o conteúdo da view da nossa Home
     * @return string
     */
    public static function getHome() {
        //ORGANIZAÇÃO
        $obOrganization = new Organization();
        //RETORNA A VIEW DA HOME
        $conteudo = View::render('pages/home', [
            'name' => $obOrganization->name
        ]);
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Gerenciador de Tarefas - Home', $conteudo);
    }
}