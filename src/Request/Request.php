<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 18:22
 */

namespace xbuw\framework\Request;


class Request
{

    private static $request = null;

    /**
     * get current URI
     * @return String
     */
    public function getUri(): String
    {
        return "/product/10/params/var";
        //return $_SERVER["REQUEST_URI"];
    }

    public static function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**
     * Request constructor
     */
    public function __construct()
    {
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

}