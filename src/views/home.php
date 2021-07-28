<?php
session_start();

if ($_SESSION['usu_tipo'] == 3) {
    header("Location: " . url_pesquisa("psicologo"));
    die();
} else if ($_SESSION['usu_tipo'] == 2) {
    header("Location: " . url_pesquisa("paciente"));
    die();
}
header("Location: " . url_pesquisa("login"));
die();