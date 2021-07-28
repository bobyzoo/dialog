<?php

use CoffeeCode\Router\Router;


require __DIR__ . "/vendor/autoload.php";
$router = new Router(URL_BASE);
$router->namespace("Source\Controllers");

$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/login", "Web:login", "web.login");
$router->get("/cadastrar/{codigo_ativacao}", "Web:cadastrar", "web.cadastrar");
$router->post("/getLogin", "Usuario:getLogin", "usuario.getLogin");
$router->get("/logout", "Usuario:logout", "usuario.logout");
$router->post("/setCadastro", "Usuario:setCadastro", "usuario.setCadastro");

//AREA PSICOLOGO
$router->group("psicologo");
$router->get("/", "WebPsicologo:home", "webpsicologo.pacientes");

//AREA PACIENTE

//
$router->group("pacientes");
$router->get("/", "Web:pacientes", "web.pacientes");
$router->post("/formSetPaciente", "Pacientes:formSetPaciente", "pacientes.formSetPaciente");
$router->post("/setPaciente", "Pacientes:setPaciente", "pacientes.setPaciente");
$router->get("/getPacientes", "Pacientes:listPaciente", "pacientes.listPaciente");
$router->get("/user/{id_user}", "Web:pacienteUser", "pacientes.pacienteUser");
$router->get("/user/prontuario/{id_user}", "Pacientes:prontuario", "pacientes.prontuario");
$router->post("/user/prontuario/setProntuario", "Pacientes:setProntuario", "pacientes.setProntuario");
$router->post("/user/prontuario/getProntuario", "Pacientes:getProntuario", "pacientes.getProntuario");
//$router->get("/dashboard","Admin:dashboard","admin.dashboard");


$router->group("ops");
$router->get("/{errcode}/", "Web:error");

$router->dispatch();
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}/");
}

