

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
            <a href="../index.php">
              <h1 class="texto" >SendStyle</h1>
            </a>
          </div>

    
    <div class="box">
        <div class="img-box">
        <a href="../index.php"><img src="../img/gorilaslc.png" alt="stylesheet" /></a>
        </div>

        <div class="form-box">
            <div class="logo">
            <h2>Login</h2>
            <p> Não possui cadastro? <a href="../View/Cadastro.php"> Cadastrar </a> </p>
            <form action="../Control/loginControl.php" method="post">
        

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" placeholder="Digite o seu email" name="email" required>
                </div>

                <div class="input-group w50">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" placeholder="Digite sua senha" name="senha" required>
                </div>

                <p><button class="LB">Entrar</button></p>


            </form>
        </div>
    </div>
</body>

</html>