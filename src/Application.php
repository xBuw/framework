<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 17:20
 */

namespace xbuw\framework;

use xbuw\framework\Middleware\Middleware;
use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;
use xbuw\framework\Router\Router;

/**
 * Single entry point
 *
 * Class Application
 * @package xbuw\framework
 */
class Application
{
    private $routes = [];
    private $middleware = [];
    private $routeMiddleware = [];

    /**
     * Application constructor.
     * @param array $routes
     * @param array $middleware
     * @param array $routeMiddleware
     */
    function __construct(array $routes, array $middleware, array $routeMiddleware)
    {
        $this->routes = $routes;
        $this->middleware = $middleware;
        $this->routeMiddleware = $routeMiddleware;
    }

    /**
     * start app
     */
    public function run()
    {
        $request = Request::getRequest();
        $router = new Router($this->routes);
        $route = $router->getRoute($request);

        $route_controller = $route->getController();
        $route_method = $route->getMethod();

        $listMiddleware = [];
        foreach ($this->middleware as $key => $value) {
            if ($route_controller . "@" . $route_method == $key) {
                $listMiddleware = $value;
            }
        }
        $middleware = new Middleware($listMiddleware, $this->routeMiddleware);
        $response = $middleware->run($request);

        if ($response instanceof Response) {
            $response->send();
        }
    }
}