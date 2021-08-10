<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\AplicacaoQuestionarioDAO;
class TablePaciente
{
    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/paciente_page/tables", "php");
        $this->view->addData(["router" => $router]);
    }

    public function getListRpdUser($data): void{


        echo $this->view->render("get_rpd_user", [
            "title" => "RPD"
        ]);
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

        $aplicacoes = $AplicacaoQuestionarioDAO->getByUsuarioIdQuestionarioId($_SESSION["usuario"]->usuario_id,$data["questionario_id"]);
        if ($aplicacoes == null){
            $aplicacoes = [];
        }

        $CreateFormController->createTable("Rdp", 1, $cabecalho, $aplicacoes, ["editar", "excluir"]);

    }
}