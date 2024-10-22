<?php

require_once 'Conexao.php';

$idAnuncio = filter_input(INPUT_POST,'idAnuncio');
$nomeAnuncio = filter_input(INPUT_POST,'nomeAnuncio');
$valorAnuncio = filter_input(INPUT_POST,'valorAnuncio');
$imagem_produto = filter_input(INPUT_POST,'imagem_produto');
$avaliacoesAnuncio = filter_input(INPUT_POST,'avaliacoesAnuncio');
$tamanho = filter_input(INPUT_POST,'tamanho');
$cores = filter_input(INPUT_POST,'cores');

if($idAnuncio && $nomeAnuncio && $valorAnuncio && $imagem_produto && $avaliacoesAnuncio && $tamanho && $cores){
    $sql = $pdo->prepare("UPDATE anuncio SET nomeAnuncio = :nomeAnuncio, valorAnuncio = :valorAnuncio, imagem_produto = :imagem_produto, avaliacoesAnuncio = :avaliacoesAnuncio, cores = :cores, tamanho = :tamanho WHERE idAnuncio = :idAnuncio");
    $sql->bindParam(':nomeAnuncio',$nomeAnuncio);
    $sql->bindParam(':valorAnuncio',$valorAnuncio);
    $sql->bindParam(':imagem_produto',$imagem_produto);
    $sql->bindParam(':avaliacoesAnuncio',$avaliacoesAnuncio);
    $sql->bindParam(':tamanho',$tamanho);
    $sql->bindParam(':cores',$cores);
    $sql->bindParam(':idAnuncio',$idAnuncio);
    $sql->execute();

    header("Location:tabelaProduto.php");
    exit;

}else{

    header("Location:alterar_produto.php");
    exit;
    
}






?>