<?php
/**
* Sistema de segurança com acesso restrito
*
* Usado para restringir o acesso de certas páginas do seu site
*
*
* @version 1.0
* @package SistemaSeguranca
*/
//  Configurações do Script
// ==============================
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "teste2";
    
    $conn = new mysqli ($servername, $username, $password, $dbname);
    
if ($conn->connect_error){
        die("Connection falied: " .$conn->connect_error);
    }
  session_start();
/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($usuario, $senha) {
  global $_SG;
  $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
  // Usa a função addslashes para escapar as aspas
  $nusuario = addslashes($usuario);
  $nsenha = addslashes($senha);
  // Monta uma consulta SQL (query) para procurar um usuário
  $sql = "SELECT `ID_FUNCIONARIO`, `SENHA` FROM `login` WHERE `ID_FUNCIONARIO` = '".$nusuario."' AND `senha` = '".$nsenha."' LIMIT 1 ";

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "TESTE2";

//criar conexao
$conn2 = mysqli_connect($servidor,$usuario,$senha,$dbname);
  $query = mysqli_query($conn2,$sql);
  $resultado = mysqli_fetch_assoc($query);
  // Verifica se encontrou algum registro
  if (empty($resultado)) {
    // Nenhum registro foi encontrado => o usuário é inválido
    return false;
  } else {
    // Definimos dois valores na sessão com os dados do usuário
    $_SESSION['ID_FUNCIONARIO'] = $resultado['ID_FUNCIONARIO']; // Pega o valor da coluna 'id do registro encontrado no MySQL
    $_SESSION['SENHA'] = $resultado['SENHA'];
    // Verifica a opção se sempre validar o login
    if ($_SG['validaSempre'] == true) {
      // Definimos dois valores na sessão com os dados do login
      $_SESSION['ID_FUNCIONARIO'] = $usuario;
      $_SESSION['SENHA'] = $senha;
    }
    return true;
  }
}
/**
* Função que protege uma página
*/
function protegePagina() {
  global $_SG;
  if (!isset($_SESSION['ID_FUNCIONARIO']) OR !isset($_SESSION['SENHA'])) {
    // Não há usuário logado, manda pra página de login
    expulsaVisitante();
  } else if (!isset($_SESSION['ID_FUNCIONARIO']) OR !isset($_SESSION['SENHA'])) {
    // Há usuário logado, verifica se precisa validar o login novamente
    if ($_SG['validaSempre'] == true) {
      // Verifica se os dados salvos na sessão batem com os dados do banco de dados
      if (!validaUsuario($_SESSION['ID_FUNCIONARIO'], $_SESSION['SENHA'])) {
        // Os dados não batem, manda pra tela de login
        header("Location: ../home.php");
      }
    }
  }
}
/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
  global $_SG;
  // Remove as variáveis da sessão (caso elas existam)
  unset($_SESSION['ID_FUNCIONARIO'], $_SESSION['SENHA']);
  // Manda pra tela de login
  header("Location: index.php");
}