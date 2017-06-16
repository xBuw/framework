<?php

namespace xbuw\framework\Middleware;

use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;

interface MiddlewareContract
{
    /**
     * Does some actions on the Request
     *  and causes the next Middleware
     * @param Request $request
     * @param \Closure $next
     * @return Response
     */
    public function handle(Request $request, \Closure $next): Response;
}