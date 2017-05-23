<?php
namespace App\Core;
/**
 * Basic router class
 */
class Router
{
    /**
     * @var array - Route arrays
     */
    protected $routes = [
            'GET' => [],
            'POST' => [],
        ];

    /**
     * Define Routes
     *
     * @param $routes
     */
    public function define($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Load file.
     *
     * @param $file - Path of the file which you wan't to include
     *
     * @return static
     */
    public static function load($file)
    {
        $router = new static();
        require $file;

        return $router;
    }

    /**
     * Detect routes.
     *
     * @param $url - URL of the request
     *
     * @return mixed - route information
     * @throws Exception - an extension if route info doesn't found
     */
    public function direct($url, $requestType)
    {
        if (array_key_exists($url, $this->routes[$requestType])) {
            return $this->callAction(
            //TODO: Learn 'split' operator
                ...explode('@', $this->routes[$requestType][$url])
            );
        } else {
            throw new Exception('No route defined');
        }
    }

    /**
     * Catch all get requests.
     *
     * @param $uri        - URI of the request
     * @param $controller - Assign controller to this URI
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Catch all post requests.
     *
     * @param $uri        - URI of the request
     * @param $controller - Assign controller to this URI
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @return array of the routes
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    public function callAction($contoller, $action)
    {
        $contoller = "App\\Controllers\\{$contoller}";
        $contoller = new $contoller;

        if (method_exists($contoller, $action)) {
            return (new $contoller)->$action();
        } else {
            throw new Exception("Method {$action} doesn't found");
        }
    }
}