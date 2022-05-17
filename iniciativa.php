<?php

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['user_name'])){
    if(!isset($_SESSION['admin_name'])){
        header('location:./');
    }
}

$sql = "SELECT * FROM apoiador_form";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica de Soluções - A iniciativa</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/iniciativa.css">
    <link rel="stylesheet" href="./css/global.css">
    <!--<link rel="stylesheet" href="./css/reset.css">-->
    <!-- FontAwesome -->
    
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
                <a class ="ativo nav-item" href="./iniciativa">A Iniciativa</a>
                <a class ="nav-item" href="./contato">Contato</a>
                <a class ="nav-item" href="logout" class="btn">Sair</a>
            </div>
        </header>

        <div class="iniciativa">
            <div class="descricao">
                <h2>Sobre a Clinica de Soluções</h2>
                <p><?php echo $descricaoClinica; ?></p>
            </div>
            
            <h3 class="title">Realizadores</h3>
            
            <div class="logos">
                <?php 
                    $resultado = mysqli_query($conn, $sql);

                    while ($registro = mysqli_fetch_array($resultado)){
                        $nome = $registro['nome_apoiador'];
                        $img = $registro['img_url'];
                        $type = $registro['type'];

                        if($type == 'realizador'){
                            echo "<img src='" . $img . "' alt='" . $nome . "'>";
                        }
                    }
                ?>
            </div>
                
            <h3 class="title">Patrocinadores</h3>

            <div class="logos">

                <?php
                    $resultado = mysqli_query($conn, $sql);

                    while ($registro = mysqli_fetch_array($resultado)){
                        $nome = $registro['nome_apoiador'];
                        $img = $registro['img_url'];
                        $type = $registro['type'];

                        if($type == 'patrocinador'){
                            echo "<img src='" . $img . "' alt='" . $nome . "'>";
                        }
                    }
                ?>

            </div>

            <h3 class="title">Apoiadores</h3>

            <div class="logos">
                <?php
                    $resultado = mysqli_query($conn, $sql);

                    while ($registro = mysqli_fetch_array($resultado)){
                        $nome = $registro['nome_apoiador'];
                        $img = $registro['img_url'];
                        $type = $registro['type'];

                        if($type == 'apoiador'){
                            echo "<img src='" . $img . "' alt='" . $nome . "'>";
                        }
                    }
                ?>
            </div>

            
        </div>
        <br><br>
        <?php echo $footer; ?>
    </div>  

    <!-- JS -->
    <script src="./js/menu.js"></script>

    <?php
        echo $mouseflow;
    ?>

</body>
</html>