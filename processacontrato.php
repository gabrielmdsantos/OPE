<?php
include('conecta.php');

$campo="%".$_POST['campo']."%";

$sql=$mysqli->prepare("SELECT contrato.ID AS CC, cliente.nome AS CLI, servico.servico AS Serv, contrato.Detalhes AS DETALHES,contrato.Valor AS VALOR ,contrato.qnt_parcela AS QNT_PARC ,contrato.VENCIMENTO AS VENC from cliente INNER JOIN contrato ON cliente.id = contrato.ID_Cliente INNER JOIN servico ON contrato.ID_Servico = servico.id WHERE  cliente.nome LIKE '$campo'");
//$sql->bind_param("s",$campo);
$sql->execute();
$sql->bind_result($cc,$cli,$serv,$detalhes,$valor,$qnt,$par);

echo "
    <table border='1'>
    <thead>
    <tr>
        
        <th>C.C</th>
        <th>CLIENTE</th>
        <th>SERVIÇO</th>
        <th>Detalhes</th>
        <th>VALOR</th>
        <th>QUANTIDADE DE VEZES</th>
        <th>PRÓXIMA PARCELA</th>
    </tr>
</thead>

        <tbody>
        ";

        while($sql->fetch()){

        echo "
        <tr>
            <td>$cc</td>
            <td>$cli</td>
            <td>$serv</td>
            <td>$detalhes</td>
            <td>$valor</td>
            <td>$qnt</td>
            <td>$par</td>
        </tr>
        ";
        }

        echo "
        </tbody>
    </table>
";

?>