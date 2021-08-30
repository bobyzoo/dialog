<?php $v->layout("_theme", [
    "title" => "Pacientes"
]);
?>


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
            <div class="card-body">
                <div class="list-group col-12 " id="listPacientes">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $v->start("js") ?>
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
    function inativaUsuario(id) {
        showDiv("loadingTblPacientes");
        $.ajax({
            type: "GET",
            url:"<?=url_pesquisa("psicologo/paciente/")?>"+id+"/inativa",
            success: function (data) {
                console.log(data)
                getPaciente()
            },
            error: function () {
                alert('Error');
            }
        });
    }
    function ativaUsuario(id) {
        showDiv("loadingTblPacientes");
        $.ajax({
            type: "GET",
            url:"<?=url_pesquisa("psicologo/paciente/")?>"+id+"/ativa",
            success: function (data) {
                getPaciente()
            },
            error: function () {
                alert('Error');
            }
        });
    }
    function deletaUsuario(id) {
        showDiv("loadingTblPacientes");
        $.ajax({
            type: "GET",
            url:"<?=url_pesquisa("psicologo/paciente/")?>"+id+"/deleta",
            success: function (data) {
                showSuccessToast("Apagado com sucesso.")
                hideModal("confirmaModal")
                getPaciente()
            },
            error: function () {
                alert('Error');
            }
        });

    }
    function openModalAlert(id){
        showModalAlert("ATENÇÃO!","Você tem certeza que gostaria de excluir permanentemente a conta do paciente?")
        $('#confirmedModal').val(id)
    }

    function clickBtnConfirmedAlert(){
        deletaUsuario($("#confirmedModal").val())
    }
    getPaciente()
</script>


<?php $v->end("js") ?>
