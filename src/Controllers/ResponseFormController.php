<?php


namespace Source\Controllers;


use Source\Models\AplicacaoQuestionarioDAO;
use Source\Models\RespostaDAO;

session_start();

class ResponseFormController
{


    function setRespostaQuestionario($questao, $resposta, $aplicacao_questionario_id)
    {
        if ($questao != "en_questionario") {
            $pergunta_id = explode("_", $questao)[1];
            $RespostaDAO = new RespostaDAO();
            $RespostaDAO->pergunta_id = $pergunta_id;
            $RespostaDAO->aplicacao_questionario_id = $aplicacao_questionario_id;
            $RespostaDAO->res_descricao = $resposta;

            $RespostaDAO->save();

            if ($RespostaDAO->fail()) {
                echo $RespostaDAO->fail()->getMessage();
            }

        }
    }

    function setAplicacaoQuestionario($data)
    {
        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $AplicacaoQuestionarioDAO->questionario_id = $data['en_questionario'];
        $AplicacaoQuestionarioDAO->apq_usuario_id = $_SESSION['usuario']->usuario_id;

        $AplicacaoQuestionarioDAO->save();
        $AplicacaoQuestionarioDAO->id = $AplicacaoQuestionarioDAO->data()->aplicacao_questionario_id;

        foreach ($data as $questao => $resposta) {
            $this->setRespostaQuestionario($questao, $resposta, $AplicacaoQuestionarioDAO->id);
        }
    }

}