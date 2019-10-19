<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/contrato.class.php';
    require_once 'classes/hora.class.php';

    $objFc = new Funcoes();
    $objct = new Contrato();
    $objhr = new Hora();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style4.css">
    <script src="Script/jquery-2.1.4.min.js"></script>
    <script src="Script/javascriptcontrato.js"></script>
</head>
<?php
    if(isset($_POST['insert'])){
        if($objhr->queryInsert($_POST) == 'ok' ){
            echo '<script type="text/javascript">alert("Cadastrado com sucesso");</script>';
            echo "<script>window.location = 'consultacontratohora2.php';</script>";
            //  header("location: consultacontratohora2.php");
        }
    }else{
        echo '<script type="text/javascript"> Alert("Erro ao inserir")</script>';
    }

?>
<!--Menu-->
<?php include_once("header2.php"); ?>


<body>
    <div id="resultado" class="scroll-horas2">
        <table id="tab18" border="1">
            <thead>
                <tr>
                    <th>C.C</th>
                    <th>CLIENTE</th>
                    <th>SERVIÇO</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($objct->querySelectcli() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CC'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CLI'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['Serv'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['DETALHES'], 2)) ?> </td>
                </tr>
                <?php } ?>

        </table>
    </div>

    
    <!--Botão-->

    <input type="submit" class="btnfunc" value="Registrar Hora" />
 
   

            </fieldset>
            <div id="modal-User" class="modal-container">
                <div class="modal">
                    <button class="fechar"><a href="">x  </a></button>
                    <h3 class="subtitulo">Registro de Horas Trabalhada</h3>
                   
                    <form action="consultacontratohora.php" method="post" >
                        <p>Projeto: <select name="id_cont">
                                    <?php foreach($objct->querySelectcli() as $rst){ ?>
                                    <option value="<?php echo ($objFc->tratarCaracter($rst['CC'], 2)) ?>">
                                    <?php echo ($objFc->tratarCaracter($rst['CC'], 2)) ?>
                                    </option>
                                    <?php } ?>
                                </select>
                        <input type="hidden" name="id_func"  value=" <?php echo($_SESSION['ID_FUNCIONARIO']) ?>" />  
                        <p>Data: <input type="date" name="data" class="inputCfun" /></p>
                        <p>Hora Inicial: <input type="time" name="hora1" class="inputCfun" /></p>
                        <p>Hora Final: <input type="time"  name="hora2" class="inputCfun" /></p>
                        
                        <p><input type="submit" class="btnfunc2" name="insert" value="Enviar" /></p>
                    </form>
                </div>
            </div>

            <script>
                function iniciaModal(modalID) {
                    if (localStorage.fechaModal !== modalID) {
                        const modal = document.getElementById(modalID);
                        if (modal) {
                            modal.classList.add('mostrar');
                            modal.addEventListener('click', (e) => {
                            });
                        }
                    }
                }

                const logo = document.querySelector('.btnfunc');
                logo.addEventListener('click', () => iniciaModal('modal-User'));

                document.addEventListener('scroll', () => {
                    if (window.pageYOffset > 0) {
                        iniciaModal('modal-User')
                    }
                })
            </script>

</body>

</html>