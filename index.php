<?php require_once 'cabecalho.php';?>
<form action="index.php" method="POST">
	<h1>Login</h1>
	<p>Usuário:<input type="text" name="usuario"
		size="25" maxlength="25"
		pattern="[a-zA-Z@_-0-9]{4,25}"
		placeholder="usuário"
		title="mínimo 4, máximo 5 caractéres
		letras maiúsculas,minúsculas, números,
		@,_,- permitidos" required></p>
	<p>Senha:<input type="password" name="senha"
	size="10" maxlength="10" placeholder="senha"
	pattern="[a-zA-Z0-9@_-]{4,10}" required></p>	
	<p><input type="submit" name="botao" 
		value="Login"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Funcionario.php';
		require_once 'persistence/FuncionarioPA.php';
		$funcionario=new Funcionario();
		$funcionariopa=new FuncionarioPA();
		$funcionario->setUsuario($_POST['usuario']);
		$funcionario->setSenha($_POST['senha']);
		if($funcionariopa->logar($funcionario)){
			$codigo=$funcionariopa->converte('usuario',
				$funcionario->getUsuario());
			$funcionario->logar($codigo);
			echo "<h2>Bem-Vindo, ".$funcionario->getUsuario().
			"!</h2>";
			//echo "<a class='entrar' href='principal.php'>Entrar</a>";
			echo "<meta http-equiv='refresh' content='2;principal.php'>";
		}else{
			echo "<h2>Usuário ou senha incorretos!</h2>";
		}
	}	

?>
</body>
</html>