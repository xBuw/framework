<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 18:22
 */

namespace xbuw\framework\Request;

/**
 * Class Request
 * @package xbuw\framework\Request
 */
class Request
{
    private static $request = null;

    private $container = array();
    function __set($name, $value){
        $this->container[$name] = $value;
    }
    function __get($name)
    {
        return isset($this->container[$name])?$this->container[$name]:null;
    }

    /**
     * Request constructor
     */
    public function __construct()
    {
    }

    /**
     * Get request method
     * @return string
     */
    public static function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**Return request
     * @return Request
     */
    public static function getRequest(): self
    {
        if (!self::$request) {
            self::$request = new self();
        }
        return self::$request;
    }

    /**
     * get current URI
     * @return String
     */
    public function getUri(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

}