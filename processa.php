<?php
include('conecta.php');

require_once 'classes/funcoes.class.php';
require_once 'classes/cliente.class.php';
require_once 'classes/parceiro.class.php';

$objFc = new Funcoes();
$objfn = new Cliente();
$objpc = new Parceiro();


$campo="%".$_POST['campo']."%";


$sql=$mysqli->prepare("SELECT cliente.id AS id_cli, cliente.nome AS nome_cli, parceiro.nome as nome_parceiro from cliente INNER JOIN parceiro ON parceiro.id_parc = cliente.id_parc WHERE  cliente.nome LIKE '$campo' ");
//$sql->bind_param("s",$campo);
$sql->execute();
$sql->bind_result($id,$produto,$valor);

echo "
    <table border='1'>
        <thead>
        <tr>
        <td>C.C</td>
        <td>Nome do cliente</td>
        <td>Parceiros</td>
        <td> Editar </td>
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
            <td><div class='editar'><a href='edita_cliente.php?acao=edit&func=$id' title='Editar dados'> <img src='img/ico-editar.png' width='16' height='16' alt='Editar'> </a></div>  </td>
        </tr>
        ";
        }

        echo "
        </tbody>
    </table>
";

?>