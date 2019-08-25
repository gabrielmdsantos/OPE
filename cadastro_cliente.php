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
    $Nome = "";
    $rg = "";
    $CPF = "";

    function getPosts()
        {
        
            $posts = array();
            $posts [1] = $_POST ['Nome'];
            $posts [2] = $_POST ['rg'];
            $posts [3] = $_POST ['cpf'];
            
            return $posts;
        }
    
        
    
    if (isset($_POST['insert'])){
        $data = getPosts();
        $Insert_Query = "INSERT INTO `cliente`(`Nome`, `rg`,`cpf`) VALUES ('$data[1]','$data[2]','$data[3]')";
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
    <form action="cadastro_cliente.php" method="post">
        <div id="cad">
        <h4>CADASTRAR CLIENTE</h4>
        <input type="text" name="Nome" placeholder="Nome" value="<?php echo $Nome;?>" /> <br>
        <br><input type="text" name="rg" placeholder="RG" value="<?php echo $rg;?>" /> <br>
        <br><input type="text" name="cpf" placeholder="CPF" value="<?php echo $CPF?>" />
        <input type="submit" name="insert" value="Cadastrar" >
        </div>
    </form>
</nav>

</body>
    
