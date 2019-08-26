<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" href="css/estilo_home.css">
    
</head>
<body>
<nav id="menu">
    <?php require_once("header.php");
    include_once("conexao.php");  

    $sql = "SELECT * FROM `parceiro`";
    $resultadoser = mysqli_query($conect,$sql);
    
  

    ?>
    <table border="1">
    <tr>
      <td>ID</td>
      <td>nome</td>
    </tr>
    
    <?php while($row = mysqli_fetch_assoc($resultadoser)){ ?>
      <tr>
    <td><?php echo $row['id']; ?></td> 
    <td><?php echo $row['nome'];?></td>
    <?php } ?>
      
    </tr>
    </table>
</nav>

</body>
    
</html>