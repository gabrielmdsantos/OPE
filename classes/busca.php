<?php
/*
public function querySelectdinamic($dados){
        try{
            $this->id  = $dados['id'];
            $this->nome = $dados['nome'];
            $this->parceiro = $dados['parceiro'];
            $cst = $this->con->conect()->prepare("SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc WHERE parceiro.id_parc = :parceiro OR cliente.nome LIKE '%:nome%' OR cliente.id = :id;");
            $cst -> bindParam(":id", $this->email, PDO::PARAM_INT);
            $cst -> bindParam(":nome", $this->email, PDO::PARAM_STR);
            $cst -> bindParam(":parceiro", $this->email, PDO::PARAM_STR);
            if($cst->execute()){
            return $cst->fetchAll();
            }
        }catch(PDOException $ex){

        }
    }
*/

	//Incluir a conexão com banco de dados
	//include_once('conexao.php');
	require_once 'Conexao.class.php';
	//Recuperar o valor da palavra
	$cliente = $_POST['nome'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cliente = "SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc WHERE cliente.nome LIKE '%:nome%'";
	$resultado_cliente = mysqli_query($conect, $cliente);
	
	if(mysqli_num_rows($resultado_cliente) <= 0){
		echo "Nenhum curso encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cliente)){
			echo "<li>".$rows['nome']."</li>";
		}
	}
?>