<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/contrato.class.php';
    require_once 'classes/servico.class.php';
    require_once 'classes/cliente.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Contrato();
    $objsv = new Servico();
    $objcl = new Cliente();

    if(isset($_POST['alterar'])){
        if($objfn->queryupdateend($_POST) == 'ok' ){
            if($objfn->queryupdatecontrato($_POST) == 'ok'){
                echo ('<script type="text/javascript"> alert("Alterado com sucesso")</script>');
            echo "<script>window.location = 'consultacontrato.php';</script>";            
        }else{
            echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
        }
    }
    }
    if(isset($_GET['acao'])){
        switch($_GET['acao']){
            case 'edit': $func = $objfn->querySeleciona($_GET['func']); 
                        $id_cli = $func['id_cli'];
                        $edn = $objfn->querySelectendereco($id_cli,$_GET['func']);
                break;
            case 'delet':
                if($objFn->queryDelete($_GET['func']) == 'ok'){
                    header('location: /formulario');
                }else{
                    echo '<script type="text/javascript">alert("Erro em deletar");</script>';
                }
                    break;
        }
    }

?>

<head>
    <meta charset="UTF-8"/>
    <title> Teste </title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
</head>
<script type="text/javascript">    
    function calcular(){
        var valor = document.getElementById("valor").value;
        var parce = document.getElementById("qnt_parcela").value;
        var final = valor / parce;
        document.getElementById("final").innerHTML = "<input type='text' value='"+ final +"'/>";
    }
</script>

<!--Menu-->
<?php include_once ("header.php"); ?>
<body>
    
    <!--Conteúdo-->
    <div style="height:180px">
        <fieldset id="dadosFin" style="height:100%; float:left; margin-top: 10px; width:97%; border-radius:20px 20px 20px 20px">
            <legend>Cliente</legend>
            <form method = "POST">
                <table style="HEIGHT:100%; WIDTH:100%;">
                    <tr align="left " bottom="middle ">
                        <input type="hidden" name="id_contrato" value="<?=$objFc->tratarCaracter((isset($func['id_contrato']))?($func['id_contrato']):(''), 2)?>" />
                        <td>Cliente: 
                        <input type="text"  name="nome" value="<?=$objFc->tratarCaracter((isset($func['nome_cli']))?($func['nome_cli']):(''), 2)?>" id="Nome" size="40" maxlength="40" placeholder="Nome Completo" /> 
                        </td>
                        <td>
                        Serviço:
                        <input type="text"  name="servico" value="<?=$objFc->tratarCaracter((isset($func['nome_servico']))?($func['nome_servico']):(''), 2)?>" id="Nome" size="40" maxlength="40" placeholder="Serviço" />
                        </td>
                        <td><label for="cRG ">RG/IE: </label><input type="number " name="tRG" value="<?=$objFc->tratarCaracter((isset($func['rg_cli']))?($func['rg_cli']):(''), 1)?>" id="cRG " size="10 " maxlength="10 " placeholder="00.000.000-0 " /></td>
                        <td><label for="cCC ">CPF/CNPJ: </label><input type="number "     value="<?=$objFc->tratarCaracter((isset($func['cpf_cli']))?($func['cpf_cli']):(''), 1)?>" name="tCC " id="cCC " size="14 " maxlength="14 " placeholder="000.000.000-00 " /></td>
                    </tr>
                    <tr>
                        <td><label for="dTrabalho ">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0 " cols="20 " maxlength="20 "> <?php echo $objFc->tratarCaracter((isset($func['detalhes_contrato']))?($func['detalhes_contrato']):(''), 2)?> </textarea></td>
                        <td><label for="cPrazo ">Prazo:</label><input type="date" name="prazo" value="<?=$objFc->tratarCaracter((isset($func['prazo']))?($func['prazo']):(''), 1)?>" ></td>
                        <td><label for="cValorT ">Valor do Contrato: </label> <input type="number" value="<?=$objFc->tratarCaracter((isset($func['valor']))?($func['valor']):(''), 2)?>" onBlur="calcular()" name="valor" id="valor" min="0 " max="99999 " placeholder="R$1.000 " /></td>
                        <?php
                            $valor = $func['valor'];
                            $qnt_p = $func['parcelas'];
                            $vlp = $valor / $qnt_p;
                        ?>
                        <td><label for="cValorP ">Valor da Parcela: </label><div id="final"> <input type="number" readonly=“true” name="final" id="final" value="<?php echo ($vlp);?>"  min="0 " max="99999 " placeholder="R$1.000 " /></td>
                        <td><label for="cParcelas ">Quantidade de Parcelas </label>

                        <input type="number" value="<?=$objFc->tratarCaracter((isset($func['parcelas']))?($func['parcelas']):(''), 2)?>" onBlur="calcular()" name="qnt_parcela" id="qnt_parcela" min="0" max="99999" placeholder="3x"/>
                    </tr>
                    <tr>
                        <td><label for="cdate "></label>Dia de Vencimento: </label><input type="text"  value="<?=$objFc->tratarCaracter((isset($func['dia_vencimento']))?($func['dia_vencimento']):(''), 2)?>" name="vencimento" name="cdate" /></td>
                    </tr>
                </table>
            
        </fieldset>
        <div style="height:120px ">
            <fieldset id="dadosFin " style="height:100%; float:left; margin-top: 10px; width:97%; border-radius:20px 20px 20px 20px">
                <legend>Endereço do Projeto</legend>
                
                    <table style="HEIGHT:100px;; WIDTH:100%;">
                        <tr align="left " bottom="middle ">
                        <input type="hidden" name="id_end" value="<?=$objFc->tratarCaracter((isset($edn['id']))?($edn['id']):(''), 2)?>" />
                            <td><label for="cLog">Logradouro: </label><input type="text" name="logradouro" value="<?=$objFc->tratarCaracter((isset($edn['logradouro']))?($edn['logradouro']):(''), 2)?>"  id="cLog" size="40" maxlength="40" placeholder="R:, Av:, Est:..." /></td>
                            <td><label for="cNum">Número: </label><input type="number" name="numero"   value="<?=$objFc->tratarCaracter((isset($edn['Numero']))?($edn['Numero']):(''), 2)?>"  id="cNum" min="0" max="99999" placeholder="000" /></td>
                            <td><label for="cComp">Complemento: </label><input type="text" name="complemento" value="<?=$objFc->tratarCaracter((isset($edn['Complemento']))?($edn['Complemento']):(''), 2)?>"  id="cComp" size="30" maxlength="30" placeholder="Apto, Sala, ... " /></td>

                        </tr>
                        <tr>
                            <td><label for="cCP">CEP: </label><input type="text" name="cep" value="<?=$objFc->tratarCaracter((isset($edn['cep']))?($edn['cep']):(''), 2)?>" size="5" maxlength="8"> 
                            <td><label for="cMun">Município: </label><input type="text" name="municipio" value="<?=$objFc->tratarCaracter((isset($edn['municipio']))?($edn['municipio']):(''), 2)?>" id="cMun" size="30" maxlength="30" placeholder="Cidade" /></td>
                            <td><label for="cUF">Estado: </label> <input type="text" name="estado" value="<?=$objFc->tratarCaracter((isset($edn['estado']))?($edn['estado']):(''), 2)?>" id="cMun" size="30" maxlength="30" placeholder="Cidade" /></td>
                            </td>
                        </tr>
                    </table>
            </fieldset>
        </div>
        <input type="submit" name="alterar" value="Alterar" >
        </form>
</body>

</html>