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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/logoaba-1.png" />
  <link rel="stylesheet" href="css/estilo.css" />
  <link rel="stylesheet" href="css/estilopesquisa.css">
  <title>SendStyle</title>
</head>

<body>
  <div class="background" id="inicio">
    <header>
      <!--inicio-topo-->
      <div class="logo">
        <a href="#inicio"><img src="img/logomaa-1.jpg" alt="stylesheet" /></a>
      </div>
      <div class="cabeçalho-link">
        <?php
        if (empty($usuarioLogin)) {
          include_once("telaInicial.php");
        } else {

          if ($UsuarioPerfil == 'Administrador') {  //verifica se é o administrador
            include_once("menuADM.php");
          } else {

            include_once("menuUsuario.php");
          }
        }
        ?>
      </div>
    </header>
    <div class="Meio">
      <h1>DESEJO</h1>
      <h1>DE EXCLUSIVIDADE!</h1>
      <p>Nunca foi tão fácil adquirir exclusividade!</p>
      
      <?php 
      include_once("View/pesquisa.php");
      
      ?>
    </div>
  </div>
  <!--Fim-topo-->
  <!--Inicio-anúncios-->
  <section id="destaque">

    <h1>Destaques</h1>
    <!--Container-card-1-->

    <div class="Container-card-1">
      <div class="cards">
        <a href="View/Anúncio.php"><img src="img/tenis.png" /></a>
      </div>
      <div class="cards">
        <img src="img/Luck-2.png" />
      </div>
      <div class="cards">
        <img src="img/Untitled - 2.png" />
      </div>
    </div>
    <!--Container-card-2-->
    <div class="Container-card-1">
      <div class="cards">
        <img src="img/luck-4.png" />
      </div>
      <div class="cards">
        <img src="img/Untitled-3.png" />
      </div>
      <div class="cards">
        <img src="img/Untitled - 1.png" />
      </div>
    </div>
    <!--Container-card-3-->
    <div class="Container-card-1">
      <div class="cards">
        <img src="img/luck-4.png" />
      </div>
      <div class="cards">
        <img src="img/Untitled-3.png" />
      </div>
      <div class="cards">
        <img src="img/Untitled - 1.png" />
      </div>
    </div>
  </section>
  <!--Fim-dos-anúncios-->
  <!--segundo-background-->
  <section class="cta">
    <div class="text-cta">
      <h6>VERÃO A VENDA</h6>
      <h4>20% OFF<br />NOVAS CHEGADAS</h4>
      <a href="#" class="btn">Compre agora</a>
    </div>
  </section>
  <!--fim-do-segundo-background-->
  <!--inicio-container-roupas-->
  <section>
    <h1>ESTOQUE NOVOS</h1>
    <div class="Container-roupas">
      <!--roupa1-->
      <div class="roupa">
        <img src="img/roupa1.jpg" alt="" />
        <p>Lorem Ipsum dizgi</p>
        <h5>$188</h5>
        <ion-icon name="cart-outline"></ion-icon>
      </div>
      <!--roupa2-->
      <div class="roupa">
        <img src="img/tren2.jpg" alt="" />
        <p>Lorem Ipsum dizgi</p>
        <h5>$188</h5>
        <span><ion-icon name="cart-outline"></ion-icon></span>
      </div>
      <!--roupa3-->
      <div class="roupa">
        <img src="img/tren3.jpg" alt="" />
        <p>Lorem Ipsum dizgi</p>
        <h5>$188</h5>
        <ion-icon name="cart-outline"></ion-icon>
      </div>
      <!--roupa4-->
      <div class="roupa">
        <img src="img/tren4.jpg" alt="" />
        <p>Lorem Ipsum dizgi</p>
        <h5>$188</h5>
        <ion-icon name="cart-outline"></ion-icon>
      </div>
      <!--fim roupas-->
    </div>
    <!--fim-container-roupas-->
  </section>
  <!--Inicio-Marcas-->
  <div class="Marcas">
    <img src="img/brand1.png" alt="Marca" />
    <img src="img/brand2.png" alt="Marca" />
    <img src="img/brand3.png" alt="Marca" />
    <img src="img/brand4.png" alt="Marca" />
    <img src="img/brand5.png" alt="Marca" />
    <img src="img/brand6.png" alt="Marca" />
  </div>
  <!--fim-Marcas-->
  <!--Inicio-rodapé-->
  <section class="Contato" id="Contato">
    <div class="meio-contato">
      <h3>SendStyle</h3>
      <h5>Nós envie uma mensagem</h5>
      <div class="icons">
        <a href="#"><i class="bx bxl-facebook-square"></i></a>
        <a href="#"><i class="bx bxl-instagram-alt"></i></a>
        <a href="#"><i class="bx bxl-twitter"></i></a>
      </div>
    </div>

    <div class="meio-contato">
      <h3>Explore</h3>
      <li><a href="#inicio">Inicio</a></li>
      <li><a href="#destaque">Destaque</a></li>
      <li><a href="#new">Novo</a></li>
      <li><a href="#contact">Contato</a></li>
    </div>

    <div class="meio-contato">
      <h3>Outros Serviços</h3>
      <li><a href="#">Promoções</a></li>
      <li><a href="#">Frete Grátis</a></li>
      <li><a href="#">Support</a></li>
    </div>

    <div class="meio-contato">
      <h3>Vitrine</h3>
      <li><a href="#">Loja de Roupa</a></li>
      <li><a href="#">Tênis do momento</a></li>
      <li><a href="#">Acessórios</a></li>
      <li><a href="#">Vendas</a></li>
    </div>
  </section>
  <!--Fim-rodapé-->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="js/script.js"></script>
</body>

</html>