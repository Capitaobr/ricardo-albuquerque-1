<?php 

require_once("dbconnection/db.php");
	
class PostValidator{
	


	public function isValidPost($post){

		if(!$post = is_null($post))
			return true;
		return farlse;

	}

	public function isValidUser($userName){
		 $db = DBHendler();
		 if(!empty($db->search($userName)))
		 	return true;
		 return false;
	}


	


	}