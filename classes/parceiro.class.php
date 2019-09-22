<?php

require_once 'Conexao.class.php';
require_once 'funcoes.class.php';


class Parceiro{
    private $conn;
    private $objfunc;
    private $id;
    private $nome;


    public function __construct(){
        $this->con = new conexao();
        $this->objfunc = new funcoes();

    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;

    }

    public function querySeleciona($dados){
        try{
            $cst = $this->con->conectar()->prepare("Select * from parceiro");
            $cst = bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fechtAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }

    public function queryInsert($dados){
        try{
            $this->nome = $this->objfunc->tratarCaracter($dados['nome'], 1);
            $cst = $this->con->conect()->prepare("INSERT INTO `parceiro`(`nome`) VALUES (:nome);");
            $cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            if ($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        }catch(PDOException $ex){
            
        }

    }

    public function querySelect(){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id_parc`, `nome` FROM `parceiro`;");
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            return 'erro '.$ex->getMessage();
        }

    }

    public function queryUpdate($dados){
        try{

        }catch(PDOException $ex){
            
        }

    }

    public function queryDelete($dados){
        try{

        }catch(PDOException $ex){
            
        }

    }

}

?>