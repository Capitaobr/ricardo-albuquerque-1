<?php


include_once "IrequestValidator.php";

class RequestValidator implements IRequestValidator
{
	
	private $allowedMethods = Array('GET', 'PUT', 'POST');


	private $allowedUris = array('user/signUp', 'user/signIn', 'user/delete', 'user/update', 
		'user/search','admin/signUp', 'admin/signIn', 'admin/delete', 'admin/update', 
		'advert/add', 'advert/addImage', 'advert/update','advert/updateImage', 'advert/delete', 
		'advert/search');



	public function isMethodValid($method) {
		
		if(!in_array($method, $this->allowedMethods)) 
			return false;

		return true;		
	}



	public function isProtocolValid($protocol)
	{
		if(strpos($protocol, "HTTP") !== false || strpos($protocol, "HTTPS") !== false){
			return true;
		} else {
			return false;

		}
	}


	public function isValidUri($uri) {
		$arrayUri = explode('/', $uri);

		//verificar se arrayUri[2] é chave
		if(!in_array($arrayUri[2], $this->allowedUris[$arrayUri[1]]))
			return false;
		
		return true;
	}
	public function isQueryStringValid($queryString){
		if ($queryString != ""){
			$queryString = explode('&', $queryString);
			$validParameters = array("CPF", "COD", "Name");
			for ($i = 0; $i < count($queryString); $i++){
				$queryString[$i] = strtok($queryString[$i], '=');
				if (in_array($queryString[$i], $validParameters)){
					return true;
				}
			}
		}
		return false;


	}
}



