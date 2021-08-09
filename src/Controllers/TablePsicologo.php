<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\AplicacaoQuestionarioDAO;

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

    public function deleteItem($data): void{

        $AplicacaoQuestionarioDAO = new AplicacaoQuestionarioDAO();
        $Aplicacao = $AplicacaoQuestionarioDAO->findById($data['aplicacao_questionario_id']);
        $Aplicacao->destroy();

    }
}