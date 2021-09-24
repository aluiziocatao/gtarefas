<?php

namespace App\Models\Entity;

class Depoimento {
    /**
     * Id do Depoimento
     * @var integer
     */
    public $id;

    /**
     * Nome do usuário que fez o depoimento
     * @var string
     */
    public $nome;

    /**
     * Mensagem do depoimento
     * @var string
     */
    public $mensagem;

    /**
     * Data do depoimento
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar a instãncia atual no banco de dados
     * @return boolean
     */
    public function cadastrar() {
        
    }
}