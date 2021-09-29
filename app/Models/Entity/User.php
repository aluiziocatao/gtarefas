<?php

namespace App\Models\Entity;

use \WilliamCosta\DatabaseManager\Database;

class User {
    /**
     * ID DO USUÁRIO
     *
     * @var integer
     */
    public $id;

     /**
     * NOME DO USUÁRIO
     *
     * @var string
     */
    public $nome;

     /**
     * EMAIL DO USUÁRIO
     *
     * @var string
     */
    public $email;

     /**
     * SENHA DO USUÁRIO
     *
     * @var string
     */
    public $senha;

    /**
     * Método responsável por retornar um usuário com base em seu e-mail
     *
     * @param string $email
     * @return User
     */
    public static function getUserByEmail($email){
        return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}