<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
   

</head>

<!--Menu-->

<body>

                    &nbsp; Nome:        <input type="text"  name="nome" value="" id="cNome" size="40" maxlength="40" placeholder="Nome Completo" />    
                    &nbsp; CPF:         <input type="number"  name="cpf" value="" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                    &nbsp; RG:          <input type="number"  name="rg"  value="" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                    
                    <fieldset id="sexo" name="sexo" style="position:relative; height:55px;  float:right; width:180px; border-radius:20px 20px 20px 20px">
                                    <legend>Sexo</legend>
                                    <input type="radio" value="M" name="sexo" id="cMasc" CHECKED/><label for="cMasc">Masculino</label>
                                    <input type="radio" value="F" name="sexo" id="cFem" /><label for="cFem">Feminino</label>
                    </fieldset>
                    <p>    
                   <!--  
                    &nbsp; Razão Social:
                    &nbsp; Inscrição Estadual: <input type="number"  name="inscricao" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                    &nbsp; Representante:<input type="text"  name="representante" id="cRepre" size="20" maxlength="20" placeholder="Nome do Responsável"/>
                    <p> <br>
                    
-->
                    <input type="hidden"  name="razao"          value="" />
                    <input type="hidden"  name="representante"  value="" />
                    <input type="hidden"  name="inscricao"      value="" />
                    <input type="hidden"  name="cnpj"  value="" />
                    &nbsp;&nbsp; <select name="id_parc" placeholder="Selecione o parceiro">    
                    <option value="null"> Selecione o parceiro </option>
                    <option value="1"> 1 </option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label> Observações: </label>
                            <textarea  id="msg" name="observacao"></textarea>

</body>

</html>     