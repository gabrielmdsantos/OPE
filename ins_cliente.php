<script>
var data = {
"Fisica":["1"],
"Juridica":["2"]
};
var data2 = {
    "N":["1"],
    "S":["2"]
};

</script>

<?php

    function getPosts()
    {
        $posts = array();
    
        $posts [2] = $_POST ['endereco'];
        return $posts;
     }
     if (isset($_POST['insert'])){
         $data = getPosts();
     }

    require_once 'classes/funcoes.class.php';
    require_once 'classes/cliente.class.php';
    
    $objFc = new Funcoes();
    $objfn = new Cliente();
    $endereco = "N";

    if(isset($_POST['insert'])){
        if($objfn->queryInsert($_POST) == 'ok' ){
            if($objfn->queryInsertmail($_POST) == 'ok'){
                if($objfn->queryInserttel($_POST) == 'ok'){
                    if($objfn->queryEndereco($_POST)== 'ok'){
                        if($endereco == $data[2]){
                            if($objfn->queryEndereco2($_POST)=='ok'){
                                
                            }
                        }
                    }else{}
                }else{}
            }else{}
                echo ('<script type="text/javascript"> alert("Inserido com sucesso")</script>');
                                echo "<script>window.location = 'consultacliente.php';</script>";
            }else{}
    }
        
?>

<!DOCTYPE html>
<html lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<head>
    <meta charset="UTF-8" />
    <script src="script/jquery-2.1.4.min.js"></script>
   <!-- <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>   -->

</head>

<!--Menu-->

<body>
<?php require_once("header.php"); 
?>
        <form action="" method="post">
            <!--Dados do cliente-->
            <fieldset id="cadastro" style="position:relative; left:0px; width:98%; border-radius:20px 20px 20px 20px">
                <legend>Cadastro</legend>
                    <fieldset id="pessoa"  name="pessoa" style="position: relative; height: 55px; float: left; width: 100px; border-radius:20px 20px 20px 20px">
                                    <legend>Pessoa</legend>
                                    <input type="radio" name="pessoa" id="cPF" value="Fisica" CHECKED/><label for="cPF">Física</label><br>
                                    <input type="radio" name="pessoa" id="cPJ" value="Juridica" /><label for="cPJ">Jurídica</label>
                    </fieldset><p>
                    
                    
                     
    <div id="result">  </div>
            </fieldset>
            <br>  
            <!--Dados do endereço-->
    
                <fieldset id="endereco" style="position:relative;height:130px; border-radius:20px 20px 20px 20px">
                    <legend>Endereço 1 </legend>
                            CEP:        <input type="number" name="cep"          id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
                            Logradouro: <input type="text" name="logradouro"     id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
                            Número:     <input type="number" name="numero"      min="0" max="99999" placeholder="" />&nbsp;&nbsp;
                            Complemento:<input type="text" name="complemento"   size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
                        <p>
                            Município: <input type="text"  name="municipio"     size="30"  placeholder="Cidade" />
                            Estado:
                       <!-- <input type="text"  name="estado"        size="30" placeholder="Estado" />
                            -->
                            <select name="estado" value="" id="cUF">
                                        <option selected>UF</option>
                                        <option value = "AC">Acre</option>
                                        <option value = "AL">Alagoas</option>
                                        <option value = "AM">Amazonas</option>
                                        <option value = "AP">Amapá</option>
                                        <option value = "BA">Bahia</option>
                                        <option value = "CE">Ceará</option>
                                        <option value = "DF">Distrito Federal</option>
                                        <option value = "ES">Espírito Santo</option>
                                        <option value = "GO">Goiás</option>
                                        <option value = "MA">Maranhão</option>
                                        <option value = "MT">Mato Grosso</option>
                                        <option value = "MS">Mato Grosso do Sul</option>
                                        <option value = "MG">Minas Gerais</option>
                                        <option value = "PA">Pará</option>
                                        <option value = "PB">Paraíba</option>
                                        <option value = "PR">Paraná</option>
                                        <option value = "PE">Pernambuco</option>
                                        <option value = "PI">Piauí</option>
                                        <option value = "RJ">Rio de Janeiro</option>
                                        <option value = "RN">Rio Grande do Norte</option>
                                        <option value = "RS">Rio Grande do Sul</option>
                                        <option value = "RO">Rondônia</option>
                                        <option value = "RR">Roraima</option>
                                        <option value = "SC">Santa Catarina</option>
                                        <option value = "SP">São Paulo</option>
                                        <option value = "SE">Sergipe</option>
                                        <option value = "TO">Tocantins</option> 
                                    </select> 
                    
                    <fieldset id="endereco"  name="endereco"  style="position: relative; height: 100px; float:right; width:100px; top:-90px; border-radius:20px 20px 20px 20px">
                                    <legend>End. Cobrança.</legend>
                                    <input type="radio" name="endereco" id="e" value="S" CHECKED /><label for="e" >Sim</label><br>
                                    <input type="radio" name="endereco" id="f" value="N"  <?php $enderecobb='' ?>  /><label for="f">Não</label>
                    </fieldset><p>
                    <input type="hidden" name="tipo" value="Residencial"/>
                    
                </fieldset>
            <div id="result2">  </div>                
                
            <fieldset id="contato" style="position:relative; border-radius:20px 20px 20px 20px">
                <legend>Contato</legend>
                        Telefone 1: <input type="number" name="tel1"      min="0" maxlength="10" placeholder="(11)9999-9999" />
                        
                        Telefone 2: <input type="number" name="tel2" id="cTel2" size="10" maxlength="10" placeholder="(11)9999-9999" />
                        Celular: <input type="number" name="tcel" id="cCel" size="11" maxlength="11" placeholder="(11)99999-9999" />
                      <!--  Contato: <input type="contato" name="tContato" id="cContato" size="10" maxlength="10" placeholder="joão@terra.com.br" /> -->
                        E-mail:  <input type="email" name="email" id="cMail" size="30" maxlength="30" placeholder="joão@terra.com.br" />
            </fieldset>
<script>
$(function(){
'use stric';
(update = function(index)
{
var first = $('input[name="pessoa"]:eq(0)').val();
var segund = $('input[name="endereco"]:eq(0)').val();
var array = data[ index||first ];
var array2 = data2 [index||first];
console.log(array);
console.log(array2);
if (array == "1"){
    console.log("Heloo");
    $("#result").load("cli_fisi.php");
}else if(array == "2"){
    $("#result").load("cli_juri.php");
    console.log("hi");
}else if(array2 == "1"){
    $("#result2").load("ende.php");
    console.log("hi");
}else if(array2 =="2"){
    $('#result2').load("ende2.php");
}
else{
}
})();

$('input[name="pessoa"]').change(function()
{
update( $(this).val() );

});
$('input[name="endereco"]').change(function()
{
update( $(this).val() );

});
});
</script>
            <br><p>
                <input type="submit" name="insert" value="Inserir"> 
            
            
</form>
    

</body>

</html> 