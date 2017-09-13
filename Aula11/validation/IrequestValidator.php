<?php
interface IRequestValidator {
	public function isMethodValid($method);
	public function isProtocolValid($protocol);
	public function isValidUri($uri);
	public function isQueryStringValid($queryString);
	// public function isBodyValid($body);
}