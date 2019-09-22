<?php

require_once 'Conexao.class.php';
require_once 'funcoes.class.php';


class Receita{
    private $conn;
    private $objfunc;
    private $id_cont;
    private $valoor;
    private $data;
    private $descricao;

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

        }catch(PDOException $ex){
            
        }
    }
    public function querySelecionaID($dados){
        try{

        }catch(PDOException $ex){
            
        }  
    }

    public function queryInsertreceita($dados){
        try{     
            $this->id_cont = $dados['id_cont'];
            $this->data = $this->objfunc->dataAtual(2);
            $this->valoor = $dados['valoor'];
            $this->descricao = $dados['descricao'];
           //inserindo receita
            $cst = $this->con->conect()->prepare("INSERT INTO `receita_proj`(`ID_CONT`, `DATA`, `VALOR`, `descricao`) VALUES (:id_cont,:data,:valoor,:descricao);");
            $cst -> bindParam(":id_cont", $this->id_cont, PDO::PARAM_INT);
            $cst -> bindParam(":data", $this->data, PDO::PARAM_STR);
            $cst -> bindParam(":valoor", $this->valoor, PDO::PARAM_STR);
            $cst -> bindParam(":descricao", $this->descricao, PDO::PARAM_STR);            
            if ($cst->execute()){
                
                return 'ok';
            }else{
                echo '<script type="text/javascript"> alert("Erro ao inserir");</script>';
                return 'erro';
            }
        }catch(PDOException $ex){
        }

    }

    public function queryInsertdespesa($dados){
        try{     
            $this->id_cont = $dados['id_cont'];
            $this->data = $this->objfunc->dataAtual(2);
            $this->valoor = $dados['valoor'];
            $this->descricao = $dados['descricao'];
           //inserindo receita
            $cst = $this->con->conect()->prepare("INSERT INTO `despesa_proj`(`ID_CONT`, `DATA`, `VALOR`, `Descricao`) VALUES (:id_cont,:data,:valoor,:descricao);");
            $cst -> bindParam(":id_cont", $this->id_cont, PDO::PARAM_INT);
            $cst -> bindParam(":data", $this->data, PDO::PARAM_STR);
            $cst -> bindParam(":valoor", $this->valoor, PDO::PARAM_STR);
            $cst -> bindParam(":descricao", $this->descricao, PDO::PARAM_STR);            
            if ($cst->execute()){
                
                return 'ok';
            }else{
                echo '<script type="text/javascript"> alert("Erro a  o inserir");</script>';
                return 'erro';
            }
        }catch(PDOException $ex){
        }

    }

    public function querySelect($dados){
        try{

        }catch(PDOException $ex){
            
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