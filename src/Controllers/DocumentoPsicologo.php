<?php


namespace Source\Controllers;


use League\Plates\Engine;

class DocumentoPsicologo
{
    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/psicologo_page/documentos", "php");
        $this->view->addData(["router" => $router]);
    }
    public function rpd($data): void{
        echo $this->view->render("rpd", [
            "title" => "RPD",
            "id_aplicacao_questionario" => $data["id_aplicacao_questionario"]
        ]);
    }

}