<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header("location:../index.php?msg=Usuário e/ou senha inválidos");
    exit;
}
if (!isset($_GET["idUsuario"])) {
    header("location:../index.php?msg=Usuário não selecionado.");
    exit;
}

$usuarioLogin = $_SESSION["nome"];
$idUsuario = $_SESSION["idUsuario"];
$usuarioPerfil = $_SESSION["perfil"];

require_once "../Model/UsuarioDTO.php";
require_once "../Model/UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO();
$idUsuario = $_GET["idUsuario"];

$usuario = $usuarioDAO->buscarUsuarioPorId($idUsuario);

if ($usuario == Null) {
    header("location:../index.php?msg=Usuário não encontrado!");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SendStyle</title>
    <link rel="stylesheet" href="../css/Cadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
    <form class="login" action="../Control/AlterarUsuarioControl.php?acao=alterar" method="POST">
        <h2 style="color: rgb(255, 255, 255);">
            Criar Conta

        </h2>
        <br>
        <div class="box">
            <input type="hidden" name="idUsuario" value="<?php echo $usuario["idUsuario"]; ?>">
            <input type="text" name="nome" value="<?php echo $usuario["nome"]; ?>" required>
            <label>Nome De Usuário</label>
        </div>

        <div class="input-group">
            <input type="number" name="telefone" value="<?php echo $usuario["telefone"]; ?>" required>
            <label>Telefone</label>
        </div>

        <div class="input-group">
            <input type="text" name="estado" value="<?php echo $usuario["estado"]; ?>" required>
            <label>Estado</label>
        </div>

        <div class="input-group">
            <input type="text" name="cidade" value="<?php echo $usuario["cidade"]; ?>" required>
            <label>Cidade</label>
        </div>

        <div class="input-group">
            <input type="text" name="email" value="<?php echo $usuario["email"]; ?>" required>
            <label>E-mail</label>
        </div>
        
        <div class="input-group">
            <input type="password" name="senha" value="">
            <input type="hidden" name="senhaOriginal" value="<?php echo $usuario["senha"]; ?>">
            <label>Senha (só digite se for alterar)</label>
        </div>
        
        <?php
        if (isset($usuarioPerfil)) {
            if ($usuarioPerfil == "Administrador") {
                echo '<div class="input-group">
                    <label>Perfil do Usuário:</label>
                    <select name="perfil">';
                echo '<option value="Administrador"';
                $selected = " ";
                if ($usuario["perfil"] == "Administrador") {
                    $selected = " selected ";
                }
                echo  "$selected>Administrador</option>";
                //para usuario
                $selected = " ";
                if ($usuario["perfil"] == "Usuário") {
                    $selected = " selected ";
                }
                echo '<option value="Usuário"';
                echo  "$selected>Usuário</option>";
                echo '</select><br>';

                echo '</div><br><br>';
                echo '<div class="input-group">
                <label>Situação</label>
                <select name="situacao">';
                //ativo
                $selected = " ";
                if ($usuario["situacao"] == "Ativo") {
                    $selected = " selected ";
                }
                echo '<option value="Ativo"';
                echo "$selected>Ativo</option>";
                //inativo
                $selected = " ";
                if ($usuario["situacao"] == "Inativo") {
                    $selected = " selected ";
                }
                echo '<option value="Inativo"';
                echo "$selected>Inativo</option>";

                echo '</select>
                <br>
                </div><br><br>';
            }
        } else {
            echo '<input type="hidden" name="situacao" value="' . $usuario["situacao"] . '; ?>">';
            echo '<input type="hidden" name="perfil" value="value="' . $usuario["perfil"] . '; ?>">';
        }
        ?>

        <div class="input-group">
            <input href="../View/listarusuario.php" type="submit" value="Salvar">

        </div>

        <a href="../View/listarusuario.php" class="btn">
            Voltar
        </a>
    </form>
</body>

</html>