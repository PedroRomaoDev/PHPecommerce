<?php
session_start();
if (!isset($_POST["senha"]) || empty($_POST["senha"])) {
  header("location:../View/login.php?msg=Usuário e/ou senha inválidos");
  exit;
}
require_once "../Model/UsuarioDTO.php";
require_once "../Model/UsuarioDAO.php";
$email = strip_tags($_POST["email"]);
$senha = MD5($_POST["senha"]);
$usuarioDAO = new UsuarioDAO();
$usuarioLogin = $usuarioDAO->login($email, $senha);

if (!empty($usuarioLogin)) {

  $_SESSION["idUsuario"] = $usuarioLogin["idUsuario"];
  $_SESSION["email"] = $usuarioLogin["email"];
  $_SESSION["nome"] = $usuarioLogin["nome"];
  $_SESSION["perfil"] = $usuarioLogin["perfil"];
  $_SESSION["isAdmin"] = $usuarioLogin["isAdmin"];


  header("location:../index.php");
  exit;
} else {

  header("location:../View/login.php?msg=Usuário e/ou senha inválidos");
  exit;
}
