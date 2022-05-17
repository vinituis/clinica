<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['user_name'])){
    if(!isset($_SESSION['admin_name'])){
        header('location:./');
    }
}

$id_page = $_GET['id'];

$sql = mysqli_query($conn, "SELECT * FROM empresa_form WHERE id = '$id_page'");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica de Soluções - Fornecedor</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/global.css">
    <!--<link rel="stylesheet" href="./css/reset.css">-->

    <?php
    echo $cabecalho;
    ?>
</head>
<body>
    <div id="conteudo">
        <?php 
        $usu = mysqli_fetch_object($sql);

        if($usu == NULL){
            header('location:erro');
        }else if($usu !== NULL){
            echo "
            <desc value=''>
            <div class='nav-desc'>
            <p>$usu->nome_empresa</p>
            <span id='close' class='close'><i class='fa fa-times' aria-hidden='true'></i></span>
            </div>
            <div class='content'>
            <div class='desc-description'>
            <div>
            <div class='desc-txt'>
            <h2>$usu->nome_solucao</h2>
            <p>$usu->descritivo</p>
            </div>
            <div class='btns'>
            <a href='$usu->url_btn1' target='_blank'>
            <button class='btn-p'>$usu->txt_btn1</button>
            </a>
            <a href='$usu->url_btn2' target='_blank'>
            <button class='btn-n'>$usu->txt_btn2</button>
            </a>
            <!-- <button class='btn-d'>Botão bloqueado</button> -->
            </div>
            </div>
            <div>
            <iframe title='Vídeo do Youtube sobre a solução' width='560' height='315' src='$usu->url_video' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
            </div>
            </div>
            </div>
        </desc>
            ";
    }
        ?>
                      
    </div>

    <script src="./js/main.js"></script>

    <?php
        echo $mouseflow;
    ?>

</body>
</html>