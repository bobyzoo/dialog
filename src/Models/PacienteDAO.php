<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class PacienteDAO extends DataLayer
{
    public function __construct()
    {
        parent::__construct("paciente", ["usuario_id", "psicologo_id", "pac_nome_contato_emergencia", "pac_telefone_contato_emergencia"], "paciente_id", false);
    }

    public static function getAll()
    {
        session_start();
        $paciente = new PacienteDAO();
        $lista = [];
        $pacientes = $paciente->find("psicologo_id = :psicologo_id", "psicologo_id={$_SESSION['usuario']->psicologo_id}")->fetch(true);
        if ($pacientes) {
            foreach ($pacientes as $paciente) {
                $pacienteObj = $paciente->data();
                $usuario = new UsuarioDAO();
                $usuario = $usuario->find("usuario_id = :usuario_id", "usuario_id={$paciente->data()->usuario_id}")->fetch(true);;
                foreach ($usuario[0]->data() as $key => $value) {
                    $pacienteObj->$key = $value;
                }
                array_push($lista, $pacienteObj);
            }
            return $lista;
        }
        return [];

    }

    public static function getPacienteID($usuario_id = "", $paciente_id = "")
    {
        if ($paciente_id) {
            $pacienteDao = new PacienteDAO();
            $paciente = $pacienteDao->findById($paciente_id);
            $pacienteObj = $paciente->data();
            $usuarioDao = new UsuarioDAO();
            $usuario = $usuarioDao->find("usuario_id = :usuario_id", "usuario_id={$paciente->usuario_id}")->fetch(true);
            foreach ($usuario[0]->data() as $key => $value) {
                $pacienteObj->$key = $value;
            }

        }
        return $pacienteObj;
    }

    public static function getPacienteByUsuarioId($usuario_id):Object
    {
        $pacienteDao = new PacienteDAO();
        $pacienteDao = $pacienteDao->find("usuario_id = :usuario_id", "usuario_id={$usuario_id}")->fetch(true)[0];
        return $pacienteDao;
    }
}