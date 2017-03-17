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
    /**
     * @param string $viewPath
     * @param array $params
     * @param bool $layout true if exist layout
     * @return Response
     */
    public function render(string $viewPath, array $params = [], bool $layout = false):Response
    {
        $content = Renderer::render($viewPath, $params);
        if($layout){
            $pathInfo = pathinfo($viewPath);
            $layoutPath = $pathInfo['dirname'] .'/layout.' . $pathInfo['basename'];
            $content = Renderer::render($layoutPath, ['content' => $content]);
        }
        return new Response($content);
    }
}