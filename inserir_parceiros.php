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
    $nome = "";
        
        
    
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
        $posts [1] = $_POST ['Nome'];
        
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


        
        
        
       
        <aside class="um">
        <li><a href="home.html">HOME</a></li>
        </aside>
        <section>
             
            <form action="inserir_parceiros.php" method="post">
            <center>
           
            Nome:<br> <input type="text" name="Nome" placeholder="Nome" value="<?php echo $nome;?>" /> <br> 
           
            
  
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