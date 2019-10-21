<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/parceiro.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Parceiro();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="Style/style1.css">
</head>

<!--Menu-->

    <body>
        <fieldset id="form-pf">
            <table id="tab11">
                <tr>
                    <td>
                        &nbsp; Nome: <input type="text"  name="nome" value="<?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?>" id="cNome" size="30" maxlength="30" placeholder="Nome Completo" />    
                    </td>
                    <td>
                        &nbsp; RG:   <input type="text"  name="rg"  value="" id="cRG" size="9" maxlength="9" placeholder="00.000.000-0" />
                    </td>
                    <td>
                        &nbsp; CPF:  <input type="text"  name="cpf" value="" id="cCC" size="11" maxlength="11" placeholder="000.000.000-00" />
                    </td>
                </tr>
                       
                
                
        <!--  
        &nbsp; Razão Social:
        &nbsp; Inscrição Estadual: <input type="number"  name="inscricao" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
        &nbsp; Representante:<input type="text"  name="representante" id="cRepre" size="20" maxlength="20" placeholder="Nome do Responsável"/>
        <p> <br>-->
                <tr>
                    <td>
                        <input type="hidden"  name="razao"          value="" />
                        <input type="hidden"  name="representante"  value="" />
                        <input type="hidden"  name="inscricao"      value="" />
                        <input type="hidden"  name="cnpj"  value="" />
                        &nbsp;&nbsp;Parceiro:  <select name="id_parc" placeholder="Selecione o parceiro">  
                        <?php foreach($objfn->querySelect() as $rst){ ?>
                        <option value="<?php echo ($objFc->tratarCaracter($rst['id_parc'], 1)) ?>" > <?php echo ($objFc->tratarCaracter($rst['nome'], 1)) ?> </option>
                
                        <?php } ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                    <label> Observações: </label>
                    <textarea  id="msg" name="observacao"></textarea>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </fieldset>


    </body>
</html>     