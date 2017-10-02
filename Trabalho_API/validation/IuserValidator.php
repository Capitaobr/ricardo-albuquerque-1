<?php

interface IUserValidator {


	public function isValidEmail($email);

	public function isValidCpf($cpf);

	public function isValidCep($cep);

}