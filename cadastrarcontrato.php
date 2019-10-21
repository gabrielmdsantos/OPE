<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/contrato.class.php';
    require_once 'classes/servico.class.php';
    require_once 'classes/cliente.class.php';


    $objFc = new Funcoes();
    $objfn = new Contrato();
    $objsv = new Servico();
    $objcl = new Cliente();

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            if($objfn->queryEndereco($_POST) == 'ok'){
            echo ('<script type="text/javascript"> alert("Inserido com sucesso")</script>');
            echo "<script>window.location = 'consultacontrato.php';</script>";
            }
        }else{
            echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
        }
    }
?>

<!DOCTYPE html>


<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style/style3.css">
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

<body>
    <?php include_once ("header.php"); ?>
    <!--Conteúdo-->
    <fieldset id="cadastro-contrato"  style="width:98%">
    <form method = "POST">
        <fieldset id="dadosfin" >
            <legend>Cliente</legend>
            <table id="tab16">
                <tr>
                    <td>
                        Cliente: 
                        <select name="id_cli">
                                <?php foreach($objcl->querySelectname() as $rst){ ?>
                                <option value="<?php echo ($objFc->tratarCaracter($rst['id'], 2)) ?>"> <?php echo ($objFc->tratarCaracter($rst['nome'], 2) ." || RG/IE: ". $objFc->tratarCaracter($rst['rg'], 2) ." || CPF/CNPJ: ". $objFc->tratarCaracter($rst['cpf'], 2) ) ?> 
                                </option>
                                <?php } ?>
                            </select>
                    </td>
                    <td> 
                    Serviço:
                        <select name="id_servi">
                            <?php foreach($objsv->querySelect() as $rst){ ?>
                            <option value="<?php echo ($objFc->tratarCaracter($rst['id'], 2)) ?>" > <?php echo ($objFc->tratarCaracter($rst['servico'], 2)) ?> 
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="dTrabalho">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0 " cols="20 " maxlength="20 "></textarea></td>
                    <td><label for="cPrazo">Prazo:</label><input type="date" name="prazo"></td>
                    <td><label for="cValorT">Valor do Contrato: </label> <input type="number" value="" name="valor" onBlur="calcular()" id="valor"  placeholder="R$1.000 " /></td>
                    </tr>
                <tr>
                    <td><label for="cParcelas">Quantidade de Parcelas </label><select name="qnt_parcela" id="qnt_parcela" onBlur="calcular()"> 
                                    <option selected >1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>                                        
                                </select></td>
                    
                    <td><label for="cValorP">Valor da Parcela: </label> <div id="final"> <input type="number"  value="" name="final " id="final " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                    <td><label for="cdate "></label>Dia de Vencimento: </label><input type="text" name="vencimento" name="cdate" /></td>
                </tr>
            </table>    
        </fieldset>
        <fieldset id="endereco-contrato">
        <legend>Endereço 1 </legend>
        <table id="tab17">
            <tr>
                <td>
                    CEP:        <input type="number" name="cep"          id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
                </td>
                <td> 
                    Logradouro: <input type="text" name="logradouro"     id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
                </td>
                <td> 
                    Número:     <input type="number" name="numero"      min="0" max="99999" placeholder="" />&nbsp;&nbsp;
                </td>
            </tr>
            <tr> 
                <td> 
                    Complemento:<input type="text" name="complemento"   size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
                </td>
                <td> 
                    Município: <input type="text"  name="municipio"     size="30"  placeholder="Cidade" />
                </td>
                <td> 
                    Estado:
                            <select name="estado" value="" id="cUF">
                                        <option selected>UF</option>
                                        <option value = "AC">Acre</option>
                                        <option value = "AL">Alagoas</option>
                                        <option value = "AM">Amazonas</option>
                                        <option value = "AP">Amapá</option>
                                        <option value = "BA">Bahia</option>
                                        <option value = "CE">Ceará</option>
                                        <option value = "DF">Distrito Federal</option>
                                        <option value = "ES">Espírito Santo</option>
                                        <option value = "GO">Goiás</option>
                                        <option value = "MA">Maranhão</option>
                                        <option value = "MT">Mato Grosso</option>
                                        <option value = "MS">Mato Grosso do Sul</option>
                                        <option value = "MG">Minas Gerais</option>
                                        <option value = "PA">Pará</option>
                                        <option value = "PB">Paraíba</option>
                                        <option value = "PR">Paraná</option>
                                        <option value = "PE">Pernambuco</option>
                                        <option value = "PI">Piauí</option>
                                        <option value = "RJ">Rio de Janeiro</option>
                                        <option value = "RN">Rio Grande do Norte</option>
                                        <option value = "RS">Rio Grande do Sul</option>
                                        <option value = "RO">Rondônia</option>
                                        <option value = "RR">Roraima</option>
                                        <option value = "SC">Santa Catarina</option>
                                        <option value = "SP">São Paulo</option>
                                        <option value = "SE">Sergipe</option>
                                        <option value = "TO">Tocantins</option> 
                                    </select> 
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="tipo" value="Obra"/>
                </td>
            </tr>
        </table> 
        <input type="submit" name="insert" value="Inserir" id="btn9"/>
        </fieldset>
        </form>
    </fieldset>        
    
</body>
</html>