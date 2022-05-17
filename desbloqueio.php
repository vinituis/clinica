<?php

include 'config.php';

$id_page = $_GET['id'];

$sql = "UPDATE user_form SET user_type = 'user' WHERE id = '$id_page'";

if (mysqli_query($conn, $sql)) {
    $sucesso = "Desbloqueio realizado com sucesso!";
} else {
    $sucesso = "Houve um erro: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sucesso?></title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/erro.css">
</head>
<body>

<div class="content">
    <h1><?php echo $sucesso?></h1>
    <a href="./"><button class="btn-p">Retornar para o site</button></a>
</div>
    
</body>
</html>