<?php


namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\PacienteDAO;
use Source\Models\ProntuarioDAO;

class Pacientes
{
    /* @var Engine */
    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(dirname(__DIR__, 1) . "/views/paciente", "php");
        $this->view->addData(["router" => $router]);
    }

    public function listPaciente()
    {
        foreach (PacienteDAO::getAll() as $paciente) {
            echo "<a class='row py-3 border div-btn text-decoration-none' href='" . URL_BASE . "/psicologo/paciente/" . $paciente->paciente_id . "'><div class=' col-1 avatar-icon'><i class='fas fa-user mr-2 avatar avatar-32'></i></div><div class='col-3 text-capitalize'>" . $paciente->usu_nome . "</div></a>";
        }
    }

    public function setPaciente($data): void
    {
        $paciente = new PacienteDAO();

        foreach ($_POST as $key => $value) {
            $paciente->$key = $value;
            if ($value == "") {
                $paciente->$key = null;
            }
        }
        $RESULT = $paciente->save();
        if ($paciente->fail()) {
            echo $paciente->fail()->getMessage();
        } else {
            echo $RESULT;
        }
    }

    public function formSetPaciente($data): void
    {
        echo $this->view->render("formSetPaciente", [
            "title" => "formSetPaciente"
        ]);
    }

    public function prontuario($data): void
    {
        $pacienteDAO = new PacienteDAO();
        $paciente = $pacienteDAO->findById($data["id_user"]);
        echo $this->view->render("formProntuario", [
            "title" => "Prontuario",
            "prontuario_id" => $paciente->prontuario_id,
            "id_user" => $data["id_user"]
        ]);
    }

    public function getProntuario($data)
    {

        $pacienteDAO = new PacienteDAO();
        $paciente = $pacienteDAO->findById($_POST["id_user"]);
        if ($paciente->prontuario_id != null) {
            $prontuarioDAO = new ProntuarioDAO();
            $prontuario = $prontuarioDAO->findById($paciente->prontuario_id);
        }
        echo $prontuario->texto;
    }

    public function setProntuario($data)
    {

        $pacienteDAO = new PacienteDAO();
        $paciente = $pacienteDAO->findById($_POST['id_user']);

        $pronturioDAO = new ProntuarioDAO();
        if ($paciente->prontuario_id == null) {

            $pronturioDAO->texto = htmlentities($_POST['texto']);
            $pronturioDAO->save();
            $paciente->prontuario_id = $pronturioDAO->prontuario_id;
            $paciente->save();
        } else {
            $pronturio = $pronturioDAO->findById($paciente->prontuario_id);
            $pronturio->texto = htmlentities($_POST['texto']);
            $pronturio->save();
        }
    }


    function error($data)
    {
        echo "<h1>{$data['errcode']}</h1>";
        var_dump($data);
    }

}