<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/contrato.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Contrato();

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
    <?php require_once("header.php"); ?>
    
</head>

<!--Menu-->

<body>
 
    <!--Formulário-->
   
    <br><br><p>
    <div id="caixa">
        <form action="" method="post" id="formulario">
            <!--Dados do cliente-->
            <fieldset id="cadastro" style="position:relative; border-radius:20px 20px 20px 20px" > <!--style="position:relative; border-radius:20px 20px 20px 20px"-->
            
                <legend>Cliente</legend>
                    Nome: </label><input type="text" value="" name="id_cli" id="cNome" size="40" maxlength="40" placeholder="Nome Completo" />
                    Servico: </label><input type="text" value="" name="id_servi" id="cNome" size="40" maxlength="40" placeholder="Nome Completo" />
                  <!--  <select name="id_parc">
                         <option> Selecione o Parceiro </option>
            
                             <?php 
                                $queryser = "SELECT * FROM `parceiro`";
                                $resultadoser = mysqli_query($conect,$queryser);
                                while($row = mysqli_fetch_assoc($resultadoser)){ ?>
                                <option valeu="<?php echo $row['id_parc']; ?>"> <?php echo $row['id_parc']; ?>
                                </option>
                                <?php
                                }
                                ?> 
                    </select>
                    <select name="id_parc">
                         <option> Selecione o Servico </option>
            
                             <?php 
                                $queryser = "SELECT * FROM `servico`";
                                $resultadoser = mysqli_query($conect,$queryser);
                                while($row = mysqli_fetch_assoc($resultadoser)){ ?>
                                <option valeu="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?>
                                </option>
                                <?php
                                }
                                ?> 
                    </select>
                    -->
                    <br><p>
                   
                    <td><label for="cRG">RG: </label><input type="number" value="" name="rg" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" /></td>
                        CPF/ CNPJ:<input type="number" value="" name="cpf" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                        <br><p>
                        <label> Detalhes do trabalho: </label>
                            <textarea value="" id="msg" name="detalhes"></textarea>
                        Prazo:  <input type="date" name="prazo" placeholder="prazo" value=""/> <br>
                    <br><p>
                        Valor do contrato:  <input type="text" name="valor" placeholder="prazo" value=""/> 
                        Parcela:  <input type="text" name="qnt_parcela" placeholder="prazo" value=""/> 
                        Valor da parcela:  <input type="text" name="prazooo" placeholder="prazo" value=""/> 
                        Vencimento:  <input type="text" name="vencimento" placeholder="prazo" value=""/> 
                       <!-- <td><label for="cRS">Razão Social: </label><input type="text" name="tRS" id="cRS" size="30" maxlength="30" placeholder="Razão Social" /></td> -->
            

            </fieldset>
        
            <fieldset id="endereco" style="position:relative; border-radius:20px 20px 20px 20px">
                    <legend>Endereço do projeto </legend>
                            CEP: </label><input type="number" name="tCP" id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
                            Logradouro: </label> <input type="text" name="tEnd" id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
                            Número: </label><input type="number" name="tNum" id="cNum" min="0" max="99999" placeholder="" />&nbsp;&nbsp;
                            Complemento: </label><input type="text" name="tComp" id="cComp" size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
                        <p>
                            Município: </label><input type="text" name="tMun" id="cMun" size="30" maxlength="30" placeholder="Cidade" /></td>
                            Estado: </label><select name="cUF" id="cUF">
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
                </fieldset> 

            
                   
            
                <div style="height:35px;">
                <input type="submit" name="insert" value="Inserir">
            </div>
            
        </form>
    </div>

</body>

</html>