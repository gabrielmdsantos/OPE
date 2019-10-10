<?php
include('conecta.php');
require_once 'classes/funcoes.class.php';
require_once 'classes/contrato.class.php';
require_once 'classes/receita.class.php';
// require_once 'classes/funcoes.class.php';

// $objFc = new Funcoes();
$objct = new Contrato();
$objrc = new Receita();
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
        $rec = $objrc->querySelectreceita($cli);
        $des = $objrc->querySelectdespesa($cli);
        array_map (function($rec,$des){
            require_once 'classes/funcoes.class.php';
            $objFc = new Funcoes();
            echo "
            <tr>
                <td>"; echo ($objFc->tratarCaracter($rec['ID_CONTRATO'],2)); echo"</td>
                <td>"; echo ($objFc->tratarCaracter($rec['NOME_CLI'],2)); echo"</td>
                <td>"; echo ($objFc->tratarCaracter($rec['receita'],2)); echo"</td>
                <td>"; echo ($objFc->tratarCaracter($rec['NOME_CLI'],2)); echo"</td>
                <td><div class='editar'><a href='edita_contrato.php?acao=edit&func=";echo ($rec['ID_CONTRATO']);"' title='Editar dados'> <img src='img/ico-editar.png' width='16' height='16' alt='Editar'> </a></div>  </td>
            </tr>
            ";
        }, $rec,$des);
    }
        echo "
        </tbody>
    </table>
";

?>