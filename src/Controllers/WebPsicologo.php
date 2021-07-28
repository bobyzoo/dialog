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

    public function paciente($data): void{
        $pacienteDao = new PacienteDAO();
        $paciente = $pacienteDao->findById($data["id_user"]);

        echo $this->view->render("pacienteUser", [
            "title" => "PCIENTE",
            "paciente" => $paciente
        ]);
    }
}