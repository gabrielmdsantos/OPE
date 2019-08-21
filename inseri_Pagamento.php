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
    $id_projeto = "";
    $valor_total ="";
    $forma_pagamento = "";
    $parcelamento = "";

        
    
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
        
        $posts [1] = $_POST ['valor_total'];
        $posts [2] = $_POST ['forma_pagamento'];
        $posts [3] = $_POST ['parcelamento'];
       
        return $posts;
    }
    
    
        
    
    if (isset($_POST['insert'])){
        $data = getPosts();
        $Insert_Query = "INSERT INTO `alunos`(`Nome`, `Sobrenome`, `CPF`,`nascimento`,`CEP`,`endereco`,`Cidade`,`Estado`,`usuario`,`senha` ) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";
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
        
        </aside>
        <section>
             
            <form action="Inserindoviaform.php" method="post">
            <center>
           
            Valor Total:<br> <input type="text" name="Valor_Total" placeholder="Valor_Total" value="<?php echo $valor_total;?>" /> <br> 
            Forma de pagamento:<br> <input type="text" name="forma_pagamento" placeholder="forma_pagamento" value="<?php echo $forma_pagamento;?>" /> <br>
            Parcelamento:<br> <input type="text" name="parcelamento" placeholder="parcelamento" value="<?php echo $parcelamento;?>" /> <br>
           
           
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