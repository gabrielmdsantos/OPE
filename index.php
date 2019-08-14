<html>
<html lang="pt-BR" dir="ltr">
	<head>
		<link rel="stylesheet" href="css/estilo.css">
		<meta charset="utf-8">
		<title>Tela de Login</title>
	</head>
	<body>
		<div class="login">
			<img src="css/img/user.png" class="usuario" width="100" height="100" alt="">
			<h1>Login</h1>
			<form method="POST" action="processa.php">
			
				<p>Usuários</p>
				<input type="text" name="login" placeholder="Usuário">
				<p>Senha</p>
				<input type="password" name="senha" placeholder="Senha">
				<input type="submit" name="" value="Iniciar sessão">
				<a href="redefinir_senha.html">Esqueceu a senha?</a><br>
				<a href="criar_conta.html">Criar conta</a><br>
				
			</form>
	</body>
</html>