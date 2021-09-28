<?php

namespace App\Models\Entity;

class Organization
{
    /**
     * ID da Organização
     * @var integer
     */
    public $id = 1;

    /**
     * Nome da Organização
     * @var string
     */
    public $name = 'Sesc';

    /**
     * Site da Organização
     * @var string
     */
    public $site = 'www.sescacre.com.br';

    /**
     * Descrição da Organização
     * @var string
     */
    public $description = 'Lorem Ipsum';
}