<?php

require_once 'Conexao.class.php';
require_once 'funcoes.class.php';


class Contrato{
    private $conn;
    private $objfunc;
    private $vencimento;
    private $qnt_parcela;
    private $valor;
    private $prazo;
    private $detalhes;
    private $id_servi;
    private $id_cli;

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
            $cst = $this->con->conectar()->prepare("Select * from contrato");
            $cst = bindParam(":id_cli", $this->idFuncionario, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fechtAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }
    public function querySelecionaID($dados){
        try{
            $cst = $this->con->conectar()->prepare("SELECT `id` FROM `contrato` ORDER BY id  DESC LIMIT 1");
            $cst = bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fechtAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }

    public function queryInsert($dados){
        try{     
            $this->id_cli = $dados['id_cli'];
            $this->id_servi = $dados['id_servi'];
            $this->detalhes = $dados['detalhes'];
            $this->prazo = $this->objfunc->dataAtual(2);
            $this->valor = $dados['valor'];
            $this->qnt_parcela = $dados['qnt_parcela'];
            $this->vencimento = $dados['vencimento'];
           //inserindo contrato
            $cst = $this->con->conect()->prepare("INSERT INTO `contrato`(`ID_Cliente`,`ID_Servico`,`Detalhes`,`PRAZO`,`Valor`,`qnt_parcela`,`VENCIMENTO`) VALUES (:id_cli,:id_servi,:detalhes,:prazo,:valor,:qnt_parcela,:vencimento);");
            $cst -> bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $cst -> bindParam(":id_servi", $this->id_servi, PDO::PARAM_INT);
            $cst -> bindParam(":detalhes", $this->detalhes, PDO::PARAM_STR);
            $cst -> bindParam(":prazo", $this->prazo, PDO::PARAM_STR);
            $cst -> bindParam(":valor", $this->valor, PDO::PARAM_STR);
            $cst -> bindParam(":qnt_parcela", $this->qnt_parcela, PDO::PARAM_STR);
            $cst -> bindParam(":vencimento", $this->vencimento, PDO::PARAM_INT);
           

            
            if ($cst->execute()){
                echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
                return 'ok';
            }else{
                echo '<script type="text/javascript"> alert("Erro ao inserir");</script>';
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