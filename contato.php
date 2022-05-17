<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['user_name'])){
    if(!isset($_SESSION['admin_name'])){
        header('location:./');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica de Soluções - Contato</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/contato.css">
    <!--<link rel="stylesheet" href="./css/reset.css">-->

    <?php
    echo $cabecalho;
    echo $jivochat;
    ?>
</head>
<body>
    <div id="conteudo">
       
        <header class="header">
            <div class="nav">
                <img src="./img/logo_branco.png" alt="">
                <i class="fa fa-bars menu" id="menu" aria-hidden="true"></i>
                <?php if(isset($_SESSION['admin_name'])){ echo $btnUser; } ?>
                <a class="nav-item" href="./home">Página Inicial</a>
                <a class ="nav-item" href="./iniciativa">A Iniciativa</a>
                <a class ="ativo nav-item" href="./contato">Contato</a>
                <a class ="nav-item" href="logout" class="btn">Sair</a>
            </div>
        </header>

        <form id="contatoClinica" class="form" action="" method="post" width="600px">
            <h2>Entre em contato com o nosso time!</h2>
            <p>Coloque seus dados e a mensagem para enviar</p>
            <input type="text" name="nome" id="" placeholder="Insira seu nome" required>
            <input type="email" name="email" id="" placeholder="Insira seu e-mail" required>
            <input type="tel" name="telefone" id="" placeholder="Insira seu telefone" required>
            <P>Mensagem</P>
            <textarea name="mensagem" id="" rows="6" maxlength="250" placeholder="Escreva sua mensagem aqui" required></textarea>
            <button class="btn-p" type="submit">Enviar mensagem</button>
        </form>

        <?php echo $footer; ?>

    </div>  

    <!-- JS -->
    <script src="./js/menu.js"></script>

    <?php
        echo $mouseflow;
    ?>
    
</body>
</html>