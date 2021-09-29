<?php

namespace App\Controller\Admin;

use App\Controller\Admin\PageController;
use \App\Utils\View;
use App\Models\Entity\User;
use App\Session\Admin\LoginSession;

class LoginController extends PageController{
    /**
     * Método responsável por retornar a renderização da view da nossa página de LOGIN
     * @param Request $request
     * @param string $erroMessage
     * @return string
     */
    public static function getLogin($request, $errorMessage = null) {
        //STATUS
        $status = !is_null($errorMessage) ? AlertController::getError($errorMessage) : '';

        //RETORNA O CONTEÚDO DA VIEW DO LOGIN
        $content = View::render('admin/login', [
            'status' => $status
        ]);

        //RETORNA A PÁGINA COMPLETA
        return parent::getPage('Login', $content);
    }

    /**
     * Método responsável por definir o login do usuário
     *
     * @param Request $request
     * @return string
     */
    public static function setLogin($request){
        //POST VARS
        $postVars = $request->getPostVars();
        $email = $postVars['email'] ?? '';
        $senha = $postVars['senha'] ?? '';

        //BUSCA O USUÁRIO PELO E-MAIL
        $obUser = User::getUserByEmail($email);
        if(!$obUser instanceof User){
            return self::getLogin($request, 'E-mail ou senha inválidos');
        }

        //VERIFICA A SENHA DO USUÁRIO
        if(!password_verify($senha, $obUser->senha)){
            return self::getLogin($request, 'E-mail ou senha inválidos');
        }

        //CRIA SESSÃO DE LOGIN
        LoginSession::login($obUser);

        //REDIRECIONA O USUÁRIO PARA HOME DO ADMIN
        $request->getRouter()->redirect('/admin');
    }

    /**
     * Método responsável por deslogar o usuário
     * @param Request $request
     */
    public static function setLogout($request){
        //DESTROY A SESSÃO DE LOGIN
        LoginSession::logout();

        //REDIRECIONA O USUÁRIO PARA A TELA DE LOGIN
        $request->getRouter()->redirect('/admin/login');
    }
}