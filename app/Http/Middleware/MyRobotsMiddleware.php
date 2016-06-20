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
        if(app('Settings')->get('search_engine_visibility')) {
            return false;
        }
        return $request->segment(1) !== 'admin';
    }
}
