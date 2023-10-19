<?php

namespace App;

use App\Exceptions\RouterException;
use App\Helpers\Debug;
use Exception;

class Router
{
    /**
     * @var array
     */
    private $routes;
    // /**
    //  * @var array $middlewares
    //  */
    // private $middlewares = [];

    public function __construct()
    {
        $this->routes = [
            'methods' => [
                'GET' => [
                    'routes' => []
                ],
                'POST' => [
                    'routes' => []
                ]
            ]
        ];
    }

    /**
     * Register a route.
     *
     * @param string $requestMethod
     * @param string $route
     * @param array|callable $action
     * @return self
     */
    private function register($requestMethod, $route, $action)
    {
        $this->routes['methods'][$requestMethod]['routes'][$route]['action'] = $action;

        return $this;
    }

    /**
     * Register a GET route.
     *
     * @param string $route
     * @param array|callable $action
     * @return self
     */
    public function get($route, $action)
    {
        return $this->register('GET', $route, $action);
    }

    /**
     * Register a POST route.
     *
     * @param string $route
     * @param array|callable $action
     * @return self
     */
    public function post($route, $action)
    {
        return $this->register('POST', $route, $action);
    }

    /**
     * Get the list of registered routes.
     *
     * @return array
     */
    public function listRoutes()
    {
        return $this->routes;
    }

    /**
     * Resolve a request.
     *
     * @param string $requestMethod
     * @param string $requestUri
     * @return callable
     */
    public function resolve($requestMethod, $requestUri)
    {
        /**
         * @var string $route Makes URI goes only until before the question mark, so, e.g., "/invoices/method?name=John+Doe" becomes "/invoices/method".
         */
        $route = explode('?', $requestUri)[0];

        /**
         * Removes the route final slash if there is one before actually resolving the route.
         */
        if ((substr($route, -1) === '/')) {    
            $trimmedRoute = rtrim($route, '/');
            
            if (!($trimmedRoute === '')) {
                $route = $trimmedRoute;
            }
        }
        
        /**
         * Attributes the route `action` to `$action` if there is one or set it to null
         *
         * @var string $action
         */
        $action = $this->routes['methods'][$requestMethod]['routes'][$route]['action'] ?? null;
        /**
         * Check whether there is an action registered in the route.
         */
        if (!$action)
        {
            throw RouterException::routeNotFound();
        }

        /**
         * Calls `$action` if it is not null.
         */
        if (is_callable($action))
        {
            return $action();
        }

        if (is_array($action))
        {
            /**
             * @var string $class
             * @var string $method
             */
            [$class, $method] = $action;

            if (class_exists($class))
            {
                $class = new $class();

                if (method_exists($class, $method))
                {
                    return call_user_func_array([$class, $method], []);
                }
            }
        } else {            
            throw RouterException::routeNotFound();
        }
    }
}
