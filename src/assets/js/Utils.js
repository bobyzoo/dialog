const URL_BASE = "http://localhost/Site/dialog/";


function showToast(title, content,color = "bg-success") {
    $('#toats-header').attr('class','')
    $('#toats-header').addClass('toast-header')
    $('#toats-header').addClass(color)
    $('.toast-header').html('<strong class="mr-auto text-white">'+title+'</strong><button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>')
    $('.toast-body').html(content)
    $('.toast').toast('show');
}


//PACIENTES
function getPaciente(idTabela = "listPacientes") {
    showDiv("loadingTblPacientes");
    $.ajax({
        type: "GET",
        url: URL_BASE + "pacientes/getPacientes",
        success: function (data) {
            $("#" + idTabela).html(data);
            hideDiv("loadingTblPacientes");
        },
        error: function () {
            alert('Error');
        }
    });
}

function setPaciente(modalCadastro = 0) {
    showDiv("loadingFrmCadastroPaciente");
    $.ajax({
        type: "POST",
        url: URL_BASE + "pacientes/setPaciente",
        data: $('#frmPaciente').serialize(),
        success: function (data) {
            document.getElementById("frmPaciente").reset();
            hideModal("modalRemote");
            getPaciente();
            hideDiv("loadingFrmCadastroPaciente");
        },
        error: function () {
            alert('Error');
        }
    });
}

//PRONTUARIO

function showDiv(id) {
    $('#' + id).removeClass('hide');
}

function hideDiv(id) {
    $('#' + id).addClass('hide');
}

function showModal(id) {
    $('#' + id).modal('show');
}

function hideModal(id) {
    $('#' + id).modal('hide');
}
