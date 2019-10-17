<?php
include('conecta.php');
require_once 'classes/funcoes.class.php';
require_once 'classes/contrato.class.php';
require_once 'classes/receita.class.php';
// require_once 'classes/funcoes.class.php';


$objct = new Contrato();
$objrc = new Receita();
$objFc = new funcoes();

$campo=$_POST['campo'];


//$sql=$mysqli->prepare("SELECT contrato.ID AS CC, cliente.nome AS CLI, servico.servico AS Serv, contrato.Detalhes AS DETALHES,contrato.Valor AS VALOR ,contrato.qnt_parcela AS QNT_PARC ,contrato.VENCIMENTO AS VENC from cliente INNER JOIN contrato ON cliente.id = contrato.ID_Cliente INNER JOIN servico ON contrato.ID_Servico = servico.id WHERE  contrato.id LIKE '%$campo%'");
//$sql->bind_param("s",$campo);/
//$sql->execute();
//$sql->bind_result($cc,$cli,$serv,$detalhes,$valor,$qnt,$par);

echo "
    <table id='tab3' border='1'>
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

       // while($sql->fetch()){
        //$rec=$mysqli->prepare("SELECT contrato.ID AS ID_CONTRATO, cliente.id AS ID_CLI, cliente.nome AS NOME_CLI, SUM(receita_proj.VALOR) AS receita FROM receita_proj INNER JOIN contrato ON contrato.ID = receita_proj.ID_CONT INNER JOIN cliente ON cliente.id = receita_proj.id_cli WHERE contrato.ID LIKE $campo GROUP BY receita_proj.ID_CONT");
       // $des = $mysqli->prepare("");
       // $rec->execute();
        $rec = $objrc->querySelectreceita2($campo);
        $des = $objrc->querySelectdespesa2($campo);
        array_map (function($rec,$des){
            require_once 'classes/funcoes.class.php';
            $objFc = new Funcoes();
            echo "
            <tr>
                <td>"; echo ($objFc->tratarCaracter($rec['ID_CONTRATO'],2)); echo"</td>
                <td>"; echo ($objFc->tratarCaracter($rec['NOME_CLI'],2)); echo"</td>
                <td>"; echo ($objFc->tratarCaracter($rec['receita'],2)); echo"</td>
                <td>"; echo ($objFc->tratarCaracter($des['DESPESA'],2)); echo"</td>
                <td><div class='editar'><a href='lancamentos.php?acao=edit&func=";echo ($rec['ID_CONTRATO']); echo"' title='Editar dados'> <img src='img/ico-editar.png' width='16' height='16' alt='Editar'> </a></div>  </td>
            </tr>
            ";
        }, $rec,$des);
    
        echo "
        </tbody>
    </table>
";

?>