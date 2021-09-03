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
    function veridicaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

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