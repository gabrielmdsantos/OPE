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
            $this->cpf = $this->objfunc->tratarCaracter($dados['cpf'], 1);
            $this->cel = $this->objfunc->tratarCaracter($dados['cel'], 1);
            $this->email = $this->objfunc->tratarCaracter($dados['email'], 1);
            $cst = $this->con->conect()->prepare("INSERT INTO `funcionario`(`NOME`, `CPF`, `EMAIL`, `CELULAR`) VALUES(:nome,:cpf,:cel,:email);");
            $cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst -> bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
            $cst -> bindParam(":cel", $this->cel, PDO::PARAM_INT);
            $cst -> bindParam(":email", $this->email, PDO::PARAM_STR);
            if ($cst->execute()){
                $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
                $cst -> execute();
                $ultimaid = $cst->fetchColumn(0);
                $cst = $this->con->conect()->prepare("INSERT INTO `login`(`ID_FUNCIONARIO`, `SENHA`) VALUES ($ultimaid,:cpf)");
                $cst -> bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
                if ($cst->execute()){
                    return 'ok';
                echo '<script type="text/javascript"> alert("Inserido com sucesso")</script>';                
                }else{
                    return 'erro';
                }
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