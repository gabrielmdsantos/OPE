<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/funcionario.class.php';
   
    
    $objFc = new Funcoes();
    $objfn = new Funcionario();
   

    if(isset($_POST['btCadastrar'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            echo ('<script type="text/javascript"> alert("Inserido com sucesso")</script>');
            echo "<script>window.location = 'funcionario.php';</script>"; 
            // header("location:  funcionario.php");
        }
        else{
        echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
    }
    }
    if(isset($_POST['btAlterar'])){
        if($objfn->queryUpdate($_POST) == 'ok'){
            echo '<script type="text/javascript"> alert("Alterado com sucesso"); </script>';
            echo "<script>window.location = 'funcionario.php';</script>";
        }else{
            echo '<script type="text/javascript">alert("Erro em alterar");</script>';
        }
    }
    if(isset($_GET['acao'])){
        
        switch($_GET['acao']){
            case 'edit': $func = $objfn->querySelect($_GET['func']); break;
            case 'delet':
                if($objfn->queryDelete($_GET['func']) == 'ok'){
                    echo '<script type="text/javascript"> alert ("Deletado com sucesso"); </script>';
                    echo "<script>window.location = 'funcionario.php';</script>";
                }else{
                    echo '<script type="text/javascript">alert("Erro em deletar");</script>';
                }
                    break;
        }
    }


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="Style/style3.css" />
</head>

<!--Menu-->

<body>
    
<nav>
        <div >
           <?php include_once("header.php"); ?>
        </div>
</nav>

<div style="height:140px;">
            <fieldset id="contato" style="margin: 10px; height:100%;  float:left; margin-top: 0px;  width:300px; border-radius:20px 20px 20px 20px ">
                <legend>Cadastro de Funcionario</legend>
                <form method = "POST">
                <table ALIGN="left" height="100px" ; width="800px" ;>
                    <tr>
                        <td><label for="nomefuncionario">Nome: </label><input type="text" name="nome" id="funcionario"  value="<?=$objFc->tratarCaracter((isset($func['NOME']))?($func['NOME']):(''), 2)?>" size="40" placeholder="Nome Completo" /></td>
                        <td><label for="cpffuncionario">CPF: </label><input type="number" name="cpf" id="cpf" size="14" value="<?=$objFc->tratarCaracter((isset($func['CPF']))?($func['CPF']):(''), 2)?>" maxlength="9" placeholder="000.000.000-00" /></td>
                    </tr>
                    <tr>
                        <td><label for="cCel">Celular: </label><input type="number" name="cel" id="cCel" size="11"      value="<?=$objFc->tratarCaracter((isset($func['CELULAR']))?($func['CELULAR']):(''), 2)?>" maxlength="11" placeholder="(11)99999-9999" /></td>
                        <td><label for="cMail">E-mail: </label><input type="text" name="email" id="cMail" size="30"    value="<?=$objFc->tratarCaracter((isset($func['EMAIL']))?($func['EMAIL']):(''), 2)?>" maxlength="30" placeholder="joão@terra.com.br" /></td>
                    </tr>
                </table>
                <div class="botao6">
            <input type="submit" name="<?=(isset($_GET['acao']) == 'edit')?('btAlterar'):('btCadastrar')?>" value="<?=(isset($_GET['acao']) == 'edit')?('Alterar'):('Cadastrar')?>">
            <input type="hidden" name="ID_FUN" value="<?=(isset($func['ID']))?($objFc->tratarCaracter($func['ID'], 1)):('')?>">
            </form>
            </fieldset>
        </div>
        <div class="scroll">
        <table border="1">
            <thead>
                <tr>
                <th>ID/LOGIN</th>
                <th>FUNCIONARIO</th>
                <th>Editar</th>
                <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($objfn->querySeleciona() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['ID'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['NOME'], 2)) ?> </td>
                    <td><div class="editar"><a href="funcionario.php?acao=edit&func=<?php echo $rst['ID'] ?>" title="Editar dados"> <img src="img/ico-editar.png" width="16" height="16" alt="Editar"> </a></div>  </td>
                    <td> <div class="excluir"><a href="?acao=delet&func=<?=$objFc->tratarCaracter($rst['ID'], 1)?>" title="Excluir esse dado"><img src="img/ico-excluir.png" width="16" height="16" alt="Excluir"></a></div> </td>
                </tr>
                <?php } ?>
              
        </table>
    </div>
  

    <!--Conteúdo-->


</body>

</html>