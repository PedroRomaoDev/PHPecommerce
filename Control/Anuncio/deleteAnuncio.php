<?php

require_once 'conexao.php';
require_once '../Model/AnuncioDAO.php';

$AnuncioDAO = new AnuncioDAO($pdo);

$idAnuncio = filter_input(INPUT_GET,'idAnuncio');

if($id_produto){
    $AnuncioDAO->delete($idAnuncio);
}

header("Location:tabelaProduto.php");

?>