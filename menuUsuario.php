<?php

if (isset($_SESSION["idUsuario"])) {
  //print_r($_SESSION);
  $usuarioLogin = $_SESSION["nome"];
} else {
  $usuarioLogin = "";
}
?>

<li>
  <a href="#inicio">Inicio</a>
</li>
<li>
  <a href="#destaque"> Destaques</a>
</li>
<li>
  <a href="View/anunciar.php">Anunciar</a>

</li>
<li>
  <a href="#">Olá, <?php echo $usuarioLogin ?> </a>
</li>
<li>
  <a href="Control/logout.php">Sair</a>
</li>