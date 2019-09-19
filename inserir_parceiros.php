<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/parceiro.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Parceiro();

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            header("location: inserir_parceiros.php");
        }
    }else{
        echo '<script type="text/javascript"> Alert("Erro ao inserir")</script>';
    }

?>


<!DOCTYPE html>


<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>

    <?php require_once("header.php");
    ?>
     <!--Formulário-->
    <br><br><p>
    <form action="inserir_parceiros.php" method="post">
    <label for="cCC">Nome do Parceiro: </label><input type="text" name="nome" id="cCC" size="14" maxlength="14" placeholder="Parceiro" />
    <input type="image" type="submit" value="Inserir" src="save.jpg" style="position:relative; height:100px;  float:left ; left:36%; top:800%; " />
    <input type="submit" name="insert" value="Inserir" >
    </form>
</body>
