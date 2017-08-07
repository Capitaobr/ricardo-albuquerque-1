<?php 
	//var_dump($_SERVER);
	require_once('Request.php');
	// request php constructor 
	//$method, $status, $host, $contentType, $category, $absoluteSize, $transferSize, $path, $queryString
	$req = new Request(
    	$_SERVER["REQUEST_METHOD"],
    	"YOUR SCRIPT IS SUPOSED TO CREATE RESPONSE NOT ACCESS IT",
    	$_SERVER["HTTP_HOST"],
    	$_SERVER["REQUEST_SCHEME"],
	"NULL",  //category not found
    	"NULL",  //absolute size not found
    	"NULL",  //transfer size not found
    	$_SERVER["PHP_SELF"],
    	$_SERVER["QUERY_STRING"]
	);
	var_dump($req);
