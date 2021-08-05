<?php


namespace Source\Controllers;


use League\Plates\Engine;

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
}