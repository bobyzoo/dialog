<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class PsicologoDAO
{
    public function __construct()
    {
        parent::__construct("psicologo", ["usuario_id","psi_codigo_ativacao","psi_numero_crp"], "psicologo_id", false);
    }

    public function geraCodigo(){
        return random_int(1000,9999);
    }
}