<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:./');
}

$sql = "SELECT * FROM user_form";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina de Administração - Página Inicial</title>

   <!-- CSS -->
   <link rel="stylesheet" href="./css/global.css">
   <link rel="stylesheet" href="./css/adm-home.css">
   
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
         <a class="nav-item ativo" href="./admin_page">Página inicial</a>
         <a class="nav-item" href="./admin_inscritos">Inscritos</a>
         <a class="nav-item" href="./admin_fornecedor">Fornecedor</a>
         <a class="nav-item" href="./admin_apoio">Apoios</a>
         <a class="nav-item btn" href="./logout">Sair</a>
      </div>
   </header>

   <div class="content-home">
      <h1>Bem vindo <span><?php echo $_SESSION['admin_name'] ?></span>!</h1>
      <div class="inscritos">
         <h1>Total de inscritos no evento</h1>
         <?php
         
         if ($result=mysqli_query($conn, $sql)){
            $i=0;
            $ia=0;
            while ($registro = mysqli_fetch_array($result)){
               $type = $registro['user_type'];
               
               if($type == 'user'){
                  $i= $i + 1;
               }
               if($type == 'admin'){
                  $ia= $ia + 1;
               }
               
            }
            
            mysqli_num_rows($result);
                  echo "<h2 class='n-inscritos'>" . $i . " usuários e " . $ia . " admins</h2>";
         }
         ?>
      </div>
   </div>

   <?php echo $footer; ?>
</div>

<script src="./js/menu.js"></script>

<?php echo $mouseflow; ?>

</body>
</html>