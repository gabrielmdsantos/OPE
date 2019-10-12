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
    $cont = 0;
    $contel = 0;
    $endereco = "N";

    
    
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
                    Razão Social<input type="text"  name="razao"          value="<?=$objFc->tratarCaracter((isset($func['razao_cli']))?($func['razao_cli']):(''), 1)?>" />
                    Representante<input type="text"  name="representante"  value="<?=$objFc->tratarCaracter((isset($func['repre_cli']))?($func['repre_cli']):(''), 2)?>" />
                    <input type="hidden"  name="inscricao"      value="" />
                    <input type="hidden"  name="cnpj"  value="" />
                    &nbsp;&nbsp;Parceiro:  <select name="id_parc" placeholder="Selecione o parceiro">  
                    <?php foreach($objpc->querySelect() as $rst){ ?>
                    <option value="<?php echo ($objFc->tratarCaracter($rst['id_parc'], 1)) ?>" > <?php echo ($objFc->tratarCaracter($rst['nome'], 1)) ?> </option>
                   
                    <?php } ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label> Observações: </label>
                            <textarea  id="msg" name="observacao" value=""> <?=$objFc->tratarCaracter((isset($func['obs_cli']))?($func['obs_cli']):(''), 1)?> </textarea>    


                </fieldset>
            <br>  
            <!--Dados do endereço-->
                <?php 
                foreach($objfn->querySelectendereco($_GET['func']) as $rst){      
                $cont ++;
                ?>
                <fieldset id="endereco" style="position:relative;height:130px; border-radius:20px 20px 20px 20px">
                    <legend>Endereço</legend>
                            CEP:        <input type="number" name="<?php echo("cep".$cont) ?>"         value="<?=$objFc->tratarCaracter((isset($rst['cep']))?($rst['cep']):(''), 2)?>"        id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
                            Logradouro: <input type="text" name="<?php echo("logradouro".$cont) ?>"    value="<?=$objFc->tratarCaracter((isset($rst['logradouro']))?($rst['logradouro']):(''), 2)?>"    id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
                            Número:     <input type="number" name="<?php echo("numero".$cont) ?>"      value="<?=$objFc->tratarCaracter((isset($rst['Numero']))?($rst['Numero']):(''), 2)?>"  min="0" max="99999" placeholder="" />&nbsp;&nbsp;
                            Complemento:<input type="text" name="<?php echo("complemento".$cont) ?>"     value="<?=$objFc->tratarCaracter((isset($rst['Complemento']))?($rst['Complemento']):(''), 2)?>"   size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
                        <p>
                            Município: <input type="text"  name="<?php echo("municipio".$cont) ?>"       value="<?=$objFc->tratarCaracter((isset($rst['municipio']))?($rst['municipio']):(''), 2)?>"    size="30"  placeholder="Cidade" />
                            Estado:    <input type="text"  name="<?php echo("estado".$cont) ?>"          value="<?=$objFc->tratarCaracter((isset($rst['estado']))?($rst['estado']):(''), 2)?>"    size="30" placeholder="Estado" />

                    
                    Tipo:<input type="text" name="<?php echo("tipo".$cont) ?>"   value="<?=$objFc->tratarCaracter((isset($rst['tipo']))?($rst['tipo']):(''), 1)?>" />
                    <input type="hidden" name="<?php echo("id_cli") ?>"    value="<?=$objFc->tratarCaracter((isset($func['id_cli']))?($func['id_cli']):(''), 1)?>" />
                    <input type="hidden" name="<?php echo("id_end".$cont) ?>"   value="<?=$objFc->tratarCaracter((isset($rst['id']))?($rst['id']):(''), 1)?>" />


                </fieldset>
                <?php } ?>
            <div id="result2">  </div>                
            
            
            <fieldset id="contato" style="position:relative; border-radius:20px 20px 20px 20px">
                <legend>Contato</legend>
                <?php foreach($objfn->querySelecttel($_GET['func']) as $rst){  
                    $contel ++;
                    echo ($contel); 
                ?>  
                        Telefone :<input type="number" name="<?php echo("tel".$contel) ?>" value="<?=$objFc->tratarCaracter((isset($rst['telefone']))?($rst['telefone']):(''), 2)?>" id="cTel1" size="10" maxlength="10" placeholder="(11)9999-9999" />
                        <input type="hidden" name="<?php echo("id_tel".$contel) ?>" value="<?=$objFc->tratarCaracter((isset($rst['id']))?($rst['id']):(''), 2)?>" />
                        <?php } ?>
                        <!--  Contato: <input type="contato" name="tContato" id="cContato" size="10" maxlength="10" placeholder="joão@terra.com.br" /> -->
                        E-mail:  <input type="email" name="email"       value="<?=$objFc->tratarCaracter((isset($func['email']))?($func['email']):(''), 2)?>" id="cMail" size="30" maxlength="30" placeholder="joão@terra.com.br" />
            </fieldset>
            
            <br><p>
                <input type="submit" name="btAlterar" value="Alterar"> 
                <button class="btnnn" type="button" name="tbtn"><a href="consultacliente.php">Voltar</a></button>

</form>

<?php
    if(isset($_POST['btAlterar'])){
        if($objfn->queryUpdatee($_POST) == 'ok'){
            if($objfn->Queryupdateend($_POST,$cont) == 'ok'){
                if($objfn->Queryupdatetel($_POST,$contel) == 'ok'){
                    if($objfn->QueryUpdateEmail($_POST) == 'ok'){
                        echo '<script type="text/javascript"> alert("Alterado com Sucesso"); </script>';
                        echo "<script>window.location = 'consultacliente.php';</script>";
                    }
                }
            }
        }else{
            echo '<script type="text/javascript">alert("Erro em alterar");</script>';
        }
    }
    

?>
</body>
</html> 