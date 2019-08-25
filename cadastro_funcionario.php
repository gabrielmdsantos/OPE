<html lang="pt-br">
<head>
	
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" href="css/estilo_home.css">
    <link rel="stylesheet" href="css/esti.css">
</head>
<body>
	<?php 
    include_once("conexao.php");
	
	$id = "";
    $Nome = "";
    $CPF = "";
    $email= "";
    $celular =  "";
	
    function getPosts()
    {
    
        $posts = array();
        $posts [1] = $_POST ['Nome'];
        $posts [2] = $_POST ['CPF'];
        $posts [3] = $_POST ['email'];
        $posts [4] = $_POST ['celular'];
        return $posts;
    }
    
  
    
    if (isset($_POST['insert'])){
        $data = getPosts();
        $Insert_Query = "INSERT INTO `funcionario`(`Nome`, `CPF`,`email`,`celular`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]')";
        
        try{
            $insert_result = mysqli_query ($conect ,$Insert_Query);
            if ($insert_result){
                if(mysqli_affected_rows($conect)>0){
                    $sql = "SELECT `id` FROM `funcionario` WHERE `cpf` = $data[2]";
                    $query = mysqli_query($conect,$sql);
                    $resultado = mysqli_fetch_assoc($query);
                    $data[5] = $resultado['id'] ;
                    echo ($data[5]);
                    $Insert_Query2 = "INSERT INTO `usuarios`(`login`,`senha`) VALUES ('$data[5]','$data[2]')";
                    $insert_result2 = mysqli_query ($conect, $Insert_Query2);
                    echo ("Registro cadastrado com sucesso");
                }else{
                    echo("Não foi possivel inserir dados");
                }
            }
        } catch (Exception $ex){
            echo("error inserindo" .$ex->getMessage());
        }
    }
	?>
<nav id="menu">
   
        <?php require_once("header.php");?>
    
</nav>

    <nav id="ddf">
        <form action="cadastro_funcionario.php" method="post">
            <div id="cad">
            <h4>CADASTRAR FUNCIONÁRIO</h4>
            <input type="text" name="Nome" placeholder="Nome" value="<?php echo $Nome;?>" />  <br>
            <br><input type="text" name="CPF" placeholder="CPF" value="<?php echo $CPF;?>" /><br>
            <br><input type="text" name="email" placeholder="email" value="<?php echo $email;?>" /> <br>
            <br><input type="text" name="celular" placeholder="Celular" value="<?php echo $celular;?>" />
            <input type="submit" name="insert" value="Cadastrar" >
            </div>
        </form>
    </nav>

</body>
    
</html>


