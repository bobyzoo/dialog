<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class UsuarioDAO extends DataLayer
{

    /*
         * User constructor
         */
    /**
     *
     * @param string usu_codigo
     */
    public function __construct()
    {
        parent::__construct("usuario", ["usu_password","usu_login","usu_email","usu_nome","usu_data_nascimento","usuario_tipo_id"], "usuario_id",false);
    }
    public function verificaUsuLoginExist($login){
        return self::find("usu_login = :login", "login={$login}")->fetch(true) != null;
    }
    public function verificaUsuEmailExist($email){
        return self::find("usu_email = :usu_email", "usu_email={$email}")->fetch(true) != null;
    }
    public function verificaUsuCpfExist($cpf){
        return self::find("usu_cpf = :usu_cpf", "usu_cpf={$cpf}")->fetch(true) != null;
    }
    public function inativaUsuario($usuario_id){
        $usuDAO = new UsuarioDAO();
        $usuario = $usuDAO->findById($usuario_id);
        $usuario->usu_ativo = 0;
        $usuario->save();
    }
    public function ativaUsuario($usuario_id){
        $usuDAO = new UsuarioDAO();
        $usuario = $usuDAO->findById($usuario_id);
        $usuario->data()->usu_ativo = "1";
        $usuario->save();
    }
    public function deletaUsuarioPaciente($usuario_id){
        $usuDAO = new UsuarioDAO();
        $pacienteDAO = PacienteDAO::getPacienteByUsuarioId($usuario_id);
        $pacienteDAO->destroy();
        $usuDAO = $usuDAO->findById($usuario_id);
        $usuDAO->destroy();
        echo "1;";
    }
}