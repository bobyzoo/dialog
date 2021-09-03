<?php $v->layout("_theme", [
    "title" => $title
]);
?>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-1to10.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-horizontal.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-movie.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-pill.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-reversed.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/jquery-bar-rating/bars-square.css") ?>"/>
<link rel="stylesheet" href="<?= url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css") ?>"/>
<link rel="stylesheet"
      href="<?= url("assets/vendors/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css") ?>"/>
<!---->

<link rel="stylesheet" href="<?= url("assets/lib/footable/css/footable.bootstrap.min.css") ?>"/>
<style>
    .dataTables_filter {
        display: none;
    }
</style>

<div class="container">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="loader-demo-box position-absolute hide loading" id="loadingTblPacientes">
                <div class="dot-opacity-loader" style="top: 25%">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="card-header">
                <h5 class="mb-0">
                    <div class="text-capitalize"> Monitoramento de humor
                    </div>
                </h5>
            </div>
            <div class="card-body ">
                <div id="table-humor">
                </div>
                <table class="table table-bordered table-striped"></table>
            </div>
        </div>
    </div>
</div>


<?php $v->start("js") ?>
<script src="<?= url("assets/lib/footable/js/footable.min.js") ?>"></script>
<script>


    function getTable() {
        $.ajax({
            url: "<?=url_pesquisa("psicologo/paciente/$paciente->usuario_id/table/listMonitoramentoHumor")?>",
            type: "GET",
            success: function (data) {
                $("#table-humor").html(data)
                configureDataTable('#order-listing', null)
                // $('.table').footable({
                //     "expandFirst": true,
                //     columns:data,
                //     rows: [
                //         {
                //             "id": 1,
                //             "firstName": "Dennise",
                //             "lastName": "Fuhrman",
                //             "jobTitle": "High School History Teacher",
                //             "started": "November 8th 2011",
                //             "dob": "July 25th 1960"
                //         },
                //         {
                //             "id": 2,
                //             "firstName": "Elodia",
                //             "lastName": "Weisz",
                //             "jobTitle": "Wallpaperer Helper",
                //             "started": "October 15th 2010",
                //             "dob": "March 30th 1982"
                //         },
                //         {
                //             "id": 3,
                //             "firstName": "Raeann",
                //             "lastName": "Haner",
                //             "jobTitle": "Internal Medicine Nurse Practitioner",
                //             "started": "November 28th 2013",
                //             "dob": "February 26th 1966"
                //         },
                //         {
                //             "id": 4,
                //             "firstName": "Junie",
                //             "lastName": "Landa",
                //             "jobTitle": "Offbearer",
                //             "started": "October 31st 2010",
                //             "dob": "March 29th 1966"
                //         },
                //         {
                //             "id": 5,
                //             "firstName": "Solomon",
                //             "lastName": "Bittinger",
                //             "jobTitle": "Roller Skater",
                //             "started": "December 29th 2011",
                //             "dob": "September 22nd 1964"
                //         },
                //         {
                //             "id": 6,
                //             "firstName": "Bar",
                //             "lastName": "Lewis",
                //             "jobTitle": "Clown",
                //             "started": "November 12th 2012",
                //             "dob": "August 4th 1991"
                //         },
                //         {
                //             "id": 7,
                //             "firstName": "Usha",
                //             "lastName": "Leak",
                //             "jobTitle": "Ships Electronic Warfare Officer",
                //             "started": "August 14th 2012",
                //             "dob": "November 20th 1979"
                //         },
                //         {
                //             "id": 8,
                //             "firstName": "Lorriane",
                //             "lastName": "Cooke",
                //             "jobTitle": "Technical Services Librarian",
                //             "started": "September 21st 2010",
                //             "dob": "April 7th 1969"
                //         }
                //     ],
                //
                // })
                // configureDataTable('#order-listing',null)
            }
        });
    }

    function deleteItem(aplicacao_questionario_id) {
        $.ajax({
            url: "<?=url_pesquisa("paciente/delete/")?>" + aplicacao_questionario_id,
            type: "GET",
            data: "",
            success: function (data) {
                showToast("Sucesso!", "Apagado com sucesso!")
                getTable()
            }
        });
    }

    function editItem(aplicacao_questionario_id) {
        $.ajax({
            url: "<?=url_pesquisa("paciente/edit/")?>" + aplicacao_questionario_id,
            type: "POST",
            data: "",
            success: function (data) {
                $("#modal").html(data);
                showModal('modalRemote');
            }
        });
    }

    getTable();
</script>
<script src="<?= url("assets/js/shared/data-table.js") ?>"></script>
<?php $v->end("js") ?>
