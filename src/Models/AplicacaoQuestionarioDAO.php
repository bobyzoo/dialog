<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class AplicacaoQuestionarioDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("aplicacaoQuestionarioDAO", ["questionario_id","apq_usuario_id"], "aplicacao_questionario_id", false);
    }

}