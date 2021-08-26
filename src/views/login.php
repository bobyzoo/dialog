<?php
ob_end_clean();
session_start();
if (!empty($_SESSION["login"])) {
    header("Location: " . url_pesquisa(""));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DialogPsi - Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= url("assets/vendors/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/ti-icons/css/themify-icons.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/typicons/typicons.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/css/vendor.bundle.base.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/css/shared/style.css") ?>">
    <link rel="shortcut icon" href="<?= url("assets/images/favicon.png") ?>"/>
</head>
<body>
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
                    <div class="slide-content bg-1"></div>
                </div>
                <div class="col-12 col-md-8 h-100 bg-white">
                    <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
                        <form id="FrmLogin" method="post">
                            <h3 class="mr-auto">Vamos entrar no DialogPsi...</h3>
                            <p class="mb-5 mr-auto">Entre com seus dados abaixo.</p>
                            <form action="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="mdi mdi-account-outline"></i>
                        </span>
                                        </div>
                                        <input type="text" class="form-control" name="usu_login" id="usu_login"
                                               placeholder="usuario">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="mdi mdi-lock-outline"></i>
                        </span>
                                        </div>
                                        <input type="password" id="usu_password" name="usu_password"
                                               class="form-control" placeholder="senha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" onclick="setLogin()" class="btn btn-primary submit-btn">Login
                                    </button>
                                    <a href="cadastrar/novo"
                                       class="btn text-white btn-primary submit-btn ">Cadastrar</a>
                                </div>
                            </form>
                            <div class="wrapper mt-5 text-gray">
                                <p class="footer-text">Copyright © 2021 DialogPsi. Todos os direitos reservados.</p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>
<script src="<?= url("assets/js/shared/off-canvas.js") ?>"></script>
<script src="<?= url("assets/js/shared/hoverable-collapse.js") ?>"></script>
<script src="<?= url("assets/js/shared/misc.js") ?>"></script>
<script src="<?= url("assets/js/shared/settings.js") ?>"></script>
<script src="<?= url("assets/js/shared/todolist.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>

<script>
    function setLogin() {
        $.ajax({
            type: "POST",
            url: "getLogin",
            data: $('#FrmLogin').serialize(),
            success: function (data) {
                if (data == "1") {
                    showToast("Sucesso!", "Login efetuado com sucesso.")
                    window.location.href = "<?=url_pesquisa("")?>"
                } else {
                    showToast("Error !", "Usuario ou senha incorretos", "bg-danger")
                }
                document.getElementById("FrmLogin").reset();
                console.log(data)
            },
            error: function () {
                alert('Error');
            }
        });
    }

</script>
</body>
</html>