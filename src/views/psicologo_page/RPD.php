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
