<?php

use Source\Controllers\CreateDocumentoController;
use Source\Models\AplicacaoQuestionarioDAO;

$CreateFormController = new CreateDocumentoController();

$questionariodao = new AplicacaoQuestionarioDAO();
$aplicacao_questionario = $questionariodao->findById($id_aplicacao_questionario)->data();

$CreateFormController->createDocumento($aplicacao_questionario);
