<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opss...</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/erro.css">
    <!--<link rel="stylesheet" href="./css/reset.css">-->
</head>
<body>
    <div id="conteudo">
       
        <header class="header">
            <div>
                <img src="./img/logo_branco.png" alt="">
            </div>
        </header>

        <div class="content">
            <h1>Opss...</h1>
            <p>Está página não existe ou está indisponivel.</p>
            <a href="./">
                <button type="button" class="btn-n">Voltar para a página inicial</button>
            </a>
        </div>
        
    </div>  

    <!-- JS -->

    <?php echo $mouseflow; ?>
    
</body>
</html>