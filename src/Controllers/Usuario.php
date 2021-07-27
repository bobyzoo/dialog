<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\PacienteDAO;
use Source\Models\PsicologoDAO;
use Source\Models\UsuarioDAO;

class Usuario
{
    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views", "php");
        $this->view->addData(["router" => $router]);
    }

    public function setCadastro($data): void
    {
        echo "1";
        die();
        $usuario = new UsuarioDAO();

        foreach ($_POST as $key => $value) {
            if (substr($key, 0, 4) == "usu_") {
                $usuario->$key = $value;
                if ($key == "usu_password") {
                    $usuario->usu_password = hash("ripemd160", $value);
                }
                if ($value == "") {
                    $usuario->$key = null;
                }
            }
        }

        $usuario->save();

        $usu = $usuario->find("usu_login = :login", "login={$usuario->usu_login}")->fetch(true);
        $usuId = $usu[0]->data()->usuario_id;
        if ($_POST['usuario_tipo'] == "psicologo") {
            $psicologo = new PsicologoDAO();
            $psicologo->usuario_id = $usuId;
            $psicologo->psi_codigo_ativacao = $psicologo->geraCodigo();
            $psicologo->psi_numero_crp = $_POST['psi_numero_crp'];

            $psicologo->save();
        } else {
            $psicologo = new PsicologoDAO();
            $psicologo = $psicologo->find("psi_codigo_ativacao = :psi_codigo_ativacao", "psi_codigo_ativacao={$_POST['psi_codigo_ativacao']}")->fetch(true);
            if ($psicologo !== null) {
                $paciente = new PacienteDAO();
                $paciente->usuario_id = $usuId;
                $paciente->psicologo_id = $psicologo[0]->data()->psicologo_id;
                $paciente->pac_nome_contato_emergencia = $_POST['pac_nome_contato_emergencia'];
                $paciente->pac_telefone_contato_emergencia = $_POST['pac_telefone_contato_emergencia'];
                $paciente->save();

                print_r($paciente->paciente_id);


            } else {
                echo "0;codigo invalido";
            }
        }
        if ($usuario->fail()) {
            echo $usuario->fail()->getMessage();
        } else {
            echo "1";
        }
    }

    function error($data)
    {
        echo "<h1>{$data['errcode']}</h1>";
        var_dump($data);
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