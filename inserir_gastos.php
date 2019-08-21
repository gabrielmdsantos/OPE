<!doctype html>
<html lang = 'pt-br'>
<head>
    <title> Formulario PHP </title>
    <meta charset="utf-8" />
    <link href="Css/diadois.css" type="text/css" rel="stylesheet">
</head>
    <body>
   
<?php
    $host="localhost";
    $user= "root";
    $password="";
    $database="teste";
    
    $id = "";
    $quantidade_gasta = "";
    $descricao = "";
        
        
    
    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    try{
        $conect = mysqli_connect ($host, $user, $password, $database);
    } catch (Exception $ex)
    {
     echo'Error';
    }
    
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


        
        
        
       
        <aside class="um">
        <li><a href="home.html">HOME</a></li>
        </aside>
        <section>
             
            <form action="inserir_gastos.php" method="post">
            <center>
           
            quantidade_gasta:<br> <input type="number" name="quantidade_gasta" placeholder="quantidade_gasta" value="<?php echo $quantidade_gasta;?>" /> <br> 
            descricao:<br> <input type="text" name="descricao" placeholder="descricao" value="<?php echo $descricao;?>" /> <br>
            
  
            <br>
            <div>
            <input type="submit" name="insert" value="Cadastrar" >
       
            </div>
            </center>
            </form>
           
        </section>
        <aside class="dois">
        
        </aside>
        <footer>
        
        </footer>        
   
</body>
</html>