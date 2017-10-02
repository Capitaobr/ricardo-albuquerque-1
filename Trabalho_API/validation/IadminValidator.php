<?php

interface IAdminValidator {
	
  public function isValidEmail($email);
	
  public function isValidCpf($cpf);
	
  public function isValidCep($cep);

}
