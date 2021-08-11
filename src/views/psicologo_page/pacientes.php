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
            <div class="card-body">
                <div class="row text-center mb-5">
                    <a class="col-4 rounded-0 btn btn-primary">Ativos</a>
                    <a class="col-4 rounded-0 btn btn-info-blue">Todos</a>
                    <a class="col-4 rounded-0 btn btn-primary">Inativos</a>
                </div>
                <div class="">

                    <div class="list-group col-12" id="listPacientes">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="modal"></div>

<?php $v->start("js") ?>

<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script>
    function getPaciente(idTabela = "listPacientes") {
        showDiv("loadingTblPacientes");
        $.ajax({
            type: "GET",
            url:"<?=url_pesquisa("psicologo/pacientes/listPacientes")?>",
            success: function (data) {
                $("#" + idTabela).html(data);
                hideDiv("loadingTblPacientes");
            },
            error: function () {
                alert('Error');
            }
        });
    }
    getPaciente()
    // $.ajax({
    //     url: "pacientes/formSetPaciente",
    //     type: "POST",
    //     data: "",
    //     success: function (data) {
    //         $("#modal").html(data);
    //     }
    // });
</script>


<?php $v->end("js") ?>
