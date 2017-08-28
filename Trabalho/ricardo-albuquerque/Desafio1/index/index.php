<?php

	require_once('..Desafio/Request.php');
	require_once('Treater.php');

	$treater = new Treater();
	

	$methodValidate = $treater -> validatorRequest($request ->getMethod());
	$protocolValidate = $treater -> validatorRequest($request ->getProtocol());


var_dump($methodValidate);
var_dump($protocolValidate);
