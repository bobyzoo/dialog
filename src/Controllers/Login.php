<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\UsuarioDAO;

class Login
{
    /* @var Engine */
    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views", "php");
        $this->view->addData(["router" => $router]);
    }

    public function getLogin($data): void
    {

//        if ($_POST['Username'] == "teste" && $_POST['password'] == "teste") {
//            $_SESSION['login'] = "Usuario Teste";
//            echo "1";
//        } else {
//            echo "0";
//        }
    }


    public function logout($data): void
    {
        session_start();
        unset($_SESSION['login']);
        header("Location: " . url_pesquisa(""));
    }


}