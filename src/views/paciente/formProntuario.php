<link rel="stylesheet" href="<?= url() ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/typicons/typicons.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/summernote/dist/summernote-bs4.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/quill/quill.snow.css">
<link rel="stylesheet" href="<?= url() ?>/assets/vendors/simplemde/simplemde.min.css">
<link rel="shortcut icon" href="<?= url() ?>/assets/images/favicon.png"/>


<div class="modal fade" id="modalRemote" tabindex="-1" role="dialog"
     aria-labelledby="modalRemoteLabel" style="display: none;" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="loader-demo-box position-absolute loading hide" id="loadingFrmProntuario">
                <div class="dot-opacity-loader">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="modalRemoteLabel">Adicionar paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="somepage" class="forms-sample" id="frmProntuario">
                <div class="modal-body">

                    <textarea id='text_prontuario' name="text_prontuario"></textarea>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnSetProntuaio" onclick="setProntuario()" class="btn btn-sm btn-success">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?= url() ?>/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= url() ?>/assets/vendors/summernote/dist/summernote-bs4.min.js"></script>
<script src="<?= url() ?>/assets/vendors/tinymce/tinymce.min.js"></script>
<script src="<?= url() ?>/assets/vendors/quill/quill.min.js"></script>
<script src="<?= url() ?>/assets/vendors/simplemde/simplemde.min.js"></script>
<script src="<?= url() ?>/assets/js/shared/off-canvas.js"></script>
<script src="<?= url() ?>/assets/js/shared/hoverable-collapse.js"></script>
<script src="<?= url() ?>/assets/js/shared/misc.js"></script>
<script src="<?= url() ?>/assets/js/shared/settings.js"></script>
<script src="<?= url() ?>/assets/js/shared/todolist.js"></script>

<script>
    function getPaciente() {
        $.ajax({
            type: "POST",
            url: "prontuario/getProntuario",
            data: { "id_user" : <?=$id_user?>},
            success: function (data) {
                tinymce.init({
                    selector: '#text_prontuario',
                    height: 500,
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                    ],
                    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                    setup: function (editor) {
                        editor.on('init', function (e) {
                            tinymce.get("text_prontuario").setContent(data);
                        });
                    },
                    image_advtab: true,
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
            },
            error: function () {
                alert('Error');
            }
        });
    }
    getPaciente()




    function setProntuario() {
        showDiv("loadingFrmProntuario");
        $.ajax({
            type: "POST",
            url: "prontuario/setProntuario",
            data: {"texto": tinyMCE.get('text_prontuario').getContent(),
                    "id_user" : <?=$id_user?>},
            success: function (data) {
                hideModal("modalRemote");
                hideDiv("loadingFrmProntuario");
            },
            error: function () {
                alert('Error');
            }
        });
    }

</script>
<script src="<?= url() ?>/assets/js/shared/editorDemo.js"></script>
