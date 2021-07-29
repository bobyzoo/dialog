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
                <div class="btn btn-lg btn-primary" onclick="getFormSetRpd()">Criar novo RPD</div>
            </div>
        </div>
    </div>
</div>

<div id="modal"></div>

<?php $v->start("js") ?>
<script src="<?= url("assets/vendors/jquery-bar-rating/jquery.barrating.min.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script>
    function getFormSetRpd(){

        $.ajax({
            url: "form/rpd",
            type: "GET",
            data: "",
            success: function (data) {
                $("#modal").html(data);
                showModal('modalRemote');

            }
        });


    }
</script>
<?php $v->end("js") ?>
