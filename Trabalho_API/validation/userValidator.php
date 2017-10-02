<?php

include_once "IuserValidator.php";

class UserValidator implements IUserValidator {

	public function isValidEmail($email) {
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			return false;
		return true;
	}

	public function isValidCpf($cpf){
		if(!empty($cpf))
			return true;
		return false;

	}

	public function isValidCep($cep){
		if(!empty($cep))
			return true;
		return false;

	}


}
