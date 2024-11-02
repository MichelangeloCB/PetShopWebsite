<?php
require_once 'cabecalho.php';
require_once 'model/Tempo.php';
$tempo=new Tempo();
?>
<form action="cadastrarcliente.php" method="POST">
	<h1>Cadastro de Clientes</h1>
	<p>Nome:<input type="text" name="nome"
		size="40" maxlength="40"
		pattern="[a-zA-Z\sçÇãÃéÉôÔ]{2,40}"
		required></p>
	<p>Endereço:<input type="text" name="endereco"
		size="50" maxlength="50"
		pattern="[a-zA-Z0-9\sçÇãÃéÉôÔ,]{3,50}"
		required></p>
	<p>Bairro:<input type="text" name="bairro"
		size="20" maxlength="20"
		pattern="[a-zA-Z\sçÇãÃéÉôÔ]{3,20}"
		required></p>
	<p>Cidade:<input type="text" name="cidade"
		size="30" maxlength="30"
		pattern="[a-zA-Z\sçÇãÃéÉôÔ]{3,30}"
		required></p>
	<p>Estado:
		<select name="estado">
			<option value="AC">AC</option>
			<option value="AL">AL</option>
			<option value="AP">AP</option>
			<option value="AM">AM</option>
			<option value="BA">BA</option>
			<option value="CE">CE</option>
			<option value="DF">DF</option>
			<option value="ES">ES</option>
			<option value="GO">GO</option>
			<option value="MA">MA</option>
			<option value="MT">MT</option>
			<option value="MS">MS</option>
			<option value="MG">MG</option>
			<option value="PA">PA</option>
			<option value="PB">PB</option>
			<option value="PR">PR</option>
			<option value="PE">PE</option>
			<option value="PI">PI</option>
			<option value="RJ">RJ</option>
			<option value="RN">RN</option>
			<option value="RS">RS</option>
			<option value="RO">RO</option>
			<option value="RR">RR</option>
			<option value="SC">SC</option>
			<option value="SP">SP</option>
			<option value="SE">SE</option>
			<option value="TO">TO</option>
		</select>
	</p>
	<p>Cpf:<input type="number" name="cpf"
		min="1" required></p>
	<p>Telefone:<input type="text" name="telefone"
		size="14" maxlength="14" 
		pattern="\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}"
		placeholder="(42)99999-9999"
		required></p> 
	<p>Email:<input type="email" name="email"
		size="40" maxlength="40" required></p>
	<p>Nascimento:<input type="date" 
		name="data_nasci"
		min="<?= $tempo->minimo() ?>"
		max="<?= $tempo->maximo() ?>"
		required></p>
	<p><input type="submit" name="botao"
		value="Cadastrar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Cliente.php';
		require_once 'persistence/ClientePA.php';
		$cliente=new Cliente();
		$clientepa=new ClientePA();
		$cliente->setNome($_POST['nome']);
		$cliente->setEndereco($_POST['endereco']);
		$cliente->setBairro($_POST['bairro']);
		$cliente->setCidade($_POST['cidade']);
		$cliente->setEstado($_POST['estado']);
		$cliente->setCpf($_POST['cpf']);
		$cliente->setTelefone($_POST['telefone']);
		$cliente->setEmail($_POST['email']);
		$cliente->setData_nasci($_POST['data_nasci']);
		if($clientepa->validarCpf($cliente->getCpf())){
			echo "<h2>CPF inválido! Tente 
			digitar novamente!</h2>";
		}else{
			$cliente->setCod_cli(
				$clientepa->retornaUltimo()+1);
			if($clientepa->cadastrar($cliente)){
				echo "<h2>Cliente cadastrado com
				sucesso!</h2>";
			}else{
				echo "<h2>Erro na tentativa de cadastro! 
				Tente novamente!</h2>";
			}
		}
	}

?>
</body>
</html>