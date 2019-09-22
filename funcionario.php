<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/funcionario.class.php';
   
    
    $objFc = new Funcoes();
    $objfn = new Funcionario();
   

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            header("location: funcionario.php");
        }
        else{
        echo '<script type="text/javascript"> alert("Erro ao inserir")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<!--Menu-->

<body>
    
<nav>
        <div >
           <?php include_once("header.php"); ?>
        </div>
</nav>

<div style="height:120px;">
            <fieldset id="contato" style=" margin: 10px; height:100%;  float:left; margin-top: 0px;  width:300px; border-radius:20px 20px 20px 20px ">
                <legend>Cadastro de Funcionario</legend>
                <form method = "POST">
                <table ALIGN="left" height="100px" ; width="800px" ;>
                    <tr>
                        <td><label for="nomefuncionario">Nome: </label><input type="text" name="nome" id="funcionario" size="40" placeholder="Nome Completo" /></td>
                        <td><label for="cpffuncionario">CPF: </label><input type="number" name="cpf" id="cpf" size="14" maxlength="9" placeholder="000.000.000-00" /></td>
                    </tr>
                    <tr>
                        <td><label for="cCel">Celular: </label><input type="number" name="cel" id="cCel" size="11" maxlength="11" placeholder="(11)99999-9999" /></td>
                        <td><label for="cMail">E-mail: </label><input type="email" name="email" id="cMail" size="30" maxlength="30" placeholder="joão@terra.com.br" /></td>
                    </tr>
                </table>
            </fieldset>
        </div>
    <div class="botao6">
            <input class="btn" type="submit" name="insert" value="Cadastrar Funcionário"></a>
    </div>
    </form>

    <!--Conteúdo-->


</body>

</html>