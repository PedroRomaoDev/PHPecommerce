
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoaba-1.png" />
    <link rel="stylesheet" href="../css/estilo.css" />
    <link rel="stylesheet" href="../css/pesquisa.css" />
    <title>SendStyle - Pesquisa</title>
</head>


<body>

<div class="background" id="inicio">
    <header>
      <!--inicio-topo-->
      <div class="logo">
        <a href="#inicio"><img src="../img/logomaa-1.jpg" alt="stylesheet" /></a>
      </div>
      <div class="cabeçalho-link">
        <li>
          <a href="#inicio">Inicio</a>
        </li>
        <li>
          <a href="#destaque">Destaque</a>
        </li>
        <li>
          <a href="View/Cadastro.php?p=Anunciante">Anunciar</a>

        </li>
        <li>
          <a href="View/login.php">Login</a>
        </li>
        <li>
          <a href="View/Cadastro.php?p=Usuário">Cadastre-se</a>
        </li>
      </div>
      <!--cabeçalho-link-->
      <div class="icon">
        <span><ion-icon name="bag-outline"></ion-icon></span>
      </div>

<!--FINAL TOPO-->

        <form action="../index.php" method="post">
            <div class="form_content">
                <input type="text" name="pesquisa"  id="pesquisa" placeholder="Digite o que deseja..." autocomplete="off">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    <?php
        $pesquisa =  mysqli_real_escape_string($conexao, trim(isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : 0));
        $query = 'SELECT * FROM anuncio WHERE idAnuncio LIKE "%'.$pesquisa.'%" ORDER BY nome_res;';
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);

        
function limita_caracteres($texto, $limite, $quebra = true){
   $tamanho = strlen($texto);
   if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
      $novo_texto = $texto;
   }else{ // Se o tamanho do texto for maior que o limite
      if($quebra == true){ // Verifica a opção de quebrar o texto
         $novo_texto = trim(substr($texto, 0, $limite))."...";
      }else{ // Se não, corta $texto na última palavra antes do limite
         $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o último espaço antes de $limite
         $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
      }
   }
   return $novo_texto; // Retorna o valor formatado
}

        
        if($row >= 1){ 
            //Testa se retornou dados e abre um for para listar
           echo '<header class="titulo_pesquisa">';
            echo '<h1>'; 
            echo "Postagens Encontradas com o nome de"." ".$pesquisa;
            echo '</h1>';
            echo '</header>';

            echo '<main class="main_res">';

            
                echo '<section class="content_res">';

                foreach($result as $res ){
                    $res2 = new anuncio($res["idAnuncio"],$res["tamanho"],$res["nomeAnuncio"],$res["valorAnuncio"],$res["imagem_produto"],$res["avaliacoesAnuncio"], $res["cores"]);

                    if($res['status_conta_res'] == 1){
                       
                        echo '<article class="info_res">';

                            echo '<div class="img_res">';
                                echo '<img src="../../img/postagens/'.$res['imagem_produto'].'" alt="'.$res['nomeAnuncio'].'">';
                            echo '</div>';

                            echo '<div class="infos_grup">';

                            echo '<div class="miniinfo_res">';
                                echo '<h2>'.$res['nomeAnuncio'].'</h2>';
                                echo '<p>'.$res2->tipo().'</p>';
                                echo '<h3>Descrição</h3>';
                                echo '<p>';
                                echo limita_caracteres($res['descAnuncio'],150);
                                echo '</p>';
                                
                            echo '</div>';

                            echo '<div class="ver_mais_button">';

                            echo '<a href="../index.php?idRes='.$res['idAnuncio'].'" class="ver_mais">';
                            echo 'Ver mais</a>'; 

                            echo '</div>'; //ver_mais_button
                            echo '</div>'; //infos_grup
                        echo '</article>'; //info_res

                        
                    }                   
                }
                echo '</section>'; //content_res
            echo '</main> '; //main_res
        }else{
            // echo "<h1 class='txt_erro'>Nenhuma postagem encontrada</h1>";
        }
    ?>
    <?php include ("../View/footer.php");?>
</body>
</html>