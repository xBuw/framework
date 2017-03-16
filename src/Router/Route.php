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
     * @var Controller name
     */
    public $controller;
    /**
     * @var Method name
     */
    public $method;
    /**
     * @var array Parsed params
     */
    public $params = [];
}