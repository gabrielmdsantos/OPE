<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/cliente.class.php';
    require_once 'classes/parceiro.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Cliente();
    $objpc = new Parceiro();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="Style/style2.css">
    <script src="Script/jquery-2.1.4.min.js"></script>
    <script src="Script/javascriptcli.js"></script>
</head>

<!--Menu-->

<body>
    <?php include_once('header.php'); ?> 
    <!--consulta cliente-->    


    <div id="resultado" class="scroll" >
        <table border="1">
            <thead>
                <tr>
                    <td>C.C</td>
                    <td>Nome do cliente</td>
                    <td>Parceiros</td>
                    <td> Editar </td>
                </tr>
            </thead>
            <tbody>   
            <?php foreach($objfn->querySelectclieparc($_POST) as $rst){ ?>
                <tr>
                    <td><?php echo ($objFc->tratarCaracter($rst['id_cli'], 1)) ?> </td>
                    <td><?php echo ($objFc->tratarCaracter($rst['nome_cli'], 1)) ?></td>
                    <td><?php echo ($objFc->tratarCaracter($rst['nome_parceiro'], 1)) ?> </td>
                    <td><div class="editar"><a href="edita_cliente.php?acao=edit&func=<?=$objFc->tratarCaracter($rst['id_cli'], 1)?>" title="Editar dados"> <img src="img/ico-editar.png" width="16" height="16" alt="Editar"> </a></div>  </td>
                </tr>
               <?php } ?>

        </table>
    </div> 

    <form action="processa.php">  
    <div class="search4">
    <input type="text" name="campo"  id="campo" placeholder="Nome do Cliente" >
    </div>
    </form>

    <!--Campos de busca-->
        <!--Botão-->
        <button class="btnnn" type="button" name="tbtn"><a href="ins_cliente.php">CADASTRAR CLIENTE</a></button>
     
    
</body>

</html>

