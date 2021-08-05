<?php

use Source\Controllers\CreateTableController;
use Source\Models\AplicacaoQuestionarioDAO;


session_start();

$CreateFormController = new CreateTableController();


$AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
$cabecalho = ["id", "Data de preenchimento", "Ultima data atualização", ""];

$aplicacoes = $AplicacaoQuestionarioDAO->find("apq_usuario_id = :apq_usuario_id",
    "apq_usuario_id={$id_user}", "aplicacao_questionario_id,apq_data_cadastro,apq_ultima_atualizacao")->fetch(true);


$CreateFormController->createTable("Rdp", 1, $cabecalho, $aplicacoes, ["view"]);

