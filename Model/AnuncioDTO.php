<?php

class AnuncioDTO{

    private $idAnuncio;
    private $nomeAnuncio;
    private $valorAnuncio;
    private $imagem_produto;
    private $avaliacoesAnuncio;
    private $descAnuncio;
    private $tamanho;
    private $cores;
    private $idUsuario;
    private $idAvaliacao;


    public function getIdAnuncio(){
        return $this->idAnuncio;
    }

    public function getDescAnuncio(){
        return $this->descAnuncio;
    }

    public function getNomeAnuncio(){
        return $this->nomeAnuncio;
    }


    public function getValorAnuncio(){
        return $this->valorAnuncio;
    }

    public function getImagem_produto(){
        return $this->imagem_produto;
    }

    public function getAvaliacoesAnuncio(){
        return $this->avaliacoesAnuncio;
    }

    public function getTamanho(){
        return $this->tamanho;
    }

    public function getCores(){
        return $this->cores;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getIdAvaliacao(){
        return $this->idAvaliacao;
    }

    //FIM DA FUNCTION GET//
    //COMEÇO DA FUNCTION SET//

    public function setIdAnuncio($idAnuncio){
        $this->idAnuncio= $idAnuncio;
    }

    public function setDescAnuncio($descAnuncio){
        $this->descAnuncio= $descAnuncio;
    }

    public function setNomeAnuncio($nomeAnuncio){
        $this->nomeAnuncio = $nomeAnuncio;
    }

    public function setValorAnuncio($valorAnuncio){
        $this->valorAnuncio = $valorAnuncio;
    }

    public function setImagem_produto($imagem_produto){
        $this->imagem_produto = $imagem_produto;
    }

    public function setAvaliacoesAnuncio($avaliacoesAnuncio){
        $this->avaliacoesAnuncio = $avaliacoesAnuncio;
    }

    public function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    public function setCores($cores){
        $this->cores = $cores;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function setIdAvaliacao($idAvaliacao){
        $this->idAvaliacao = $idAvaliacao;
    }

}

?>