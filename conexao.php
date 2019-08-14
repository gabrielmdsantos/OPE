<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "TESTE";

//criar conexao
$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
echo "Conectado com sucesso";