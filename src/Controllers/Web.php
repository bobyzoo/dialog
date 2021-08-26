<?php

namespace Source\Controllers;


use CWG\PagSeguro\PagSeguroAssinaturas;
use League\Plates\Engine;
use Source\Models\LogDAO;
use Source\Models\PacienteDAO;
use Source\Models\PayPalDAO;
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
        ]);
    }

    public function teste($data): void
    {
        echo $this->view->render("teste", [
            "title" => "teste",
        ]);
    }

    public function log($data): void
    {
        $email = "gabrieldossantosvargas@gmail.com";
        $token = "9E1F2091C37B4C789CBBCF321C078B97";
        $sandbox = true;

        $pagseguro = new PagSeguroAssinaturas($email, $token, $sandbox);
//        if ($_POST['notificationType'] == 'preApproval') {
            $codigo = $_POST['notificationCode']; //Recebe o código da notificação e busca as informações de como está a assinatura
            $response = $pagseguro->consultarNotificacao($codigo);
            $logDAO = new LogDAO();
            $logDAO->content = json_encode($response);
            $logDAO->save();
            die;
//        }
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