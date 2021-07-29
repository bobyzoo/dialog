<?php


namespace Source\Controllers;


use Source\Models\PerguntaDAO;
use Source\Models\QuestionarioDAO;

class CreateFormController
{

    public function createQuestion()
    {

    }

    public function createForm($idForm, $questionario_id)
    {

        $questionarioDAO = new QuestionarioDAO();
        $questionario = $questionarioDAO->findById($questionario_id)->data();


        echo '<div class="modal fade" id="modalRemote" tabindex="-1" role="dialog"
         aria-labelledby="modalRemoteLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal-content">
                <div class="loader-demo-box position-absolute loading hide" id="loading' . $idForm . '">
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
                <div class="modal-body" id="modal-body">
                <form class="forms-sample" id="' . $idForm . '" method="post">';


        $perguntaDAO = new PerguntaDAO();
        $perguntas = $perguntaDAO->getPerguntasByIdQuestionario($questionario_id);
        foreach ($perguntas as $pergunta) {
            PerguntaDAO::getFormatPergunta($pergunta->data());
        }


        echo ' </form></div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnSetPaciente" onclick="setPaciente()" class="btn btn-sm btn-success">Submit</button>
                    </div></div></div></div>';

    }

}