<?php

namespace xbuw\framework\Middleware;

use xbuw\framework\Response\Response;
use xbuw\framework\Router\Route;

class LastMiddleware
{
    /**
     * Call Controller
     * @return Response
     */
    public function handle(): Response
    {
        $route = Route::getRoute();
        $route_controller = $route->getController();
        $route_method = $route->getMethod();
        $response = null;
        if (class_exists($route_controller)) {
            $reflectionClass = new \ReflectionClass($route_controller);
            if ($reflectionClass->hasMethod($route_method)) {
                $controller = $reflectionClass->newInstance();
                $reflectionMethod = $reflectionClass->getMethod($route_method);
                $response = $reflectionMethod->invoke($controller);
            }
        }
        return $response;
    }
}