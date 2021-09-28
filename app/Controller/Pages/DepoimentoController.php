<?php

namespace App\Controller\Pages;

use App\Controller\Pages\PageController;
use App\Http\Request;
use App\Utils\View;
use App\Models\Entity\Depoimento;

class DepoimentoController extends PageController {

    /**
     * Método responsável por obter a renderização dos itens de depoimentos para a página       
     * @return string
     */
    private static function getDepoimentoItens()
    {
        //DEPOIMENTOS
        $itens = '';

        //RESULTADOR DA PÁGINA
        $results = Depoimento::getDepoimentos(null, 'id DESC');

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
     * @return string
     */
    public static function getDepoimentos() 
    {
        //VIEW DE DEPOIMENTOS
        $content = View::render('pages/depoimento',[
            'itens' => self::getDepoimentoItens()
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

        return self::getDepoimentos();
    }

}