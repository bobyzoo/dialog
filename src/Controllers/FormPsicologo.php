<?php


namespace Source\Controllers;


use League\Plates\Engine;

class FormPsicologo
{
    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/psicologo_page/forms", "php");
        $this->view->addData(["router" => $router]);
    }

    public function createItem($data): void{

        echo $this->view->render("create_form", [
            "title" => "cadastrar",
            "questionario_id" => $data["questionario_id"],
            "usuario_id" => $data["usuario_id"],
        ]);
    }
    public function editItem($data): void{

        echo $this->view->render("edit_form", [
            "title" => "Editar",
            "aplicacao_questionario_id" => $data["aplicacao_questionario_id"]
        ]);
    }
}