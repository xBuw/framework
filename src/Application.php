<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 17:20
 */

namespace xbuw\framework;

use xbuw\framework\Request\Request;
use xbuw\framework\Router\Router;

class Application
{
    /**
     * Application constructor.
     */
    function __construct()
    {
        echo "application constructor!!!</br>";
    }

    /**
     * start app
     */
    public function run()
    {
        $request = Request::getRequest();
        $ini_array = parse_ini_file(dirname(__FILE__) . "/../config/routes.ini", true);

        echo '<pre>';
        print_r($ini_array);
        echo '</pre>';

        $router = new Router($ini_array);

    }
}