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
    
    $objFc = new Funcoes();
    $objfn = new Receita();
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
        <!--Conteúdo-->
        <div style="height:180px">
            <fieldset id="dadosFin" style="height:100%;  float:left; margin-top: 10px; margin-left:auto; margin-right: auto;  width:98%; border-radius:20px 20px 20px 20px ">
                <legend>Cliente</legend>
                <form action="" method = "POST">
                    <table style="HEIGHT:100%; WIDTH:100%;">
                        <tr align="left " bottom="middle ">
                            <td> CC <input type="text" name="id_cont"></td>
                            <td><input type=" search " id="search0 " maxlength="5 " placeholder="CLIENTE "></td>
                            <td><select name="select ">
                                <option selected>SELECIONE PARCEIRO</option>
                                <option></option>
                            </select>
                            </td>
                            <td>
                                <select name="select ">
                                    <option>SELECIONE SERVIÇO</option>
                                    <option></option>
                                </select>
                            </td>
                            <td><label for="cRG ">RG: </label><input type="number " name="tRG " id="cRG " size="10 " maxlength="10 " placeholder="00.000.000-0 " /></td>
                            <td><label for="cCC ">CPF/ CNPJ: </label><input type="number " name="tCC " id="cCC " size="14 " maxlength="14 " placeholder="000.000.000-00 " /></td>
                        </tr>
                        <tr>
                            <td><label for="dTrabalho ">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0 " cols="20 " maxlength="20 "></textarea></td>
                            <td><label for="cPrazo ">Prazo:</label><input type="date" name="prazo"></td>
                            <td><label for="cValorT ">Valor do Contrato: </label> <input type="number " name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                            <td><label for="cValorP ">Valor da Parcela: </label><input type="number " name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                            <td><label for="cParcelas ">Quantidade de Parcelas </label><select name="cParcelas " id="cParcelas ">
                                    <option selected></option>
                                    <option>1X</option>
                                    <option>2X</option>
                                    <option>3X</option>
                                    <option>4X</option>
                                    <option>5X</option>
                                    <option>6X</option>
                                    <option>7X</option>
                                    <option>8X</option>
                                    <option>9X</option>
                                    <option>10X</option>                                        
                                </select></td>
                        </tr>
                        <tr>

                            <td><label for="cdate ">Data do Pagamento: </label><input type="date" /></td>
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