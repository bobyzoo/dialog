<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\AplicacaoQuestionarioDAO;
use Source\Models\QuestionarioDAO;

class TablePsicologo
{

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/psicologo_page/tables", "php");
        $this->view->addData(["router" => $router]);
    }

    public function getListRpdUser($data): void{

        echo $this->view->render("get_rpd_user", [
            "title" => "RPD",
            "id_user" => $data["id_user"]
        ]);
    }


    public function getListPlanoAcaoUser($data): void{

        session_start();

        $CreateFormController = new CreateTableController();
        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $cabecalho = ["id", "Data de preenchimento", "Ultima data atualização", ""];
        $aplicacoes = $AplicacaoQuestionarioDAO->getByUsuarioIdQuestionarioId($data["id_user"],4);
        if ($aplicacoes == null){
            $aplicacoes = [];
        }
        $CreateFormController->createTable("Rdp", 1, $cabecalho, $aplicacoes, ["editar", "excluir"]);

    }

    public function deleteItem($data): void{

        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $Aplicacao = $AplicacaoQuestionarioDAO->findById($data['aplicacao_questionario_id']);
        $Aplicacao->destroy();

    }

    public function listAll($data): void{

        session_start();

        $CreateFormController = new CreateTableController();
        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $cabecalho = ["id", "Data de preenchimento", "Ultima data atualização", ""];

        $botoes = $_GET["botoes"];

        $questionario = new QuestionarioDAO();
        $questionario_id = $questionario->getIdByCodigo($data["questionario_codigo"]);

        $aplicacoes = $AplicacaoQuestionarioDAO->getByUsuarioIdQuestionarioId($data['id_user'],$questionario_id);
        if ($aplicacoes == null){
            $aplicacoes = [];
        }

        $CreateFormController->createTable("teste", $questionario_id, $cabecalho, $aplicacoes, $botoes);

    }

    public function listMonitoramentoHumor($data): void{

        session_start();

        $CreateFormController = new CreateTableController();


        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $cabecalho = ["Data de preenchimento", "Humor", "Sentimentos", ""];
        $questionario = new QuestionarioDAO();
        $questionario_id = $questionario->getIdByCodigo("mdh");


        $aplicacoes = $AplicacaoQuestionarioDAO->getByUsuarioIdQuestionarioId($data['id_user'],$questionario_id,"*");
        if ($aplicacoes == null){
            $aplicacoes = [];
        }

        $CreateFormController->createTableMonitoramentoHumor("tableMonitoramentoHumor", 1, $cabecalho, $aplicacoes, ["excluir"]);

    }
}