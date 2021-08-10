<?php


namespace Source\Controllers;


use League\Plates\Engine;

class FormPaciente
{

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/paciente_page/forms", "php");
        $this->view->addData(["router" => $router]);
    }

    public function setRpd($data): void{

        echo $this->view->render("set_rpd", [
            "title" => "RPD"
        ]);
    }

    public function editItem($data): void{

        echo $this->view->render("edit_form", [
            "title" => "Editar",
            "aplicacao_questionario_id" => $data["aplicacao_questionario_id"]
        ]);
    }
    public function createItem($data): void{

        echo $this->view->render("create_form", [
            "title" => "cadastrar",
            "questionario_id" => $data["questionario_id"]
        ]);
    }

}