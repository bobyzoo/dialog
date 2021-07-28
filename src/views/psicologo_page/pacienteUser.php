<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
?>

<div class="container" style="background:rgba(41,43,62,1);">
    <div class="row">
        <div class='text-decoration-none text-white'
           href='#'>
            <div class=' col-1 avatar-icon'><i class='fas fa-user avatar avatar-32'></i></div>
        </div>
        <div class='col-3 py-2'><?=$paciente->nome?></div>
    </div>
    <div class="row">
        <a class="p-2 mx-2 btn div-btn " href="<?=url_pesquisa("pacientes/user/$paciente->paciente_id")?>"><i class="fas fa-home"></i> Inicio</a>
        <a class="p-2 mx-2 btn div-btn " href="#" onclick="showModal('modalRemote')"><i class="far fa-clipboard"></i> Prontuario</a>
    </div>
    <div class="row text-center pb-4" style="background:#222437;">
        <div class="col-12 font-size-24 text-center">Vamos começar?</div>
    </div>
    <div class="row text-center pb-4 px-2" style="background:#222437;">
        <a class="py-2 ml-5 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mr-2 bgUtils-1"
           href="#">
            <div class='text-center mb-3'><i class='far fa-file avatar avatar-32'></i></div>
            <div class="font-size-14 font-weight-medium mb-2">QPC</div>
            <div class="font-size-11 ">(Questionario Pré Consulta)</div>
        </a>
        <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
           href="#">
            <div class='text-center mb-3'><i class="fas fa-search avatar avatar-32"></i></div>
            <div class="font-size-14 font-weight-medium mb-2">Conceituação <br> de  casos</div>
        </a>
        <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
                href="#">
            <div class='text-center mb-3'><i class="fas fa-smile-beam avatar avatar-32"></i></div>
            <div class="font-size-14 font-weight-medium mb-2">Monitoramento <br> de humor</div>
        </a>
        <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
                href="#">
            <div class='text-center mb-3'><i class='fas fa-poo-storm avatar avatar-32'></i></div>
            <div class="font-size-14 font-weight-medium mb-2">RPD</div>
            <div class="font-size-11 ">(Registros de pensamentos disfuncionais)</div>
        </a>
        <a class="py-2 col-2 div-btn font-size-24 text-center text-decoration-none color-white div-btn mx-2 bgUtils-1 "
           href="#">
            <div class='text-center mb-3'><i class='fas fa-tasks avatar avatar-32'></i></div>
            <div class="font-size-14 font-weight-medium mb-2">Planos de ações</div>
            <div class="font-size-11 ">(Tarefas semanais)</div>
        </a>

    </div>
</div>

<div id="modal"></div>

<?php $v->start("js") ?>

<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script>
    $.ajax({
        url: "prontuario/<?=$paciente->paciente_id?>",
        type: "GET",
        success: function (data) {
            $("#modal").html(data);
            hideDiv("loadingFrmProntuario");
        }
    });

</script>

<?php $v->end("js") ?>
