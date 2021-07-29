

<?php

use Source\Controllers\CreateFormController;

$CreateFormController = new CreateFormController();

$CreateFormController->createForm("Rdp",1);

?>



<script>
    $('#barra-emocao').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: false
    });
    $('#barra-1').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: false
    });
</script>