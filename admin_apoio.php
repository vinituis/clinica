<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:./');
}


$sql = "SELECT * FROM apoiador_form";

if(isset($_POST['submit'])){

   $nome_apoiador = $_POST['nome_apoiador'];
   $img_url = $_POST['img_url'];
   $type = $_POST['type'];

   $select = " SELECT * FROM apoiador_form ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $insert = "INSERT INTO apoiador_form(nome_apoiador, img_url, type) VALUES('$nome_apoiador','$img_url','$type')";
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
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Pagina de Administração - Apoios</title>

   <!-- CSS -->
   <link rel="stylesheet" href="./css/global.css">
   <link rel="stylesheet" href="./css/adm-apoio.css">
   
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
         <a class="nav-item" href="./admin_fornecedor">Fornecedor</a>
         <a class="nav-item ativo" href="./admin_apoio">Apoios</a>
         <a class="nav-item btn" href="./logout">Sair</a>
      </div>
   </header>

   <div class="content-apoio">
      <h1>Realizadores</h1>
      <div style="overflow-x:auto;">
         <table class="tabela-usuario">
            <tr>
               <td>Nome</td>
               <td>Logo</td>
               <td>Tipo</td>
            </tr>
            <?php 
            
            if($res=mysqli_query($conn, $sql)){
               $name = array();
               $img_url = array();
               $type = array();
               $i = 0;
               while ($reg = mysqli_fetch_assoc($res)) {
                  $name[$i] = $reg['nome_apoiador'];
                  $img_url[$i] = $reg['img_url'];
                  $type[$i] = $reg['type'];

                  if($type[$i] == 'realizador'){
                     echo "<tr>";
                     echo "<td>" . $name[$i] . "</td>";
                     echo "<td><img class='img-table' src='" . $img_url[$i] . "'></td>";
                     echo "<td>" . $type[$i] . "</td>";
                     echo "</tr>";
                  }
                  }}
               ?>

         </table>
         <h1>Patrocinadores</h1>
         <table class="tabela-usuario">
            <tr>
               <td>Nome</td>
               <td>Logo</td>
               <td>Tipo</td>
            </tr>
            <?php 
            
            if($res=mysqli_query($conn, $sql)){
               $name = array();
               $img_url = array();
               $type = array();
               $i = 0;
               while ($reg = mysqli_fetch_assoc($res)) {
                  $name[$i] = $reg['nome_apoiador'];
                  $img_url[$i] = $reg['img_url'];
                  $type[$i] = $reg['type'];

                  if($type[$i] == 'patrocinador'){
                     echo "<tr>";
                     echo "<td>" . $name[$i] . "</td>";
                     echo "<td><img class='img-table' src='" . $img_url[$i] . "'></td>";
                     echo "<td>" . $type[$i] . "</td>";
                     echo "</tr>";
                  }}}
               ?>

         </table>
         <h1>Apoiadores</h1>
         <table class="tabela-usuario">
            <tr>
               <td>Nome</td>
               <td>Logo</td>
               <td>Tipo</td>
            </tr>
            <?php 
            
            if($res=mysqli_query($conn, $sql)){
               $name = array();
               $img_url = array();
               $type = array();
               $i = 0;
               while ($reg = mysqli_fetch_assoc($res)) {
                  $name[$i] = $reg['nome_apoiador'];
                  $img_url[$i] = $reg['img_url'];
                  $type[$i] = $reg['type'];

                  if($type[$i] == 'apoio'){
                     echo "<tr>";
                     echo "<td>" . $name[$i] . "</td>";
                     echo "<td><img class='img-table' src='" . $img_url[$i] . "'></td>";
                     echo "<td>" . $type[$i] . "</td>";
                     echo "</tr>";
                  }}}
               ?>

         </table>

      <?php  ?>
      </div>
   </div>

   <div class="form-container"><!-- Types: realizador / patrocinador / apoiador -->

      <form action="" method="post">
         <h1>Registrar apoiador manualmente</h1>
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
         <input type="text" name="nome_apoiador" required placeholder="Nome do apoiador">
         <input type="text" name="img_url" required placeholder="Link da imagem">
         <input type="text" name="type" required placeholder="Tipo">
         
         <input type="submit" name="submit" value="Cadastrar" class="form-btn">
      </form>

   </div>

   <?php echo $footer; ?>
</div>

<script src="./js/menu.js"></script>
<?php echo $mouseflow; ?>

</body>
</html>