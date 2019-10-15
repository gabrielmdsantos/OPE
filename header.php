<?php
include_once 'seguranca/seguranca.php';
protegePagina(); 
if($_SESSION['ID_FUNCIONARIO'] != 1){
    expulsaVisitante2();
}

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
            <li><a href="escritorio.php"> Lançamentos Interno </a></li>
            <li><a href="consultacontratohora.php"> Lançamentos Horas </a></li>
            <li><a href="sair.php"> Sair </a></li>
        </ul>
        
</div>
</header>
</html>