<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/contrato.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Contrato();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
    <script src="Script/jquery-2.1.4.min.js"></script>
    <script src="Script/javascriptcontrato.js"></script>

</head>

<!--Menu-->

<body>
    <?php include_once("header.php"); ?>

    <div id="resultado" class="scroll-contrato">
        <table border="1">
            <thead>
                <tr>
                    
                    <th>C.C</th>
                    <th>CLIENTE</th>
                    <th>SERVIÇO</th>
                    <th>Detalhes</th>
                    <th>VALOR</th>
                    <th>QUANTIDADE DE VEZES</th>
                    <th>PRÓXIMA PARCELA</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($objfn->querySelectcli() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CC'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CLI'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['Serv'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['DETALHES'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['VALOR'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['QNT_PARC'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['VENC'], 2)) ?> </td>
                    <td><div class="editar"><a href="edita_contrato.php?acao=edit&func=<?=$objFc->tratarCaracter($rst['CC'], 1)?>" title="Editar dados"> <img src="img/ico-editar.png" width="16" height="16" alt="Editar"> </a></div>  </td>
                </tr>
                <?php } ?>

        </table>
    </div>
    <!--Campos de busca-->
    <form action="processacontrato.php">  
        <div class="search2">
        <input type="text" name="campo"  id="campo" placeholder="Nome do Cliente" >
        </div>
    </form>
    
    <!--Botão-->
    <div class="btn1"><a href="cadastrarcontrato.php">CADASTRAR CONTRATO</a></div>

</body>

</html>