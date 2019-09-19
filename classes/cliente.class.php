<?php

require_once 'Conexao.class.php';
require_once 'funcoes.class.php';


class Cliente{
    private $conn;
    private $objfunc;
    private $id;
    private $pessoa;
    private $nome;
    private $cpf;
    private $rg;
    private $cnpj;
    private $razao;
    private $inscricao;
    private $representante;
    private $sexo;
    private $observacao;
    private $id_parc;
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

    public function queryEndereco($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
            $cst -> execute();
           // $this->tipo = $dados['tipo'];
            $this->cep = $dados['cep'];
            $this->logradouro = $dados['logradouro'];
            $this->numero = $dados['numero'];
            $this->complemento = $dados['complemento'];
            $this->municipio = $dados['municipio'];
            $this->estado = $dados['estado'];
            $ultimaid = $cst->fetchColumn(0);
            $cst = $this->con->conect()->prepare("INSERT INTO `endereco`(`cep`,`logradouro`,`Numero`,`Complemento`,`municipio`,`estado`,`id_cli`) VALUES  (:cep,:logradouro,:numero,:complemento,:municipio,:estado,$ultimaid);");
          //  $cst -> bindParam(":tipo", $this->pessoa, PDO::PARAM_STR);
            $cst -> bindParam(":cep", $this->cep, PDO::PARAM_INT);
            $cst -> bindParam(":logradouro", $this->logradouro, PDO::PARAM_STR);
            $cst -> bindParam(":numero", $this->numero, PDO::PARAM_INT);
            $cst -> bindParam(":complemento", $this->complemento, PDO::PARAM_STR);
            $cst -> bindParam(":municipio", $this->municipio, PDO::PARAM_STR);
            $cst -> bindParam(":estado", $this->estado, PDO::PARAM_STR);
    
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        }catch(PDOException $ex){

        }
    }
 
    
    public function queryEndereco2($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
            $cst -> execute();
           // $this->tipo = $dados['tipo'];
            $this->cepb = $dados['cepb'];
            $this->logradourob = $dados['logradourob'];
            $this->numerob = $dados['numerob'];
            $this->complementob = $dados['complementob'];
            $this->municipiob = $dados['municipiob'];
            $this->estadob = $dados['estadob'];
            $ultimaid = $cst->fetchColumn(0);
            $cst = $this->con->conect()->prepare("INSERT INTO `endereco`(`cep`,`logradouro`,`Numero`,`Complemento`,`municipio`,`estado`,`id_cli`) VALUES  (:cepb,:logradourob,:numerob,:complementob,:municipiob,:estadob,$ultimaid);");
          //  $cst -> bindParam(":tipo", $this->pessoa, PDO::PARAM_STR);
            $cst -> bindParam(":cepb", $this->cepb, PDO::PARAM_INT);
            $cst -> bindParam(":logradourob", $this->logradourob, PDO::PARAM_STR);
            $cst -> bindParam(":numerob", $this->numerob, PDO::PARAM_INT);
            $cst -> bindParam(":complementob", $this->complementob, PDO::PARAM_STR);
            $cst -> bindParam(":municipiob", $this->municipiob, PDO::PARAM_STR);
            $cst -> bindParam(":estadob", $this->estadob, PDO::PARAM_STR);
    
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        }catch(PDOException $ex){

        }
    }    

    public function querySeleciona($dados){
        try{
            $cst = $this->con->conectar()->prepare("Select * from cliente");
            $cst = bindParam(":id_cli", $this->idFuncionario, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fechtAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }
    public function querySelecionaID($dados){
        try{
            $cst = $this->con->conectar()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
            $cst = bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fechtAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }

    public function queryInsert($dados){
        try{     
            $this->pessoa = $dados['pessoa'];
            $this->nome = $this->objfunc->tratarCaracter($dados['nome'], 1);
            $this->sexo = $this->objfunc->tratarCaracter($dados['sexo'], 1);
            $this->observacao = $this->objfunc->tratarCaracter($dados['observacao'], 1);
            $this->id_parc = $dados['id_parc'];
            $this->cpf = $dados['cpf'];
            $this->rg = $dados['rg'];
            $this->cnpj = $dados['cnpj'];
            $this->razao = $this->objfunc->tratarCaracter($dados['razao'], 1);
            $this->inscricao = $dados['inscricao'];
           //inserindo cliente 
            $cst = $this->con->conect()->prepare("INSERT INTO `cliente`(`pessoa`, `nome`, `cpf`, `rg`, `cnpj`, `razao`, `inscricao`, `representante`, `sexo`, `observacao`, `id_parc`) VALUES (:pessoa,:nome,:cpf,:rg,:cnpj,:razao,:inscricao,:representante,:sexo,:observacao,:id_parc);");
            $cst -> bindParam(":pessoa", $this->pessoa, PDO::PARAM_STR);
            $cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst -> bindParam(":cpf",$this->cpf, PDO::PARAM_INT);
            $cst -> bindParam(":rg",$this->rg, PDO::PARAM_INT);
            $cst -> bindParam(":cnpj",$this->cnpj, PDO::PARAM_INT);
            $cst -> bindParam(":razao", $this->razao, PDO::PARAM_STR);
            $cst -> bindParam(":inscricao",$this->inscricao, PDO::PARAM_INT);
            $cst -> bindParam(":representante",$this->representante, PDO::PARAM_STR);
            $cst -> bindParam(":sexo",$this->sexo, PDO::PARAM_STR);
            $cst -> bindParam(":observacao",$this->observacao, PDO::PARAM_STR);
            $cst -> bindParam(":id_parc",$this->id_parc, PDO::PARAM_INT);
            
            if ($cst->execute()){
                
                /*
                try{
                    
                    $this->cpf = $dados['cpf'];
                    $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
                    $cst -> execute();
                    $ultimaid = $cst->fetch();
                    echo '<script type="text/javascript"> console.log("aquiiii"); </script>';
                    $cst = $this->con->conect()->prepare("INSERT INTO `endereco` ( `cep`) VALUES (:cpf);");
                    $cst -> bindParam(":cpf",$this->cpf, PDO::PARAM_INT);
                    if($cst->execute()){
                            echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>'; 
                    }else{
                        echo '<script type="text/javascript"> alert("Erro ao inserir Endereco");</script>';    
                    }

                }   catch(PDOException $ex){
                }
                
                //echo (querySelecionaID($dados));
                */
                
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