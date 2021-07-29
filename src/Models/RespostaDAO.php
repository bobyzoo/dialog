<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class RespostaDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("resposta", ["pergunta_id","aplicacao_questionario_id","res_descricao"], "resposta_id", false);
    }

}