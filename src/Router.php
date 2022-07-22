<?php
namespace PHPMin;

class Router
{
    private $request_path = NULL;

    private $routes = [];

    public function __construct()
    {
        $this->request_path = $_SERVER['REQUEST_URI'];
    }

    /**
     * Routes getter.
     *
     * @return array    List of all the currently defined routes.
     */
    public function getRoutes() : array
    {
        return $this->routes;
    }

    /**
     * Add a route to the application
     *
     * @return array    List of all the currently defined routes.
     */
    public function addRoute(Route $route) : void
    {
        $this->routes[$route->getPath()] = $route;
    }

    /**
     * Try and find an availabe route to display.
     */
   private function dispatchRoute(App $app) : void
    {
        // TODO Will implement this properly later
        //$path = trim($this->request_path, "\/");
        $path = $this->request_path;

        if(array_key_exists($path, $this->routes))
        {
            // TODO  Better solution than before but needs much work!
            $route = $this->routes[$path];
            ($route->callback)($app);
        }else
        {
            throw new ServiceNotFoundException("Route for path: $this->request_path could not be found");
        }
    }

    /**
     * Start the router.
     */
    public function run(App $app)
    {
        $this->dispatchRoute($app);
    }
}
