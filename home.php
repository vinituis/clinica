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
    <title>Clínica de Soluções - Página Inicial</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/global.css">
    <!--<link rel="stylesheet" href="./css/reset.css">-->
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="./css/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owlcarousel/owl.theme.default.min.css">
    <!-- Slide Topo -->
    <link rel="stylesheet" href="./css/slideshow.css">
    
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
                <a class="ativo nav-item" href="./home">Página Inicial</a>
                <a class ="nav-item" href="./iniciativa">A Iniciativa</a>
                <a class ="nav-item" href="./contato">Contato</a>
                <a class ="nav-item" href="logout" class="btn">Sair</a>
            </div>
        </header>
        <h1 class="txt-bv">Bem Vindo <span><?php if(isset($_SESSION['admin_name'])){ echo '';}else{echo $_SESSION['user_name'];} ?></span>!</h1>

        <div class="slideshow-container">

            <div class="mySlides fade">
            <div class="numbertext">1 / 2</div>
            <img src="./img/banner/1.png" style="width:100%">
            <div class="text">Caption 1</div>
            </div>
            
            <div class="mySlides fade">
            <div class="numbertext">2 / 2</div>
            <img src="./img/banner/2.png" style="width:100%">
            <div class="text">Caption 2</div>
            </div>
            
        </div>

        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span>
        </div>

        <div class="search">
            <div>
                <input type="text" name="" id="inputSearch">
            </div>
            <div>
                <i class="fa fa-filter" id="filtro"></i>
            </div>
        </div>

        <div class="filter" id="filter">
            <div>
                <span class="span">Cibersecurity</span>
                <!-- <span class="span">Realidade Aumentada e Simulações Virtuais</span>
                <span class="span">Manufatura Aditiva</span>
                <span class="span">Digitalização</span>
                <span class="span">Big Data</span>
                <span class="span">Iot</span> -->
            </div>
        </div>


        <div id="itens">
            <h3 class="title">Cibersecurity</h3>
            <div class="owl-carousel owl-theme">

            
            <?php
                /* Precisa inserir as categorias no banco empresa_form e aplicar algo semelhante ao logos da página de iniciativa */
                $sql = 'SELECT * FROM empresa_form';
                if($res=mysqli_query($conn, $sql)){
                    $img = array();
                    $nome_empresa = array();
                    $nome_solucao = array();
                    $descritivo = array();
                    $btn1 = array();
                    $txt_btn1 = array();
                    $btn2 = array();
                    $txt_btn2 = array();
                    $video = array();
                    $i = 0;
                    $id = array();
                    while ($reg = mysqli_fetch_assoc($res)) {
                        $img[$i] = $reg['url_img_thumb'];
                        $nome_empresa[$i] = $reg['nome_empresa'];
                        $nome_solucao[$i] = $reg['nome_solucao'];
                        $descritivo[$i] = $reg['descritivo'];
                        $btn1[$i] = $reg['url_btn1'];
                        $txt_btn1[$i] = $reg['txt_btn1'];
                        $btn2[$i] = $reg['url_btn2'];
                        $txt_btn2[$i] = $reg['txt_btn2'];
                        $video[$i] = $reg['url_video'];
                        $id[$i] = $reg['id'];
                        
            ?>
        
                <div class="item">
                <a href="./fornecedor?id=<?php echo $id[$i]; ?>">
                <img src="<?php echo $img[$i]; ?>">
                <p class="nome-solucao"><?php echo $nome_solucao[$i]; ?></p>
                </a>
                </div>
            
            <?php } ?>
            </div>
            <div id="msgP" class="msg"></div>
        </div>
            
        <?php echo $footer; ?>
    </div>

    <?php } ?>

    <!-- JS -->
    <script src="./js/menu.js"></script>
    <script src="./js/slideshow.js"></script> 
    <script src="./js/pesquisa.js"></script> 

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/owlcarousel/owl.carousel.min.js"></script>
    <script src="./js/owlcarousel/owl.js"></script>

    <?php
        echo $mouseflow;
    ?>

</body>
</html>