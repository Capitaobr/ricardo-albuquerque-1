<?php


class Post {
	

	private $titulo;
	private $texto;
	private $id;
	private $timeStamp;


	public function __construct($titulo, $texto, $idate, $timeStamp){


	 	$this->titulo = $titulo;
		$this->texto = $texto;
		$this->id = $id;
		$this->timeStamp = $timeStamp;

	}


}