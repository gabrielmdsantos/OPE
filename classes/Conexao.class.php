<?php

class conexao{
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;

    public function __construct(){
        $this->servidor = "localhost";
        $this->banco = "teste";
        $this->usuario =  "root";
        $this->senha = "";
    }

    public function conect(){
        try{
            if(is_null(self::$pdo)){
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
            }
            return self::$pdo;
        } catch (PDOException $ex) {
			echo $ex->getMessage();
        }
    }

}

/*
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "teste";

//criar conexao
$conect = mysqli_connect($servidor,$usuario,$senha,$dbname);
echo "Conectado com sucesso";

if (!$conect){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conectado com sucesso";
}


*/


?>