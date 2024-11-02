<?php
require_once 'cabecalho.php';
require_once 'persistence/PetPA.php';
$petpa=new PetPA();
$consulta=$petpa->retornarPetPorCliente(
	$_POST['cod_cli']);
if(!$consulta){
	echo "<h2>Este cliente não tem PETs 
	cadastrados!</h2>";
}else{
	require_once 'persistence/ClientePA.php';
	$clientepa=new ClientePA();
?>
<form action="cadastrarservico3.php" method="POST">
	<h1>Cadastrar Serviço</h1>
	<p>De qual dos pets do 
		<?= $clientepa->converteCodNome(
			$_POST['cod_cli']) ?> ?</p>
	<p><select name="cod_pet">
<?php
	while($linha=$consulta->fetch_assoc()){
		echo "<option value='".
		$linha['cod_pet']."'>".$linha['nome'].
		"</option>";
	}
?>	
	</select></p>
	<p><input type="submit" name="botao"
		value="Escolher"></p>
</form>
<?php
}
?>
</body>
</html>