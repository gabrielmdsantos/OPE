<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/servico.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Servico();

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            echo '<script type="text/javascript"> alert("Inserido com sucesso")</script>';
            echo "<script>window.location = 'servico.php';</script>";            
        }
    else{
        echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
    }
    }
?>

<!DOCTYPE html>


<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
</head>

<!--Menu-->

<body>
 
           <?php include_once("header.php"); ?>
    
    <!--Conteúdo-->
    <div class="scroll-parceiro">
           
            <table border="1">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>SERVIÇO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($objfn->querySelect() as $rst){ ?>
                    <tr>
                        <td> <?php echo ($objFc->tratarCaracter($rst['id'], 1)) ?> </td>
                        <td> <?php echo ($objFc->tratarCaracter($rst['servico'],2)) ?> </td>
                    </tr>
                    <?php } ?>
                    
            </table>
        </div>
        <div class="parceiro">
            <form method="POST" action="">
                <input type="text" id="tParceiro" name="nome" maxlength="20" placeholder="Tipo de Serviço" />
           
        </div>
       
            <button class="btn" type="submit" name="insert">CADASTRAR SERVIÇO</button>
        </form>

</html>