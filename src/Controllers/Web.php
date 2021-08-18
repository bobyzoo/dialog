<?php

namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\PacienteDAO;
use Source\Models\UsuarioDAO;

class Web
{
    /* @var Engine */
    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views", "php");
        $this->view->addData(["router" => $router]);
    }

    public function home($data): void
    {
        echo $this->view->render("home", [
            "title" => "home"
        ]);
    }

    public function login($data): void
    {
        $Login = new UsuarioDAO();
        echo $this->view->render("login", [
            "title" => "login"
        ]);
    }

    public function cadastrar($data): void
    {
        echo $this->view->render("cadastrar", [
            "title" => "cadastrar",
            "codigo_ativacao" => $data["codigo_ativacao"]
        ]);
    }


    public function planos($data): void
    {
        echo $this->view->render("planos", [
            "title" => "planos",
//            "pacientes" => PacienteDAO::getAll()
        ]);
    }


    public function error($data)
    {
        $frase = "The page you’re looking for was not found.";
        if ($data['errcode'] != 500) {
            $frase = "The page you’re looking for was not found.";
        }
        echo $this->view->render("error", [
            "title" => "error",
            "error" => $data['errcode'],
            "frase" => $frase
        ]);
    }

}