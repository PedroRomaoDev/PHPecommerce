<?php
session_start();
// Valida se existe SESSÃO aberta
if (!isset($_SESSION["idUsuario"])) {
   header("location:../index.php?msg=Usuário e/ou senha inválidos");
   exit;
}

if (!isset($_POST["idUsuario"])) {
   header("location:../index.php?msg=Usuário não selecionado!");
   exit;
}
require_once "../Model/UsuarioDTO.php";
require_once "../Model/UsuarioDAO.php";

$usuarioDTO = new UsuarioDTO();

//PASSA OS CAMPOS INPUT PARA OS CAMPOS DTO
//$usuarioDTO->setIdUsuario("");
//$nomeUsuario = strip_tags($_POST["nomeUsuario"]);

$nome = strip_tags($_POST["nome"]);
$email = strip_tags($_POST["email"]);
$situacao = $_POST["situacao"];
$perfil = $_POST["perfil"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$idUsuario = $_POST["idUsuario"];
//valida se houve alteração de senha

if (empty($_POST["senha"])) {
   $senha = $_POST["senhaOriginal"]; //senha da base de dados criptografada
} else {
   $senha = MD5($_POST["senha"]);
}
$situacao = $_POST["situacao"];
$perfil = $_POST["perfil"];

$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);
$usuarioDTO->setEstado($estado);
$usuarioDTO->setCidade($cidade);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setSituacao($situacao);
$usuarioDTO->setPerfil($perfil);
$usuarioDTO->setidUsuario($idUsuario);

$usuarioDAO = new UsuarioDAO();

$usuarioCadastro = $usuarioDAO->alterarUsuario($usuarioDTO);

if ($usuarioCadastro) {
   $msg = "Usuário Alterado com sucesso";
} else {
   $msg = "FalhaUsuário no Cadastrado de Usuário.";
}
if ($perfilLogin == "1") {
   header("location:../View/listarusuario.php?msg=$msg");
} else {
   header("location:../index.php?msg=$msg");
}
