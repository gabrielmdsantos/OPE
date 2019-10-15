<?php

require_once 'Conexao.class.php';
require_once 'funcoes.class.php';


class Hora{
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


  /*  public function querySeleciona($dado){
        try{
            $this->id = $dado;
            $cst = $this->con->conect()->prepare("SELECT cliente.id as id_cli, cliente.nome as nome_cli, servico.servico as nome_servico, cliente.rg as rg_cli, cliente.cpf AS cpf_cli, contrato.Detalhes as detalhes_contrato, contrato.PRAZO as prazo, contrato.Valor as valor, contrato.qnt_parcela as parcelas, contrato.VENCIMENTO as dia_vencimento,contrato.id as id_contrato FROM contrato INNER JOIN cliente ON cliente.id = contrato.ID_Cliente INNER JOIN servico ON servico.id = contrato.ID_Servico WHERE contrato.id = :id;");
            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
*/
    public function queryInsert($dados){
        try{     
            $this->id_func = $dados['id_func'];
            $this->data = $dados['data'];
            $this->hora1 = $dados['hora1'];
            $this->hora2 = $dados['hora2'];
            $this->id_cont = $dados['id_cont'];
           //inserindo contrato
            $cst  = $this->con->conect()->prepare("INSERT INTO `horas`(`contrato`, `data`, `hora_inicial`, `hora_final`, `id_func`) VALUES (:id_cont,:data,:hora1,:hora2,:id_func);");
            $cst -> bindParam(":id_func", $this->id_func, PDO::PARAM_INT);
            $cst -> bindParam(":id_cont", $this->id_cont, PDO::PARAM_INT);
            $cst -> bindParam(":data", $this->data, PDO::PARAM_STR);
            $cst -> bindParam(":hora1", $this->hora1, PDO::PARAM_STR);
            $cst -> bindParam(":hora2", $this->hora2, PDO::PARAM_STR);
            if ($cst->execute()){
                return 'ok';
            }else{
                echo '<script type="text/javascript"> alert("Erro ao inserir");</script>';
                return 'erro';
            }
        }catch(PDOException $ex){
        }

    }

    public function querySelecthoras(){
        try{
            $cst = $this->con->conect()->prepare("SELECT contrato.ID AS CC, cliente.nome AS CLI, servico.servico AS Serv, contrato.Detalhes AS DETALHES,contrato.Valor AS VALOR ,contrato.qnt_parcela AS QNT_PARC ,contrato.VENCIMENTO AS VENC,SUM(hour(horas.hora_final) - hour(horas.hora_inicial)) AS hora,SUM(minute(horas.hora_final) - minute(horas.hora_inicial)) AS Minuto from cliente INNER JOIN contrato ON cliente.id = contrato.ID_Cliente INNER JOIN servico ON contrato.ID_Servico = servico.id INNER JOIN horas ON horas.contrato  = contrato.ID GROUP BY contrato.ID");
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            
        }

    }
    /*
    public function queryEndereco($dados){
        try{
            $cst = $this->con->conect()->prepare("SELECT `id` FROM `contrato` ORDER BY id  DESC LIMIT 1");
            $cst -> execute();
            $this->id_cli = $dados['id_cli'];
            $this->cep = $this->objfunc->tratarCaracter($dados['cep'],1);
            $this->logradouro = $this->objfunc->tratarCaracter($dados['logradouro'],1);
            $this->numero = $dados['numero'];
            $this->complemento = $this->objfunc->tratarCaracter($dados['complemento'],1);
            $this->municipio = $this->objfunc->tratarCaracter($dados['municipio'],1);
            $this->estado = $this->objfunc->tratarCaracter($dados['estado'],1);
            $this->tipo = $this->objfunc->tratarCaracter($dados['tipo'],1);
            $idcontrato = $cst->fetchColumn(0);
            $cst =  $this->con->conect()->prepare("INSERT INTO `endereco`(`tipo`,`cep`,`logradouro`,`Numero`,`Complemento`,`municipio`,`estado`,`id_cli`,`id_cont`) VALUES  (:tipo,:cep,:logradouro,:numero,:complemento,:municipio,:estado,:id_cli,$idcontrato);");
            $desp = $this->con->conect()->prepare("INSERT INTO `despesa_proj` (`ID_CONT`, `id_cli`) VALUES ($idcontrato,:id_cli)");
            $rece = $this->con->conect()->prepare("INSERT INTO `receita_proj` (`ID_CONT`, `id_cli`) VALUES ($idcontrato,:id_cli)");
            $cst -> bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $desp -> bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $rece -> bindParam(":id_cli", $this->id_cli, PDO::PARAM_INT);
            $cst -> bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
            $cst -> bindParam(":cep", $this->cep, PDO::PARAM_INT);
            $cst -> bindParam(":logradouro", $this->logradouro, PDO::PARAM_STR);
            $cst -> bindParam(":numero", $this->numero, PDO::PARAM_INT);
            $cst -> bindParam(":complemento", $this->complemento, PDO::PARAM_STR);
            $cst -> bindParam(":municipio", $this->municipio, PDO::PARAM_STR);
            $cst -> bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $rece -> execute();
            $desp -> execute();
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        }catch(PDOException $ex){

        }
    }


    public function queryDelete($dados){
        try{

        }catch(PDOException $ex){
            
        }

    }

    public function queryupdateend($dados){
        try{
            $this->id_end = $dados['id_end'];
            $this->cep = $this->objfunc->tratarCaracter($dados['cep'],1);
            $this->logradouro = $this->objfunc->tratarCaracter($dados['logradouro'],1);
            $this->numero = $dados['numero'];
            $this->complemento = $this->objfunc->tratarCaracter($dados['complemento'],1);
            $this->municipio = $this->objfunc->tratarCaracter($dados['municipio'],1);
            $this->estado = $this->objfunc->tratarCaracter($dados['estado'],1);
         //   $this->tipo = $this->objfunc->tratarCaracter($dados['tipo'],1);
            $cst = $this->con->conect()->prepare("UPDATE `endereco` SET `cep`=:cep,`logradouro`=:logradouro,`Numero`=:numero,`Complemento`=:complemento,`municipio`=:municipio,`estado`=:estado WHERE `id` = :id_end");
            $cst -> bindParam(":id_end", $this->id_end, PDO::PARAM_INT);
        //    $cst -> bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
            $cst -> bindParam(":cep", $this->cep, PDO::PARAM_INT);
            $cst -> bindParam(":logradouro", $this->logradouro, PDO::PARAM_STR);
            $cst -> bindParam(":numero", $this->numero, PDO::PARAM_INT);
            $cst -> bindParam(":complemento", $this->complemento, PDO::PARAM_STR);
            $cst -> bindParam(":municipio", $this->municipio, PDO::PARAM_STR);
            $cst -> bindParam(":estado", $this->estado, PDO::PARAM_STR);
            // UPDATE `endereco` SET `cep`=[value-3],`logradouro`=[value-4],`Numero`=[value-5],`Complemento`=[value-6],`municipio`=[value-7],`estado`=[value-8] WHERE `id_cli` = 1
            if($cst->execute()){
                return 'ok';
            }else{
                echo '<script type="text/javascript">alert("Erro em alterar");</script>';
                return 'erro';
            }
        }catch(PODEException $ex){

        }
    }


    public function queryupdatecontrato($dados){
        try{
            $this->id_contrato = $dados['id_contrato'];
            //$this->id_servi = $dados['id_servi'];
            $this->detalhes = $dados['detalhes'];
            $this->prazo = $dados['prazo'];
            $this->valor = $dados['valor'];
            $this->qnt_parcela = $dados['qnt_parcela'];
            $this->vencimento = $dados['vencimento'];
           //inserindo contrato
            $cst = $this->con->conect()->prepare("UPDATE `contrato` SET `Detalhes`=:detalhes,`PRAZO`=:prazo,`Valor`=:valor,`qnt_parcela`=:qnt_parcela,`VENCIMENTO`=:vencimento WHERE id = :id_contrato;");
            $cst -> bindParam(":id_contrato", $this->id_contrato, PDO::PARAM_INT);
            //$cst -> bindParam(":id_servi", $this->id_servi, PDO::PARAM_INT);
            $cst -> bindParam(":detalhes", $this->detalhes, PDO::PARAM_STR);
            $cst -> bindParam(":prazo", $this->prazo, PDO::PARAM_STR);
            $cst -> bindParam(":valor", $this->valor, PDO::PARAM_STR);
            $cst -> bindParam(":qnt_parcela", $this->qnt_parcela, PDO::PARAM_STR);
            $cst -> bindParam(":vencimento", $this->vencimento, PDO::PARAM_INT);
            if($cst->execute()){
                return 'ok';
            }else{
                echo '<script type="text/javascript">alert("Erro em alterar");</script>';
                return 'erro';
            }

        }catch(PODEException $ex){

        }
    }


    public function querySelectcli(){
        try{
            $cst = $this->con->conect()->prepare("SELECT contrato.ID AS CC, cliente.nome AS CLI, servico.servico AS Serv, contrato.Detalhes AS DETALHES,contrato.Valor AS VALOR ,contrato.qnt_parcela AS QNT_PARC ,contrato.VENCIMENTO AS VENC from cliente INNER JOIN contrato ON cliente.id = contrato.ID_Cliente INNER JOIN servico ON contrato.ID_Servico = servico.id;");
            $cst->execute();
            return $cst->fetchAll();
        }catch(PDOException $ex){
            
        }

    }

    public function querySelectDesp($id){
        try{
            $cst = $this->con->conect()->prepare("SELECT * FROM `despesa_proj` WHERE `ID_CONT` = $id");
            $cst->execute();
            return $cst->fetchAll();
            //SELECT * FROM `receita_proj` WHERE `ID_CONT` = 1
        }catch(PDOException $ex){

        }
    }

    public function querySelectRec($id){
        try{
            $cst = $this->con->conect()->prepare("SELECT * FROM `receita_proj` WHERE `ID_CONT` = $id");
            $cst->execute();
            return $cst->fetchAll();
            //SELECT * FROM `receita_proj` WHERE `ID_CONT` = 1
        }catch(PDOException $ex){

        }
    }

    public function queryDeletRec($idcont,$idrec){
        try{
            echo($idrec);
            $cst = $this->con->conect()->prepare("DELETE FROM `receita_proj` WHERE `ID` = $idrec");
            if($cst->execute()){
                return '<script type="text/javascript"> alert ("Deletado com sucesso"); </script>';
                return 'ok';
            } else{
                return 'erro';
            }
        }catch(PDOException $ex){
        }
    }

    public function queryDeletDes($idcont,$iddes){
        try{
            echo($idrec);
            $cst = $this->con->conect()->prepare("DELETE FROM `despesa_proj` WHERE `ID` = $iddes");
            if($cst->execute()){
                echo '<script type="text/javascript"> alert ("Deletado com sucesso"); </script>';
                return 'ok';
            }
        }catch(PDOException $ex){
        }
    }
*/
    }

?>