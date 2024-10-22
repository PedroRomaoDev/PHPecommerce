<?php
//Arquivo responsável por deslogar o usuário
session_start();
if (isset($_SESSION["idUsuario"])) {
    $usuarioLogin = "";
    unset($_SESSION["idUsuario"]);
    session_destroy();
    header("location:../index.php");
    exit;
}
