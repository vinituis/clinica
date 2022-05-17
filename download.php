<?php 

@include 'config.php';
@include 'cabecalho.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:./');
}

$sql = "SELECT * FROM user_form";

$arquivo = 'usuarios.xls';
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename={$arquivo}" );
header ("Content-Description: PHP Generated Data" );

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
</head>
<body>
    <div>   
        <table border="1" id="table" class="tabela-usuario">
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Tipo</td>
                <td>Dor</td>
            </tr>
            <?php 
            
            if($res=mysqli_query($conn, $sql)){
                $name = array();
                $email = array();
                $user_type = array();
                $dor = array();
                $i = 0;
                while ($reg = mysqli_fetch_assoc($res)) {
                   $name[$i] = $reg['name'];
                   $email[$i] = $reg['email'];
                   $user_type[$i] = $reg['user_type'];
                   $dor[$i] = $reg['dor'];
                   echo "<tr>";
                   echo "<td>" . $name[$i] . "</td>";
                   echo "<td>" . $email[$i] . "</td>";
                   echo "<td>" . $user_type[$i] . "</td>";
                   echo "<td>" . $dor[$i] . "</td>";
                   echo "</tr>";
                }
             }
            ?>
            
        </table>
    </div> 

</body>
</html>