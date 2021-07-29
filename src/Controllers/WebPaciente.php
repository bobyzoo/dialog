<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\PacienteDAO;

ob_end_clean();
session_start();

if (empty($_SESSION["login"])) {
    header("Location: " . url_pesquisa("login"));
}

class WebPaciente
{
    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/paciente_page", "php");
        $this->view->addData(["router" => $router]);
    }

    public function home($data): void
    {
        echo $this->view->render("home", [
            "title" => "home"
        ]);
    }

    public function rpd($data): void{

        echo $this->view->render("RPD", [
            "title" => "RPD",
            "paciente" => $_SESSION['usuario']
        ]);
    }


}