<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
   

</head>

<!--Menu-->

<body>

&nbsp; Nome:        <input type="text"  name="nome" value="" id="cNome" size="40" maxlength="40" placeholder="Nome Completo" />    
                   <!-- &nbsp; CPF:         <input type="number"  name="cpf" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                    &nbsp; RG: <input type="number"  name="rg" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
-->
                        <fieldset id="sexo" name="sexo" style="position:relative; height:55px;  float:right;  width:180px; border-radius:20px 20px 20px 20px">
                        <?php $pessoa = 'Juridica'  ?>
                                    <legend>Sexo</legend>
                                    <input type="radio" value="M" name="sexo" id="cMasc" CHECKED/><label for="cMasc">Masculino</label>
                                    <input type="radio" value="F" name="sexo" id="cFem" /><label for="cFem">Feminino</label>
                        </fieldset>
                        <input type="hidden"  name="cpf" value="" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                        <input type="hidden"  name="rg" value="" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                       
                    &nbsp; CNPJ:        <input type="number"  name="cnpj"  value=""  id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" /> 
                    &nbsp; Razão Social:<input type="text"  name="razao"   value="" id="cRS" size="30" maxlength="30" placeholder="Razão Social" />
                    <p>&nbsp; Inscrição Estadual: <input type="number"     value="" name="inscricao" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                    &nbsp; Representante:<input type="text"  name="representante" value=""  id="cRepre" size="20" maxlength="20" placeholder="Nome do Responsável"/>
                    &nbsp;
                    <select name="id_parc">    
                    <option> Selecione o Parceiro </option>
                    <option value="1"> 1 </option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label> Observações: </label>
                            <textarea  id="msg" name="observacao"></textarea>

</body>

</html>