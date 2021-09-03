<?php

use CoffeeCode\Router\Router;


require __DIR__ . "/vendor/autoload.php";
$router = new Router(URL_BASE);
$router->namespace("Source\Controllers");

$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/login", "Web:login", "web.login");
$router->get("/teste", "Web:teste", "web.teste");
$router->post("/pagamento", "PaymentController:payment", "PaymentController.payment");
$router->post("/log", "Web:log", "web.log");
$router->post("/checkout", "PaymentController:checkout", "PaymentController.checkout");
$router->get("/cadastrar/{codigo_ativacao}", "Web:cadastrar", "web.cadastrar");
$router->post("/getLogin", "LoginController:getLogin", "usuario.getLogin");
$router->get("/logout", "LoginController:logout", "LoginController.logout");
$router->post("/setCadastroPaciente", "Usuario:setCadastroPaciente", "usuario.setCadastroPaciente");
$router->post("/setCadastroPsicologo", "Usuario:setCadastroPsicologo", "usuario.setCadastroPsicologo");


$router->get("/planos", "Web:planos", "web.planos");


$router->post("/setRespostaQuestionario/{questionario_id}/{usuario_id}", "ResponseFormController:setAplicacaoQuestionario", "ResponseFormController.setAplicacaoQuestionario");
$router->post("/setRespostaQuestionarioHumor", "ResponseFormController:setRespostaHumor", "ResponseFormController.setRespostaHumor");



//AREA PSICOLOGO
$router->group("psicologo");
$router->get("/", "WebPsicologo:home", "webpsicologo.pacientes");
$router->get("/pacientes", "WebPsicologo:pacientes", "webpsicologo.pacientes");
$router->get("/pacientes/listPacientes", "Pacientes:listPaciente", "Pacientes.listPaciente");
$router->get("/paciente/{id_user}", "WebPsicologo:pacienteUser", "webpsicologo.pacienteUser");
$router->get("/paciente/{id_user}/ativa", "Usuario:ativaUsuario", "Usuario.ativaUsuario");
$router->get("/paciente/{id_user}/deleta", "Usuario:deletaUsuarioPaciente", "Usuario.deletaUsuarioPaciente");
$router->get("/paciente/{id_user}/inativa", "Usuario:inativaUsuario", "Usuario.inativaUsuario");
$router->get("/paciente/{id_user}/rpd", "WebPsicologo:rpd", "webpsicologo.rpd");
$router->get("/paciente/{id_user}/planoacao", "WebPsicologo:planoAcao", "webpsicologo.planoAcao");
$router->get("/paciente/{id_user}/monitoramentohumor", "WebPsicologo:Humor", "webpsicologo.humor");


//VIEW FORMATO DOC
$router->get("/viewform/{id_aplicacao_questionario}", "DocumentoPsicologo:rpd", "documentopsicologo.rpd");
//DELETA
$router->get("/delete/{aplicacao_questionario_id}", "TablePsicologo:deleteItem", "TablePsicologo.deleteItem");
//FORMULARIO DE EDICAO
$router->get("/edit/{aplicacao_questionario_id}", "FormPsicologo:editItem", "FormPsicologo.editItem");
//FORMULARIO DE CRIACAO
$router->get("/create/{questionario_codigo}/{usuario_id}", "FormPsicologo:createItem", "FormPsicologo.createItem");
//TABELAS ALL
$router->get("/paciente/{id_user}/table/all/{questionario_codigo}", "TablePsicologo:listAll", "TablePsicologo.listAll");
$router->get("/paciente/{id_user}/table/listMonitoramentoHumor", "TablePsicologo:listMonitoramentoHumor", "TablePsicologo.listMonitoramentoHumor");



//AREA PACIENTE
$router->group("paciente");
$router->get("/", "WebPaciente:home", "webpaciente.home");
$router->get("/rpd", "WebPaciente:rpd", "webpaciente.rpd");
$router->get("/planoacao", "WebPaciente:planoAcao", "webpaciente.planoacao");
$router->get("/humor", "WebPaciente:humor", "webpaciente.humor");
$router->get("/form_humor", "FormPaciente:humor", "formpaciente.humor");


//deleta
$router->get("/delete/{aplicacao_questionario_id}", "TablePaciente:deleteItem", "tablepaciente.deleteItem");
//FORMULARIO DE EDICAO
$router->post("/edit/{aplicacao_questionario_id}", "FormPaciente:editItem", "formpaciente.editItem");
//FORMULARIO DE CRIACAO
$router->get("/create/{questionario_codigo}", "FormPaciente:createItem", "formpaciente.createItem");
//TABELAS ALL
$router->get("/table/all/{questionario_codigo}", "TablePaciente:listAll", "TablePaciente.listAll");
$router->get("/table/listMonitoramentoHumor", "TablePaciente:listMonitoramentoHumor", "TablePaciente.listMonitoramentoHumor");







$router->group("ops");
$router->get("/{errcode}/", "Web:error");

$router->dispatch();
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}/");
}

