<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class PsicologoDAO  extends DataLayer
{
    public function __construct()
    {
        parent::__construct("psicologo", ["usuario_id","psi_codigo_ativacao","psi_numero_crp"], "psicologo_id", false);
    }

    public function geraCodigo($nome){
        return mb_strtoupper(substr($nome,0,3)).random_int(1000,9999);
    }

    public function verificaPsiCodigoExist($code){
        return self::find("psi_codigo_ativacao = :psi_codigo_ativacao", "psi_codigo_ativacao={$code}")->fetch(true) != null;
    }

}