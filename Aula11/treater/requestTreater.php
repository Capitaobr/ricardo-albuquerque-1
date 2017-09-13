<?php

require_once ("model/request.php");
require_once ("validation/requestValidator.php");

class RequestTreater {


	public function start() {
		
		$valid = new RequestValidator();
		$valid->isMethodValid($_SERVER['REQUEST_METHOD']);
		$valid->isProtocolValid($_SERVER['SERVER_PROTOCOL']);
		$valid->isValidUri($_SERVER['REQUEST_URI']);
		$valid->isQueryStringValid($_SERVER['QUERY_STRING']);
		$entityBody = file_get_contents('php://input');
		$request = new Request($_SERVER['REQUEST_METHOD'],$_SERVER['SERVER_PROTOCOL'], $_SERVER['HTTP_HOST'], explode('/', $_SERVER['REQUEST_URI']), $_SERVER['QUERY_STRING'], $entityBody);
		if($request->getMethod() == 'POST' && $request->getPath()[2] == 'user') {
			
			return $valid;
 		//return $request->getBody();
		//(new UserController())->create();
			

		}
		$conn->abriconecao();

	}

}