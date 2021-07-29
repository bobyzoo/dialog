<?php $v->layout("_theme", [
    "title" => ""
]);

?>
    <style>
        .div-btn{
            max-width: 120px;
        }
        .div-btn:hover {
            background-color: #606060 !important;
            transition: 0.5s;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <legend>
                        Pacientes cadastrados
                    </legend>
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-3 font-size-63">1</div>
                                    <div class="col-5">
                                        <div class="row font-size font-size-17">Paciente</div>
                                        <div class="row font-size-14">cadastrados</div>
                                    </div>
                                </div>

                                <div class="row">Seu plano grátis permite incluir até 5 pacientes</div>
                                <div class="row">
                                    <div class="template-demo">
                                        <button type="button" class="btn btn-primary btn-lg"
                                                data-toggle="modal" data-target="#modalRemote">Adicionar
                                            paciente
                                        </button>
                                        <div id="modal"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $v->start("js") ?>

    <script src="<?= url("assets/js/Utils.js") ?>"></script>
<?php $v->end("js") ?>