<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
var_dump($paciente);
?>

<div class="container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="loader-demo-box position-absolute hide loading" id="loadingTblPacientes">
                <div class="dot-opacity-loader">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="card-header">
                <h5 class="mb-0">
                    <div class="text-capitalize" "> <?= $paciente->usu_nome ?> </div>
                </h5>
            </div>
            <div class="card-body">
                <div class="row text-center pb-4 px-2">
                    <a class="py-2 ml-5 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mr-2 bgUtils-1"
                       href="#">
                        <div class='text-center mb-3'><i class='far fa-file avatar avatar-32'></i></div>
                        <div class="font-size-14 font-weight-medium mb-2">QPC</div>
                        <div class="font-size-11 ">(Questionario Pré Consulta)</div>
                    </a>
                    <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
                       href="<?= url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/rpd") ?>">
                        <div class='text-center mb-3'><i class='fas fa-poo-storm avatar avatar-32'></i></div>
                        <div class="font-size-14 font-weight-medium mb-2">RPD</div>
                        <div class="font-size-11 ">(Registros de pensamentos disfuncionais)</div>
                    </a>
                    <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
                       href="#">
                        <div class='text-center mb-3'><i class="fas fa-search avatar avatar-32"></i></div>
                        <div class="font-size-14 font-weight-medium mb-2">Conceituação <br> de casos</div>
                    </a>
                    <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
                       href="#">
                        <div class='text-center mb-3'><i class="fas fa-smile-beam avatar avatar-32"></i></div>
                        <div class="font-size-14 font-weight-medium mb-2">Monitoramento <br> de humor</div>
                    </a>
                    <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
                       href="<?= url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/planoacao") ?>">
                        <div class='text-center mb-3'><i class='fas fa-tasks avatar avatar-32'></i></div>
                        <div class="font-size-14 font-weight-medium mb-2">Planos de ações</div>
                        <div class="font-size-11 ">(Tarefas semanais)</div>
                    </a>

                </div>
            </div>

        </div>

        <div id="modal"></div>

        <?php $v->start("js") ?>

        <script src="<?= url("assets/js/Utils.js") ?>"></script>
        <script>


        </script>

        <?php $v->end("js") ?>
