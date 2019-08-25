<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" href="css/estilo_home.css">
    <link rel="stylesheet" href="css/esti.css">
    <?php include_once("conexao.php"); ?>
</head>
<body>
<nav id="menu">
    <?php require_once("header.php");?>
</nav>

    <nav id="ddf">
    <?php    
        $id = "";
        $tipo_de_servico = "";


        function getPosts()
        {
            $posts = array();
            $posts [1] = $_POST ['tipo_de_servico'];
            return $posts;
        }
        
    
        if (isset($_POST['insert'])){
            $data = getPosts();
            $Insert_Query = "INSERT INTO `servico`(`tipo_de_servico`) VALUES ('$data[1]')";
            try{
                $insert_result = mysqli_query ($conect ,$Insert_Query);
                if ($insert_result){
                    if(mysqli_affected_rows($conect)>0){
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
        <form action="cadastro_servico.php" method="post">
            <div id="cad">
                <h4>SERVIÇO</h4>
                <input type="text" name="tipo_de_servico" placeholder="Tipo de Servico" value="<?php echo $tipo_de_servico;?>" /> <br>
                <input type="submit" name="insert" value="Inserir" >
            </div>
        </form>
        
    </nav>

</body>
    
</html>