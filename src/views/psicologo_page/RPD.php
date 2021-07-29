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
                <form class="forms-sample" id="frmPaciente" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="input-nome">O que está acontecendo? (Situação)</label>
                            <textarea required type="text" rows="5" class="form-control" id=""
                                      placeholder="Diga o que esta acontecendo com você ..." name="nome"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="input-nome">O quanto esse pensamento é verdade para você?
                            </label>
                            <textarea required type="text" rows="5" class="form-control" id=""
                                      placeholder="Diga o que esta acontecendo com você ..." name="nome"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for=""> Quais pensamentos vêm a sua cabeça?</label>
                            <div class="br-wrapper br-theme-bars-square">
                                <select id="example-square" name="rating" autocomplete="off" style="display: none;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="">Qual a intensidade dessa emoção?</label>
                            <div class="br-wrapper br-theme-bars-square">
                                <select id="barra-emocao" name="rating" autocomplete="off" style="display: none;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-12">
                            <label for="input-nome">O que você fez nesse situação? (Comportamento)
                            </label>
                            <textarea required type="text" rows="5" class="form-control" id=""
                                      placeholder="Diga o que esta acontecendo com você ..." name="nome"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal"></div>

<?php $v->start("js") ?>
<script src="<?= url("assets/vendors/jquery-bar-rating/jquery.barrating.min.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script>


    $('#barra-emocao').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: false
    });

</script>


<?php $v->end("js") ?>
