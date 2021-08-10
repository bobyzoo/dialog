<?php

use Source\Controllers\CreateTableController;
use Source\Models\AplicacaoQuestionarioDAO;


session_start();

$CreateFormController = new CreateTableController();


$AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
$cabecalho = ["id", "Data de preenchimento", "Ultima data atualização", ""];

$aplicacoes = $AplicacaoQuestionarioDAO->find("apq_usuario_id = :apq_usuario_id",
    "apq_usuario_id={$_SESSION["usuario"]->usuario_id}", "aplicacao_questionario_id,apq_data_cadastro,apq_ultima_atualizacao")->fetch(true);
if ($aplicacoes == null){
    $aplicacoes = [];
}

$CreateFormController->createTable("Rdp", 1, $cabecalho, $aplicacoes, ["editar", "excluir"]);

