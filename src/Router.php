<?php
namespace PHPMin;

class Router
{
	private $routes = [];

	public function defineRoutes($methods) : array
	/**
	 * Load all of the defined routes into the internal routes array.
	 *
	 *
	 * @param string $methods    A string of request methods seperated
	 *                           by a "|" character.
	 *
	 * @param string $pattern    The url pattern that applies to this route.
	 *
	 * @param mixed  $fn         Closure or "nameController@method" can be used
	 *                           for the defined route,
	 *
	 * @return array
	 */
	private function loadRoutes($methods, $pattern, $fn) : array
	{
		$request_methods = explode('|', $methods);

		foreach($request_methods as $method)
		{
			$this->routes[$method][$pattern] = $fn;
		}

		return $this->routes;
	}

	/**
	 * Get a list of all defined routes.
	 *
	 * @return array
	 */
	public function getRoutes() : array
	{
		return $this->routes;
	}
}
