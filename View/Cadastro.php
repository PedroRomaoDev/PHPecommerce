<?php
if (isset($_GET["p"])) {
    $perfil = strip_tags($_GET["p"]);
} else {
    $perfil = "Usuário";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastre-se</title>
</head>

<body>

    <div class="box">
        <div class="img-box">
            <a href="../index.php"><img src="../img/gorilazzzz.png" alt="stylesheet" /></a>
        </div>

        <div class="form-box">
            <div class="logo">
                <h2>Criar Conta - <?php echo $perfil ?></h2>
                <p> Já possui cadastro? <a href="../View/Login.php"> Login </a> </p>
                <form action="../Control/cadastrarUsuarioControl.php" method="POST">
                    <div class="input-group">
                        <label for="nome"> Nome Completo</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite o seu nome completo" required>
                    </div>

                    <div class="input-group">
                        <label for="Cidade"> Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="cidade" required>
                    </div>

                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite o seu email" required>
                    </div>

                    <div class="input-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="telefone" name="telefone" placeholder="Digite o seu telefone" required>
                    </div>

                    <div class="input-group">
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" name="estado" placeholder="Estado" required>
                    </div>

                    <div class="input-group w50">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                        <input type="hidden" id="perfil" name="perfil" value="<?php echo $perfil; ?>">
                    </div>

                    <?php
                    if (isset($perfil)) {
                        if ($perfil == "Administrador") {
                            echo '<div class="caixa">
                <label>Perfil do Usuário:</label>
                <select name="perfil">
                   <option value="" selected>Selecione um Perfil</option>
                   <option value="Administrador">Administrador</option>
                   <option value="Usuário">Usuário</option>                
                </select><br>                
                
            </div><br><br>';
                            echo '<div class="caixa">
            <label>Situação</label>
            <select name="situacao">
               <option value="" selected>Selecione uma Situação</option>
               <option value="Ativo">Ativo</option>
               <option value="Inativo">Inativo</option> 
               <option value="Bloqueado">Bloqueado</option> 
            </select>
            <br>
            
        </div><br><br>';
                        }
                    } else {
                        echo '<input type="hidden" name="situacao" value="Ativo">
        <input type="hidden" name="perfil" value="Usuário">';
                    }
                    ?>

                    <p><a href="../View/login.php"> <button class="LB">Cadastrar</button> </a> </p>
                </form>
            </div>
        </div>
</body>

</html>