<?php

class db{

	const DB_NAME = "dbGood";

	public function getConnection() {
		try {

		    $mng = new MongoDB\Driver\Manager("mongodb://admin:123456@localhost:27017");

		    return $mng;

		} catch (MongoDB\Driver\Exception\Exception $e) {
		    
		    return json_encode(
		    			 	Array(
		    			 		"msg"  => $e->getMessage(), 
		    			 		"file" => $e->getFile(), 
		    			 		"line" => $e->getLine()
		    			 	));       
		}
	}

	public function insert($document, $collection) {
		$conn = $this->getConnection();
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert($document);
		$result = $conn->executeBulkWrite(
										"dbGood.".$collection,
										 $bulk);
		return $result;
	}

	public function search($parameters) {
		$conn = $this->getConnection();
		$query = new MongoDB\Driver\Query($parameters, []);
		$rows = $conn->executeQuery("dbGood.user", $query);
		$result = Array();
		foreach ($rows as $row) {
    
        array_push($result, $row);
    }
		return json_encode($result);
	}

}