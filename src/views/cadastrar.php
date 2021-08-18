<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= url("assets/vendors/owl-carousel-2/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/owl-carousel-2/owl.theme.default.min.css") ?>">


    <link rel="stylesheet" href="<?= url("assets/vendors/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/ti-icons/css/themify-icons.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/typicons/typicons.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/css/vendor.bundle.base.css") ?>">

    <link rel="stylesheet" href="<?= url("assets/css/shared/style.css") ?>">
    <link rel="shortcut icon" href="<?= url("assets/images/favicon.png") ?>"/>
    <style>
        .hide {
            display: none;
        }
    </style>
</head>
<body class="dark-theme">
<div class="toast mt-3 hide position-absolute " style="z-index: 100000; right: 15px" data-autohide="false" role="alert"
     aria-live="assertive" aria-atomic="true" >
    <div class="toast-header" id="toats-header">
    </div>
    <div class="toast-body">
    </div>
</div>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper auth p-0 theme-two">
            <div class="row d-flex align-items-stretch">
                <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
                    <div class="slide-content bg-2"></div>
                </div>
                <div class="col-12 col-md-8 h-100 card">
                    <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
                        <div class="nav-get-started">
                            <p>Already have an account?</p>
                            <a class="btn get-started-btn" href="<?=url_pesquisa("login")?>">SIGN IN</a>
                        </div>
                        <form id="FrmCadastroUsuario" method="post" action="<?=url_pesquisa("setCadastro")?>">
                            <h3 class="mr-auto">Cadastrar</h3>
                            <p class="mb-5 mr-auto">Insira seus dados abaixo.</p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="label text-muted mt-2">Eu sou ...</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                               name="usuario_tipo"
                                                               id="radio_tipo_usuario_1" value="psicologo"
                                                               onchange="changeUserType()"
                                                               checked="checked"> Psicologo <i
                                                                class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                               name="usuario_tipo" onchange="changeUserType()"
                                                               id="radio_tipo_usuario_2"
                                                               value="paciente" <?= $codigo_ativacao != "novo" ? "checked" : "" ?>>
                                                        Paciente
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="label text-muted mt-2">Email*</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="email" class="form-control" name="usu_email" id="usu_email"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="label text-muted mt-2">Usuario*</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control" name="usu_login" id="usu_login"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="label text-muted mt-2">Senha*</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="password" class="form-control" name="usu_password"
                                                   id="usu_password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4"><label
                                                    class="label text-muted mt-2">Nome*</label></div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="usu_nome" id="usu_nome" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4"><label
                                                    class="label text-muted mt-2">Data de nascimento*</label></div>
                                        <div class="form-group col-md-8">
                                            <input type="date" id="usu_data_nascimento" name="usu_data_nascimento"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4"><label
                                                    class="label text-muted mt-2">Telefone</label></div>
                                        <div class="form-group col-md-8">
                                            <input type="text" name="usu_telefone" id="usu_telefone"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                    <div id="content-psicologo-step-2"
                                         class="<?= $codigo_ativacao != "novo" ? "hide" : "" ?>">
                                        <div class="row">
                                            <div class="form-group col-md-4"><label
                                                        class="label text-muted mt-2">Numero do CRP*</label></div>
                                            <div class="form-group col-md-8">
                                                <input type="text" id="psi_numero_crp" name="psi_numero_crp"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="content-paciente-step-2"
                                         class="<?= $codigo_ativacao != "novo" ? "" : "hide" ?>">
                                        <div class="row">
                                            <div class="form-group col-md-4"><label
                                                        class="label text-muted mt-2">Nome de contato para
                                                    emergencia*</label></div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" id="pac_nome_contato_emergencia"
                                                       name="pac_nome_contato_emergencia">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4"><label class="label text-muted mt-2">Telefone
                                                    de emergencia*</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control"
                                                       name="pac_telefone_contato_emergencia"
                                                       id="pac_telefone_contato_emergencia">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4"><label
                                                        class="label text-muted mt-2">Codigo de ativação*</label></div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="psi_codigo_ativacao"
                                                       id="psi_codigo_ativacao"
                                                       value="<?= $codigo_ativacao != "novo" ? $codigo_ativacao : "" ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper mt-5 text-gray">
                                <p class="footer-text">Copyright © 2018 Bootstrapdash. All rights reserved.</p>
                                <ul class="auth-footer text-gray">
                                    <li>
                                        <a href="#">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Cookie Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    function changeUserType() {
        console.log(document.querySelector('input[name="usuario_tipo"]:checked').value)
        if (document.querySelector('input[name="usuario_tipo"]:checked').value == "psicologo") {
            hideDiv("content-paciente-step-2")
            showDiv("content-psicologo-step-2")
        } else {
            hideDiv("content-psicologo-step-2")
            showDiv("content-paciente-step-2")
        }
    }

    $("#FrmCadastroUsuario").validate({
        rules: {
            usu_login: "required",
            usu_nome: "required",
            psi_numero_crp: "required",
            usu_data_nascimento: "required",
            pac_nome_contato_emergencia: "required",
            pac_telefone_contato_emergencia: "required",
            psi_codigo_ativacao: "required",
            usu_password: {
                required: true,
                minlength: 5,
                maxlength: 15,
            },
            usu_email: {
                required: true,
                email: true
            }
        },
        messages: {
            usu_email: "Insira o email",
            usu_login: "Insira o login",
            usu_nome: "Insira o celular",
            psi_numero_crp: "Insira o seu numero de CRP",
            usu_data_nascimento: "Insira sua data de nascimento",
            pac_nome_contato_emergencia: "Insira um nome para contato de emergencia",
            pac_telefone_contato_emergencia: "Insira o numero do contato de emergencia",
            psi_codigo_ativacao: "Insira o codigo de ativação do psicologo",
            usu_password: {
                required: "Insira a senha",
                minlength: "Sua senha deve ter no minimo 5 caracteres",
                maxlength: "Sua senha deve ter no maximo 15 caracteres"
            },
        },
        errorPlacement: function (label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        },
        submitHandler: function (form, event) {
            var form = $(form);
            event.preventDefault();
            $.ajax({
                type: form.attr('method'),
                data: form.serialize(),
                url: form.attr('action'),
                success: function (data) {
                    console.log(data)
                    if (data == "1"){
                        showToast("Sucesso!", data.split(';')[1])
                        window.location.href = "<?=url_pesquisa("")?>"
                    }else{
                        showToast("Error", data.split(';')[1],"bg-danger")
                    }
                }
            });
        }
    });

</script>
</body>
</html>