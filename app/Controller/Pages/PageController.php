<?php

namespace App\Controller\Pages;
use \App\Utils\View;

class PageController {
    /**
     * Método responsável por renderizar o topo da página
     * @return string
     */
    private static function getHeader(){
        return View::render('pages/header');
    }

    /**
    * Método responsável por renderizar o rodapé da página
    * @return string
    */
    private static function getFooter(){
        return View::render('pages/footer');
    }

    /**
     * Método responsável por retornar o conteúdo da view da nossa página genérica
     * @return string
     */
    public static function getPage($titulo, $conteudo) {
        return View::render('pages/page', [
            'titulo' => $titulo,
            'header' => self::getHeader(),
            'conteudo' => $conteudo,
            'footer' => self::getFooter()
        ]);
    }
}
