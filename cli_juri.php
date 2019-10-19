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
   

</head>

<!--Menu-->

<body>
    <fieldset id="form-pj">
        <table id="tab12">
            <tr>
                <td>
                    &nbsp; Nome:<input type="text"  name="nome" value="" id="cNome" size="30" maxlength="30" placeholder="Nome Completo" /> 
                </td>   
            <!-- &nbsp; CPF:         <input type="number"  name="cpf" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                &nbsp; RG: <input type="number"  name="rg" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />-->
                <td>
                    <input type="hidden"  name="cpf" value="" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                    <input type="hidden"  name="rg" value="" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                
                &nbsp; CNPJ:<input type="number"  name="cpf"  value=""  id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" /> 
                </td>
                <td>
                    &nbsp; Razão Social:<input type="text"  name="razao"   value="" id="cRS" size="20" maxlength="20" placeholder="Razão Social" />
                </td>
            </tr>
            <tr>
                <td>
                    <p>&nbsp; IE: <input type="number"     value="" name="rg" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                </td>
                <td>
                    &nbsp; Representante:<input type="text"  name="representante" value=""  id="cRepre" size="20" maxlength="20" placeholder="Nome do Responsável"/>
                </td>               
                <td>
                   &nbsp;  Parceiro: 
                    <select name="id_parc">   
                    <?php foreach($objfn->querySelect() as $rst){ ?>
                    <option value="<?php echo ($objFc->tratarCaracter($rst['id_parc'], 1)) ?>" > <?php echo ($objFc->tratarCaracter($rst['nome'], 1)) ?> </option>
            
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <td>
                    Observações: 
                    <textarea  id="msg" name="observacao"></textarea>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
        </table>
    </fieldset>
</body>

</html>