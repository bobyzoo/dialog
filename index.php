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


$router->post("/setRespostaQuestionario", "ResponseFormController:setAplicacaoQuestionario", "ResponseFormController.setAplicacaoQuestionario");



//AREA PSICOLOGO
$router->group("psicologo");
$router->get("/", "WebPsicologo:home", "webpsicologo.pacientes");
$router->get("/pacientes", "WebPsicologo:pacientes", "webpsicologo.pacientes");
$router->get("/pacientes/listPacientes", "Pacientes:listPaciente", "Pacientes.listPaciente");
$router->get("/paciente/{id_user}", "WebPsicologo:pacienteUser", "webpsicologo.pacienteUser");
$router->get("/paciente/{id_user}/rpd", "WebPsicologo:rpd", "webpsicologo.rpd");
$router->get("/paciente/{id_user}/rpd/list", "TablePsicologo:getListRpdUser", "tablepsicologo.getListRpdUser");



//AREA PACIENTE
$router->group("paciente");
$router->get("/", "WebPaciente:home", "webpaciente.home");
$router->get("/rpd", "WebPaciente:rpd", "webpaciente.rpd");
$router->get("/form/rpd", "FormPaciente:setRpd", "formpaciente.setRpd");
$router->get("/rpd/listrpd/{id_user}", "TablePaciente:getListRpdUser", "tablepaciente.getListRpdUser");







$router->group("ops");
$router->get("/{errcode}/", "Web:error");

$router->dispatch();
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}/");
}

