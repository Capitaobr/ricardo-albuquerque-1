<?php

include_once ("validation/requestValidator.php");
include_once ("exception/requestException.php");

class Request {
	
	private $method;
	private $protocol;
	private $host;
	private $uri;
	private $queryString;
	private $body;
	private $resource;
	private $operation;
	private $rv;

	public function __construct($method, $protocol, $host, $uri = null, $queryString = null, $body = null) 
	{
		$this->rv = new RequestValidator();
		
		$this->setMethod($method);
		$this->protocol = $protocol;
		$this->host = $host;
		$this->setUri($uri);
		$this->setQueryString($queryString);
		$this->setBody($body);
		$this->setResource();
		$this->setOperation();
			
	}
	
	public function getMethod(){
		return $this->method;
	} 

	public function getPath(){
		return $this->path;
	} 

	public function getBody(){
		return $this->body;
	}

	public function getResource() {
		return $this->resource;
	}

	public function getOperation() {
		return $this->operation;
	}

	public function getQueryString() {
		return $this->queryString;
	}

	private function setMethod($method) {
		if(!$this->rv->isMethodValid($method))
			throw new RequestException("405", "Method not allowed");
		$this->method = $method;
	}	


	private function setQueryString($queryString) {
       		$finalQueryString = Array();
        	if (strlen($queryString) > 0) {
            		$queryArray = explode('&', $queryString);
            		foreach ($queryArray as $value) {
                		$a = explode('=', $value);
                		if (!$this->rv->isQueryStringValid($a))
                   		 throw new RequestException("400", "Bad request");
                		$finalQueryString[$a[0]] = $a[1];
            		}
        	}
      		$this->queryString = $finalQueryString;
	}
	
	private function setUri($uri) {
		$cleanUri = explode('?', $uri);
		if(!$this->rv->isUriValid($cleanUri[0]))
			throw new RequestException("404", "Object not found");

		$this->uri = $cleanUri[0];
	}
	
	private function setResource() {
		$uri = explode("/", $this->uri);
		$this->resource = $uri[1];
	}

	private function setOperation() {
		$uri = explode("/", $this->uri);
		$this->operation = $uri[2];
	}

	private function setBody($body) {
	    	$bodyArray = json_decode($body, true);
	        if(!$this->rv->isBodyValid($bodyArray, $this->method, $this->resource))
           		throw new RequestException("400", "Bad request");
	    $this->body = $bodyArray;
 	}




















}
