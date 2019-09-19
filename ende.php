<!--
    <?php
        $enderecobb = '';
?>
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
</head>
<body>

<!-- queryEndereco2 -->

<fieldset id="endereco" style="position:relative;height:130px; border-radius:20px 20px 20px 20px">
                    <legend>Endereço 2 </legend>
                        <input type="hidden" value="<?php $enderecobb=''; ?>" />
                            CEP:        <input type="number" name="cepb"       value=""   id="cCP" size="8" maxlength="8" placeholder="00000-000" />&nbsp;&nbsp;
                            Logradouro: <input type="text" name="logradourob"  value=""   id="cEnd" size="30" maxlength="30" placeholder="R:, Av:, Est:..." />&nbsp;&nbsp;
                            Número:     <input type="number" name="numerob"    value=""   min="0" max="99999" placeholder="" />&nbsp;&nbsp;
                            Complemento:<input type="text" name="complementob" value=""  size="30" maxlength="30" placeholder="Apto, Sala, ... " />&nbsp;&nbsp;
                        <p>
                            Município: <input type="text"  name="municipiob"   value=""  size="30"  placeholder="Cidade" />
                            Estado:    <input type="text"  name="estadob"      value=""  size="30" placeholder="Estado" />
                            <!--
                            <select name="estado" value="<?php echo $estado ?>" id="cUF">
                                        <option selected>UF</option>
                                        <option>Acre</option>
                                        <option>Alagoas</option>
                                        <option>Amazonas</option>
                                        <option>Amapá</option>
                                        <option>Bahia</option>
                                        <option>Ceará</option>
                                        <option>Distrito Federal</option>
                                        <option>Espírito Santo</option>
                                        <option>Goiás</option>
                                        <option>Maranhão</option>
                                        <option>Mato Grosso</option>
                                        <option>Mato Grosso do Sul</option>
                                        <option>Minas Gerais</option>
                                        <option>Pará</option>
                                        <option>Paraíba</option>
                                        <option>Paraná</option>
                                        <option>Pernambuco</option>
                                        <option>Piauí</option>
                                        <option>Rio de Janeiro</option>
                                        <option>Rio Grande do Norte</option>
                                        <option>Rio Grande do Sul</option>
                                        <option>Rondônia</option>
                                        <option>Roraima</option>
                                        <option>Santa Catarina</option>
                                        <option>São Paulo</option>
                                        <option>Sergipe</option>
                                        <option>Tocantins</option> 
                                    </select> -->
                    
                    
                    
                </fieldset>


</body>
</html>