<?php

include_once "IgoodsValidator.php";

class GoodsValidator implements IGoodsValidator {
	
private $allowedTypes = Array('iPhone', 'Galaxy', 'Motorola', 'Zenfone');
  

   public function isValidType($type) {
	
  	if(!in_array($type, $this->allowedTypes)) 
			return false;
		return true;		
	}
	
  public function isValidCode($code){
		if(!empty($code))
			return true;
		return false;
	}

  public function isValidValue($value){
		if(!empty($cep))
			return true;
		return false;
	}


}
