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
    private $tel1;
    private $tel2;
    private $tcel;
    private $email;

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
      
            $this->cep = $this->objfunc->tratarCaracter($dados['cep'],1);
            $this->logradouro = $this->objfunc->tratarCaracter($dados['logradouro'],1);
            $this->numero = $dados['numero'];
            $this->complemento = $this->objfunc->tratarCaracter($dados['complemento'],1);
            $this->municipio = $this->objfunc->tratarCaracter($dados['municipio'],1);
            $this->estado = $this->objfunc->tratarCaracter($dados['estado'],1);
            $this->tipo = $this->objfunc->tratarCaracter($dados['tipo'],1);
            $ultimaid = $cst->fetchColumn(0);
            $cst = $this->con->conect()->prepare("INSERT INTO `endereco`(`tipo`,`cep`,`logradouro`,`Numero`,`Complemento`,`municipio`,`estado`,`id_cli`) VALUES  (:tipo,:cep,:logradouro,:numero,:complemento,:municipio,:estado,$ultimaid);");
      
            $cst -> bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
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
            $this->cepb = $this->objfunc->tratarCaracter($dados['cepb'],1);
            $this->logradourob = $this->objfunc->tratarCaracter($dados['logradourob'],1);
            $this->numerob = $this->objfunc->tratarCaracter($dados['numerob'],1);
            $this->complementob = $this->objfunc->tratarCaracter($dados['complementob'],1);
            $this->municipiob = $this->objfunc->tratarCaracter($dados['municipiob'],1);
            $this->estadob = $this->objfunc->tratarCaracter($dados['estadob'],1);
            $this->tipob = $this->objfunc->tratarCaracter($dados['tipob'],1);
            $ultimaid = $cst->fetchColumn(0);
            $cst = $this->con->conect()->prepare("INSERT INTO `endereco`(`tipo`,`cep`,`logradouro`,`Numero`,`Complemento`,`municipio`,`estado`,`id_cli`) VALUES  (:tipob,:cepb,:logradourob,:numerob,:complementob,:municipiob,:estadob,$ultimaid);");
            $cst -> bindParam(":tipob", $this->tipob, PDO::PARAM_STR)   ;
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

    public function querySeleciona($dado){
            
            try{
                $this->id = $dado;
                $cst = $this->con->conect()->prepare("SELECT cliente.id AS id_cli, cliente.pessoa as pessoa_cli , cliente.nome AS nome_cli ,  cliente.cpf as  cpf_cli, cliente.rg as rg_cli , cliente.razao as razao_cli, cliente.inscricao as inscri_cli, cliente.representante as repre_cli , cliente.sexo as sex_cli , cliente.observacao as obs_cli, cliente.id_parc as parc_cli, parceiro.nome as nome_parceiro, 
                endereco.cep as cep, endereco.logradouro as endereco, endereco.Numero as num, endereco.Complemento as comple, endereco.municipio as municipio, endereco.estado as estado,
                telefone.telefone as tel, email.email as email  from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc INNER JOIN endereco ON endereco.id_cli = cliente.id INNER JOIN telefone ON cliente.id = telefone.id_clie INNER JOIN email ON cliente.id = email.id_cli WHERE cliente.id = :id;");
                $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
                $cst->execute();
                return $cst->fetch();
            } catch (PDOException $ex) {
                return 'error '.$ex->getMessage();
            }
    }
    
    public function querySelecionaID($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
            $cst->execute();
            return $cst->fechtAll();
        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();
        }
    }

    public function querySelectname(){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id`,  `nome` FROM `cliente`;");
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            return 'erro '.$ex->getMessage();
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
         //   $this->cnpj = $dados['cnpj'];
            $this->razao = $this->objfunc->tratarCaracter($dados['razao'], 1);
            $this->representante = $this->objfunc->tratarCaracter($dados['representante'], 1);
         //   $this->inscricao = $dados['inscricao'];
           //inserindo cliente 
            $cst = $this->con->conect()->prepare("INSERT INTO `cliente`(`pessoa`, `nome`, `cpf`, `rg`, `razao`,  `representante`, `sexo`, `observacao`, `id_parc`) VALUES (:pessoa,:nome,:cpf,:rg,:razao,:representante,:sexo,:observacao,:id_parc);");
            $cst -> bindParam(":pessoa", $this->pessoa, PDO::PARAM_STR);
            $cst -> bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst -> bindParam(":cpf",$this->cpf, PDO::PARAM_INT);
            $cst -> bindParam(":rg",$this->rg, PDO::PARAM_INT);
        //    $cst -> bindParam(":cnpj",$this->cnpj, PDO::PARAM_INT);
            $cst -> bindParam(":razao", $this   ->razao, PDO::PARAM_STR);
        //    $cst -> bindParam(":inscricao",$this->inscricao, PDO::PARAM_INT);
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

    public function queryInsertmail($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
            $cst -> execute();
            $this->email = $dados['email'];
            $ultimaid = $cst->fetchColumn(0);
            $cst = $this->con->conect()->prepare("INSERT INTO `email`(`email`, `id_cli`) VALUES (:email,$ultimaid);");
          //  $cst -> bindParam(":tipo", $this->pessoa, PDO::PARAM_STR);
            $cst -> bindParam(":email", $this->email, PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
                echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
            }else{
                return 'erro';
                echo '<script type="text/javascript"> alert("erro ao inserir");</script>';
            }
        }catch(PDOException $ex){
            
        }

    }

    public function queryInserttel($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id` FROM `cliente` ORDER BY id  DESC LIMIT 1");
            $cst -> execute();
            $this->tel1 = $dados['tel1'];
            $this->tel2 = $dados['tel2'];
            $this->tcel = $dados['tcel'];
            $ultimaid = $cst->fetchColumn(0);
            $cst = $this->con->conect()->prepare("INSERT INTO `telefone`(`telefone`, `id_clie`) VALUES  (:tel1,$ultimaid);");
            $cst2 = $this->con->conect()->prepare("INSERT INTO `telefone`(`telefone`, `id_clie`) VALUES  (:tel2,$ultimaid);");
            $cst3 = $this->con->conect()->prepare("INSERT INTO `telefone`(`telefone`, `id_clie`) VALUES  (:tcel,$ultimaid);");
            //$cst -> bindParam(":tipo", $this->pessoa, PDO::PARAM_STR);
            $cst -> bindParam(":tel1", $this->tel1, PDO::PARAM_INT);
            $cst2 -> bindParam(":tel2", $this->tel2, PDO::PARAM_INT);
            $cst3 -> bindParam(":tcel", $this->tcel, PDO::PARAM_INT);
            if($cst->execute()){
                if($cst2->execute()){
                    if($cst3->execute()){
                        return 'ok';
                        echo '<script type="text/javascript"> alert("Inserido com sucesso");</script>';
                    }
                }
               
            }else{
                return 'erro';
                echo '<script type="text/javascript"> alert("erro ao inserir");</script>';
            }
        }catch(PDOException $ex){
            
        }

    }

    public function querySelect($dados){
        try{

        }catch(PDOException $ex){
            
        }

    }

    public function queryUpdatee($dados){
        try{
            $this->id_cli = $this->objfunc->tratarCaracter($dados['id_cli'], 2);
            $this->pessoa = $this->objfunc->tratarCaracter($dados['pessoa'], 2);
            $this->nome = $this->objfunc->tratarCaracter($dados['nome'], 2);
            $this->cpf = $this->objfunc->tratarCaracter($dados['cpf'], 2);
            $this->rg = $this->objfunc->tratarCaracter($dados['rg'], 2);
            $this->sexo = $this->objfunc->tratarCaracter($dados['sexo'], 2);
            $this->razao = $this->objfunc->tratarCaracter($dados['razao'], 2);
            $this->representante = $this->objfunc->tratarCaracter($dados['representante'], 2);
            $this->inscricao = $this->objfunc->tratarCaracter($dados['inscricao'], 2);
            $this->cnpj = $this->objfunc->tratarCaracter($dados['cnpj'], 2);
            $this->id_parc = $this->objfunc->tratarCaracter($dados['id_parc'], 2);
            $this->observacao = $this->objfunc->tratarCaracter($dados['observacao'], 2);

            $cst = $this->con->conect()->prepare("UPDATE `cliente` SET `pessoa`=:pessoa,`nome`=:nome,`cpf`=:cpf,`rg`=:rg,`cnpj`=:cnpj,`razao`=:razao,`inscricao`=:inscricao,`representante`=:representante,`sexo`=:sexo,`observacao`=:observacao,`id_parc`=:id_parc WHERE  `id` = :id_cli");
            
            $cst->bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $cst->bindParam(":pessoa", $this->pessoa, PDO::PARAM_STR);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":cpf", $this->cpf, PDO::PARAM_INT);
            $cst->bindParam(":rg", $this->rg, PDO::PARAM_INT);
            $cst->bindParam(":sexo", $this->sexo, PDO::PARAM_STR);
            $cst->bindParam(":razao", $this->razao, PDO::PARAM_INT);
            $cst->bindParam(":representante", $this->representante, PDO::PARAM_STR);
            $cst->bindParam(":inscricao", $this->inscricao, PDO::PARAM_INT);
            $cst->bindParam(":cnpj", $this->cnpj, PDO::PARAM_INT);
            $cst->bindParam(":id_parc", $this->id_parc, PDO::PARAM_INT);
            $cst->bindParam(":observacao", $this->observacao, PDO::PARAM_STR);

            if($cst->execute()){
                return 'ok';
            }else{
                echo '<script type="text/javascript">alert("Erro em alterar");</script>';
                return 'erro';
            }
        }catch(PDOException $ex){
            return 'error '.$ex->getMessage();            
        }

    }

    public function Queryupdateend($dados){
        try{
            $this->id_end = $this->objfunc->tratarCaracter($dados['id_end'], 2);
            $this->cep = $this->objfunc->tratarCaracter($dados['cep'], 2);
            $this->logradouro = $this->objfunc->tratarCaracter($dados['logradouro'], 2);
            $this->numero = $this->objfunc->tratarCaracter($dados['numero'], 2);
            $this->complemento = $this->objfunc->tratarCaracter($dados['complemento'], 2);
            $this->municipio = $this->objfunc->tratarCaracter($dados['municipio'], 2);
            $this->estado = $this->objfunc->tratarCaracter($dados['estado'], 2);
            $this->tipo = $this->objfunc->tratarCaracter($dados['tipo'], 2);
            $cst = $this->con->conect()->prepare("UPDATE `endereco` SET `tipo`=:tipo,`cep`=:cep,`logradouro`=:logradouro,`Numero`=:numero,`Complemento`=:complemento,`municipio`=:municipio,`estado`=:estado WHERE  `id` = :id_end");
            $cst->bindParam(":id_end", $this->id_end, PDO::PARAM_INT);
            $cst->bindParam(":cep", $this->cep, PDO::PARAM_INT);
            $cst->bindParam(":logradouro", $this->logradouro, PDO::PARAM_STR);
            $cst->bindParam(":numero", $this->numero, PDO::PARAM_INT);
            $cst->bindParam(":complemento", $this->complemento, PDO::PARAM_STR);
            $cst->bindParam(":municipio", $this->municipio, PDO::PARAM_STR);
            $cst->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $cst->bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
            
            if($cst->execute()){
                return 'ok';
            }else{
                echo '<script type="text/javascript">alert("Erro em alterar");</script>';
                return 'erro';
            }
        }catch(PODEException $ex){
            return 'error' .$ex->getMessage();
        }
    }

    public function queryDelete($dados){
        try{

        }catch(PDOException $ex){
            
        }

    }

    public function querySelectclieparc(){
        try{
            $cst = $this->con->conect()->prepare("SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc;");
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            
        }

    }

    public function querySelectendereco($dados){
        try{
            $this->id_cli = $dados;
            $cst = $this->con->conect()->prepare("SELECT * FROM `endereco` WHERE `id_cli` = :id_cli;");
            $cst->bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            
        }

    }

    public function querySelecttel($dados){
        try{
            $this->id_cli = $dados;
            $cst = $this->con->conect()->prepare("SELECT * FROM `telefone` WHERE `id_clie` = :id_cli;");
            $cst->bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            
        }

    }

    //SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc


    //SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc WHERE parceiro.id_parc = 2 OR cliente.nome LIKE '%b%' OR cliente.id = 3
    // função dinamica
    

}   
    


?>