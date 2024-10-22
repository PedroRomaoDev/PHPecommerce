<?php
 
  require_once "../Model/UsuarioDTO.php";
  require_once "../Model/UsuarioDAO.php";

   $UsuarioDTO = new UsuarioDTO(); 
   $nome = strip_tags($_POST["nome"]);
   $email = strip_tags($_POST["email"]);
   $senha = MD5($_POST["senha"]);
   $telefone = strip_tags($_POST["telefone"]);
   $cidade = strip_tags($_POST["cidade"]);
   $estado = strip_tags($_POST["estado"]);
   $perfil = strip_tags($_POST["perfil"]);
   $isAdmin = 0;

   $UsuarioDTO->setNome($nome);
   $UsuarioDTO->setEmail($email);
   $UsuarioDTO->setSenha($senha);
   $UsuarioDTO->setTelefone($telefone);
   $UsuarioDTO->setCidade($cidade);
   $UsuarioDTO->setEstado($estado);
   $UsuarioDTO->setPerfil($perfil);
   

   //echo '<pre>';var_dump($UsuarioDTO->getUsuario());exit();

   $UsuarioDAO = new UsuarioDAO();
   try {
      $UsuarioCadastro = $UsuarioDAO->cadastrarUsuario($UsuarioDTO);
      if($UsuarioCadastro) {
        
          $msg = "Usuário cadastrado com sucesso.";
      } else {
          $msg = "Falha ao cadastrar usuário.";
      }
  } catch(PDOException $e) {
      $msg = "Ocorreu um erro no banco de dados. Por favor, tente novamente mais tarde.";
  }
  header("location:../index.php?msg=$msg");
  exit;
