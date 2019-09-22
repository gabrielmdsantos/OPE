<!DOCTYPE html>


<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="Style/style2.css">
</head>

<!--Menu-->

<body>
    <nav>
        <div >
        <?php include_once('header.php'); ?>
        </div>
    </nav>
    <!--consulta cliente-->
    </div>

    <div class="scroll">
        <table border="1">
            <thead>
                <tr>
                    <th>C.C</th>
                    <th>Nome do cliente</th>
                    <th>Parceiros</th>
                </tr>
            </thead>
            <tbody>

        </table>
    </div>
    <!--Campos de busca-->
    <form>
        <div class="search3">
            <input type="number" id="tCCusto" maxlength="5" placeholder="C.C" />
        </div>
        <div class="search4">
            <input type="text" id="tCliente" maxlength="20" placeholder="CLIENTE" />
        </div>
        <select id="appearance-select">
            <option selected>PARCEIRO</option>
            <option></option>
        </select>

        <!--Botão-->
        <button class="btnnn" type="button" name="tbtn"><a href="ins_cliente.php">CADASTRAR CLIENTE</a></button>
        <button class="btnnn" type="button" name="tbtn"><a href="editarcliente.html">EDITAR CADASTRO</a></button>
    </form>
</body>

</html>

