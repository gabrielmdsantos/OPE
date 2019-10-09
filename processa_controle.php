<?php
include('conecta.php');
require_once 'classes/funcoes.class.php';
$objFc = new funcoes();
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
    <th>Total de Receita</th>
    <th> Total de despesas  </th>
    <th> Lançamentos </th>
    </tr>
</thead>

        <tbody>
        ";

        while($sql->fetch()){
        echo "
        <tr>
            <td>"; echo ($objFc->tratarCaracter($cc,2)); echo"</td>
            <td>"; echo ($objFc->tratarCaracter($cli,2)); echo"</td>
            <td>"; echo ($objFc->tratarCaracter($serv,2)); echo"</td>
            <td>"; echo ($objFc->tratarCaracter($detalhes,2)); echo"</td>
            <td><div class='editar'><a href='edita_contrato.php?acao=edit&func=$cc' title='Editar dados'> <img src='img/ico-editar.png' width='16' height='16' alt='Editar'> </a></div>  </td>
        </tr>
        ";
        }

        echo "
        </tbody>
    </table>
";

?>