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
     * Request constructor
     */
    public function __construct()
    {
    }

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