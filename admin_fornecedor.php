<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:./');
}


$sql = "SELECT * FROM empresa_form";

if(isset($_POST['submit'])){

   $nome_empresa = $_POST['nome_empresa'];
   $nome_solucao = $_POST['nome_solucao'];
   $descritivo = $_POST['descritivo'];
   $url_btn1 = $_POST['url_btn1'];
   $txt_btn1 = $_POST['txt_btn1'];
   $url_btn2 = $_POST['url_btn2'];
   $txt_btn2 = $_POST['txt_btn2'];
   $url_img_thumb = $_POST['url_img_thumb'];
   $url_video = $_POST['url_video'];
   

   $select = " SELECT * FROM empresa_form ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $insert = "INSERT INTO empresa_form(nome_empresa, nome_solucao, descritivo, url_btn1, txt_btn1, url_btn2, txt_btn2, url_img_thumb, url_video) VALUES('$nome_empresa','$nome_solucao','$descritivo','$url_btn1','$txt_btn1','$url_btn2','$txt_btn2','$url_img_thumb','$url_video')";
      mysqli_query($conn, $insert);
      $correct[] = 'Usuário cadastrado!';
      }
   }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina de Administração - Fornecedores</title>

   <!-- CSS -->
   <link rel="stylesheet" href="./css/global.css">
   <link rel="stylesheet" href="./css/adm-fornecedor.css">
   
   <?php
   echo $cabecalho;
   echo $noindex;
   ?>
</head>
<body>
   
<div id="conteudo">
   
<header class="header">
      <div class="nav">
         <img src="./img/logo_branco.png" alt="">
         <i class="fa fa-bars menu" id="menu" aria-hidden="true"></i>
         <?php echo $btnAdm; ?>
         <a class="nav-item" href="./admin_page">Página inicial</a>
         <a class="nav-item" href="./admin_inscritos">Inscritos</a>
         <a class="nav-item ativo" href="./admin_fornecedor">Fornecedor</a>
         <a class="nav-item" href="./admin_apoio">Apoios</a>
         <a class="nav-item btn" href="./logout">Sair</a>
      </div>
   </header>

   <div class="content-fornecedor">
      <h1>Fornecedores</h1>
      <div style="overflow-x:auto;">
         <table class="tabela-usuario">
            <tr>
               <td>Nome da empresa</td>
               <td>Nome da Solução</td>
               <td>Botão 1</td>
               <td>Botão 2</td>
               <td>Imagem</td>
               <td>Vídeo</td>
            </tr>
         <?php 
            
            if($res=mysqli_query($conn, $sql)){
               $empresa = array();
               $solucao = array();
               $btn1 = array();
               $url_btn1 = array();
               $btn2 = array();
               $url_btn2 = array();
               $img = array();
               $video = array();
               $i = 0;
               while ($reg = mysqli_fetch_assoc($res)) {
                  $empresa[$i] = $reg['nome_empresa'];
                  $solucao[$i] = $reg['nome_solucao'];
                  $btn1[$i] = $reg['url_btn1'];
                  $url_btn1[$i] = $reg['txt_btn1'];
                  $btn2[$i] = $reg['url_btn2'];
                  $url_btn2[$i] = $reg['txt_btn2'];
                  $img[$i] = $reg['url_img_thumb'];
                  $video[$i] = $reg['url_video'];
                  echo "<tr>";
                  echo "<td>" . $empresa[$i] . "</td>";
                  echo "<td>" . $solucao[$i] . "</td>";
                  echo "<td><a href='" . $btn1[$i] . "'><button class='btn-p'>" . $url_btn1[$i] . "</button></a></td>";
                  echo "<td><a href='" . $btn2[$i] . "'><button class='btn-n'>" . $url_btn2[$i] . "</button></a></td>";
                  echo "<td><img width='70px' src='" . $img[$i] . "'></td>";
                  echo "<td><iframe title='Vídeo do Youtube sobre a solução' width='260' height='115' src='" . $video[$i] . "' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></td>";
                  echo "</tr>";
               }
            }

         ?>

         </table>    
      </div>
      
   </div>

   <div class="form-container">

      <form action="" method="post">
         <h1>Registrar fornecedor manualmente</h1>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };

         if(isset($correct)){
            foreach($correct as $correct){
               echo '<span class="correct-msg">'.$correct.'</span>';
            };
         };
         ?>
         <input type="text" name="nome_empresa" required placeholder="Nome da empresa">
         <input type="text" name="nome_solucao" required placeholder="Nome da solução">
         <input type="text" name="descritivo" required placeholder="Descrição da solução">
         <input type="text" name="url_btn1" required placeholder="Url do Botão 1">
         <input type="text" name="txt_btn1" required placeholder="Texto do Botão 1">
         <input type="text" name="url_btn2" required placeholder="Url do Botão 2">
         <input type="text" name="txt_btn2" required placeholder="Texto do Botão 2">
         <input type="text" name="url_img_thumb" required placeholder="Link da imagem">
         <input type="text" name="url_video" required placeholder="Url do vídeo">
         
         <input type="submit" name="submit" value="Cadastrar" class="form-btn">
      </form>

   </div>

   <?php echo $footer; ?>

</div>

<script src="./js/menu.js"></script>
<?php echo $mouseflow; ?>
</body>
</html>