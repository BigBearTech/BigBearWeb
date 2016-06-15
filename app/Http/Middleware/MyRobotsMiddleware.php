<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class MyRobotsMiddleware extends SpatieLaravelRobotsMiddleware
{
    /**
     * @return string|bool
     */
    protected function shouldIndex(Request $request)
    {
        return $request->segment(1) !== 'admin';
    }
}
