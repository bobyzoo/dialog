<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
?>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-1to10.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-horizontal.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-movie.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-pill.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-reversed.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css") ?>"/>
<link rel="stylesheet"
      href="<?= url("assets/vendors/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css") ?>"/>

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
                    <div class="text-capitalize"> Registro de Pensamentos
                        Disfuncionais - RPD
                    </div>
                </h5>
            </div>
            <div class="card-body">
                <div id="table-rpd"></div>
            </div>
        </div>
    </div>
</div>

<div id="modal"></div>

<?php $v->start("js") ?>
<script src="<?= url("assets/vendors/jquery-bar-rating/jquery.barrating.min.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script src="<?= url("assets/vendors/datatables.net/jquery.dataTables.js") ?>"></script>
<script src="<?= url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js") ?>"></script>
<script type="text/javascript" src="<?= url("assets/js/printthis/printThis.js") ?>"></script>
<script>
    function getTableRpds() {

        $.ajax({
            url: "<?=url_pesquisa("psicologo/paciente/$paciente->usuario_id/table/all/1")?>",
            type: "GET",
            data: {botoes:["view"]},
            success: function (data) {
                $("#table-rpd").html(data);
                $('#order-listing').DataTable({
                    "iDisplayLength": 2,
                    "bLengthChange": false,
                    "language": {
                        search: "Procurar :"
                    }
                });
                $('#order-listing').each(function () {
                    var datatable = $(this);
                    search_input.attr('placeholder', 'Digite aqui');
                    var s = datatable.closest('.dataTables_wrapper').find(".dataTables_filter").append('');
                });
            }
        });
    }

    function viewAplicacao(idAplicacao) {
        console.log(idAplicacao)
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
<script src="<?= url("assets/js/shared/data-table.js") ?>"></script>

<?php $v->end("js") ?>
