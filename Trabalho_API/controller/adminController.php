<?php

require_once ("model/admin.php");
require_once ("database/database.php");
require_once ("exception/requestException.php");

class AdminController {
	
  private $allowedOperations = Array('signin', 'signup', 'delete_user', 'goods_list');
	private $request;
	
	public function __construct($request) {
		$this->request = $request;
	}			  
	
  public function routeOperation() {
		$body = json_decode($this->request->getBody(),true);
		switch($this->request->getOperation()) {
			case 'signup':
					return $this->create($body);
			//case 'signin':
			//		if($this->request->getMethod() == "GET")
			//			return $this->search($this->request->getQueryString());
		
			// case 'delete_user' :
				
			case 'goods_list':
				if($this->request->getMethod() == "GET")
					return $this->search($this->request->getQueryString());
			//default:		
			//		return (new RequestException(400, "Bad request"))->toJson();
			
		}
	}
	
	
	private function create($body) { 	
		try{ 	
		 	new Admin($body["name"], $body["email"], $body["pass"], $body["cpf"], $body["cep"]);
		 	return (new DBHandler())->insert($body, 'admins');
		 }catch(RequestException $ae) {
		 	 return $ae->toJson();
		 }	
	}
	
  private function search($queryString) {
		return (new DBHandler())->search($queryString);
	}


}
