<!doctype html>
<html lang = 'pt-br'>
<head>
    <title> Formulario PHP </title>
    <meta charset="utf-8" />
   
</head>
    <body>
   
<?php
    $host="localhost";
    $user= "root";
    $password="";
    $database="teste";
    
    $id = "";
    $cliente = "";
    $parceiro = "";
    $funcionario = "";
    $servico =  "";
    $pagamento = "";
    $descricao = "";
    $tamanho = "";

    $cep = "";
    $cidade = "";
    $estado = "";
    $endereço = "";
    $numero = "";
    $condicoes = "";

    $prazo = "";
    $data_inicio = "";
    $situacao = "";
    $data_final = "";

    $valor_total = "";
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
        $posts [1] = $_POST ['servico'];
        $posts [2] = $_POST ['cliente'];
        $posts [3] = $_POST ['parceiro'];
        $posts [4] = $_POST ['funcionario'];
        $posts [5] = $_POST ['descricao'];
        $posts [6] = $_POST ['tamanho'];
        $posts [7] = $_POST ['cep'];
        $posts [8] = $_POST ['cidade'];
        $posts [9] = $_POST ['estado'];
        $posts [10] = $_POST ['endereco'];
        $posts [11] = $_POST ['numero'];
        $posts [12] = $_POST ['condicoes'];
        $posts [13] = $_POST ['prazo'];
        $posts [14] = $_POST ['data_inicio'];
        $posts [15] = $_POST ['data_final'];
        $posts [16] = $_POST ['valor_total'];
        $posts [17] = $_POST ['forma_pagamento'];
        $posts [18] = $_POST ['parcelamento'];
        $posts [19] = $_POST ['situacao'];
        return $posts;
    }
    
  
    
    if (isset($_POST['insert'])){
        $data = getPosts();
        $Insert_Query = "INSERT INTO `pagamento`(`valor_total`, `forma_pagamento`,`parcelamento`) VALUES ('$data[16]','$data[17]','$data[18]')";
        
        try{
            $insert_result = mysqli_query ($conect ,$Insert_Query);
            if ($insert_result){
                if(mysqli_affected_rows($conect)>0){
                    $Insert_local = "INSERT INTO `local_do_projeto`( `id_cliente`, `cep`, `cidade`, `estado`, `endereco`, `numero`, `condicoes_imovel`) VALUES ('$data[2]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]')";
                    $insert_result2 = mysqli_query($conect,$Insert_local);   
                    if(mysqli_affected_rows($conect)>0){
                        $sql = "SELECT `id` FROM `pagamento` ORDER BY id DESC LIMIT 1";
                        $queryp = mysqli_query($conect,$sql);
                        $resul = mysqli_fetch_assoc($queryp);
                        $data[20] = $resul['id'];
                        $Insert_projeto = "INSERT INTO `projeto`( `id_cliente`, `id_parceiro`, `id_funcionario`, `id_servico`, `id_pagamento`, `descricao`, `tamanho`) VALUES ('$data[2]','$data[3]','$data[4]','$data[1]',$data[20],'$data[5]','$data[6]')";
                        $insert_result3 = mysqli_query($conect,$Insert_projeto);
                        if(mysqli_affected_rows($conect)>0){
                            $Insert_acompa = "INSERT INTO `acompanhamento`( `prazo`, `data_inicio`, `situacao`, `data_final`) VALUES ('$data[13]','$data[14]','$data[19]','$data[15]')";
                            $Insert_result4 = mysqli_query($conect,$Insert_acompa);
                            echo ("Registro cadastrado com sucesso");
                        }
                    }      
                    
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
              
            <form action="cadastro_projeto.php" method="post">
            <h1>Novo serviço</h1>
            <center>
           
            <div>
            <h2>Dados Gerais</h2>
            Serviço:<br>    <select name="servico">
                         <option> Selecione </option
            
                             <?php 
                                $queryser = "SELECT * FROM `servico`";
                                $resultadoser = mysqli_query($conect,$queryser);
                                while($row = mysqli_fetch_assoc($resultadoser)){ ?>
                                <option valeu="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?>
                                </option>
                                <?php
                                }
                                ?> 
                                </select>
                                <Br>
            Cliente:<br> <select name="cliente">
                         <option> Selecione </option>
                            <?php 
                                $querycli = "SELECT * FROM `cliente`";
                                $resultadocli = mysqli_query($conect,$querycli);
                                while($rowc = mysqli_fetch_assoc($resultadocli)){ ?>
                                <option valeu="<?php echo $rowc['id'];?>"> <?php echo $rowc['id']; ?>
                                </option> <?php
                                }
                                ?>
                            ?>
                         </select>
                        <br>  
            parceiro:<br><select name="parceiro">
                         <option name="parceiro"> Selecione </option>
                            <?php 
                                $queryfun = "SELECT * FROM `parceiro`";
                                $resultadofun = mysqli_query($conect,$queryfun);
                                while($row = mysqli_fetch_assoc($resultadofun)){ ?>
                                <option name="parceiro" valeu="<?php echo $row['id'];?>"> <?php echo $row['id']; ?>
                                </option>
                                <?php
                                }
                                ?>
                            ?>
                         </select>
                        <br>  
            funcionario:<br> <select name="funcionario">
                         <option> Selecione </option>
                            <?php 
                                $queryfun = "SELECT * FROM `funcionario`";
                                $resultadofun = mysqli_query($conect,$queryfun);
                                while($row = mysqli_fetch_assoc($resultadofun)){ ?>
                                <option valeu="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?>
                                </option>
                                <?php
                                }
                                ?>
                            ?>
                            
                         </select>
                         <br>
            Descricao:<br> <input type="text" name="descricao" placeholder="descricao" value="<?php echo $descricao;?>" /> <br>
            Tamanho (M²):<br> <input type="text" name="tamanho" placeholder="tamanho" value="<?php echo $tamanho;?>" /> <br>
            </div>
            <div>
            <h2> Local do projeto </h2>
                    CEP: <br> <input type="text" name="cep" placeholder="cep" value="<?php echo $cep;?>" /> <br>
                    Cidade: <br> <input type="text" name="cidade" placeholder="cidade" value="<?php echo $cidade;?>"  /> <br>
                    Estado: <br> <input type="text" name="estado" placeholder="Estado" value="<?php echo $estado;?>"  /> <br>
                    Endereço: <br> <input type="text" name="endereco" placeholder="endereco" value="<?php echo $endereço;?>" /> <br>
                    Numero: <br> <input type="text" name="numero" placeholder="numero" value="<?php echo $numero;?>" /> <br>
                    Condiçoes do imovel: <br> <input type="text" name="condicoes" placeholder="condicoes" value="<?php echo $condicoes;?>" /> <br>
            </div>
            <div>
            <h2> Acompanhamento </h2>
                    Prazo: <br> <input type="text" name="prazo" placeholder="prazo" value="<?php echo $prazo;?>"/> <br>
                    Data Inicio: <br> <input type="date" name="data_inicio" placeholder="Data Inicio" value="<?php echo $data_inicio;?>"/> <br>
                    Data Final: <br> <input type="date" name="data_final" placeholder="Data Final" value="<?php echo $data_final;?>"/> <br>
                    Situação: <br> <input type="text" name="situacao" placeholder="situacao" value="<?php echo $situacao;?>"/> <br>

            </div>
            <div>
            <h2> Pagamento </h2>
                    Valor Total: <br> <input type="text" name="valor_total" placeholder="Valor" value="<?php echo $valor_total;?>"/> <br>
                    Forma de Pagamento: <br> <input type="text" name="forma_pagamento" placeholder="forma de pagamento" value="<?php echo $forma_pagamento;?>"/> <br>
                    Parcelamento: <br> <input type="text" name="parcelamento" placeholder="parcelamento" value="<?php echo $parcelamento;?>" /> <br>
            
            </div>
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