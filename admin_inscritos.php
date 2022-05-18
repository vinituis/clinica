<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:./');
}


$sql = "SELECT * FROM user_form";

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $dor = $_POST['dor'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Este usuário já existe!';

   }else{

      if($pass != $cpass){
         $error[] = 'As senhas não combinam!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type, dor) VALUES('$name','$email','$pass','$user_type','$dor')";
         mysqli_query($conn, $insert);
         $correct[] = 'Usuário cadastrado!';
      }
   }

};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina de Administração - Inscritos</title>

   <!-- CSS -->
   <link rel="stylesheet" href="./css/global.css">
   <link rel="stylesheet" href="./css/adm-inscritos.css">
   
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
            <a class="nav-item ativo" href="./admin_inscritos">Inscritos</a>
            <a class="nav-item" href="./admin_fornecedor">Fornecedor</a>
            <a class="nav-item" href="./admin_apoio">Apoios</a>
            <a class="nav-item" href="./logout" class="btn">Sair</a>
         </div>
   </header>

   <div class="content-inscritos">
        <br><br>
        <h1>Lista de usuários inscritos</h1>
        <div style="overflow-x:auto;">
         <table id="table" class="tabela-usuario">
            <tr>
               <td>Permissão</td>
               <td>Nome</td>
               <td>E-mail</td>
               <td>Dor</td>
               <td>Bloquear/Liberar</td>
            </tr>
            <?php 
            
            if($res=mysqli_query($conn, $sql)){
               $id = array();
               $name = array();
               $email = array();
               $user_type = array();
               $dor = array();
               $i = 0;
               while ($reg = mysqli_fetch_assoc($res)) {
                  
                  $id[$i] = $reg['id'];
                  $name[$i] = $reg['name'];
                  $email[$i] = $reg['email'];
                  $user_type[$i] = $reg['user_type'];
                  $dor[$i] = $reg['dor'];

                  if($user_type[$i] == 'user'){
                     echo "<tr>";
                     echo "<td>usuário ativo</td>";
                     echo "<td>" . $name[$i] . "</td>";
                     echo "<td>" . $email[$i] . "</td>";
                     echo "<td>" . $dor[$i] . "</td>";
                     echo "<td class='acoes'><a href='./bloqueio?id=" . $id[$i] . "'><i class='fa fa-ban' aria-hidden='true'></i></a></td>";
                     echo "</tr>";
                  }else if($user_type[$i] == 'block'){
                     echo "<tr>";
                     echo "<td>usuário bloqueado</td>";
                     echo "<td>" . $name[$i] . "</td>";
                     echo "<td>" . $email[$i] . "</td>";
                     echo "<td>" . $dor[$i] . "</td>";
                     echo "<td class='acoes'><a href='./desbloqueio?id=" . $id[$i] . "'><i class='fa fa-check' aria-hidden='true'></i></a></td>";
                     echo "</tr>";
                  }
               }
            }?>
            
         </table>
      </div>
   </div>
   <div class="download">
            <a href="./download"><button class="btn-p">Baixar lista de usuários em Excel</button></a>
         </div>
   <div class="form-container">

      <form action="" method="post">
         <h1>Registrar usuário manualmente</h1>
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
         <input type="text" name="name" required placeholder="Nome">
         <input type="email" name="email" required placeholder="E-mail">
         <input type="password" name="password" required placeholder="Senha">
         <input type="password" name="cpassword" required placeholder="Repita a senha">
         <textarea name="dor" rows="5" maxlength="250" required placeholder="Descreva sua dor/necessidade"></textarea>
         <select name="user_type">
            <option value="user">usuário</option>
            <option value="admin">administrador</option>
         </select>
         <input type="submit" name="submit" value="Cadastrar" class="form-btn">
      </form>

   </div>

   <?php echo $footer; ?>
   
</div>

<script src="./js/menu.js"></script>
<?php echo $mouseflow; ?>

</body>
</html>