<?php
session_start();
print_r($_SESSION);


if ($_SESSION['usu_tipo'] == 3) {
    header("Location: " . url_pesquisa("psicologo"));
    die();
} else {
    header("Location: " . url_pesquisa("paciente"));
    die();
}
