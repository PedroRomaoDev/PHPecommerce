<?php
require_once "Conexao.php";
require_once "UsuarioDTO.php";

class UsuarioDAO
{
    // Login do usuario
    public function login($email, $senha)
    {
        $pdo = Conexao::getInstance();
        $sql = "SELECT *
                FROM `usuario`
                WHERE `email` = :email AND `senha` = :senha;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retorno;
    }

    // Cadastrar Cliente
    public function cadastrarUsuario(UsuarioDTO $UsuarioDTO)
    {
        try {
            $con = Conexao::getInstance();

            echo '<pre>';
            var_dump($UsuarioDTO->getUsuario());
            $sql = "INSERT INTO `usuario`(`nome`,`telefone`, `email`, `senha`,`cidade`, `estado`,`perfil`, `isAdmin`)
                    VALUES (:nome, :telefone, :email, :senha, :cidade, :estado, :perfil, :isAdmin);";

            $stmt = $con->prepare($sql);

            $stmt->bindValue(":nome", $UsuarioDTO->getNome());
            $stmt->bindValue(":email", $UsuarioDTO->getEmail());
            $stmt->bindValue(":senha", $UsuarioDTO->getSenha());
            $stmt->bindValue(":telefone", $UsuarioDTO->getTelefone());
            $stmt->bindValue(":cidade", $UsuarioDTO->getCidade());
            $stmt->bindValue(":estado", $UsuarioDTO->getEstado());
            $stmt->bindValue(":perfil", $UsuarioDTO->getPerfil());
            $stmt->bindValue(":isAdmin", $UsuarioDTO->getIsAdmin());

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo '<pre>';
            var_dump($e->getMessage());
            exit();
            echo $e->getMessage();
            die();
        }
    }

    // Buscar Cliente por ID
    public function buscarUsuarioPorId($idUsuario)
    {
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM `Usuario`
                    WHERE idUsuario = :idUsuario;";

            $stmt = $con->prepare($sql);

            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    // Alterar Cliente
    public function alterarUsuario(UsuarioDTO $UsuarioDTO)
    {
        try {
            //`nome`, `telefone`, `email`, `senha`, `estado`, `cidade`, `perfil`, `isAdmin`, `situacao`) VALUES 
            $con = Conexao::getInstance();
            $sql = "UPDATE usuario SET
                        nome = :nome,
                        email = :email,
                        senha = :senha,
                        telefone = :telefone,
                        cidade = :cidade,
                        estado = :estado,
                        perfil = :perfil,
                        situacao = :situacao
                    WHERE idUsuario = :idUsuario;";

            $stmt = $con->prepare($sql);

            $stmt->bindValue(":nome", $UsuarioDTO->getNome());
            $stmt->bindValue(":email", $UsuarioDTO->getEmail());
            $stmt->bindValue(":senha", $UsuarioDTO->getSenha());
            $stmt->bindValue(":telefone", $UsuarioDTO->getTelefone());
            $stmt->bindValue(":cidade", $UsuarioDTO->getCidade());
            $stmt->bindValue(":estado", $UsuarioDTO->getEstado());
            $stmt->bindValue(":perfil", $UsuarioDTO->getPerfil());
            $stmt->bindValue(":situacao", $UsuarioDTO->getSituacao());
            $stmt->bindValue(":idUsuario", $UsuarioDTO->getIdUsuario());

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    // Listar Clientes
    public function listarUsuario()
    {
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM `Usuario`
                    ORDER BY nome;";

            $stmt = $con->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    // Apagar Cliente
    public function apagarUsuario($idUsuario)
    {
        try {
            $con = Conexao::getInstance();
            $sql = "DELETE FROM `Usuario`
                    WHERE idUsuario = :idUsuario;";

            $stmt = $con->prepare($sql);

            $stmt->bindParam(":idUsuario", $idUsuario);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}
