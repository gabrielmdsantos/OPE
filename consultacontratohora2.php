<?php
    require_once 'classes/funcoes.class.php';
    require_once 'classes/contrato.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Contrato();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> Teste</title>
    <link rel="stylesheet" type="text/css" href="style/style2.css">
    <link rel="stylesheet" type="text/css" href="style/style5.css">
    <script src="Script/jquery-2.1.4.min.js"></script>
    <script src="Script/javascriptcontrato.js"></script>

</head>

<!--Menu-->

<body>
    <?php include_once("header2.php"); ?>

    <div id="resultado" class="scroll-contrato">
        <table border="1">
            <thead>
                <tr>
                    
                    <th>C.C</th>
                    <th>CLIENTE</th>
                    <th>SERVIÇO</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($objfn->querySelectcli() as $rst){ ?>
                <tr>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CC'], 1)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['CLI'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['Serv'], 2)) ?> </td>
                    <td> <?php echo ($objFc->tratarCaracter($rst['DETALHES'], 2)) ?> </td>
                </tr>
                <?php } ?>

        </table>
    </div>
    <!--Campos de busca-->
    <form action="processacontrato.php">  
        <div class="search2">
        
        <input type="text" name="campo"  id="campo" placeholder="Nome do Cliente" >
        </div>
    </form>
    
    <!--Botão-->
    <!-- <div class="btn1"><a href="cadastrarcontrato.php">CADASTRAR HORA</a></div> -->

    <input type="submit" class="btn-cad" value="Registrar Hora" />
    <input type="button" value="Relatorio de Horas" />

            </fieldset>
            <div id="modal-User" class="modal-container">
                <div class="modal">
                    <button class="fechar"><a href="">x  </a></button>
                    <h3 class="subtitulo">Registro de Horas Trabalhada</h3>
                    <form>
                        <p>Data: <input type="date" class="inputCfun" /></p>
                        <p>Hora Inicial: <input type="time" class="inputCfun" /></p>
                        <p>Hora Final: <input type="time" class="inputCfun" /></p>
                        <p>Cliente: <input type="text" class="inputCfun" placeholder="João" /></p>
                        <p><input type="submit" class="btncad2" value="Enviar" /></p>
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

                const logo = document.querySelector('.btn-cad');
                logo.addEventListener('click', () => iniciaModal('modal-User'));

                document.addEventListener('scroll', () => {
                    if (window.pageYOffset > 0) {
                        iniciaModal('modal-User')
                    }
                })
            </script>

</body>

</html>