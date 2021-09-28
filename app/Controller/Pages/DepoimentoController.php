<?php

namespace App\Controller\Pages;

use App\Controller\Pages\PageController;
use App\Http\Request;
use App\Utils\View;
use App\Models\Entity\Depoimento;
use WilliamCosta\DatabaseManager\Pagination;

class DepoimentoController extends PageController {

    /**
     * Método responsável por obter a renderização dos itens de depoimentos para a página       
     * @param Request $request
     * @param Pagination $obPagination
     * @return string
     */
    private static function getDepoimentoItens($request, &$obPagination)
    {
        //DEPOIMENTOS
        $itens = '';

        //QUANTIDADE TOTAL DE REGISTRO
        $quantidadeTotal = Depoimento::getDepoimentos(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        //PÁGINA ATUAL
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;

        //INSTANCIA DE PAGINAÇÃO
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 3);

        //RESULTADOR DA PÁGINA
        $results = Depoimento::getDepoimentos(null, 'id DESC', $obPagination->getLimit());

        //RENDERIZA O ITEM
        while($obDepoimento = $results->fetchObject(Depoimento::class)){
            $itens .= View::render('pages/depoimento/item',[
                'nome' => $obDepoimento->nome,
                'mensagem' => $obDepoimento->mensagem,
                'data' => date('d/m/Y H:i:s', strtotime($obDepoimento->data))
            ]);
        }

        //RETORNA OS DEPOIMENTOS
        return $itens;
    }

    /**
     * Método responsável por retornar o conteúdo da view de depoimentos
     * @param Request $request
     * @return string
     */
    public static function getDepoimentos($request) 
    {
        //VIEW DE DEPOIMENTOS
        $content = View::render('pages/depoimento',[
            'itens' => self::getDepoimentoItens($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('DEPOIMENTOS - SESC', $content);
    }

    /**
     * Método responsável por cadastrar um depoimento
     * @param Request $request
     * @return string
     */
    public static function insertDepoimento($request){
        //DADOS DO POST
        $postVars = $request->getPostVars();

        //NOVA INSTÂNCIA DE DEPOIMENTO
        $obDepoimento = new Depoimento;
        $obDepoimento->nome = $postVars['nome'];
        $obDepoimento->mensagem = $postVars['mensagem'];
        $obDepoimento->cadastrar();

        //RETORNA A PÁGINA DE LISTAGEM DE DEPOIMENTOSS
        return self::getDepoimentos($request);
    }

}