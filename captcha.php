<?php

@include 'cabecalho.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha não preenchido</title>
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

        <div class="captcha">
            <h2>Você não preencheu o captcha!</h2>
            <div class="btns">
                <a href="./"><button class="btn btn-n">Fazer login</button></a>
                <a href="./registro"><button class="btn btn-p">Fazer registro</button></a>
            </div>
        </div>

        <?php echo $footer;?>
    </div>
</body>