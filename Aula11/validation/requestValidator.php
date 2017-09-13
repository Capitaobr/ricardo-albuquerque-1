<?php


include_once "IrequestValidator.php";

class RequestValidator implements IRequestValidator
{
	private $resources = array('user/signUp', 'user/signIn', 'user/delete', 'user/update', 
		'user/search','admin/signUp', 'admin/signIn', 'admin/delete', 'admin/update', 
		'advert/add', 'advert/addImage', 'advert/update','advert/updateImage', 'advert/delete', 
		'advert/search');



	public function isMethodValid($method) {
		if($method != 'GET' && $method != 'POST' && $method != 'PUT') {
			return false;
		}
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
		$path = explode('/', $uri);
		if(isset($path[2]) == true && isset($path[3]) == true){
			if(in_array($path[2] . '/' . $path[3], $this->resources)){
				return true;
			} else {
				return false;
			}
		}
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



