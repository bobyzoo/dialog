<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\PacienteDAO;
use Source\Models\PsicologoDAO;
use Source\Models\UsuarioDAO;
use Source\Controllers\Utils;

class Usuario
{

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views", "php");
        $this->view->addData(["router" => $router]);
    }

    public function setCadastroPsicologo($data): void
    {
        $functions_utils = new Utils();
        $usuario = new UsuarioDAO();
        $psicologo = new PsicologoDAO();

        if ($usuario->verificaUsuLoginExist($_POST['usu_login'])) {
            echo "0;Login já existe";
            die();
        }
        if ($usuario->verificaUsuEmailExist($_POST['usu_email'])) {
            echo "0;Email já cadastrado";
            die();
        }
        $cpf = $_POST['usu_cpf'];
        if (isset($_POST['usu_cpf']) and $_POST['usu_cpf'] !== "")
        {
            if (!$usuario->veridicaCPF($_POST['usu_cpf'])) {
                echo "0;CPF inválido";
                die();
            }
        } else {
            $cpf = null;
        }
        if ($usuario->verificaUsuCpfExist($_POST['usu_cpf'])) {
            echo "0;CPF já cadastrado";
            die();
        }

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

        $usuario->usuario_tipo_id = 3;
        $usuario->usu_cpf = $cpf;

        $usuario->usu_data_nascimento = $functions_utils->format_date_to_sql($usuario->usu_data_nascimento);

        $usuario->save();



        if ($usuario->fail()) {
            echo "0;" . $usuario->fail()->getMessage();
            die();
        } else {
            $usu = $usuario->find("usu_login = :login", "login={$usuario->usu_login}")->fetch(true);
            $usuId = $usu[0]->data()->usuario_id;
            $psicologo = new PsicologoDAO();
            $psicologo->usuario_id = $usuId;
            $psicologo->psi_codigo_ativacao = $psicologo->geraCodigo($_POST['usu_nome']);
            $psicologo->psi_numero_crp = $_POST['psi_numero_crp'];

            $psicologo->save();
            if ($psicologo->fail()) {
                echo "0;" . $psicologo->fail()->getMessage();
                die();
            } else {
                echo "1; Cadastrado com sucesso.";
                die();
            }
        }
    }


    public function setCadastroPaciente($data): void
    {
        $functions_utils = new Utils();
        $usuario = new UsuarioDAO();
        $psicologo = new PsicologoDAO();

        if (!$psicologo->verificaPsiCodigoExist($_POST['psi_codigo_ativacao'])) {
            echo "0;Código de ativação inválido!";
            die();
        }
        if ($usuario->verificaUsuLoginExist($_POST['usu_login'])) {
            echo "0;Login já existe";
            die();
        }
        if ($usuario->verificaUsuEmailExist($_POST['usu_email'])) {
            echo "0;Email já cadastrado";
            die();
        }
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
        $usuario->usuario_tipo_id = 2;
        $usuario->usu_data_nascimento = $functions_utils->format_date_to_sql($usuario->usu_data_nascimento);
        $usuario->save();

        $usu = $usuario->find("usu_login = :login", "login={$usuario->usu_login}")->fetch(true);
        $usuId = $usu[0]->data()->usuario_id;
        $psicologo = new PsicologoDAO();
        $psicologo = $psicologo->find("psi_codigo_ativacao = :psi_codigo_ativacao", "psi_codigo_ativacao={$_POST['psi_codigo_ativacao']}")->fetch(true);
        $paciente = new PacienteDAO();
        $paciente->usuario_id = $usuId;
        $paciente->psicologo_id = $psicologo[0]->data()->psicologo_id;
        $paciente->pac_nome_contato_emergencia = $_POST['pac_nome_contato_emergencia'];
        $paciente->pac_telefone_contato_emergencia = $_POST['pac_telefone_contato_emergencia'];
        $paciente->save();


        if ($usuario->fail()) {
            echo "0;" . $usuario->fail()->getMessage();
        } else {
            echo "1; Cadastrado com sucesso.";
        }
    }

    public function inativaUsuario($data)
    {
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->inativaUsuario($data['id_user']);
    }

    public function ativaUsuario($data)
    {
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->ativaUsuario($data['id_user']);
    }

    public function deletaUsuarioPaciente($data)
    {
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->deletaUsuarioPaciente($data['id_user']);
    }


    function error($data)
    {
        echo "<h1>{$data['errcode']}</h1>";
        var_dump($data);
    }


}