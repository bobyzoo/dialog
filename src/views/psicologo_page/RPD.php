<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
?>

<style>
    .dataTables_filter {
        display: none;
    }
</style>
<div class="col-md-12 grid-margin">
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
            <div class="text-capitalize"> Registro de Pensamentos
                Disfuncionais - RPD
            </div>
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div id="table-rpd" style="width: 100%">
            </div>
        </div>
    </div>
</div>
</div>
<?php $v->start("js") ?>

<script>


    function getTableRpds() {

        $.ajax({
            url: "<?=url_pesquisa("psicologo/paciente/$paciente->usuario_id/table/all/rpd")?>",
            type: "GET",
            data: {botoes:["view"]},
            success: function (data) {
                $("#table-rpd").html(data);
                configureDataTable('#order-listing',null)
            }
        });
    }

    function viewAplicacao(idAplicacao) {
        $.ajax({
            url: "<?=url_pesquisa("psicologo/viewform/")?>"+idAplicacao,
            type: "GET",
            data: "",
            success: function (data) {
                $("#modal").html(data);
                showModal('modalRemote');

            }
        });
    }

    getTableRpds();

   function imprimeModal(){
        $("#modal").printThis({
            debug: false,
            importCSS: true,
            importStyle: true,
            printContainer: true,
            // loadCSS: "../css/style.css",
            pageTitle: "My Modal",
            removeInline: false,
            printDelay: 333,
            header: null,
            formValues: true
        });
    }



</script>

<?php $v->end("js") ?>
