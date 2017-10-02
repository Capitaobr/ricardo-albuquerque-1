<?php

require_once("validation/userValidator.php");
require_once ("exception/requestException.php");

class User {
	
	private $name;
	private $email;
	private $password;
	private $cpf;
	private $cep;
	private $uv;

	public function __construct($name, $email, $pass, $cpf, $cep) {
	 	$this->uv = new UserValidator();
	 	$this->name = $name;
		$this->setEmail($email);
		$this->password = $pass;
		$this->setCpf($cpf);
		$this->setCep($cep);		
	}

	public function setEmail($email) {
		if(!$this->uv->isValidEmail($email)){
			throw new RequestException(400, "Invalid email format");
		}	
		$this->email = $email;
	}

	public function setCpf($cpf) {
		if(!$this->uv->isValidCpf($cpf)){
			throw new RequestException(400, "Invalid cpf.");
		}	
		$this->cpf = $cpf;
	}

	public function setCep($cep) {
		if(!$this->uv->isValidCep($cep)){
			throw new RequestException(400, "Invalid CEP");
		}	
		$this->cep = $cep;
	}


}
