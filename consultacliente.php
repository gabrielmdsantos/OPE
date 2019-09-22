<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/cliente.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Cliente();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="Style/style2.css">
</head>

<!--Menu-->

<body>
    <nav>
        <div >
        <?php include_once('header.php'); ?>
        </div>
    </nav>
    <!--consulta cliente-->
    </div>

    <div class="scroll">
        <table border="1">
            <thead>
                <tr position="sticky">
                    <th>C.C</th>
                    <th>Nome do cliente</th>
                    <th>Parceiros</th>
                </tr>
            </thead>
            </table>
            <table border="1">
            <tbody>
            <?php foreach($objfn->querySelectclieparc() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['id_cli'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['nome_cli'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['nome_parceiro'], 1)) ?> </td>
                </tr>
                <?php } ?>

        </table>
    </div>
    <!--Campos de busca-->
    <form>
        <div class="search3">
            <input type="number" id="tCCusto" maxlength="5" placeholder="C.C" />
        </div>
        <div class="search4">
            <input type="text" id="tCliente" maxlength="20" placeholder="CLIENTE" />
        </div>
        <select id="appearance-select">
            <option selected>PARCEIRO</option>
            <option></option>
        </select>

        <!--Botão-->
        <button class="btnnn" type="button" name="tbtn"><a href="ins_cliente.php">CADASTRAR CLIENTE</a></button>
        <button class="btnnn" type="button" name="tbtn"><a href="editarcliente.html">EDITAR CADASTRO</a></button>
    </form>
</body>

</html>

