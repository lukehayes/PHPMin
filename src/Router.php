<?php
namespace PHPMin;

class Router
{
	/**
	 * @var array $routes.
	 *
	 * All defined routes available to to router object. */
	private $routes = [];

	/**
	 * @var string $uri.
	 *
	 * The current REQUEST_URI that has been sent to the router. */
	private $uri = NULL;

	/**
	 * @var string $method.
	 *
	 * The current REQUEST_METHOD that has been sent to the router. */
	private $method = NULL;


	/**
	 * Constructor.
	 **/
	public function __construct()
	{
		$this->uri     = $_SERVER['REQUEST_URI'];
		$this->method  = $_SERVER['REQUEST_METHOD'];
	}


	/**
	 * Make a route available to the router.
	 *
	 * @param string $methods    A string of request methods seperated
	 *                           by a "|" character.
	 *
	 * @param string $pattern    The url pattern that applies to this route.
	 *
	 * @param mixed  $fn         Closure or "nameController@method" can be used
	 *                           for the defined route.
	 *
	 * @return array.
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
	 *                           for the defined route.
	 *
	 * @return array.
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
	 * Match a route defined by a REGEXP pattern.
	 *
	 * @param array $routes    The routes for the current REQUEST_METHOD.
	 *
	 * @return bool.
	 */
	public function matchedRegexRoute(array $routes) : bool
	{
		$route_found = false;

		// Check if a pattern matches using a regex.
		foreach($routes as $pattern => $fn)
		{
			$pattern = preg_replace("/\//", "", $pattern);
			if(preg_match("~$pattern$~", $this->uri, $matches) && !$route_found)
			{
				if($matches[0] == trim($this->uri,"/"))
				{
					$route_found = true;
					$fn();
					return true;
				}
			}
		}

		return false;
	}


	/**
	 * Match a route with the exact string explictly to the URI.
	 */
	public function matchedLiteralRoute()
	{
		// Check for an explict/litteral match of URI to pattern.
		if(array_key_exists($this->uri, $routes))
		{
			$route = $routes[$this->uri];

			if(is_callable($route))
			{
				// Anonymous function call.
				$route();
			}else
			{
				// "Controller@method" call.
				$sections   = preg_split("/@/", $route);
				$controller = $sections[0];
				$action     = $sections[1];

				echo "Loading $controller->$action()";
			}

		}
		else
		{
			throw new \Exception("Route for $this->uri could not be found");
		}
	}

	/**
	 * Check if the incoming route matches any of the routes defined inside if the
	 * router object.
	 *
	 * @throws Exception if a route could not be found.
	 *
	 * @return bool.
	 */
	public function matchRoute()
	{
		$routes  = $this->routes[$this->method];
		$matches = [];

		if($this->matchedRegexRoute($routes))
		{
			return true;
		}else
		{
			throw new \Exception("Route for $this->uri could not be found");
		}
	}


	/**
	 * Get a list of all defined routes.
	 *
	 * @return array.
	 */
	public function getRoutes() : array
	{
		return $this->routes;
	}
}
