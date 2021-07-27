<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= url("assets/vendors/mdi/css/materialdesignicons.min.css")?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css")?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/ti-icons/css/themify-icons.css")?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/typicons/typicons.css")?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/css/vendor.bundle.base.css")?>">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= url("assets/css/demo_3/style.css")?>">
    <!-- End Layout styles -->
    <!-- Plugin css for this page -->
    <link rel="shortcut icon" href="<?= url("assets/images/favicon.png")?>"/>
</head>
<body class="dark-theme">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                        <div class="col-lg-6 text-lg-right pr-lg-4">
                            <h1 class="display-1 mb-0"><?=$error?></h1>
                        </div>
                        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                            <h2>SORRY!</h2>
                            <h3 class="font-weight-light"><?=$frase?></h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center mt-xl-2">
                            <a class="text-white font-weight-medium" href="<?=URL_BASE?>">Back to home</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 mt-xl-2">
                            <p class="text-white font-weight-medium text-center">Copyright &copy; 2018 All rights reserved.</p>
                        </div>
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
<script src="<?= url("assets/vendors/js/vendor.bundle.base.js")?>"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= url("assets/js/shared/off-canvas.js")?>"></script>
<script src="<?= url("assets/js/shared/hoverable-collapse.js")?>"></script>
<script src="<?= url("assets/js/shared/misc.js")?>"></script>
<script src="<?= url("assets/js/shared/settings.js")?>"></script>
<script src="<?= url("assets/js/shared/todolist.js")?>"></script>
<!-- endinject -->
</body>
</html>