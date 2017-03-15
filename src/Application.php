<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 17:20
 */

namespace xbuw\framework;

use xbuw\framework\Request\Request;

class Application
{
    /**
     * start app
     */
    public function run()
    {
        $request = Request::getRequest();
        $uri = $request->getUri();
        $method = $request->getMethod();

        echo "$uri</br>$method</br>";
    }

    /**
     * Application constructor.
     */
    function __construct()
    {
        echo "hello application!!!</br>";
    }
}