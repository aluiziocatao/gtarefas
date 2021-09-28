<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Models\Entity\Organization;

class SobreController extends PageController {
    /**
     * Método responsável por retornar o conteúdo da view da nossa Sobre
     * @return string
     */
    public static function getAbout() {
        //ORGANIZAÇÃO
        $obOrganization = new Organization();
        //RETORNA A VIEW DA HOME
        $conteudo = View::render('pages/about', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Gerenciador de Tarefas - Sobre', $conteudo);
    }
}