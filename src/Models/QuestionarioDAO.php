<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class QuestionarioDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("questionario", ["que_nome"], "questionario_id", false);
    }


}