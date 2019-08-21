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
    $CPF = "";
    $email= "";
    $celular =  "";

        
    
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


        
        
        
       
        <aside class="um">
        
        </aside>
        <section>
             
            <form action="funcionario.php" method="post">
            <center>
           
            Nome:<br> <input type="text" name="Nome" placeholder="Nome" value="<?php echo $nome;?>" /> <br> 
            CPF:<br> <input type="text" name="CPF" placeholder="CPF" value="<?php echo $CPF;?>" /> <br>
            email:<br> <input type="text" name="email" placeholder="email" value="<?php echo $email;?>" /> <br>
            celular:<br> <input type="text" name="celular" placeholder="celular" value="<?php echo $celular;?>" /> <br>
  
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