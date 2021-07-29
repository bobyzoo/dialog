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

}