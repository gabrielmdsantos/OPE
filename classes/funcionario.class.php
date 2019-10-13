<?php

require_once 'Conexao.class.php';
require_once 'funcoes.class.php';


class Funcionario{
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

    public function querySeleciona(){
        try{
            $cst = $this->con->conect()->prepare("SELECT * FROM `funcionario`");
            //$cst = bindParam(":ID", $this->ID, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }

    public function queryInsert($dados){
        try{
            $this->nome = $this->objfunc->tratarCaracter($dados['nome'], 1);
            $this->cpf = $this->objfunc->tratarCaracter($dados['cpf'], 1);
            $this->cel = $this->objfunc->tratarCaracter($dados['cel'], 1);
            $this->email = $this->objfunc->tratarCaracter($dados['email'], 1);
            $cst = $this->con->conect()->prepare("INSERT INTO `funcionario`(`NOME`, `CPF`, `EMAIL`, `CELULAR`) VALUES(:nome,:cpf,:email,:cel);");
            $cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst -> bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
            $cst -> bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst -> bindParam(":cel", $this->cel, PDO::PARAM_INT);
            if ($cst->execute()){
                $cst = $this->con->conect()->prepare("SELECT `id` FROM `funcionario` ORDER BY id  DESC LIMIT 1");
                $cst -> execute();
                $ultimaid = $cst->fetchColumn(0);
                $cst = $this->con->conect()->prepare("INSERT INTO `login`(`ID_FUNCIONARIO`, `SENHA`) VALUES ($ultimaid,:cpf)");
                $cst -> bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
                if ($cst->execute()){
                    return 'ok';                
                }else{
                    return 'erro';
                }
            }
        }catch(PDOException $ex){
        }
    }

    public function querySelect($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT * FROM funcionario WHERE ID = $dados");
            $cst -> execute();
            return $cst->fetch();
        }catch(PDOException $ex){
            return 'erro '.$ex->getMessage();
        }

    }

    public function queryUpdate($dados){
        try{
            $this->ID_FUN = $this->objfunc->tratarCaracter($dados['ID_FUN'], 1);
            $this->nome = $this->objfunc->tratarCaracter($dados['nome'], 1);
            $this->cpf = $this->objfunc->tratarCaracter($dados['cpf'], 1);
            $this->cel = $this->objfunc->tratarCaracter($dados['cel'], 1);
            $this->email = $this->objfunc->tratarCaracter($dados['email'], 1);
            $cst = $this->con->conect()->prepare("UPDATE `funcionario` SET `NOME`=:nome,`CPF`=:cpf,`EMAIL`=:email,`CELULAR`=:cel WHERE `ID` = :ID_FUN;");
            $cst2 = $this->con->conect()->prepare("UPDATE `login` SET `SENHA`=:cpf WHERE `ID_FUNCIONARIO`=:ID_FUN");
            $cst -> bindParam(":ID_FUN", $this->ID_FUN, PDO::PARAM_INT);
            $cst -> bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
            $cst2 -> bindParam(":ID_FUN", $this->ID_FUN, PDO::PARAM_INT);
            $cst2 -> bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
            $cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst -> bindParam(":cel", $this->cel, PDO::PARAM_INT);
            $cst -> bindParam(":email", $this->email, PDO::PARAM_STR);
            if ($cst->execute()){
                if($cst2->execute()){
                    return 'ok';  
                }     
            }else{
                    return 'erro';
                } 
        }catch(PDOException $ex){
            
        }

    }

    public function queryDelete($dados){
        try{
            $this->idFuncionario = $this->objfunc->tratarCaracter($dados, 1);
            $cst = $this->con->conect()->prepare("DELETE FROM `funcionario` WHERE `ID` = :idFunc;");
            $cst2 = $this->con->conect()->prepare("DELETE FROM `login` WHERE `ID_FUNCIONARIO` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            $cst2->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            if($cst->execute()){
                if($cst2->execute()){
                    return 'ok';
                }
            }else{
                    return 'erro';
                }
        }catch(PDOException $ex){
            
        }

    }

}

?>