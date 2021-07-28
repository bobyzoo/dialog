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
        session_start();

        $usuario = new UsuarioDAO();
        $senha = hash("ripemd160", $_POST['usu_password']);
        $usuario = $usuario->find("usu_password = :usu_password AND usu_login = :usu_login", "usu_password={$senha}&usu_login={$_POST['usu_login']}")->fetch(true);

        if ($usuario !== null) {
            $_SESSION['login'] = $usuario[0]->data()->usu_nome;
            echo "1";
        } else {
            echo "0";
        }
    }


    public function logout($data): void
    {
        session_start();
        unset($_SESSION['login']);
        header("Location: " . url_pesquisa(""));
    }


}