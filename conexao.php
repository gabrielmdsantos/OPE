<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "TESTE";

//criar conexao
$conect = mysqli_connect($servidor,$usuario,$senha,$dbname);
echo "Conectado com sucesso";

if (!$conect){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conectado com sucesso";
}

?>