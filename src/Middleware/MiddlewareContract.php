<?php

namespace xbuw\framework\Middleware;

use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;

interface MiddlewareContract
{
    public function handle(Request $request, \Closure $next): Response;
}