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


$router->post("/setRespostaQuestionario/{questionario_id}/{usuario_id}", "ResponseFormController:setAplicacaoQuestionario", "ResponseFormController.setAplicacaoQuestionario");



//AREA PSICOLOGO
$router->group("psicologo");
$router->get("/", "WebPsicologo:home", "webpsicologo.pacientes");
$router->get("/pacientes", "WebPsicologo:pacientes", "webpsicologo.pacientes");
$router->get("/pacientes/listPacientes", "Pacientes:listPaciente", "Pacientes.listPaciente");
$router->get("/paciente/{id_user}", "WebPsicologo:pacienteUser", "webpsicologo.pacienteUser");
$router->get("/paciente/{id_user}/rpd", "WebPsicologo:rpd", "webpsicologo.rpd");
$router->get("/paciente/{id_user}/planoacao", "WebPsicologo:planoAcao", "tablepsicologo.planoAcao");


//VIEW FORMATO DOC
$router->get("/viewform/{id_aplicacao_questionario}", "DocumentoPsicologo:rpd", "documentopsicologo.rpd");
//DELETA
$router->get("/delete/{aplicacao_questionario_id}", "TablePsicologo:deleteItem", "TablePsicologo.deleteItem");
//FORMULARIO DE EDICAO
$router->get("/edit/{aplicacao_questionario_id}", "FormPsicologo:editItem", "FormPsicologo.editItem");
//FORMULARIO DE CRIACAO
$router->get("/create/{questionario_id}/{usuario_id}", "FormPsicologo:createItem", "FormPsicologo.createItem");
//TABELAS ALL
$router->get("/paciente/{id_user}/table/all/{questionario_id}", "TablePsicologo:listAll", "TablePsicologo.listAll");



//AREA PACIENTE
$router->group("paciente");
$router->get("/", "WebPaciente:home", "webpaciente.home");
$router->get("/rpd", "WebPaciente:rpd", "webpaciente.rpd");
$router->get("/planoacao", "WebPaciente:planoAcao", "webpaciente.planoacao");


//deleta
$router->get("/delete/{aplicacao_questionario_id}", "TablePaciente:deleteItem", "tablepaciente.deleteItem");
//FORMULARIO DE EDICAO
$router->post("/edit/{aplicacao_questionario_id}", "FormPaciente:editItem", "formpaciente.editItem");
//FORMULARIO DE CRIACAO
$router->get("/create/{questionario_id}", "FormPaciente:createItem", "formpaciente.createItem");
//TABELAS ALL
$router->get("/table/all/{questionario_id}", "TablePaciente:listAll", "TablePaciente.listAll");







$router->group("ops");
$router->get("/{errcode}/", "Web:error");

$router->dispatch();
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}/");
}

