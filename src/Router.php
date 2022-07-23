<?php
namespace PHPMin;

class Router
{
	private $routes = [];


	/**
	 * Make a route available to the router.
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
	public function addRoute($methods, $pattern, $fn)
	{
		$this->loadRoutes($methods, $pattern, $fn);
	}

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

	public function matchRoute()
	{
		$uri     = $_SERVER['REQUEST_URI'];
		$method  = $_SERVER['REQUEST_METHOD'];
		$routes  = $this->routes[$method];
		$matches = [];
		

		dump($routes);


		// Check if a pattern matches using a regex.
		foreach($routes as $pattern => $fn)
		{
			$pattern = preg_replace("/\//", "", $pattern);
			$regex_pattern = "~$pattern~";
			if(preg_match($regex_pattern, $uri))
			{
				$fn();
				return;
			}
		}
		
		// TODO Implement route regex pattern matching.

		// Check for an explict/litteral match of URI to pattern.
		if(array_key_exists($uri, $routes))
		{
			$route = $routes[$uri];

			if(is_callable($route))
			{
				// Anonymous function call.
				$route();
			}else
			{
				// TODO Implement properly.
				//
				// "Controller@method" call.
				$sections   = preg_split("/@/", $route);
				$controller = $sections[0];
				$action     = $sections[1];

				echo "Loading $controller->$action()";
			}

		}
		else
		{
			throw new \Exception("Route for $uri could not be found");
		}
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
