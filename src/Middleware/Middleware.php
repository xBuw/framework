<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 16.06.17
 * Time: 11:51
 */

namespace xbuw\framework\Middleware;

use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;

class Middleware
{
    private $config;
    private $list;

    /**
     * Middleware constructor.
     * @param array $config
     * @param array $list
     */
    public function __construct(array $list, array $config)
    {
        $this->list = array_reverse($list);
        $this->config = $config;
    }

    /**
     * Execute all needed Middleware recursively
     * @param Request $request
     * @return Response
     */
    public function run(Request $request): Response
    {
        $tempMiddleware = new LastMiddleware();
        $tempClosure = function () use ($tempMiddleware) {
            return $tempMiddleware->handle();
        };
        foreach ($this->list as $value) {
            $name = $this->config[$value];
            $tempMiddleware = new $name();
            $tempClosure = function (Request $request) use ($tempMiddleware, $tempClosure) {
                return $tempMiddleware->handle($request, $tempClosure);
            };
        }
        return $tempClosure($request);
    }
}