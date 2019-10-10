<?php
    
    require_once 'classes/contrato.class.php';
    require_once 'classes/receita.class.php';
    require_once 'classes/funcoes.class.php';
    
    $objFc = new Funcoes();
    $objct = new Contrato();
    $objrc = new Receita();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
    <script src="Script/jquery-2.1.4.min.js">  </script>
    <script src="Script/controle.js">   </script>
    

</head>

<!--Menu-->

<body>
    <?php include_once("header.php"); ?>

    <div id="resultado" class="scroll" >
        <table border="1">
            <thead>
                <tr>
                    
                    <th>C.C</th>
                    <th>CLIENTE</th>
                    <th>Total de Receita</th>
                    <th> Total de despesas  </th>
                    <th> Lançamentos </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $rec = $objrc->querySelectreceita();
                $des = $objrc->querySelectdespesa();
                array_map (function($rec,$des){ 
                    require_once 'classes/funcoes.class.php';
                    $objFc = new Funcoes();        
            ?>
                <tr>
                    <td> <?php echo ($rec['ID_CONTRATO']); ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rec['NOME_CLI'],2)); ?> </td>
                    <td> <?php echo ($rec['receita']); ?> </td>
                    <td> <?php echo ($des['DESPESA']); //($objFc->tratarCaracter($rst['VENC'], 2)) ?> </td>
                    <td><div class="editar"><a href="lancamentos.php?acao=edit&func=<?php echo $rec['ID_CONTRATO'] ?>" title="Editar dados"> <img src="img/ico-editar.png" width="16" height="16" alt="Editar"> </a></div>  </td>
                </tr>
                <?php }, $rec,$des); ?>

        </table>
    </div>
    <!--Campos de busca-->
    <form action="processa_controle.php">  
        <div class="search">
        <input type="text" name="campo"  id="campo" placeholder="Nome do Cliente" >
        </div>
    </form> 
  
    
</body>

</html>