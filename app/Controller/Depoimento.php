<?php

namespace App\Controller;

use App\Controller\Pages\PageController;
use App\Utils\View;

class Depoimento extends PageController {

    /**
     * Método responsável por retornar o conteúdo da view de depoimentos
     * @return string
     */
    public static function getDepoimentos() {
        //VIEW DE DEPOIMENTOS
        $content = View::render('pages/depoimento',[

        ]);
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('DEPOIMENTOS - SESC', $content);
    }

}