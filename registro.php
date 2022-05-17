<?php

@include 'config.php';
@include 'cabecalho.php';

ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $dor = $_POST['dor'];
   
   if(isset($_POST['g-recaptcha-response'])){
      $captcha_data = $_POST['g-recaptcha-response'];
  }
  if (!$captcha_data) {
       header('location:captcha');
       exit;
  }

  $resposta = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeWcFkfAAAAAEGqvFSHm4GbhzmyCfmI8o9FqSzd&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

  if($resposta.success) {
     echo '';
  } else {
      echo 'usuário mal intencionado';
      exit;
  }

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
   <title>Clinica de Soluções - Registro</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/global.css">
   <link rel="stylesheet" href="css/registro.css">

   <?php
   echo $cabecalho;
   ?>

</head>
<body>

<div id="conteudo">
   <header class="header">
      <div>
         <img src="./img/logo_branco.png" alt="">
      </div>
   </header>
   
   <div class="form-container">

      <form action="" method="post">
         <h1>Faça seu cadastro</h1>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };

         if(isset($correct)){
            foreach($correct as $correct){
               echo '<a href="./" class="correct-msg"><span>'.$correct.'<br><br><small>Clique aqui e realize seu login!</small></span></a>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="Nome">
         <input type="email" name="email" required placeholder="E-mail">
         <input type="password" name="password" required placeholder="Senha">
         <input type="password" name="cpassword" required placeholder="Repita a senha">
         <textarea id="dor" name="dor" rows="5" maxlength="250" required placeholder="Descreva sua dor/necessidade"></textarea>
         <span id="n-caracteres" class="n-caracteres">0/250</span>
         <select name="user_type">
            <option value="user"></option>
         </select>
         <div data-sitekey="6LeWcFkfAAAAAFkflzsUw0DI8tP3KsnaGeRrlvFO" class="g-recaptcha"></div>
         <input type="submit" name="submit" value="Cadastrar" class="form-btn">
         <br><br>
         <p>Já tem cadastro? <a href="./">Faça login aqui!</a></p>
      </form>

   </div>
   
   <?php echo $footer; ?>

</div>
<!-- JS -->
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="./js/contador-caracteres.js"></script>
   <?php
      echo $mouseflow;
   ?>

</body>
</html>