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
    <link rel="stylesheet" type="text/css" href="Style/style1.css">
    <script src="Script/jquery-2.1.4.min.js"></script>
    <script src="Script/javascriptcli.js"></script>
</head>

<!--Menu-->

<?php include_once('header.php'); ?> 

<body>
     <!--consulta cliente-->    
    <div id="resultado" class="scroll-cliente">
        <table border="1" id="tab1">
            <thead>
                <tr>

                    <th>C.C</th>
                    <th>Nome do cliente</th>
                    <th>Parceiros</th>
                    <th> Editar </th>
                </tr>
            </thead>
            <tbody>   
            <?php foreach($objfn->querySelectclieparc($_POST) as $rst){ ?>
                <tr>
                    <td><?php echo ($objFc->tratarCaracter($rst['id_cli'], 2)) ?> </td>
                    <td><?php echo ($objFc->tratarCaracter($rst['nome_cli'], 2)) ?></td>
                    <td><?php echo ($objFc->tratarCaracter($rst['nome_parceiro'], 2)) ?> </td>
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
        <button class="button-cli" type="button" name="tbtn"><a href="ins_cliente.php">CADASTRAR CLIENTE</a></button>
     
    
</body>

</html>

