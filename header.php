<?php
include_once 'seguranca/seguranca.php';
protegePagina(); 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="style/style.css">  
</head>
<header>
<div id="menu">
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="consultacliente.php">Cliente</a></li>
            <li><a href="consultacontrato.php">Contrato</a></li>
            <li><a href="controleprojeto.php">Controle do projeto</a></li>
            <li><a href="funcionario.php">Funcionário</a></li>
            <li><a href="cadastrar_parceiro">Parceiro</a></li>
            <li><a href="servico.php">Serviço</a></li>
            <li><a href="financeiro.php"> Financeiro </a></li>
            <!--
                Esta bugando a pesquisa do usuario
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a> <form action="" method="post">
                    <?php
                    if(isset($_POST["sair"])){
                        expulsaVisitante();
                        }
                    ?>
                <input type="submit" name="sair" placeholder="Sair" value="sair" />
                </form>
                </a></li>
            -->
        </ul>
        
</div>
</header>
</html>