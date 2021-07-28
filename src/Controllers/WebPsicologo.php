<?php


namespace Source\Controllers;


use League\Plates\Engine;

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

}