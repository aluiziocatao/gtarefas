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

    /**
     * Método responsável por renderizar o layout de paginação
     *
     * @param Request $request
     * @param Pagination $obPagination
     * @return string
     */
    public static function getPagination($request, $obPagination){
        //PÁGINAS
        $pages = $obPagination->getPages();

        //VERIFICA A QQUANTIDADE DE PÁGINAS
        if(count($pages) <= 1) return '';

        //LINKS
        $links = '';

        //OBTER A URL ATUAL DA ROTA SEM OS GETS
        $url = $request->getRouter()->getCurrentUrl();

        //GET
        $queryParams = $request->getQueryParams();

        //RENDERIZA OS LINKS
        foreach($pages as $page){
            //ALTERA PAÁGINA
            $queryParams['page'] = $page['page'];

            //LINK
            $link = $url.'?'.http_build_query($queryParams);

            //VIEW
            $links .= View::render('pages/pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }
        //RENDERIZA BOX DE PAGINAÇÃO
        return View::render('pages/pagination/box', [
            'links' => $links
        ]);
    }
}
