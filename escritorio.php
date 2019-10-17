<!DOCTYPE html>
<?php
    function getPosts()
    {
        $posts = array();
    
        $posts [2] = $_POST ['receitas'];
        return $posts;
     }
     if (isset($_POST['insert'])){
         $data = getPosts();
     }

    require_once 'classes/funcoes.class.php';
    require_once 'classes/receita.class.php';
    require_once 'classes/contrato.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Receita();
    $objct = new Contrato();
    $receitas = "N";

    if(isset($_POST['insert'])){
        if($receitas == $data[2]){
            // N igual a receita
            if($objfn->queryInsertdespesaescri($_POST)=='ok'){
                    echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
                    echo "<script>window.location = 'escritorio.php';</script>";
            } 
        }else{
                if($objfn->queryInsertreceitaectri($_POST)=='ok'){
                echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
                echo "<script>window.location = 'escritorio.php';</script>";
            }
        }
    }   
   
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style1.css">
</head>
<!--Menu-->
<body>
<?php include_once("header.php"); ?>
        <!-- Conteúdo -->
                <fieldset id="escritorio">
                <legend>Lançamentos</legend>
                <form action="" method = "POST">
                    <fieldset id="receitas"  name="receitas">
                                    <legend>Tipo de Gasto</legend>
                                    <input type="radio" name="receitas" id="e" value="S" CHECKED /><label for="e" > Receita </label><br>
                                    <input type="radio" name="receitas" id="f" value="N"  <?php $enderecobb='' ?>  /><label for="f"> Despesa </label>
                    </fieldset>
                    <fieldset id="despesas">
                                Valor: <input type="text " name="valoor" id="valor" size="20 " maxlength="20 " placeholder="Estacionamento, Cópias " />
                                Data: <input type="date" name="data" id="data">
                                Descrição:<textarea id="dTrabalho " rows="0" cols="20 " maxlength="20 " name="descricao"></textarea>
                                <input type="submit" name="insert" value="Inserir" id="btn7">        
                    </fieldset>
            </form>
</body>

</html>