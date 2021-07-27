<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class ProntuarioDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("prontuario",["texto"],"prontuario_id",false);
    }

}