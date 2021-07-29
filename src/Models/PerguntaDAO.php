<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class PerguntaDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("pergunta", ["questionario_id","per_Descricao","per_tipo"], "pergunta_id", false);
    }


}