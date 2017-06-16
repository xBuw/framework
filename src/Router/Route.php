<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 13:41
 */

namespace xbuw\framework\Router;

class Route
{
    private static $route = null;

    public function __construct()
    {
    }

    /**
     * @return Route
     */
    public static function getRoute(): self
    {
        if (!self::$route) {
            self::$route = new self();
        }
        return self::$route;
    }
    /**
     * @var string Route name
     */
    public $name;
    /**
     * @var string controller name
     */
    public $controller;
    /**
     * @var string method name
     */
    public $method;

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}