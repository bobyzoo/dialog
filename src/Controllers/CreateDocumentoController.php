<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\PerguntaDAO;
use Source\Models\QuestionarioDAO;

class CreateDocumentoController
{
    public function createDocumento($aplicacao_questionario)
    {

        $questionariodao = new QuestionarioDAO();
        $questionario = $questionariodao->findById($aplicacao_questionario->questionario_id)->data();
        echo '<div class="modal fade" id="modalRemote" tabindex="-1" role="dialog"
         aria-labelledby="modalRemoteLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal-content">
                <div class="loader-demo-box position-absolute loading hide" id="loading1">
                    <div class="dot-opacity-loader">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="modal-header">
             <h5 class="modal-title" id="modalRemoteLabel">' . $questionario->que_nome . '</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body" id="modal-body"><a type="button" class="btn btn-sm btn-primary text-white mb-4 text-center"  onClick="imprimeModal()"> <i class="fas fa-print mr-0"></i></a>';

        $perguntaDAO = new PerguntaDAO();
        $perguntas = $perguntaDAO->getPerguntasByIdQuestionario($aplicacao_questionario->questionario_id);
        foreach ($perguntas as $pergunta) {
            PerguntaDAO::getFormatPerguntaDocumento($pergunta->data(),$aplicacao_questionario);
        }

        echo '</div><div class="modal-footer"></div></div></div></div>';
    }

}