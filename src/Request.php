<?php
namespace PHPMin;

class Request
{
	/**
	 */
	private $uri = NULL;

	public function __construct()
	{
        //$this->uri = $_SERVER['REQUEST_URI'];
	}
	
	/**
	 * Request URI getter.
	 *
	 * @return string
	 */
	public function getUri() : string
	{
		return $this->uri;
	}

}
