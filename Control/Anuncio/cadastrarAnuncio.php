<?php
  session_start();
  // Valida se existe SESSÃO aberta
  if(!isset($_SESSION["idUsuario"])){
     header ( "location:../index.php?msg=Usuário e/ou senha inválidos" );	
     exit; 
  }
  require_once "../../Model/AnuncioDTO.php";
  require_once "../../Model/AnuncioDAO.php";
  require_once "../UploadControl.php";

  $anuncioDTO = new AnuncioDTO(); 
   
   //PASSA OS CAMPOS INPUT PARA OS CAMPOS DTO

   
  $nomeAnuncio = strip_tags($_POST["nomeAnuncio"]);
  $valorAnuncio = strip_tags($_POST["valorAnuncio"]);
  $tamanho = strip_tags($_POST["tamanho"]);
  //$imagem_produto = strip_tags($_POST["imagem_produto"]);
  $cores = strip_tags($_POST["cores"]);
  $descAnuncio = strip_tags($_POST["descAnuncio"]);
  $idUsuario = $_POST["idUsuario"];
  $idAvaliacao = 1;


  $anuncioDTO->setnomeAnuncio($nomeAnuncio);
  $anuncioDTO->settamanho($tamanho);
 
  $anuncioDTO->setcores($cores);
  $anuncioDTO->setdescAnuncio($descAnuncio);
   $anuncioDTO->setIdUsuario($idUsuario);
   $anuncioDTO->setIdAvaliacao($idAvaliacao);
  $Arquivo = 'imgPadrao.png'; //nome para quando o arquivo nao foi selecionado
  //print_r($_FILES);
  //echo '<hr>';
  if(isset($_FILES["imagem_produto"])){
     $extensoes = array('jpeg', 'jpg', 'jpe', 'gif', 'png', 'pdf');
     $up = new Upload('imagem_produto', '../../uploads', false, $extensoes);
     if($_FILES['imagem_produto']['error']==UPLOAD_ERR_OK)
     {
        $Arquivo = $up->Arquivo;
     }
    }
  $anuncioDTO->setImagem_Produto($Arquivo);

   $anuncioDAO = new AnuncioDAO();
   $anuncioCadastro = $anuncioDAO->cadastrarAnuncio($anuncioDTO);
   

   if($anuncioCadastro) {
  
     $msg="anuncio Cadastrado com sucesso";
     header ( "location:../../index.php?msg=$msg" ); 

  } else {
    $msg="Falha ao Cadastrar anuncio.";  
   }  
  header ( "location:../../index.php?msg=$msg" );	
?>