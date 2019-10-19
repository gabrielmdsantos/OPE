<!--
    <?php
        $enderecobb = '';
?>
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
</head>
<body>

<!-- queryEndereco2 -->

<fieldset id="endereco2" >
<legend>Endereço Cobrança </legend>
<input type="hidden" value="<?php $enderecobb=''; ?>" />
<table id="tab14">
    <tr>
        <td width="80">
        CEP:        <input type="number" name="cepb"       value=""   id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
        </td>
        <td>
        Logradouro: <input type="text" name="logradourob"  value=""   id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
        </td>
        <td>
        Número:     <input type="number" name="numerob"    value=""   min="0" max="99999" placeholder="" />&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td>
        Complemento:<input type="text" name="complementob" value=""  size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
        </td>
        <td>
        Município: <input type="text"  name="municipiob"   value=""  size="30"  placeholder="Cidade" />
        </td>
        <td>
        Estado:  <select name="estadob" value="" id="cUF">
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
</table>
</fieldset>
                <input type="hidden" name="tipob" value="Correspondencia"/>


</body>
</html>