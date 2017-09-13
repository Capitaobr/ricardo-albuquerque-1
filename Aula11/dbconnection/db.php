<?php

class db{

	private function getConnection() {
		
		try {
			$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			return $mng;
		} catch (MongoDB\Driver\Exception\Exception $e) {

			return Array($e->getMessage(), $e->getFile(), $e->getLine());       
		}
	}
	public function insert($doc, $collection) {
		$conn = $this->getConnection();
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert($doc);
		$conn->executeBulkWrite($collection,$bulk);
	}
	public function search($collection) {
		$conn = $this->getConnection();
		$query = new MongoDB\Driver\Query([], []);
		$rows = $conn->executeQuery($collection, $query);
		$result = Array();
		foreach ($rows as $row) {

			array_push($result, $row);
		}
		return json_encode($result);
	}

}