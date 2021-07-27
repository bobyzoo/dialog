<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class PacienteDAO extends DataLayer
{
    public function __construct()
    {
        parent::__construct("paciente", ["usuario_id","psicologo_id","pac_nome_contato_emergencia","pac_telefone_contato_emergencia"], "paciente_id", false);
    }

    public static function getAll()
    {
        $paciente = new PacienteDAO();
        if ($paciente->fail()) {
            echo $paciente->fail()->getMessage();
        }
        $lista = [];
        if ($pacientes = $paciente->find()->fetch(true)) {
            foreach ($pacientes as $paciente) {
                array_push($lista, $paciente->data());
            }

            return $lista;
        }
        return [];

    }
}