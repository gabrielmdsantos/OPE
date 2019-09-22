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
</head>

<!--Menu-->

<body>
    <?php include_once("header.php"); ?>

    <div class="scroll-contrato">
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
                </tr>
            </thead>
            <tbody>
            <?php foreach($objfn->querySelectcli() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CC'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CLI'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['Serv'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['DETALHES'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['VALOR'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['QNT_PARC'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['VENC'], 1)) ?> </td>
                </tr>
                <?php } ?>

        </table>
    </div>
    <!--Campos de busca-->
    <div class="search1">
        <form method="post">
            <input type="number" id="tCCusto" maxlength="5" placeholder="C.C">
        </form>
    </div>
    <div class="search2">
        <form method="post">
            <input type="text" id="tCliente" maxlength="5" placeholder="CLIENTE">
        </form>
    </div>
    <div class="statusobra">
        <form method="POST">
            <select name="cStatusO" id="StatusO">
                    <option selected>STATUS DA OBRA</option>
                    <option> NÃO INICIADO</option>
                    <option>EM ANDAMENTO</option>
                    <option>INCOMPLETO</option>
                    <option>INTERROMPIDO</option>
                    <option>CONCLUÍ DO</option>
            </select>
        </form>
    </div>
    <!--Botão-->
    <div class="btn1"><a href="cadastrarcontrato.php">CADASTRAR CONTRATO</a></div>

</body>

</html>