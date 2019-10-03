<?php
include('conecta.php');
$campo="%".$_POST['campo']."%";
$sql=$mysqli->prepare("SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc WHERE  cliente.nome LIKE '$campo' ");
//$sql->bind_param("s",$campo);
$sql->execute();
$sql->bind_result($id,$produto,$valor);

echo "
    <table>
        <thead>
        <tr>
            <td>Id</td>
            <td>Produtos</td>
            <td>Valor</td>
        </tr>
        </thead>

        <tbody>
        ";

        while($sql->fetch()){

        echo "
        <tr>
            <td>$id</td>
            <td>$produto</td>
            <td>$valor</td>
        </tr>
        ";
        }

        echo "
        </tbody>
    </table>
";

?>