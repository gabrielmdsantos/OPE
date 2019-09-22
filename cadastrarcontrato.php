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
            header("location: cadastrarcontrato.php");
        }
    }else{
        echo '<script type="text/javascript"> Alert("Erro ao inserir")</script>';
    }

?>

<!DOCTYPE html>


<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
</head>

<!--Menu-->

<body>
    <?php include_once ("header.php"); ?>
    <!--Conteúdo-->
    <div style="height:180px">
        <fieldset id="dadosFin" style="height:100%;  float:height; margin-top: 10px; margin-left:auto; margin-right: auto;  width:90%; border-radius:20px 20px 20px 20px ">
            <legend>Cliente</legend>
            <form method = "POST">
                <table style="HEIGHT:100%; WIDTH:100%;">
                    <tr align="left " bottom="middle ">
                        <td>Cliente: 
                            <select name="id_cli">
                                    <?php foreach($objcl->querySelectname() as $rst){ ?>
                                    <option value="<?php echo ($objFc->tratarCaracter($rst['id'], 1)) ?>"> <?php echo ($objFc->tratarCaracter($rst['nome'], 1)) ?> 
                                    </option>
                                    <?php } ?>
                                </select>
                        </td>
                        <td>
                        Serviço:
                            <select name="id_servi">
                                <?php foreach($objsv->querySelect() as $rst){ ?>
                                <option value="<?php echo ($objFc->tratarCaracter($rst['id'], 1)) ?>" > <?php echo ($objFc->tratarCaracter($rst['servico'], 1)) ?> 
                                </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><label for="cRG ">RG: </label><input type="number " name="tRG " id="cRG " size="10 " maxlength="10 " placeholder="00.000.000-0 " /></td>
                        <td><label for="cCC ">CPF/ CNPJ: </label><input type="number " name="tCC " id="cCC " size="14 " maxlength="14 " placeholder="000.000.000-00 " /></td>
                    </tr>
                    <tr>
                        <td><label for="dTrabalho ">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0 " cols="20 " maxlength="20 "></textarea></td>
                        <td><label for="cPrazo ">Prazo:</label><input type="date" name="prazo"></td>
                        <td><label for="cValorT ">Valor do Contrato: </label> <input type="number" value="" name="valor" id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                        <td><label for="cValorP ">Valor da Parcela: </label><input type="number " name="tValorT " id="cValorT " min="0 " max="99999 " placeholder="R$1.000 " /></td>
                        <td><label for="cParcelas ">Quantidade de Parcelas </label><select name="qnt_parcela" id="cParcelas ">
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
                    </tr>
                    <tr>
                        <td><label for="cdate "></label>Dia de Vencimento: </label><input type="text" name="vencimento" name="cdate" /></td>
                    </tr>
                </table>
            
        </fieldset>
        <div style="height:120px ">
            <fieldset id="dadosFin " style="height:100%; float:height; margin-top: 10px; margin-left:auto; margin-right: auto; width:90%; border-radius:20px 20px 20px 20px ">
                <legend>Endereço do Projeto</legend>
                
                    <table style="HEIGHT:100px;; WIDTH:100%;">
                        <tr align="left " bottom="middle ">
                            <td><label for="cLog">Logradouro: </label><input type="text" name="tLog" id="cLog" size="40" maxlength="40" placeholder="R:, Av:, Est:..." /></td>
                            <td><label for="cNum">Número: </label><input type="number" name="tNum" id="cNum" min="0" max="99999" placeholder="000" /></td>
                            <td><label for="cComp">Complemento: </label><input type="text" name="tComp" id="cComp" size="30" maxlength="30" placeholder="Apto, Sala, ... " /></td>

                        </tr>
                        <tr>
                            <td><label for="cCP">CEP: </label><input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3"></td>
                            <td><label for="cMun">Município: </label><input type="text" name="tMun" id="cMun" size="30" maxlength="30" placeholder="Cidade" /></td>
                            <td><label for="cUF">Estado: </label><select name="cUF" id="cUF">
                                                                        <option selected>UF</option>
                                                                        <option>Acre</option>
                                                                        <option>Alagoas</option>
                                                                        <option>Amazonas</option>
                                                                        <option>Amapá</option>
                                                                        <option>Bahia</option>
                                                                        <option>Ceará</option>
                                                                        <option>Distrito Federal</option>
                                                                        <option>Espírito Santo</option>
                                                                        <option>Goiás</option>
                                                                        <option>Maranhão</option>
                                                                        <option>Mato Grosso</option>
                                                                        <option>Mato Grosso do Sul</option>
                                                                        <option>Minas Gerais</option>
                                                                        <option>Pará</option>
                                                                        <option>Paraíba</option>
                                                                        <option>Paraná</option>
                                                                        <option>Pernambuco</option>
                                                                        <option>Piauí</option>
                                                                        <option>Rio de Janeiro</option>
                                                                        <option>Rio Grande do Norte</option>
                                                                        <option>Rio Grande do Sul</option>
                                                                        <option>Rondônia</option>
                                                                        <option>Roraima</option>
                                                                        <option>Santa Catarina</option>
                                                                        <option>São Paulo</option>
                                                                        <option>Sergipe</option>
                                                                        <option>Tocantins</option> 
                                                                    </select>
                            </td>
                        </tr>
                    </table>
                
            </fieldset>
        </div>
        <input type="submit" name="insert" value="Inserir" >
        </form>
</body>

</html>