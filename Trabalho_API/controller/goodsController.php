<?php

require_once ("model/goods.php");
require_once ("database/database.php");
require_once ("exception/requestException.php");

class GoodsController {

  private $allowedOperations = Array('register', 'info', 'update', 'cart', 'delete', 'invoice');
	private $request;
	
	public function __construct($request) {
		$this->request = $request;
	}			  
	
  public function routeOperation() {
		
    $body = json_decode($this->request->getBody(),true);
		
    switch($this->request->getOperation()) {
			
     case 'register':
		return $this->create($body);
			
     case 'info':
		if($this->request->getMethod() == "GET")
			return $this->search($this->request->getQueryString());
			
     // case 'update':
        
    // case 'cart': 
    //	 return $this->createCart($body);   
      
     // case 'delete':
        
     case 'invoice':
		if($this->request->getMethod() == "GET")
			return $this->search($this->request->getQueryString());
        //default:		
			//		return (new RequestException(400, "Bad request"))->toJson();
		}
	}
	
	
	
/*	private function createCart($body){
		  try{ 	
		 
      new Goods($body["name"], $body["type"], $body["code"], $body["value"] );
		 	return (new DBHandler())->insert($body, 'cart');
		 
   }catch(RequestException $ge) {
		 	 return $ge->toJson();
		 }	
	}
*/	
	private function create($body) { 	
		
    try{ 	
		 
      new Goods($body["name"], $body["type"], $body["code"], $body["value"] );
		 	return (new DBHandler())->insert($body, 'goods');
		 
    }catch(RequestException $ge) {
		 	 return $ge->toJson();
		 }	
	}
	
  private function search($queryString) {
		return (new DBHandler())->search($queryString);
	}



}
