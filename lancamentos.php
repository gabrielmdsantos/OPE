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
                    echo "<script>window.location = 'controleprojeto.php';</script>";
            } 
        }else{
                if($objfn->queryInsertreceita($_POST)=='ok'){
                echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
                echo "<script>window.location = 'controleprojeto.php';</script>";
            }
        }
    }   
    if(isset($_GET['acao'])){
        switch($_GET['acao']){
            case 'edit': $func = $objct->querySelecionalan($_GET['func']); 
                        $desp = $objfn->querySomadespesa($_GET['func']);
                        $recei = $objfn->querySomareceita($_GET['func']);
            break;
            case 'delr': 
                if($deleterec = $objct->queryDeletRec($_GET['func'],$_GET['delet']) != 'erro' ){
                    echo '<script type="text/javascript"> alert ("Deletado com sucesso"); </script>';
                    $ir = $_GET['func'];
                    header("location:lancamentos.php?acao=edit&func=$ir");
                } break;
            case 'deld': 
                if($deleterec = $objct->queryDeletDes($_GET['func'],$_GET['delet'])){
                    echo ('<script type="text/javascript"> alert ("Deletado com sucesso"); </script>');    
                    $ir = $_GET['func'];
                    header("location:lancamentos.php?acao=edit&func=$ir");               
                } break;
        }
    }

    
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style1.css">
    <link rel="stylesheet" type="text/css" href="style/style3.css">
</head>
<!--Menu-->
<body>
<?php include_once("header.php"); ?>
        <!-- Conteúdo -->
            <fieldset id="dadosFin" style="float:left; margin: 10px; margin-left:3%; margin-right: auto;  width:90%; height:350px; border-radius:20px 20px 20px 20px ">
                <legend>Cliente</legend>
                <form action="" method = "POST">
                    <table id="tab18">
                        <tr>
                            <td> CC <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['cc']))?($func['cc']):(''), 2)?>" name='id_cont'> </td>
                            <input type="hidden" value="<?php echo($func['id_cli']) ?>" name="id_cli">
                            <td> Cliente  <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['nome_cli']))?($func['nome_cli']):(''), 2)?>" id="search0 " maxlength="5 " placeholder="CLIENTE "></td>
                            <td> Parceiro <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['parceiro']))?($func['parceiro']):(''), 2)?>" id="search0 " maxlength="5 " placeholder="CLIENTE "></td>
                            <td> Servico  <input type="text"  value="<?=$objFc->tratarCaracter((isset($func['serico']))?($func['serico']):(''), 2)?>" id="search0 " maxlength="5 " placeholder="CLIENTE "> </td>
                            <td><label for="cRG ">RG: </label><input type="number" value="<?=$objFc->tratarCaracter((isset($func['rg_cli']))?($func['rg_cli']):(''), 2)?>"name="tRG " id="cRG " size="10 " maxlength="10 " placeholder="00.000.000-0 " /></td>
                            <td><label for="cCC ">CPF/ CNPJ: </label><input type="number"  value="<?=$objFc->tratarCaracter((isset($func['cpf_cli']))?($func['cpf_cli']):(''), 2)?>" name="tCC " id="cCC " size="14 " maxlength="14 " placeholder="000.000.000-00 " /></td>
                        </tr>
                        <tr>
                        <?php 
                        $valorparcela = $func['valor'] / $func['parcela']; ?>
                            <td><label for="dTrabalho ">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0" cols="20" maxlength="20"> <?=$objFc->tratarCaracter((isset($func['detalhes']))?($func['detalhes']):(''), 2)?>  </textarea></td>
                            <td><label for="cPrazo ">Prazo:</label><input type="text" value="<?=$objFc->tratarCaracter((isset($func['prazo']))?($func['prazo']):(''), 2)?>" name="prazo"></td>
                            <td><label for="cValorT ">Valor do Contrato: </label> <input type="number" value="<?=$objFc->tratarCaracter((isset($func['valor']))?($func['valor']):(''), 2)?>"  name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                            <td><label for="cValorP ">Valor da Parcela: </label><input type="number" name="tValorT" id="cValorT" value="<?php echo($valorparcela); ?>" min="0 " max="99999 " placeholder="R$1.000 " /></td>
                            <td><label for="cParcelas ">Quantidade de Parcelas </label> <input type="number" value="<?=$objFc->tratarCaracter((isset($func['parcela']))?($func['parcela']):(''), 2)?>"  name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /> </td>
                            <td>Data do Vencimento:<input type="text" value="<?=$objFc->tratarCaracter((isset($func['vencimento']))?($func['vencimento']):(''), 2)?>"  /></td>
                        </tr>
                    </table>
                    <div class="scroll-Cprojeto">
                        
                        <table id="tab19" border="1">
                            <thead>
                                <tr>
                                    <th> Valor </th>
                                    <th> Data </th>
                                    <th> Descrição  </th>
                                    <th> Excluir  </th>
                                </tr>
                            </thead>
                            <?php 
                                $rec = $objct->querySelectRec($_GET['func']);
                                $des = $objct->querySelectDesp($_GET['func']);
                                array_map (function($rec,$des){ 
                                    require_once 'classes/funcoes.class.php';
                                    require_once 'classes/receita.class.php';
                                    require_once 'classes/contrato.class.php';
                                    
                                    
                                    $objFc = new Funcoes();
                                    $objfn = new Receita();
                                    $objct = new Contrato();        
                            ?> 
                            <tbody>
                                <?php if ($des['VALOR'] != ''){ ?>
                                    <tr>
                                        <td><?php echo ('-'.$objFc->tratarCaracter($des['VALOR'], 2));        ?></td>
                                        <td><?php echo ($objFc->tratarCaracter($des['DATA'],1));    ?></td>
                                        <td><?php echo ($objFc->tratarCaracter($des['descricao'],1));    ?></td>
                                        <td> <div class="excluir"> <a href="?acao=deld&func=<?=$objFc->tratarCaracter($_GET['func'], 1)?>&delet=<?=$des['ID']?>" /> <img src="img/ico-excluir.png" width="16" height="16" alt="Excluir"></a></div> </td>
                                    </tr>
                                <?php
                                } if ($rec['VALOR'] != ''){ ?>
                                    <tr>
                                            <td><?php echo ('+'.$objFc->tratarCaracter($rec['VALOR'], 2));        ?></td>
                                            <td><?php echo ($objFc->tratarCaracter($rec['DATA'],1));    ?></td>
                                            <td><?php echo ($objFc->tratarCaracter($rec['descricao'],1));    ?></td>
                                            <td> <div class="excluir"> <a href="?acao=delr&func=<?=$objFc->tratarCaracter($_GET['func'], 1)?>&delet=<?=$rec['ID']?>" /> <img src="img/ico-excluir.png" width="16" height="16" alt="Excluir"></a></div> </td>
                                        </tr>
                                <?php 
                                } 
                                }, $rec,$des); ?>
                            </tbody>

                        </table>
                </div>

                    <?php
                        $contrato =  $func['valor'];
                        $receita = $recei['receita'];
                        //echo ($receita);
                        $despesa = $desp['despesa'];
                        $valortotal = $contrato+$despesa;
                        //echo ($valortotal);
                        //echo ('  B  '.$despesa);
                        //echo ('  a  '. $receita);
                        $final = $valortotal - $receita;

                    ?>
                    Valor Total do Contrato:  <input type="number" readonly="true" name="tValorT " id=""    value="<?php echo($valortotal); ?>" min="0 " max="99999 " placeholder="R$1.000 " />
                    Valor Restante a ser pago: </label> <input type="number" readonly="true" name="tValorT" value="<?php echo($final); ?>" id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>

            </fieldset>
            
                <fieldset id="dadosFin " style="float:left; margin: 10px; margin-left:3%; margin-right: auto;  width:91%; height:100px; border-radius:20px 20px 20px 20px ">
                    <legend>Lançamentos</legend>

                    <fieldset id="receitas"  name="receitas"  style="position: relative; width: 10%; height: 50px; float:left; top:7px; border: #696969 1px solid; border-radius:20px font-family: Arial; font-size: 12px; text-transform: uppercase;">
                                    <legend>Gastos</legend>
                                    <input type="radio" name="receitas" id="e" value="S" CHECKED /><label for="e" > Receita </label><br>
                                    <input type="radio" name="receitas" id="f" value="N"  <?php $enderecobb='' ?>  /><label for="f"> Despesa </label>
                    </fieldset>
                            <div class="lancamentos">
                                Valor: <input type="text " name="valoor" size="20 " maxlength="20 " placeholder="Estacionamento, Cópias " /></td>
                                Data: <input type="date" name="data" >
                        
                            </div> 
                </fieldset>

             <p><input type="submit" name="insert" value="Inserir"id="btn13"/>        
            </form>
</body>

</html>