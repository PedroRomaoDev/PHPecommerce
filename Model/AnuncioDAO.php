<?php
require_once 'Conexao.php';
require_once "AnuncioDTO.php";

Class AnuncioDAO {

    //Função de logan no sistema
    ///
    //public function anuncio($idAnuncio, $idAnuncio, $nomeAnuncio,$valorAnuncio,$imagem_produto,$avaliacoesAnuncio, $tamanho, $descAnuncio, $cores){
    public function Anuncio()
    {

        $pdo = Conexao::getInstance();

        $sql = "SELECT *
                    FROM `anuncio`
                    order by nomeAnuncio";
        $stmt = $pdo->prepare($sql);
        /*$stmt->bindParam(":nomeAnuncio", $nomeAnuncio); 
            $stmt->bindParam(":nomeAnuncio", $nomeAnuncio);
            $stmt->bindParam(":valorAnuncio", $valorAnuncio);
            $stmt->bindParam(":imagem_produto", $imagem_produto);
            $stmt->bindParam(":avaliacoesAnuncio", $avaliacoesAnuncio);
            $stmt->bindParam(":tamanho", $tamanho);
            $stmt->bindParam(":descAnuncio", $descAnuncio);
            $stmt->bindParam(":cores", $cores);
            */
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $retorno;
    }


    public function cadastrarAnuncio(AnuncioDTO $anuncioDTO)
    {
        try {
            $con = Conexao::getInstance();
            $sql = "INSERT INTO `anuncio`( 
                `nomeAnuncio`, `valorAnuncio`, `imagem_produto`, 
                `avaliacoesAnuncio`,`tamanho`,`descAnuncio`, `cores`, `idUsuario`, `idAvaliacao`) 
                VALUES ( :nomeAnuncio, :valorAnuncio, :imagem_produto, 
                :avaliacoesAnuncio, :tamanho, :descAnuncio, :cores, :idUsuario, :idAvaliacao);";

            $stmt = $con->prepare($sql);

            $nomeAnuncio = $anuncioDTO->getNomeAnuncio();
            $valorAnuncio = $anuncioDTO->getValorAnuncio();
            $imagem_produto = $anuncioDTO->getImagem_produto();
            $avaliacoesAnuncio = $anuncioDTO->getAvaliacoesAnuncio();
            $tamanho = $anuncioDTO->getTamanho();
            $descAnuncio = $anuncioDTO->getDescAnuncio();
            $cores = $anuncioDTO->getCores();
            $idUsuario = $anuncioDTO->getIdUsuario();
            $idAvaliacao = $anuncioDTO->getIdAvaliacao();

            $stmt->bindParam(":nomeAnuncio",$nomeAnuncio);
            $stmt->bindParam(":valorAnuncio", $valorAnuncio);
            $stmt->bindParam(":imagem_produto", $imagem_produto);
            $stmt->bindParam(":avaliacoesAnuncio", $avaliacoesAnuncio);
            $stmt->bindParam(":tamanho", $tamanho);
            $stmt->bindParam(":descAnuncio", $descAnuncio);
            $stmt->bindParam(":cores", $cores);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->bindParam(":idAvaliacao", $idAvaliacao);


            $retorno = $stmt->execute();

            return $retorno;
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    public function listarAnuncio()
    {
        try{
            $con = Conexao::getInstance();
            $sql = "SELECT *
        FROM `anuncio`";
            
            $stmt = $con->prepare($sql);
            
            $stmt->execute();    
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;

        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
    

    public function alteraranuncio(AnuncioDTO $anuncioDTO)
    {
        try {
            $con = Conexao::getInstance();
            $sql = "UPDATE `anuncio` SET
            nomeAnuncio = :nomeAnuncio, valorAnuncio = :valorAnuncio,
            imagem_produto = :imagem_produto, avaliacoesAnuncio = :avaliacoesAnuncio, descAnuncio = :descAnuncio) 
            WHERE idAnuncio = :idAnuncio;";

            $stmt = $con->prepare($sql);

            $stmt->bindParam(":idAnuncio", $anuncioDTO->getidAnuncio());
            $stmt->bindParam(":nomeAnuncio", $anuncioDTO->getnomeAnuncio());
            $stmt->bindParam(":valorAnuncio", $anuncioDTO->getvalorAnuncio());
            $stmt->bindParam(":imagem_produto", $anuncioDTO->getimagem_produto());
            $stmt->bindParam(":avaliacoesAnuncio", $anuncioDTO->getavaliacoesAnuncio());
            $stmt->bindParam(":tamanho", $anuncioDTO->gettamanho());
            $stmt->bindParam(":descAnuncio", $anuncioDTO->getdescAnuncio());
            $stmt->bindParam(":cores", $anuncioDTO->getcores());

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function apagaranuncio(AnuncioDTO $anuncioDTO)
    {
        try {
            $con = Conexao::getInstance();
            $sql = "UPDATE `anuncio` SET  
            idAnuncio = :idAnuncio, 
            nomeAnuncio = :nomeAnuncio, valorAnuncio = :valorAnuncio,
            imagem_produto = :imagem_produto, avaliacoesAnuncio = :avaliacoesAnuncio,
            tamanho = :tamanho, descAnuncio = :descAnuncio, cores = :cores)
            WHERE idAnuncio = :idAnuncio;";

            $stmt = $con->prepare($sql);

            $stmt->bindParam(":idAnuncio", $anuncioDTO->getidAnuncio());
            $stmt->bindParam(":nomeAnuncio", $anuncioDTO->getnomeAnuncio());
            $stmt->bindParam(":valorAnuncio", $anuncioDTO->getvalorAnuncio());
            $stmt->bindParam(":imagem_produto", $anuncioDTO->getimagem_produto());
            $stmt->bindParam(":avaliacoesAnuncio", $anuncioDTO->getavaliacoesAnuncio());
            $stmt->bindParam(":tamanho", $anuncioDTO->gettamanho());
            $stmt->bindParam(":descAnuncio", $anuncioDTO->getdescAnuncio());
            $stmt->bindParam(":cores", $anuncioDTO->getcores());

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}
?>
