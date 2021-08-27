
function showToast(title, content,color = "bg-success") {
    $('#toats-header').attr('class','')
    $('#toats-header').addClass('toast-header')
    $('#toats-header').addClass(color)
    $('.toast-header').html('<strong class="mr-auto text-white">'+title+'</strong><button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>')
    $('.toast-body').html(content)
    $('.toast').toast('show');
}


showSuccessToast = function(text,timeout=3000) {
    resetToastPosition();
    $.toast({
        heading: 'Sucesso',
        text: text,
        hideAfter: timeout,
        showHideTransition: 'slide',
        icon: 'success',
        loaderBg: '#f96868',
        position: 'top-right'
    })
};
showInfoToast = function(text,timeout=3000) {
    resetToastPosition();
    $.toast({
        heading: 'Informação',
        text: text,
        hideAfter: timeout,
        showHideTransition: 'slide',
        icon: 'info',
        loaderBg: '#46c35f',
        position: 'top-right'
    })
};
showWarningToast = function(text,timeout=3000) {
    resetToastPosition();
    $.toast({
        heading: 'Alerta',
        text: text,
        hideAfter: timeout,
        showHideTransition: 'slide',
        icon: 'warning',
        loaderBg: '#57c7d4',
        position: 'top-right'
    })
};
showDangerToast = function(text,timeout) {
    resetToastPosition();
    $.toast({
        heading: 'Falha',
        hideAfter: timeout,
        text: text,
        showHideTransition: 'slide',
        icon: 'error',
        loaderBg: '#f2a654',
        position: 'top-right'
    })
};

resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
        "top": "",
        "left": "",
        "bottom": "",
        "right": ""
    }); //to remove previous position style
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
