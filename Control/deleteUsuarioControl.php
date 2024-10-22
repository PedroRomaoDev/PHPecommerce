<?php
session_start();

if (!isset($_SESSION["idUsuario"])) {
    header("location:../index.php?msg=Usuário e/ou senha inválidos");
    exit;
}

if (!isset($_GET["idUsuario"]) || empty($_GET["idUsuario"])) {
    header("location:../View/listarUsuarios.php");
    exit;
}

if ($_GET["idUsuario"] == $_SESSION["idUsuario"]) {
    header("location:../View/listarusuario.php?msg=Usuário não pode se excluir.");
    exit;
}

require_once "../Model/UsuarioDTO.php";
require_once "../Model/UsuarioDAO.php";

$idUsuario= $_GET["idUsuario"];

$UsuarioDAO = new UsuarioDAO();
$UsuarioCadastro = $UsuarioDAO->ApagarUsuario($idUsuario);

if ($UsuarioCadastro) {
    $msg = "Usuário excluído com sucesso";
} else {
    $msg = "Falha na exclusão do usuário";
}

header("location:../View/listarusuario.php?msg=$msg");
?>
