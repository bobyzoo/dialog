<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
?>
<div class="container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="loader-demo-box position-absolute hide loading" id="loadingTblPacientes">
               <div class="dot-opacity-loader" style="top: 25%">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="card-header">
                <h5 class="mb-0">
                    <div class="text-capitalize"> <?= $paciente->usu_nome ?> </div>
                </h5>
            </div>
            <div class="card-body">
                <div class="row text-center pb-4 px-2 menus-funcoes" >
                            <a class="text-decoration-none text-white item-user" href="<?=url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/rpd")?>">
                               <div> <i class="menu-icons mdi mdi-weather-lightning-rainy"></i></div>
                                <div> <span class="menu-title text-center">RPD</span></div>
                            </a>
                    <a class="text-decoration-none text-white item-user" href="<?=url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/planoacao")?>">
                        <div>  <i class="menu-icons mdi mdi-checkbox-multiple-marked" style="font-size: 50px; margin-bottom: 0 !important;"></i></div>
                        <div> <span class="menu-title text-center">Planos de ações</span></div>
                    </a>
                    <a class="text-decoration-none text-white item-user" href="<?=url_pesquisa("psicologo/paciente/" . $paciente->paciente_id . "/monitoramentohumor")?>">
                        <div> <i class="menu-icons mdi mdi-emoticon" style="font-size: 50px; margin-bottom: 0 !important;"></i></div>
                        <div> <span class="menu-title text-center">Monitoramento de humor</span></div>
                    </a>
                </div>
            </div>
        </div>

        <?php $v->start("js") ?>

        <script src="<?= url("assets/js/Utils.js") ?>"></script>
        <script>


        </script>

        <?php $v->end("js") ?>
