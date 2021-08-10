<?php


namespace Source\Controllers;


use Source\Models\AplicacaoQuestionarioDAO;
use Source\Models\RespostaDAO;

session_start();

class ResponseFormController
{


    function setRespostaQuestionario($questao, $resposta, $aplicacao_questionario_id, $resposta_id = 0)
    {
        if ($questao != "editar" && $questao != "en_questionario" && $questao != "aplicacao_questionario_id") {
            $pergunta_id = explode("_", $questao)[1];
            $Resposta = new RespostaDAO();

            if ($resposta_id != 0) {
                $Resposta = $Resposta->getRespostaByPerguntaIdAplicacaoQuestionarioId($pergunta_id, $aplicacao_questionario_id);
                if ($Resposta == null) {
                    $Resposta = new RespostaDAO();
                    $Resposta->pergunta_id = $pergunta_id;
                    $Resposta->aplicacao_questionario_id = $aplicacao_questionario_id;
                }

                $Resposta->res_descricao = $resposta;
                if ($resposta == null) {
                    $Resposta->res_descricao = " ";
                }
            } else {

                $Resposta->pergunta_id = $pergunta_id;
                $Resposta->aplicacao_questionario_id = $aplicacao_questionario_id;
                $Resposta->res_descricao = $resposta;
            }
            if ($resposta != null) {
                $Resposta->save();
            }


            if ($Resposta->fail()) {
                echo $Resposta->fail()->getMessage();
            }

        }
        echo "1;";
    }

    function setAplicacaoQuestionario($data)
    {
        if ($_POST['aplicacao_questionario_id'] != 0) {
            $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
            $AplicacaoQuestionario = $AplicacaoQuestionarioDAO->findById($_POST['aplicacao_questionario_id']);
            $today = date("Y-m-d");
            $AplicacaoQuestionario->apq_ultima_atualizacao = $today;
            $AplicacaoQuestionario->save();

            print_r($_POST);
            foreach ($data as $questao => $resposta) {
                $this->setRespostaQuestionario($questao, $resposta, $AplicacaoQuestionario->aplicacao_questionario_id, $_POST['editar']);
            }
        } else {
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

}