<?php


namespace Source\Controllers;


use Source\Models\AplicacaoQuestionarioDAO;
use Source\Models\RespostaDAO;

session_start();

class ResponseFormController
{


    function setRespostaQuestionario($questao, $resposta, $aplicacao_questionario_id, $resposta_id = 0)
    {
        if ($questao != "editar" && $questao != "en_questionario" && $questao != "aplicacao_questionario_id" && $questao != "usuario_id" && $questao != "questionario_id") {
            $pergunta_id = explode("_", $questao)[1];
            $Resposta = new RespostaDAO();

//           SE FOR EDIÇÃO
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
            } //SE FOR CRIAÇÃO
            else {
                $Resposta->pergunta_id = $pergunta_id;
                $Resposta->aplicacao_questionario_id = $aplicacao_questionario_id;
                $Resposta->res_descricao = $resposta;
            }
            if ( $Resposta->res_descricao != null) {
                $Resposta->save();
            }


            if ($Resposta->fail()) {
                echo $Resposta->fail()->getMessage();
            }

        }

    }

    function setAplicacaoQuestionario($data)
    {


//        SE FOR EDIÇÃO
        if ($_POST['aplicacao_questionario_id'] != 0) {
            $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
            $AplicacaoQuestionario = $AplicacaoQuestionarioDAO->findById($_POST['aplicacao_questionario_id']);
            $today = date("Y-m-d");
            $AplicacaoQuestionario->apq_ultima_atualizacao = $today;
            $AplicacaoQuestionario->save();
            foreach ($data as $questao => $resposta) {
                $this->setRespostaQuestionario($questao, $resposta, $AplicacaoQuestionario->aplicacao_questionario_id, $_POST['editar']);
            }
        } //        SE FOR CRIAÇÃO
        else {
            print_r($data);
            $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
            $AplicacaoQuestionarioDAO->questionario_id = $data['questionario_id'];
            $AplicacaoQuestionarioDAO->apq_usuario_id = $data['usuario_id'];

            $AplicacaoQuestionarioDAO->save();
            $AplicacaoQuestionarioDAO->id = $AplicacaoQuestionarioDAO->data()->aplicacao_questionario_id;

            foreach ($data as $questao => $resposta) {
                $this->setRespostaQuestionario($questao, $resposta, $AplicacaoQuestionarioDAO->id);
            }
        }
            echo "1;";
    }


}