<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class QuestionarioDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("questionario", ["que_nome", "que_codigo"], "questionario_id", false);
    }

    public function getQuestionarioByCodigo($questionario_codigo){
        return self::find("que_codigo = :que_codigo", "que_codigo={$questionario_codigo}")->fetch(true)[0];

    }
    public function getIdByCodigo($questionario_codigo){
        $result = self::find("que_codigo = :que_codigo", "que_codigo={$questionario_codigo}","questionario_id")->fetch(true)[0];
        if ($result){
            return $result->data()->questionario_id;
        }
        return 0;

    }

}