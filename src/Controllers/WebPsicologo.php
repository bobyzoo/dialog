<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\PacienteDAO;

class WebPsicologo
{

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/psicologo_page", "php");
        $this->view->addData(["router" => $router]);
    }

    public function home($data): void
    {
        echo $this->view->render("home", [
            "title" => "home"
        ]);
    }
    public function pacientes($data): void
    {
        echo $this->view->render("pacientes", [
            "title" => "pacientes"
        ]);
    }

    public function pacienteUser($data): void{

        echo $this->view->render("pacienteUser", [
            "title" => "paciente",
            "paciente" => PacienteDAO::getPacienteID("",$data["id_user"])
        ]);
    }
    public function rpd($data): void{

        echo $this->view->render("RPD", [
            "title" => "RPD",
            "paciente" => PacienteDAO::getPacienteID("",$data["id_user"])
        ]);
    }

    public function planoAcao($data): void{

        echo $this->view->render("planoacao", [
            "title" => "Plano de Ação",
            "paciente" => PacienteDAO::getPacienteID("",$data["id_user"])
        ]);
    }
}