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
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->

<!--    <link rel="stylesheet" href="--><?//= url("assets/lib/prism/prims.css") ?><!--"/>-->
    <link rel="stylesheet" href="<?= url("assets/vendors/mdi/css/materialdesignicons.min.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/ti-icons/css/themify-icons.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/typicons/typicons.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/css/vendor.bundle.base.css") ?>"/>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= url("assets/vendors/jvectormap/jquery-jvectormap.css") ?>"/>

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>"/>
    <!-- End Plugin css for this page -->

    <link rel="stylesheet" href="<?= url("assets/css/shared/style.css") ?>">
    <!-- endinject -->
    <link rel="stylesheet" href="<?= url("assets/css/demo_9/style.css") ?>">



    <link rel="stylesheet" href="<?= url("assets/vendors/dropzone/dropzone.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-1to10.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-horizontal.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-movie.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-pill.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-reversed.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bootstrap-stars.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/css-stars.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/examples.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/fontawesome-stars-o.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/fontawesome-stars.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-asColorPicker/css/asColorPicker.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/x-editable/bootstrap-editable.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/dropify/dropify.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-file-upload/uploadfile.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-tags-input/jquery.tagsinput.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css") ?>">


    <link rel="stylesheet"href="<?= url("assets/vendors/jquery-toast-plugin/jquery.toast.min.css") ?>">
    <link rel="shortcut icon" href="<?= url("assets/images/favicon.png") ?>"/>

    <link rel="stylesheet" href="<?= url("assets/css/Utils.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/css/glyphicons.css") ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!--  CSS TEXT EDITOR  -->
    <link rel="stylesheet" href="<?= url("assets/vendors/summernote/dist/summernote-bs4.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/quill/quill.snow.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/simplemde/simplemde.min.css") ?>">

    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-1to10.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-horizontal.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-movie.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-pill.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-reversed.css") ?>"/>
    <link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>"/>

</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="hero-banner">
                <?php require __DIR__ . "/partials/_navbar.phtml" ?>
            </div>
            <div class="content-wrapper container-wrapper-width">
                <!-- partial:partials/_sidebar.html -->
                <?php require __DIR__ . "/partials/_sidebar.phtml" ?>
                <!-- partial -->
                <div class="content-area">
                    <div class="page-header">
                        <div class="info-section">
                        </div>
                        <div class="page-header-content">
                        </div>
                    </div>
                    <div class="content-area-inner">
                        <div id="modal"></div>
                        <div class="row">
                                <?= $v->section("content"); ?>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?=url("assets/vendors/js/vendor.bundle.base.js")?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?=url("assets/vendors/chart.js/Chart.min.js")?>"></script>
<script src="<?=url("assets/vendors/jvectormap/jquery-jvectormap.min.js")?>"></script>
<script src="<?=url("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js")?>"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?=url("assets/js/shared/off-canvas.js")?>"></script>
<script src="<?=url("assets/js/shared/hoverable-collapse.js")?>"></script>
<script src="<?=url("assets/js/shared/misc.js")?>"></script>
<script src="<?=url("assets/js/shared/settings.js")?>"></script>
<script src="<?=url("assets/js/shared/todolist.js")?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?=url("assets/js/demo_9/dashboard.js")?>"></script>
<script src="<?=url("assets/js/demo_9/script.js")?>"></script>


<script type="text/javascript" src="<?= url("assets/js/printthis/printThis.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-bar-rating/jquery.barrating.min.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-asColor/jquery-asColor.min.js") ?>"></script>

<script src="<?= url("assets/vendors/jquery-asGradient/jquery-asGradient.min.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js") ?>"></script>
<script src="<?= url("assets/vendors/x-editable/bootstrap-editable.min.js") ?>"></script>
<script src="<?= url("assets/vendors/moment/moment.min.js") ?>"></script>
<script src="<?= url("assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js") ?>"></script>
<script src="<?= url("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= url("assets/vendors/dropify/dropify.min.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-file-upload/jquery.uploadfile.min.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-tags-input/jquery.tagsinput.min.js") ?>"></script>
<script src="<?= url("assets/vendors/dropzone/dropzone.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery.repeater/jquery.repeater.min.js") ?>"></script>
<script src="<?= url("assets/vendors/inputmask/jquery.inputmask.bundle.js") ?>"></script>

<script src="<?= url("assets/vendors/jquery-toast-plugin/jquery.toast.min.js") ?>"></script>
<script src="<?= url("assets/js/shared/formpickers.js") ?>"></script>
<script src="<?= url("assets/js/shared/form-addons.js") ?>"></script>
<script src="<?= url("assets/js/shared/x-editable.js") ?>"></script>
<script src="<?= url("assets/js/shared/inputmask.js") ?>"></script>
<script src="<?= url("assets/js/shared/dropify.js") ?>"></script>
<script src="<?= url("assets/js/shared/dropzone.js") ?>"></script>
<script src="<?= url("assets/js/shared/jquery-file-upload.js") ?>"></script>
<script src="<?= url("assets/js/shared/form-repeater.js") ?>"></script>


<script src="<?= url("assets/vendors/jquery-bar-rating/jquery.barrating.min.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script src="<?= url("assets/vendors/datatables.net/jquery.dataTables.js") ?>"></script>
<script src="<?= url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js") ?>"></script>
<script src="<?= url("assets/js/ConfigDataTables.js") ?>"></script>
<?= $v->section("js"); ?>
</body>
</html>