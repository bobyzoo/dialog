<?php $v->layout("_theme", [
    "title" => ""
]);

var_dump($_SESSION);
?>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        Paciente
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $v->start("js") ?>

    <script src="<?= url("assets/js/Utils.js") ?>"></script>
    </script>
<?php $v->end("js") ?>