<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" href="css/estilo_home.css">
    <link rel="stylesheet" href="css/esti.css">
    <?php  include_once("conexao.php");  ?>
</head>
<body>
<nav id="menu">
    <?php require_once("header.php");?>
</nav>

    <nav id="ddf">
        <?php
            $id = "";
            $quantidade_gasta = "";
            $descricao = "";

            function getPosts()
                {
                
                    $posts = array();   

                    $posts [1] = $_POST ['quantidade_gasta'];
                    $posts [2] = $_POST ['descricao'];
                    return $posts;
                }
    
    
        
    
                if (isset($_POST['insert'])){
                    $data = getPosts();
                    $Insert_Query = "INSERT INTO `gastos`(`quantidade_gasta`,`descricao`) VALUES ('$data[1]','$data[2]')";
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
        <form action="inserir_gastos.php" method="post">
            <div id="cad">
                <h4>GASTOS</h4>
                <input type="text" name="quantidade_gasta" placeholder="Nome" value="<?php echo $quantidade_gasta; ?>" /> <br>
                <br><input type="text" name="descricao" placeholder="Descricao" value="<?php echo $descricao;?>" /> 
                <input type="submit" name="insert" value="Inserir" >
            </div>
        </form>
    </nav>

</body>
    
</html>