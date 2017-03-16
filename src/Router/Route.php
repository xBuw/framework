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
    /**
     * @var Route name
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
     * @var array Parsed params
     */
    public $params = [];

    /**
     * @return string
     */
    public function getController():string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getMethod():string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams():array
    {
        return $this->params;
    }
}