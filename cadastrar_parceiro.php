<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/parceiro.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Parceiro();

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            echo ('<script type="text/javascript"> alert("Inserido com sucesso")</script>');
            echo "<script>window.location = 'cadastrar_parceiro.php';</script>"; 
            //header("location: cadasatrar_parceiro.php");
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
    <link rel="stylesheet" type="text/css" href="style/style1.css" />
</head>

<!--Menu-->
<nav>
    <div >
        <?php include_once("header.php"); ?>
    </div>
</nav>

<body>
    <div class="scroll-parceiro">
        <table id="tab6" border="1">
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
    <div class="search5">
        <form action="" method="post" >
            <input type="text" id="tParceiro" name="nome" maxlength="20" placeholder="Nome Parceiro" />
        
    </div>
    
        <button class="btn3" type="submit" name="insert">CADASTRAR PARCEIRO</button>
    </form>

</body>

</html>