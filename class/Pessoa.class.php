<?php
require_once('PDO.class.php');
class Pessoa{

	private $nome;
	private $email;
	private $matricula;

	function setNome($nome){
		$this->nome=$nome;
	}

	function getNome(){
		return $this->nome;
	}

	function setEmail($email){
		$this->email=$email;
	}

	function getEmail(){
		return $this->email;
	}

	function setMatricula($matricula){
		$this->matricula=$matricula;
	}

	function getMatricula(){
		return $this->matricula;
	}
}