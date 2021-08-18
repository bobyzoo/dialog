<?php $v->layout("_theme", [
    "title" => ""
]);
session_start();
?>

    <div class="container text-center ">
        <h4 class="mb-3 mt-5 text-yellow">Bem vindo ao DialogPsi !</h4>
        <p class="w-75 mx-auto mb-5 text-yellow">Pacientes mais engajados, melhores resultados e agenda cheia!</p>
        <div class="row pricing-table">
            <div class="col-md-4 grid-margin stretch-card pricing-card">
                <div class="card border-primary border pricing-card-body">
                    <div class="text-center pricing-card-head">
                        <h3>Básico</h3>
                        <p>Comece a digitalizar sua prática clínica com as técnicas basilares da TCC</p>
                        <h1 class="font-weight-normal mb-4">30 dias de graça</h1>
                    </div>
                    <ul class="list-unstyled plan-features">
                        <li><i class="fas fa-tasks"></i> Planos de Ação (Tarefas da semana)</li>
                        <li><i class="far fa-smile-beam"></i> Monitoramento de humor dos pacientes</li>
                        <li><i class="fas fa-poo-storm"></i> Registros de Pensamentos Disfuncionais – RPD</li>
                        <li><i class="fas fa-users"></i> Até 5 pacientes</li>
                    </ul>
                    <div class="wrapper">
                        <a href="#" class="btn btn-outline-primary btn-block">Assinar</a>
                    </div>
                    <p class="mt-3 mb-0 plan-cost text-gray">após 30 dias será cobrado R$ 67,00 ao mês</p>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card pricing-card">
                <div class="card border border-success pricing-card-body">
                    <div class="text-center pricing-card-head">
                        <h3 class="text-success">Profissional</h3>
                        <p>Aumente suas possibilidades de intervenção com as técnicas mais utilizadas na TCC</p>
                        <h1 class="font-weight-normal mb-4">R$ 117,00 mês</h1>
                    </div>
                    <ul class="list-unstyled plan-features">
                        <li><i class="far fa-check-circle"></i> Todas as técnicas do Plano Básico</li>
                        <li><i class="fas fa-search"></i> Exames de evidências</li>
                        <li><i class="fas fa-cloud"></i> Conceituação de casos</li>
                        <li><i class="fas fa-id-card"></i> Cartões de enfrentamento</li>
                        <li><i class="far fa-bell"></i> Criação de alarmes</li>
                        <li><i class="fas fa-wind"></i> Respire! (Treino de respiração)</li>
                        <li><i class="far fa-file-alt"></i> Questionários e Escalas</li>
                        <li><i class="far fa-file"></i> Criação de Documentos psicológicos (CFP)</li>
                        <li><i class="fas fa-comments"></i> Chat profissional</li>
                        <li><i class="fas fa-users"></i> Até 15 pacientes</li>
                    </ul>
                    <div class="wrapper">
                        <a class="btn btn-outline-primary btn-block disabled" >EM BREVE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card pricing-card">
                <div class="card border border-primary pricing-card-body">
                    <div class="text-center pricing-card-head">
                        <h3>Ilimitado</h3>
                        <p>Além de todas as técnicas da plataforma, tenha acesso as nossas ferramentas de gestão</p>
                        <h1 class="font-weight-normal mb-4">R$ 147,00 mês</h1>
                    </div>
                    <ul class="list-unstyled plan-features">
                        <li><i class="far fa-check-circle"></i> Todas as técnicas do Plano Profissional</li>
                        <li><i class="far fa-calendar"></i> Controle de agenda (agendamentos)</li>
                        <li><i class="fas fa-chart-line"></i> Controle financeiro</li>
                        <li><i class="fas fa-users-slash"></i> Pacientes ilimitados</li>
                    </ul>
                    <div class="wrapper">
                        <a class="btn btn-outline-primary btn-block disabled" >EM BREVE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $v->start("js") ?>

    <script src="<?= url("assets/js/Utils.js") ?>"></script>
<?php $v->end("js") ?>