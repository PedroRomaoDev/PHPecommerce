<?php
session_start();

if (isset($_SESSION["idUsuario"])) {
    //print_r($_SESSION);
    $usuarioLogin = $_SESSION["nome"];
    $idUsuarioLogin = $_SESSION["idUsuario"];
    $UsuarioPerfil =  $_SESSION["perfil"];
    //exit;  
  } else {
    $usuarioLogin = "";
  }
echo $idUsuarioLogin;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Login</title>
</head>

<body>
    <div>
        <header>
            <div class="logo">

            </div>


            <div class="box">
                <div class="img-box">
                    <a href="../index.php"><img src="../img/gorilamosso.png" alt="stylesheet" /></a>
                </div>

                <div class="form-box">
                    <div class="logo">
                        <h2>Deseja postar seus produtos?</h2>
                        <p>Aqui está!</p>
                        <form action="../Control/Anuncio/cadastrarAnuncio.php" method="POST" enctype="multipart/form-data">

                            <div class="input-group">
                                <label for="nome">Título da sua postagem</label>
                                <input type="hidden"   name="idUsuario" value="<?php echo $idUsuarioLogin ?>">
                                <input type="text" id="nomeAnuncio" placeholder="O nome tem que ser tão bom quanto a peça!" name="nomeAnuncio" required>
                            </div>

                            <div class="input-group">
                                <label for="descrição">Fale mais sobre o seu produto!</label>
                                <input type="text" id="descAnuncio" placeholder="Nos conte mais..." name="descAnuncio" required>
                            </div>

                            <div class="input-group">
                             <input type="file" name="imagem_produto" id="img-input"/>
                            </div>

                            <div class="input-group">
                                <input type="text" id="tamanho" placeholder="Tamanho" name="tamanho">
                            </div>

                            <div class="input-group ">
                                <input type="text" id="cores" placeholder="Outras cores ou tamanho? Melhor ainda!" name="cores">
                            </div>

                            <div class="input-group ">
                                <label for="avaliação"></label>
                                <input type="text" id="avaliacoesAnuncio" placeholder="Como você avalia seu produto?" name="avaliacoesAnuncio" required>
                            </div>

                            <div class="input-group">
                                <label for="valor"></label>
                                <input type="number" id="valorAnuncio" placeholder="Valor de seu produto:" name="valorAnuncio" required>
                            </div>
                            <p><input class="LB" type="submit" name="submit" value="POSTAR" ></input></p>
                        </form>
                    </div>
                </div>
</body>

</html>