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
}