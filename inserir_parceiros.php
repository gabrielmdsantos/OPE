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
    $nome = "";

    function getPosts()
        {
        
            $posts = array();
            $posts [1] = $_POST ['nome'];
            
            return $posts;
        }
    
    
        
        
        if (isset($_POST['insert'])){
            $data = getPosts();
            $Insert_Query = "INSERT INTO `parceiro`(`Nome`) VALUES ('$data[1]')";
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
        <form action="inserir_parceiros.php" method="post">
            <div id="cad">
                <h4>PARCEIRO</h4>
                <input type="text" name="nome" placeholder="Nome" value="<?php echo  $nome;?>" /> 
                <input type="submit" name="insert" value="Cadastrar" >
            </div>
        </form>
    </nav>

</body>
    
</html>