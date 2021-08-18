<style>.modal {
        overflow: scroll;
    }</style>
<div class="modal fade" id="modalRemote" tabindex="-1" role="dialog"
     aria-labelledby="modalRemoteLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal-content">
            <div class="loader-demo-box position-absolute loading hide" id="loadingHumor">
                <div class="dot-opacity-loader">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="modalRemoteLabel">Monitoramento de humor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="FormHumor" method="post" action="<?= url_pesquisa("setRespostaQuestionarioHumor") ?>">
                <div class="modal-body" id="modal-body">

                    <div class="sidebar-menu" style="width: auto !important; min-height: auto !important;">
                        <nav class="nav">
                            <div class="nav-item" id="item-1" onclick="selectEmotion(1)">
                                <a href="#" class="nav-link">
                                    <i class="menu-icons mdi mdi-emoticon-outline "
                                       style="font-size: 100px; margin-bottom: 0 !important; margin-left: -5px !important;"></i>
                                </a>
                            </div>
                            <div class="nav-item text-center" id="item-2" onclick="selectEmotion(2)">
                                <a href="#" class="nav-link text-center">
                                    <i class="menu-icons mdi mdi-emoticon-happy-outline text-center"
                                       style="font-size: 100px; margin-bottom: 0 !important; margin-left: -5px !important;"></i>
                                </a>
                            </div>
                            <div class="nav-item" id="item-3" onclick="selectEmotion(3)">
                                <a href="#" class="nav-link">
                                    <i class="menu-icons mdi mdi-emoticon-neutral-outline"
                                       style="font-size: 100px; margin-bottom: 0 !important; margin-left: -5px !important;"></i>
                                </a>
                            </div>
                            <div class="nav-item" id="item-4" onclick="selectEmotion(4)">
                                <a href="#" class="nav-link">
                                    <i class="menu-icons mdi mdi-emoticon-sad-outline"
                                       style="font-size: 100px; margin-bottom: 0 !important; margin-left: -5px !important;"></i>
                                </a>
                            </div>
                            <div class="nav-item" id="item-5" onclick="selectEmotion(5)">
                                <a href="#" class="nav-link">
                                    <i class="menu-icons mdi mdi-emoticon-cry-outline"
                                       style="font-size: 100px; margin-bottom: 0 !important; margin-left: -5px !important;"></i>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <div id="lista" class="form-group row">
                    </div>
                    <div class="form-group row ">
                        <div class="col-12">
                            <label for="input-comentario">Comentario</label>
                            <textarea type="text" rows="5" class="form-control" id="input_comentario"
                                      placeholder="Comente sobre o que estais sentindo" required
                                      name="input_comentario"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="humor_base" name="humor_base" value="0">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="btnSetResposta" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-validation/jquery.validate.min.js") ?>"></script>

<script src="<?= url("assets/js/shared/off-canvas.js") ?>"></script>
<script src="<?= url("assets/js/shared/hoverable-collapse.js") ?>"></script>
<script src="<?= url("assets/js/shared/misc.js") ?>"></script>
<script src="<?= url("assets/js/shared/settings.js") ?>"></script>
<script src="<?= url("assets/js/shared/todolist.js") ?>"></script>
<script src="<?= url("assets/js/shared/st-wizard.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>

<script src="<?= url("assets/js/shared/form-validation.js") ?>"></script>
<script>
    var lista_boa = [
        "Aceitação",
        "Afeto",
        "Alegria",
        "Amor",
        "Bem-estar",
        "Diversão",
        "Entusiasmo",
        "Felicidade",
        "Gratidão",
        "Humor",
        "Ânimo",
        "Motivação",
        "Paixão",
        "Prazer",
        "Satisfação",
    ];


    var lista_ruim = [
        "Angústia",
        "Arrependimento",
        "Culpa",
        "Decepção",
        "Desespero",
        "Desgosto",
        "Estresse",
        "Frustração",
        "Indignação",
        "Ira",
        "Medo",
        "Nojo",
        "Opressão",
        "Preocupação",
        "Raiva",
        "Rancor",
        "Tédio",
        "Tristeza",
        "Vergonha"
    ]


    var emocaoAtual = 0;
    $("html,body").css({"overflow": "auto"});

    function selectEmotion(id) {
        let html = "";
        for (let c = 1; c <= 5; c++) {
            $("#item-" + c).removeClass("active");
        }
        $("#item-" + id).addClass("active");

        if (id <= 2 && emocaoAtual !== 1 && emocaoAtual !== 2) {
            lista_boa.forEach(function (value, index, array) {
                html += '<div class="col-sm-4"><div class="form-check form-check-flat"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="humor-' + value + '" id="radio-humor-' + value + '" value="' + value + '" > ' + value + ' <i class="input-helper"></i></label> </div> </div>'
            })
            $("#lista").html(html)
        } else if (id > 2 && emocaoAtual !== 3 && emocaoAtual !== 4 && emocaoAtual !== 5) {
            lista_ruim.forEach(function (value, index, array) {
                html += '<div class="col-sm-4"><div class="form-check form-check-flat"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="humor-' + value + '" id="radio-humor-' + value + '" value="' + value + '" > ' + value + ' <i class="input-helper"></i></label> </div> </div>'
            })
            $("#lista").html(html)
        }
        emocaoAtual = id;
        document.getElementById("humor_base").value = id;
    }

    $("#FormHumor").validate({
        rules: {
            input_comentario: "required",
        },
        messages: {
            input_comentario: "Insira um comentario sobre o que estais sentindo",
        },
        errorPlacement: function (label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        },
        submitHandler: function (form, e) {
            var form = $("#FormHumor")
            e.preventDefault();
            if (document.getElementById("humor_base").value == 0) {
                showToast("erro!", "Selecione um", "bg-danger")
            } else {
                $.ajax({
                    type: form.attr('method'),
                    data: form.serialize(),
                    url: form.attr('action'),
                    success: function (data) {
                        data = data.split(';')
                        if (data[0] == "1") {
                            hideModal("modalRemote");
                            getTable();
                            showToast("Sucesso!", data[1])
                        } else {
                            hideModal("modalRemote");
                            getTable();
                            showToast("erro!", data[0], "bg-danger")
                        }
                    }
                });
            }
        }
    });


</script>