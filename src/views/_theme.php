<?php
ob_end_clean();
session_start();

if (empty($_SESSION["login"])) {
    header("Location: " . url_pesquisa("login"));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dialog - <?= $title; ?></title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= url("assets/vendors/mdi/css/materialdesignicons.min.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/ti-icons/css/themify-icons.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/typicons/typicons.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/css/vendor.bundle.base.css") ?>"/>
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>"/>
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= url("assets/css/shared/style.css") ?>">
    <!-- endinject -->
    <link rel="stylesheet" href="<?= url("assets/css/demo_9/style.css") ?>">

    <link rel="stylesheet" href="<?= url("assets/vendors/summernote/dist/summernote-bs4.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/quill/quill.snow.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/simplemde/simplemde.min.css") ?>">

    <!--    <link rel="stylesheet" href="--><? //= url("assets/vendors/dropify/dropify.min.css") ?><!--"/>-->
    <!-- Plugin css for this page -->
    <!--    <link rel="stylesheet" href="--><? //= url("assets/vendors/jvectormap/jquery-jvectormap.css") ?><!--">-->
    <!-- End Plugin css for this page -->
    <!-- Layout styles -->
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="<?= url("assets/images/favicon.png") ?>"/>

    <link rel="stylesheet" href="<?= url("assets/css/Utils.css") ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <!--  CSS TEXT EDITOR  -->
    <link rel="stylesheet" href="<?= url("assets/vendors/summernote/dist/summernote-bs4.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/quill/quill.snow.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/simplemde/simplemde.min.css") ?>">
</head>
<body>
<div class="toast mt-3 hide position-absolute " style="z-index: 100; right: 15px" data-autohide="false" role="alert"
     aria-live="assertive" aria-atomic="true" >
    <div class="toast-header" id="toats-header">
    </div>
    <div class="toast-body">
    </div>
</div>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="hero-banner">
                <!-- partial:partials/_navbar.html -->
                <?php require __DIR__ . "/partials/_navbar.phtml" ?>
                <!-- partial -->
                <!-- partial:partials/_settings-panel.html -->
                <!--                --><?php //require __DIR__ . "/partials/_settings-panel.html"?>

                <!-- partial -->
            </div>
            <div class="content-wrapper container-wrapper-width">
                <!-- partial:partials/_sidebar.html -->
                <?php require __DIR__ . "/partials/_sidebar.phtml" ?>
                <!-- partial -->
                <div class="content-area">
                    <!--                    <div class="page-header">-->
                    <!--                        <div class="info-section">-->
                    <!--                            <div class="d-flex align-items-center mb-2">-->
                    <!--                                <h4 class="page-title">Hi, welcome back!</h4>-->
                    <!--                                <div class="dropdown">-->
                    <!--                                    <button class="btn dropdown-toggle" type="button" id="reportSummary"-->
                    <!--                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Weekly-->
                    <!--                                    </button>-->
                    <!--                                    <div class="dropdown-menu" aria-labelledby="reportSummary">-->
                    <!--                                        <a class="dropdown-item" href="#">Daily</a>-->
                    <!--                                        <a class="dropdown-item" href="#">Weekly</a>-->
                    <!--                                        <a class="dropdown-item" href="#">Monthly</a>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                            <p class="mb-3 mb-md-0">Your customer Management dashboard template.</p>-->
                    <!--                        </div>-->
                    <!--                        <div class="page-header-content">-->
                    <!--                            <div class="server-load d-block d-sm-flex">-->
                    <!--                                <div class="server-stats d-flex flex-row align-items-end mr-5">-->
                    <!--                                    <div class="server-stats-title mr-4">-->
                    <!--                                        <p class="head-title">Memory Usage</p>-->
                    <!--                                        <h3 class="text-white mb-0 stats-count font-weight-medium">32.44%</h3>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="wrapper">-->
                    <!--                                        <canvas id="server-load-data-chart-1" height="45" width="80"></canvas>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="server-stats d-flex flex-row align-items-end mt-4 mt-sm-0">-->
                    <!--                                    <div class="server-stats-title mr-4">-->
                    <!--                                        <p class="head-title">Disk Usage</p>-->
                    <!--                                        <h3 class="text-white mb-0 stats-count font-weight-medium">52.40%</h3>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="wrapper">-->
                    <!--                                        <canvas id="server-load-data-chart-2" height="45" width="80"></canvas>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="content-area-inner">
                        <?= $v->section("content"); ?>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>


<!-- inject:js -->
<script src="<?= url("assets/js/shared/off-canvas.js") ?>"></script>
<script src="<?= url("assets/js/shared/hoverable-collapse.js") ?>"></script>
<script src="<?= url("assets/js/shared/misc.js") ?>"></script>
<script src="<?= url("assets/js/shared/settings.js") ?>"></script>
<script src="<?= url("assets/js/shared/todolist.js") ?>"></script>
<!-- endinject -->


<script src="<?= url("assets/js/shared/editorDemo.js") ?>"></script>

<script src="<?= url("assets/vendors/js/vendor.bundle.base.js") ?>"
</script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= url("assets/js/shared/off-canvas.js") ?>"></script>
<script src="<?= url("assets/js/shared/hoverable-collapse.js") ?>"></script>
<script src="<?= url("assets/js/shared/misc.js") ?>"></script>
<script src="<?= url("assets/js/shared/settings.js") ?>"></script>
<script src="<?= url("assets/js/shared/todolist.js") ?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?= url("assets/js/demo_9/dashboard.js") ?>"></script>
<script src="<?= url("assets/js/demo_9/script.js") ?>"></script>
<!-- End custom js for this page -->

<?= $v->section("js"); ?>
</body>
</html>