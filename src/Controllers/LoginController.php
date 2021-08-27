<?php


namespace Source\Controllers;


use CoffeeCode\DataLayer\DataLayer;
use League\Plates\Engine;
use Source\Models\PacienteDAO;
use Source\Models\PsicologoDAO;
use Source\Models\UsuarioDAO;

class LoginController
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
        $psicologo = new PsicologoDAO();
        $paciente = new PacienteDAO();
        $senha = hash("ripemd160", $_POST['usu_password']);
        $usuario = $usuario->find("usu_password = :usu_password AND usu_login = :usu_login", "usu_password={$senha}&usu_login={$_POST['usu_login']}")->fetch(true);

        if ($usuario !== null) {
            $_SESSION['login'] = $usuario[0]->data()->usu_nome;

            $_SESSION['usuario'] = $usuario[0]->data();

            if ($usuario[0]->data()->usuario_tipo_id == 3) {
                $psicologo = $psicologo->find("usuario_id = :usuario_id", "usuario_id={$usuario[0]->data()->usuario_id}")->fetch(true);
                foreach ($psicologo[0]->data() as $key => $value) {
                    $_SESSION['usuario']->$key = $value;
                }

            } elseif ( $usuario[0]->data()->usuario_tipo_id == 2)  {
                $paciente = $paciente->find("usuario_id = :usuario_id", "usuario_id={$usuario[0]->data()->usuario_id}")->fetch(true);
                foreach ($paciente[0]->data() as $key => $value) {
                    $_SESSION['usuario']->$key = $value;
                }
                if ($_SESSION['usuario']->usu_ativo == 0){
                    echo "0;Sua conta esta inativa. Converse com seu Psicólogo.";
                    session_destroy();
                    die();
                }
            }
            $_SESSION['usu_tipo'] = $usuario[0]->data()->usuario_tipo_id;
            echo "1;logado com sucesso.";
        } else {
            echo "0;Usuario ou senha estão incorretos.";
        }
    }

    public function logout($data): void
    {
        session_start();
        unset($_SESSION['login']);
        header("Location: " . url_pesquisa(""));
    }


}