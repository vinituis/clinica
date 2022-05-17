<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(isset($_SESSION['user_name'])){
    header('location:./home');
}else if(isset($_SESSION['admin_name'])){
    header('location:./admin_page');
}else{
    
}

ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   
   if(isset($_POST['g-recaptcha-response'])){
       $captcha_data = $_POST['g-recaptcha-response'];
   }
   if (!$captcha_data) {
        header('location:captcha');
        exit;
   }

   $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeWcFkfAAAAAEGqvFSHm4GbhzmyCfmI8o9FqSzd&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

   if($resposta.success) {
       echo '';
   }else {
       echo 'usuário mal intencionado';
       exit;
   }

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:home');

      }elseif($row['user_type'] == 'block'){
          $error[] = 'seu usuario foi bloqueado!';
      }
     
   }else{
      $error[] = 'O e-mail ou senha estão incorretos!';
   }

};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica de Soluções - Entrar</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/index.css">
    <!--<link rel="stylesheet" href="./css/reset.css">-->

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

        <div class="cadastro">

            <form action="" method="post" id="formLogin">
                <h3>Preencha com seus dados para acessar</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <input type="email" name="email" required placeholder="E-mail">
                <input type="password" name="password" required placeholder="Senha">
                <!-- <div class="aceite">
                    <input type="checkbox" name="aceite" id="aceite" required>
                    <label for="aceite">Eu aceito receber comunicações da ABIMAQ</label>        
                </div> -->
                <div data-sitekey="6LeWcFkfAAAAAFkflzsUw0DI8tP3KsnaGeRrlvFO" class="g-recaptcha"></div>
                <button type="submit" name="submit" value="Acessar" class="btn-p">Acessar</button>

                <p>Não tem login? <a href="./registro">Faça seu cadastro aqui!</a></p>
            </form>

        </div>

        <?php echo $footer; ?>
        
    </div>
    
    <!-- JS -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <?php
        echo $mouseflow;
    ?>
    
</body>
</html>