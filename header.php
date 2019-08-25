<?php
include_once 'seguranca.php';
protegePagina(); 

?>
<nav id="menu">
    <ul>
		<li><a href="home.php">Menu</a></li>
        <li><a>Serviços</a>
            <ul>
                <li><a href="inserir_servicos.php">Inserir Novo Projeto</a></li>
                <li><a href="pesquisa_projeto.php">Pesquisar Projetos</a></li>
            </ul>
        </li>
        <li><a>Parceiros</a>
            <ul>
                <li><a href="inserir_parceiros.php">Inserir Parceiros</a></li>
                <li><a href="pesquisa_parceiros.php">Pesquisar Parceiros</a></li>
            </ul>
        </li>
        <li><a>Cliente</a>
            <ul>
                <li><a href="cadastro_cliente.php">Cadastrar Cliente</a></li>
                <li><a href="pesquisa_projeto_cliente.php">Projetos dos Clientes</a></li>
            </ul>
        </li>
        <li><a>Administrativo</a>
            <ul>
                <li><a href="cadastro_funcionario.php">Cadastro Funcionario</a></li>
                <li><a href="redefinir_senha.php">Redefinir Senha</a></li>
                <li><a href="cadastro_servico.php">Cadastrar Serviço</a></li>
                <li><a href="excluir_servico.php">Excluir Serviço</a></li>
            </ul>
        </li>
        <li><a>Financeiro</a>
            <ul>
                <li><a href="inserir_gastos.php">Inserir Gastos</a></li>
            </ul>
        </li>
        <a>

            <form action="" method="post">
            <?php
            if(isset($_POST["sair"])){
                expulsaVisitante();
                }
            ?>
             <input type="submit" name="sair" placeholder="Sair" value="Sair" />
             <?php echo  'Olá '. $_SESSION['usuarioNome']?>
            </form>
            </a>
        
      
         

    </ul>
</nav>
