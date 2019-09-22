<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/parceiro.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Parceiro();

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            header("location: cadasatrar_parceiro.php");
        
    }else{
        echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
    }
}

?>

<!DOCTYPE html>


<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css" />
</head>

<!--Menu-->

<body>
    <nav>
        <div >
           <?php include_once("header.php"); ?>
        </div>
    </nav>
    <div class="scroll-parceiro">
        <table border="1">
            <thead>
                <tr>
                <th>ID</th>
                <th>PARCEIRO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($objfn->querySelect() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['id_parc'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['nome'], 1)) ?> </td>
                </tr>
                <?php } ?>
              
        </table>
    </div>
    <div class="parceiro">
        <form action="" method="post" >
            <input type="text" id="tParceiro" name="nome" maxlength="20" placeholder="Nome Parceiro" />
        
    </div>
    
        <button class="btn" type="submit" name="insert">CADASTRAR PARCEIRO</button>
    </form>

</body>

</html>