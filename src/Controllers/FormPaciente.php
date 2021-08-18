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
    public function editItem($data): void{

        echo $this->view->render("edit_form", [
            "title" => "Editar",
            "aplicacao_questionario_id" => $data["aplicacao_questionario_id"]
        ]);
    }
    public function createItem($data): void{

        echo $this->view->render("create_form", [
            "title" => "cadastrar",
            "questionario_codigo" => $data["questionario_codigo"]
        ]);
    }
    public function humor($data): void{

        echo $this->view->render("form_humor", [
            "title" => "monitoramento de humor"
        ]);
    }

}