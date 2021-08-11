<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class AplicacaoQuestionarioDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("aplicacao_questionario", ["questionario_id","apq_usuario_id"], "aplicacao_questionario_id", false);
    }

    public function getByUsuarioIdQuestionarioId($apq_usuario_id,$questionario_id){
        return self::find("apq_usuario_id = :apq_usuario_id AND questionario_id = :questionario_id AND apq_ativo = 1",
            "apq_usuario_id={$apq_usuario_id}&questionario_id={$questionario_id}", "aplicacao_questionario_id,apq_data_cadastro,apq_ultima_atualizacao")->fetch(true);
    }

    public function remove($aplicacao_questionario_id){
        $dao = new AplicacaoQuestionarioDAO();
        $dao=  $dao->findById($aplicacao_questionario_id);
        $dao->apq_ativo = 0;
        return $dao->save();
    }


}