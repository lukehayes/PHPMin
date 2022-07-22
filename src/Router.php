<?php
namespace PHPMin;

class Router
{
	private $routes = [];

	public function defineRoutes($methods) : array
	{
		$request_methods = explode('|', $methods);

		foreach($request_methods as $method)
		{
			$this->routes[] = $method;
		}

		return $this->routes;
	}
}
