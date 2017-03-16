<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 22:40
 */

namespace xbuw\framework\Renderer;


class Renderer
{
    public static function render(string $path_to_view, array $params = []): string
    {
        ob_start();
        extract($params);
        include $path_to_view;
        return ob_get_clean();
    }
}