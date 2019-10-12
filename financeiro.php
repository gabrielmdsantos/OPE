<?php 
require_once 'classes/funcoes.class.php';
require_once 'classes/financeiro.class.php';

$objFc = new Funcoes();
$objfi = new Financeiro();

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
    <?php include_once("header.php"); ?>

    <!--Financeiro-->
    
    <fieldset id="dadosFin " style="height:50px; float:left; margin-top: 10px; margin-left:auto; margin-right: auto; width:98%; border-radius:20px 20px 20px 20px ">
    <legend>Pesquisa</legend>
    <form action="" method="post">
           Data Inicio: <input type="date" name="inicio" id="tCCusto" maxlength="5" placeholder="C.C">
           Data Fim: <input type="date"    name="fim" id="tCliente" maxlength="5" placeholder="CLIENTE">
    <input type="submit" name="Pesquisar" value="pesquisar">
    </fieldset>
    </form>
    <br><p><br><br>
    <?php 
        if(isset($_POST['Pesquisar'])){
                        echo ('
            <div class="scroll-financeiro">
            <table border="1">
                <thead>
                    <tr>
                        <th>DATA</th>
                        <th>Observação</th>
                        <th>VALOR TOTAL</th>
                    </tr>
                </thead>
                <tbody> ');
                $rec = $objfi->QuerySelectReceita($_POST); 
                $des = $objfi->QuerySelectDespesa($_POST);
                array_map(function($des,$rec){
                    require_once 'classes/funcoes.class.php';
                    $objFc = new Funcoes();
                    if ($des['VALOR'] != ''){
                    echo('
                    <tr>
                        <td>'); echo ($objFc->tratarCaracter($des['DATA'], 2)); echo (' </td>
                        <td>'); echo ($objFc->tratarCaracter($des['descricao'],1)); echo ('</td>
                        <td>'); echo ('-'.$objFc->tratarCaracter($des['VALOR'],1)); echo('</td>
                    </tr>
                    <tr>');}
                    if($rec['VALOR'] != ''){ 
                    echo('
                        <td>'); echo ($objFc->tratarCaracter($rec['DATA'], 2)); echo (' </td>
                        <td>'); echo ($objFc->tratarCaracter($rec['descricao'],1)); echo ('</td>
                        <td>'); echo ('+'.$objFc->tratarCaracter($rec['VALOR'],1)); echo('</td>
                    </tr>
                    ');} }, $des,$rec);   echo('
            </table>
        </div> 
        ');
        $receita = $objfi->QueryTotalReceita($_POST);
        $despesa = $objfi->QueryTotalDespesa($_POST);
        $valorfinal = $receita['valor'] - $despesa['valor'];
        echo('
        Receita Total:  <input type="text" value="R$ '.$receita['valor'].'" readonly=“true”>
        Despesa Total:  <input type="text" value="R$ '.$despesa['valor'].'" readonly=“true”>
        Valor Final:    <input type="text" value="R$ '.$valorfinal.'" readonly=“true”>
    ');

    }
    ?>
   
</body>

</html>