<?php

interface IGoodsValidator {
	
  public function isValidType($type);
	
  public function isValidCode($code);
	
  public function isValidValue($value);
}
