<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 17:15
 */

namespace xbuw\framework\Controller;


use xbuw\framework\Renderer\Renderer;
use xbuw\framework\Response\Response;

class Controller
{
    public function render($viewPath, $params = []):Response
    {
        $content = Renderer::render($viewPath, $params);
        return new Response($content);
    }
}