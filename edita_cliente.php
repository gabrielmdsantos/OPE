<?php

    function getPosts()
    {
        $posts = array();
    
        $posts [2] = $_POST ['endereco'];
        return $posts;
     }
     if (isset($_POST['insert'])){
         $data = getPosts();
     }

    require_once 'classes/funcoes.class.php';
    require_once 'classes/cliente.class.php';
    require_once 'classes/parceiro.class.php';

    $objFc = new Funcoes();
    $objfn = new Cliente();
    $objpc = new Parceiro();
    $endereco = "N";

    if(isset($_POST['btAlterar'])){
        if($objfn->queryUpdatee($_POST) == 'ok'){
            header('location: consultacliente.php');
        }else{
            echo '<script type="text/javascript">alert("Erro em alterar");</script>';
        }
    }
    if(isset($_GET['acao'])){
        switch($_GET['acao']){
            case 'edit': $func = $objfn->querySeleciona($_GET['func']); break;
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

<!DOCTYPE html>
<html lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<head>
    <meta charset="UTF-8" />
    <script src="script/jquery-2.1.4.min.js"></script>
   <!-- <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>   -->

</head>

<!--Menu-->

<body>
<?php require_once("header.php"); 
?>

        <form action="" method="post">
            <!--Dados do cliente-->
            <fieldset id="cadastro" style="position:relative; left:0px; width:98%; border-radius:20px 20px 20px 20px">
                <legend>Cadastro</legend>
                    <fieldset id="pessoa"  name="pessoa" style="position: relative; height: 55px; float: left; width: 100px; border-radius:20px 20px 20px 20px">
                                    <legend>Pessoa</legend>
                                    <input type="radio" name="pessoa" id="cPF" value="Fisica" CHECKED/><label for="cPF">Física</label><br>
                                    <input type="radio" name="pessoa" id="cPJ" value="Juridica" /><label for="cPJ">Jurídica</label>
                    </fieldset><p>
                    
            
                    &nbsp; Nome:        <input type="text"  name="nome" value="<?=$objFc->tratarCaracter((isset($func['nome_cli']))?($func['nome_cli']):(''), 1)?>" id="cNome" size="40" maxlength="40" placeholder="Nome Completo" />    
                    &nbsp; CPF/CNPJ:         <input type="number"  name="cpf" value="<?=$objFc->tratarCaracter((isset($func['cpf_cli']))?($func['cpf_cli']):(''), 1)?>" id="cCC" size="14" maxlength="14" placeholder="000.000.000-00" />
                    &nbsp; RG/INSCRICAO ESTADUAL:          <input type="number"  name="rg"  value="<?=$objFc->tratarCaracter((isset($func['rg_cli']))?($func['rg_cli']):(''), 1)?>" id="cRG" size="10" maxlength="10" placeholder="00.000.000-0" />
                    
                    <fieldset id="sexo" name="sexo" style="position:relative; height:55px;  float:right; width:180px; border-radius:20px 20px 20px 20px">
                                    <legend>Sexo</legend>
                                    <input type="radio" value="M" name="sexo" id="cMasc" CHECKED/><label for="cMasc">Masculino</label>
                                    <input type="radio" value="F" name="sexo" id="cFem" /><label for="cFem">Feminino</label>
                    
                    </fieldset>
                    <p>    
                    <input type="hidden"  name="razao"          value="" />
                    <input type="hidden"  name="representante"  value="" />
                    <input type="hidden"  name="inscricao"      value="" />
                    <input type="hidden"  name="cnpj"  value="" />
                    &nbsp;&nbsp;Parceiro:  <select name="id_parc" placeholder="Selecione o parceiro">  
                    <?php foreach($objpc->querySelect() as $rst){ ?>
                    <option value="<?php echo ($objFc->tratarCaracter($rst['id_parc'], 1)) ?>" > <?php echo ($objFc->tratarCaracter($rst['nome'], 1)) ?> </option>
                   
                    <?php } ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label> Observações: </label>
                            <textarea  id="msg" name="observacao" value=""> <?=$objFc->tratarCaracter((isset($func['obs_cli']))?($func['obs_cli']):(''), 2)?> </textarea>    


                </fieldset>
            <br>  
            <!--Dados do endereço-->
                <?php foreach($objfn->querySelectendereco($_GET['func']) as $rst){ ?>
                <fieldset id="endereco" style="position:relative;height:130px; border-radius:20px 20px 20px 20px">
                    <legend>Endereço 1 </legend>
                            CEP:        <input type="number" name="cep"         value="<?=$objFc->tratarCaracter((isset($rst['cep']))?($rst['cep']):(''), 1)?>"        id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
                            Logradouro: <input type="text" name="logradouro"    value="<?=$objFc->tratarCaracter((isset($rst['logradouro']))?($rst['logradouro']):(''), 1)?>"    id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
                            Número:     <input type="number" name="numero"      value="<?=$objFc->tratarCaracter((isset($rst['Numero']))?($rst['Numero']):(''), 1)?>"  min="0" max="99999" placeholder="" />&nbsp;&nbsp;
                            Complemento:<input type="text" name="complemento"   value="<?=$objFc->tratarCaracter((isset($rst['Complemento']))?($rst['Complemento']):(''), 1)?>"   size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
                        <p>
                            Município: <input type="text"  name="municipio"     value="<?=$objFc->tratarCaracter((isset($rst['municipio']))?($rst['municipio']):(''), 1)?>"    size="30"  placeholder="Cidade" />
                            Estado:    <input type="text"  name="estado"        value="<?=$objFc->tratarCaracter((isset($rst['estado']))?($rst['estado']):(''), 1)?>"    size="30" placeholder="Estado" />
                            <!--
                            <select name="estado" value="<?php echo $estado ?>" id="cUF">
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
                                    </select> -->
                    
                    <fieldset id="endereco"  name="endereco"  style="position: relative; height: 100px; float:right; width:100px; top:-90px; border-radius:20px 20px 20px 20px">
                                    <legend>End. Cobrança.</legend>
                                    <input type="radio" name="endereco" id="e" value="S" CHECKED /><label for="e" >Sim</label><br>
                                    <input type="radio" name="endereco" id="f" value="N"  <?php $enderecobb='' ?>  /><label for="f">Não</label>
                    </fieldset><p>
                    <input type="hidden" name="id_cli" value="<?=$objFc->tratarCaracter((isset($func['id_cli']))?($func['id_cli']):(''), 1)?>" />
                    
                </fieldset>
                <?php } ?>
            <div id="result2">  </div>                
                
            <fieldset id="contato" style="position:relative; border-radius:20px 20px 20px 20px">
                <legend>Contato</legend>
                        Telefone 1:<input type="number" name="tel1"     value="<?=$objFc->tratarCaracter((isset($func['tel']))?($func['tel']):(''), 2)?>" id="cTel1" size="10" maxlength="10" placeholder="(11)9999-9999" />
                        Telefone 2: <input type="number" name="tel2"    value="<?=$objFc->tratarCaracter((isset($func['tel']))?($func['tel']):(''), 2)?>" id="cTel2" size="10" maxlength="10" placeholder="(11)9999-9999" />
                        Celular: <input type="number" name="tcel"       value="<?=$objFc->tratarCaracter((isset($func['tel']))?($func['tel']):(''), 2)?>" id="cCel" size="11" maxlength="11" placeholder="(11)99999-9999" />
                      <!--  Contato: <input type="contato" name="tContato" id="cContato" size="10" maxlength="10" placeholder="joão@terra.com.br" /> -->
                        E-mail:  <input type="email" name="email"       value="<?=$objFc->tratarCaracter((isset($func['email']))?($func['email']):(''), 2)?>" id="cMail" size="30" maxlength="30" placeholder="joão@terra.com.br" />
            </fieldset>
            <br><p>
                <input type="submit" name="btAlterar" value="Alterar"> 
                <button class="btnnn" type="button" name="tbtn"><a href="consultacliente.php">Voltar</a></button>


</form> 
</body>
</html> 