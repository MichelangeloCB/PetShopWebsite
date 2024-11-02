<?php

class Funcionario{

	private $cod_fun;
	private $nome;
	private $cpf;
	private $endereco;
	private $bairro;
	private $cidade;
	private $estado;
	private $telefone;
	private $email;
	private $usuario;
	private $senha;

	public function setCod_fun($cod_fun)
	{
		$this->cod_fun=$cod_fun;
	}

	public function getCod_fun()
	{
		return $this->cod_fun;
	}

	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setCpf($cpf)
	{
		$this->cpf=$cpf;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setEndereco($endereco)
	{
		$this->endereco=$endereco;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function setBairro($bairro)
	{
		$this->bairro=$bairro;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function setCidade($cidade)
	{
		$this->cidade=$cidade;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setEstado($estado)
	{
		$this->estado=$estado;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setTelefone($telefone)
	{
		$this->telefone=$telefone;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setEmail($email)
	{
		$this->email=$email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setData_nasci($data_nasci)
	{
		$this->data_nasci=$data_nasci;
	}

	public function getData_nasci()
	{
		return $this->data_nasci;
	}

	public function setUsuario($usuario)
	{
		$this->usuario=$usuario;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setSenha($senha)
	{
		$this->senha=md5($senha);
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function logar($cod_fun)
	{
		setcookie("funcionario",$cod_fun);
	}

	public function logoff()
	{
		setcookie("funcionario","");
	}

}

?>