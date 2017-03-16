<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 17:20
 */

namespace xbuw\framework;

use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;
use xbuw\framework\Router\Router;

class Application
{

    public $config = [];

    /**
     * Application constructor.
     */
    function __construct()
    {
        $this->config = parse_ini_file(dirname(__FILE__) . "/../config/routes.ini", true);
    }

    /**
     * start app
     */
    public function run()
    {

        $router = new Router($this->config);

        $route = $router->getRoute(Request::getRequest());
        $route_controller = $route->getController();
        $route_method = $route->getMethod();
        if (class_exists($route_controller)) {
            $reflectionClass = new \ReflectionClass($route_controller);
            if ($reflectionClass->hasMethod($route_method)) {
                $controller = $reflectionClass->newInstance();
                $reflectionMethod = $reflectionClass->getMethod($route_method);
                $response = $reflectionMethod->invokeArgs($controller, $route->getParams());
                if ($response instanceof Response) {
                    $response->send();
                }
            }
        }

        echo '<pre>';
        print_r($route);
        echo '</pre>';

    }
}