<?php

require_once ("model/request.php");
require_once ("validation/requestValidator.php");
require_once ("controller/userController.php");
require_once ("controller/goodsController.php");
require_once ("controller/adminController.php");

class RequestTreater {

	private $controllers = Array(
								"users" => "UserController",
								"admin" => "AdminController",
								"goods" => "GoodsController"
								);

	public function start() {
		try{
	
		$request = new Request($_SERVER['REQUEST_METHOD'],
						   $_SERVER['SERVER_PROTOCOL'], 
						   $_SERVER['HTTP_HOST'], 
						   $_SERVER['REQUEST_URI'], 
						   $_SERVER['QUERY_STRING'],
						   file_get_contents('php://input'));
		
		$controller = new $this->controllers[$request->getResource()]($request);

		return $controller->routeOperation();

		}catch(RequestException $re) {
			return $re->toJson();
		}

	
	}
}















