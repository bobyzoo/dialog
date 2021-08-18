<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\AplicacaoQuestionarioDAO;
use Source\Models\QuestionarioDAO;

class TablePaciente
{
    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/paciente_page/tables", "php");
        $this->view->addData(["router" => $router]);
    }

    public function deleteItem($data): void{
        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $AplicacaoQuestionarioDAO->remove($data['aplicacao_questionario_id']);
        echo "1;";
    }

    public function listAll($data): void{

        session_start();

        $CreateFormController = new CreateTableController();


        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $cabecalho = ["id", "Data de preenchimento", "Ultima data atualização", ""];
        $questionario = new QuestionarioDAO();
        $questionario_id = $questionario->getIdByCodigo($data["questionario_codigo"]);

        $aplicacoes = $AplicacaoQuestionarioDAO->getByUsuarioIdQuestionarioId($_SESSION["usuario"]->usuario_id,$questionario_id);
        if ($aplicacoes == null){
            $aplicacoes = [];
        }
        $CreateFormController->createTable("table", 1, $cabecalho, $aplicacoes, ["editar", "excluir"]);

    }


    public function listMonitoramentoHumor($data): void{

        session_start();

        $CreateFormController = new CreateTableController();


        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $cabecalho = ["Data de preenchimento", "Humor", "Sentimentos", ""];
        $questionario = new QuestionarioDAO();
        $questionario_id = $questionario->getIdByCodigo("mdh");

        $aplicacoes = $AplicacaoQuestionarioDAO->getByUsuarioIdQuestionarioId($_SESSION["usuario"]->usuario_id,$questionario_id);
        if ($aplicacoes == null){
            $aplicacoes = [];
        }

        $CreateFormController->createTableMonitoramentoHumor("tableMonitoramentoHumor", 1, $cabecalho, $aplicacoes, ["excluir"]);

    }
}