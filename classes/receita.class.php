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
            $this->id_cli = $dados['id_cli'];
            $this->data = $this->objfunc->dataAtual(2);
            $this->valoor = $dados['valoor'];
            $this->descricao = $dados['descricao'];
           //inserindo receita
            $cst = $this->con->conect()->prepare("INSERT INTO `receita_proj`(`ID_CONT`, `id_cli`, `DATA`, `VALOR`, `descricao`) VALUES (:id_cont,:id_cli,:data,:valoor,:descricao);");
            $cst -> bindParam(":id_cont", $this->id_cont, PDO::PARAM_INT);
            $cst -> bindParam("id_cli", $this->id_cli,PDO::PARAM_INT);
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
            $this->id_cli = $dados['id_cli'];
            $this->data = $this->objfunc->dataAtual(2);
            $this->valoor = $dados['valoor'];
            $this->descricao = $dados['descricao'];
           //inserindo receita
            $cst = $this->con->conect()->prepare("INSERT INTO `despesa_proj`( `ID_CONT`, `id_cli`, `DATA`, `VALOR`, `Descricao`) VALUES (:id_cont,:id_cli,:data,:valoor,:descricao);");
            $cst -> bindParam(":id_cont", $this->id_cont, PDO::PARAM_INT);
            $cst -> bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
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

    public function querySelectreceita($dados){
        try{
                //SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(receita_proj.VALOR) AS receita FROM receita_proj INNER JOIN contrato ON contrato.ID = receita_proj.ID_CONT INNER JOIN cliente ON cliente.id = receita_proj.id_cli GROUP BY receita_proj.ID_CONT
            $cst = $this->con->conect()->prepare("SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(receita_proj.VALOR) AS receita FROM receita_proj INNER JOIN contrato ON contrato.ID = receita_proj.ID_CONT INNER JOIN cliente ON cliente.id = receita_proj.id_cli GROUP BY receita_proj.ID_CONT;");
            $cst->execute();
            return $cst->fetchAll();    
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }

    }

    public function querySelectreceita2($dados){
        try{
                //SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(receita_proj.VALOR) AS receita FROM receita_proj INNER JOIN contrato ON contrato.ID = receita_proj.ID_CONT INNER JOIN cliente ON cliente.id = receita_proj.id_cli GROUP BY receita_proj.ID_CONT
            $cst = $this->con->conect()->prepare("SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(receita_proj.VALOR) AS receita FROM receita_proj INNER JOIN contrato ON contrato.ID = receita_proj.ID_CONT INNER JOIN cliente ON cliente.id = receita_proj.id_cli WHERE contrato.ID like $dados  GROUP BY receita_proj.ID_CONT;");
            $cst->execute();
            return $cst->fetchAll();    
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }

    }


    public function querySomadespesa($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT sum(VALOR) as despesa FROM despesa_proj WHERE id_cli = $dados");
            $cst -> execute();
            return $cst->fetch();
        }catch(PDOException $ex){

        }
    }

    public function querySomareceita($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT sum(VALOR) as receita FROM receita_proj WHERE id_cli = $dados");
            $cst -> execute();
            return $cst->fetch();
        }catch(PDOException $ex){

        }
    }

    public function querySelectdespesa($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(despesa_proj.VALOR) AS DESPESA FROM despesa_proj INNER JOIN contrato ON contrato.ID = despesa_proj.ID_CONT INNER JOIN cliente ON cliente.id = despesa_proj.id_cli  GROUP BY despesa_proj.ID_CONT;");
            //$cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->execute();
            return $cst->fetchAll();
            //SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(despesa_proj.VALOR) AS DESPESA FROM despesa_proj INNER JOIN contrato ON contrato.ID = despesa_proj.ID_CONT INNER JOIN cliente ON cliente.id = despesa_proj.id_cli GROUP BY despesa_proj.ID_CONT
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }

    public function querySelectdespesa2($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(despesa_proj.VALOR) AS DESPESA FROM despesa_proj INNER JOIN contrato ON contrato.ID = despesa_proj.ID_CONT INNER JOIN cliente ON cliente.id = despesa_proj.id_cli WHERE contrato.id like $dados  GROUP BY despesa_proj.ID_CONT;");
            //$cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->execute();
            return $cst->fetchAll();
            //SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(despesa_proj.VALOR) AS DESPESA FROM despesa_proj INNER JOIN contrato ON contrato.ID = despesa_proj.ID_CONT INNER JOIN cliente ON cliente.id = despesa_proj.id_cli GROUP BY despesa_proj.ID_CONT
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
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