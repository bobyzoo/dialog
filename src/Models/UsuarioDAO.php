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
        parent::__construct("usuario", ["usu_password","usu_login","usu_email","usu_nome","usu_data_nascimento"], "usuario_id",false);
    }
}