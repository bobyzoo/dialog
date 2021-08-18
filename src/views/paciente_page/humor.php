<?php $v->layout("_theme", [
    "title" => $title
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
               <div class="dot-opacity-loader" style="top: 25%">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="card-header">
                <h5 class="mb-0">
                    <div class="text-capitalize"> Monitoramento de humor
                    </div>
                </h5>
            </div>
            <div class="card-body">
                <div class="btn btn-lg btn-primary" onclick="getFormSetHumor()">Criar novo registro de humor</div>
                <div id="table-rpd">
                </div>
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

<script>
    function getFormSetHumor() {
        $.ajax({
            url: "<?=url_pesquisa("paciente/form_humor")?>",
            type: "GET",
            data: "",
            success: function (data) {
                $("#modal").html(data);
                showModal('modalRemote');

            }
        });
    }
    function getTable() {
        $.ajax({
            url: "<?=url_pesquisa("paciente/table/listMonitoramentoHumor")?>",
            type: "GET",
            success: function (data) {
                $("#table-rpd").html(data);
                $('#order-listing').DataTable({
                    "iDisplayLength": 5,
                    "bLengthChange": false,
                    "language": {
                        search: "Procurar :"
                    }
                });
                $('#order-listing').each(function () {
                    var datatable = $(this);
                    var s = datatable.closest('.dataTables_wrapper').find(".dataTables_filter").append('');
                });
            }
        });
    }
    function deleteItem(aplicacao_questionario_id){
        $.ajax({
            url: "<?=url_pesquisa("paciente/delete/")?>"+aplicacao_questionario_id,
            type: "GET",
            data: "",
            success: function (data) {
                showToast("Sucesso!", "Apagado com sucesso!")
                getTable()
            }
        });
    }
    function editItem(aplicacao_questionario_id){
        $.ajax({
            url: "<?=url_pesquisa("paciente/edit/")?>"+aplicacao_questionario_id,
            type: "POST",
            data: "",
            success: function (data) {
                $("#modal").html(data);
                showModal('modalRemote');
            }
        });
    }

    getTable();
</script>
<script src="<?= url("assets/js/shared/data-table.js") ?>"></script>
<?php $v->end("js") ?>
