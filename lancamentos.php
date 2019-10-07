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
            if($objfn->queryInsertdespesa($_POST)=='ok'){
                    echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
            } 
        }else{
                if($objfn->queryInsertreceita($_POST)=='ok'){
                echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
            }
        }
    }   
    if(isset($_GET['acao'])){
        switch($_GET['acao']){
            case 'edit': $func = $objct->querySelecionalan($_GET['func']); break;
            break;
        }
    }   
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
</head>
<!--Menu-->
<body>
<?php include_once("header.php"); ?>
        <!-- Conteúdo -->
        <div style="height:180px">
            <fieldset id="dadosFin" style="height:250px;  float:left; margin-top: 10px; margin-left:auto; margin-right: auto;  width:98%; border-radius:20px 20px 20px 20px ">
                <legend>Cliente</legend>
                <form action="" method = "POST">
                    <table style="HEIGHT:100%; WIDTH:100%;">
                        <tr align="left " bottom="middle ">
                       <td> CC <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['cc']))?($func['cc']):(''), 2)?>" name='id_cont'> </td>
                            <td> Cliente  <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['nome_cli']))?($func['nome_cli']):(''), 2)?>" id="search0 " maxlength="5 " placeholder="CLIENTE "></td>
                            <td> Parceiro <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['parceiro']))?($func['parceiro']):(''), 2)?>" id="search0 " maxlength="5 " placeholder="CLIENTE "></td>
                            <td> Servico  <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['serico']))?($func['serico']):(''), 2)?>" id="search0 " maxlength="5 " placeholder="CLIENTE "> </td>
                            <td><label for="cRG ">RG: </label><input type="number" value="<?=$objFc->tratarCaracter((isset($func['rg_cli']))?($func['rg_cli']):(''), 2)?>"name="tRG " id="cRG " size="10 " maxlength="10 " placeholder="00.000.000-0 " /></td>
                            <td><label for="cCC ">CPF/ CNPJ: </label><input type="number"  value="<?=$objFc->tratarCaracter((isset($func['cpf_cli']))?($func['cpf_cli']):(''), 2)?>" name="tCC " id="cCC " size="14 " maxlength="14 " placeholder="000.000.000-00 " /></td>
                        </tr>
                        <tr>
                            <td><label for="dTrabalho ">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0" cols="20" maxlength="20"> <?=$objFc->tratarCaracter((isset($func['detalhes']))?($func['detalhes']):(''), 2)?>  </textarea></td>
                            <td><label for="cPrazo ">Prazo:</label><input type="text" value="<?=$objFc->tratarCaracter((isset($func['prazo']))?($func['prazo']):(''), 2)?>" name="prazo"></td>
                            <td><label for="cValorT ">Valor do Contrato: </label> <input type="number" value="<?=$objFc->tratarCaracter((isset($func['valor']))?($func['valor']):(''), 2)?>"  name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                            <td><label for="cValorP ">Valor da Parcela: </label><input type="number" name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                            <td><label for="cParcelas ">Quantidade de Parcelas </label> <input type="number" value="<?=$objFc->tratarCaracter((isset($func['parcela']))?($func['parcela']):(''), 2)?>"  name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /> </td>
                        </tr>
                        <tr>

                            <td>Data do Vencimento:<input type="text" value="<?=$objFc->tratarCaracter((isset($func['vencimento']))?($func['vencimento']):(''), 2)?>"  /></td>
                        </tr>
                    </table>
                    <br><p>
                    Valor Total do Contrato:  <input type="number " name="tValorT " id="" min="0 " max="99999 " placeholder="R$1.000 " />
                    Valor Restante: </label> <input type="number " name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>

            </fieldset>
            <div style="height:80px ">
                <fieldset id="dadosFin " style="height:80px; float:left; margin-top: 10px; margin-left:auto; margin-right: auto; width:98%; border-radius:20px 20px 20px 20px ">
                    <legend>Lançamentos</legend>

                    <fieldset id="receitas"  name="receitas"  style="position: relative; height: 50px; float:left; width:100px; top:0px; border-radius:20px 20px 20px 20px">
                                    <legend></legend>
                                    <input type="radio" name="receitas" id="e" value="S" CHECKED /><label for="e" > Receita </label><br>
                                    <input type="radio" name="receitas" id="f" value="N"  <?php $enderecobb='' ?>  /><label for="f"> Despesa </label>
                    </fieldset><p>
                                Valor: <input type="text " name="valoor" size="20 " maxlength="20 " placeholder="Estacionamento, Cópias " /></td>
                                Data: <input type="date" name="data" >
                                Descrição:<textarea id="dTrabalho " rows="0 " cols="20 " maxlength="20 " name="descricao"></textarea>

                            </tr>
                        
                   
                </fieldset>
                <br><p><br>
            </div>  
             <p><input type="submit" name="insert" value="Inserir">        
            </form>
</body>

</html>