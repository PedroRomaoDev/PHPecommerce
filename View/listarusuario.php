<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header("location:../index.php?msg=Usuário e/ou senha inválidos");
    exit;
}

//Pesquisar no banco o usuario a ser alterado

$nome = $_SESSION["nome"];
$idUsuario = $_SESSION["idUsuario"];
$isAdmin = $_SESSION["perfil"];
require_once "../Model/UsuarioDTO.php";
require_once "../Model/UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO();

$usuarios = $usuarioDAO->listarusuario();

if ($usuarios == Null) {
    header("location:../index.php?msg=Usuários não encontrados!");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <i class="bi bi-brush"></i>
    <i class="bi bi-trash3-fill"></i>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/listuser.css" rel="stylesheet">
    <link href="../css/fonticon.css" rel="stylesheet">
    <link href="../css/lista.css" rel="stylesheet">


    <title>SendStyle</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">

            <div class="listagem_info">
                <samp class="icon-books">Listagem de dados</samp>
            </div>
        </div>


        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->

    <!--DOBRA PALCO PRINCIPAL-->

    <!--1ª DOBRA-->
    <main>

        <div class="main_stage">
            <div class="main_stage_content">

                <article>
                    <header>

                        <table border="0" style="background-color" width="1300px" class="table">

                            <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                    position: absolute;
                                    left: 2%;
                                }

                                th,
                                td {
                                    padding: 8px;
                                    text-align: left;
                                    border-bottom: 1px solid #ddd;
                                }

                                th {
                                    background-color: #f2f2f2;
                                    color: #333333;
                                }

                                tr:nth-child(even) {
                                    background-color: #f9f9f9;

                                }

                                a {
                                    background color: #fff;
                                    text-decoration: none;
                                }



                                tr:hover {
                                    background-color: #f5f5f5;
                                }
                            </style>
                            <table>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Estado</th>
                                    <th>Cidade</th>
                                    <th>Perfil</th>
                                    <th>...</th>
                                </tr>
                                <tr>

                                </tr>
                                <?php
                                foreach ($usuarios as $u) {
                                    echo '<tr>
                                   <td>' . $u["nome"] . '</td>
                                   <td>' . $u["email"] . '</td>  
                                   <td>' . $u["telefone"] . '</td>           
                                   <td>' . $u["estado"] . '</td>
                                   <td>' . $u["cidade"] . '</td>
                                   <td>' . $u["perfil"] . '</td>    

                                   <td><button class="btn" ><a href="AlterarUsuario.php?idUsuario=' . $u["idUsuario"] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                   <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"/>
                                 </svg></a></button>&nbsp 
                                      <button class="btn" ><a href="../Control/deleteUsuarioControl.php?idUsuario=' . $u["idUsuario"] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg></a></button>&nbsp;
                                      </td> </tr>';
                                }

                                ?>
                            </table>

                    </header>
                </article>

            </div>
        </div>

</body>

</html>