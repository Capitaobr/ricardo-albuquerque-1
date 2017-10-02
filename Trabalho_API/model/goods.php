<?php

require_once("validation/goodsValidator.php");
require_once ("exception/requestException.php");

class Goods {
	
	private $name;
	private $type;
	private $code;
	private $value;
	private $gv;
	
  public function __construct($name, $type, $code, $value) {
	 	$this->gv = new GoodsValidator();
	 	$this->name = $name;
		$this->setType($type);
		$this->setCode($code);
		$this->setValue($value);		
	}
	
  public function setType($type) {
		if(!$this->gv->isValidType($type)){
			throw new RequestException(400, "Invalid Good Type");
		}	
		$this->type = $type;
	}
	
  public function setCode($code) {
		if(!$this->gv->isValidCpf($code)){
			throw new RequestException(400, "Invalid Good Code.");
		}	
		$this->code = $code;
	}
	
  public function setValue($value) {
		if(!$this->gv->isValidValue($value)){
			throw new RequestException(400, "Invalid Good Value");
		}	
		$this->value = $value;
	}


}
