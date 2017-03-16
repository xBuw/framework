<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 17:15
 */

namespace xbuw\framework\Controller;


use xbuw\framework\Response\Response;

class Controller
{
    public function render($path, $params):Response{
        return new Response($params);
    }
}