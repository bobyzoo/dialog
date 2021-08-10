<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class RespostaDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("resposta", ["pergunta_id","aplicacao_questionario_id","res_descricao"], "resposta_id", false);
    }

    public function getRespostaByPerguntaIdAplicacaoQuestionarioId($pergunta_id,$aplicacao_questionario_id){
        return self::find("pergunta_id = :pergunta_id AND aplicacao_questionario_id = :aplicacao_questionario_id", "pergunta_id={$pergunta_id}&aplicacao_questionario_id={$aplicacao_questionario_id}")->fetch(true)[0];

    }

}