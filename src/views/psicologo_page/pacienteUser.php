<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
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
                    <div class="sidebar-menu" style="width: auto !important; min-height: auto !important;">
                        <nav class="nav">
                            <div class="nav-item active">
                                <a href="<?=url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/rpd")?>" class="nav-link">
                                    <i class="menu-icons mdi mdi-weather-lightning-rainy" style="font-size: 50px; margin-bottom: 0 !important;"></i><span class="menu-title text-center">RPD</span>
                                </a>
                            </div>
                            <div class="nav-item active">
                                <a href="<?=url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/planoacao")?>" class="nav-link">
                                    <i class="menu-icons mdi mdi-checkbox-multiple-marked" style="font-size: 50px; margin-bottom: 0 !important;"></i><span class="menu-title text-center">Planos de ações</span>
                                </a>
                            </div>
                            <div class="nav-item active">
                                <a href="<?=url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/monitoramentohumor")?>" class="nav-link">
                                    <i class="menu-icons mdi mdi-emoticon" style="font-size: 50px; margin-bottom: 0 !important;"></i><span class="menu-title text-center">Monitoramento de humor</span>
                                </a>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>

        </div>

        <div id="modal"></div>

        <?php $v->start("js") ?>

        <script src="<?= url("assets/js/Utils.js") ?>"></script>
        <script>


        </script>

        <?php $v->end("js") ?>
