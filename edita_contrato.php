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

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            echo ('<script type="text/javascript"> alert("Inserido com sucesso")</script>');
            echo "<script>window.location = 'cadastrar_parceiro.php';</script>";
        }else{
            echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
        }
    }
    if(isset($_GET['acao'])){
        switch($_GET['acao']){
            case 'edit': $func = $objfn->querySeleciona($_GET['func']); 
                        $id_cli = $func['id_cli'];
                        echo ($id_cli);
                        $edn = $objfn->querySeleciona($_GET['func']);
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
                        <td>Cliente: 
                        <input type="text"  name="nome" value="<?=$objFc->tratarCaracter((isset($func['nome_cli']))?($func['nome_cli']):(''), 2)?>" id="Nome" size="40" maxlength="40" placeholder="Nome Completo" /> 
                        </td>
                        <td>
                        Serviço:
                        <input type="text"  name="nome" value="<?=$objFc->tratarCaracter((isset($func['nome_servico']))?($func['nome_servico']):(''), 2)?>" id="Nome" size="40" maxlength="40" placeholder="Serviço" />
                        </td>
                        <td><label for="cRG ">RG: </label><input type="number " name="tRG" value="<?=$objFc->tratarCaracter((isset($func['rg_cli']))?($func['rg_cli']):(''), 2)?>" id="cRG " size="10 " maxlength="10 " placeholder="00.000.000-0 " /></td>
                        <td><label for="cCC ">CPF/ CNPJ: </label><input type="number "     value="<?=$objFc->tratarCaracter((isset($func['cpf_cli']))?($func['cpf_cli']):(''), 2)?>" name="tCC " id="cCC " size="14 " maxlength="14 " placeholder="000.000.000-00 " /></td>
                    </tr>
                    <tr>
                        <td><label for="dTrabalho ">Detalhes do Trabalho:</label><textarea id="dTrabalho" name="detalhes" rows="0 " cols="20 " maxlength="20 "> <?php echo $objFc->tratarCaracter((isset($func['detalhes_contrato']))?($func['detalhes_contrato']):(''), 2)?> </textarea></td>
                        <td><label for="cPrazo ">Prazo:</label><input type="date" name="prazo" value="<?=$objFc->tratarCaracter((isset($func['prazo']))?($func['prazo']):(''), 2)?>" ></td>
                        <td><label for="cValorT ">Valor do Contrato: </label> <input type="number" value="<?=$objFc->tratarCaracter((isset($func['valor']))?($func['valor']):(''), 2)?>" name="valor" id="valor" min="0 " max="99999 " placeholder="R$1.000 " /></td>
                        <?php
                            $valor = $func['valor'];
                            $qnt_p = $func['parcelas'];
                            $vlp = $valor / $qnt_p;
                        ?>
                        <td><label for="cValorP ">Valor da Parcela: </label> <input type="number" readonly=“true” name="final" id="final" value="<?php echo ($vlp);?>"  min="0 " max="99999 " placeholder="R$1.000 " /></td>
                        <td><label for="cParcelas ">Quantidade de Parcelas </label>

                        <input type="number" value="<?=$objFc->tratarCaracter((isset($func['parcelas']))?($func['parcelas']):(''), 2)?>" name="qnt_parc" id="qnt_parc" min="0" max="99999" placeholder="3x"/>
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