<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidIndexRule;
use Closure;
use Illuminate\Http\Request;

class SpatieLaravelRobotsMiddleware
{
    protected $response;

    public function handle(Request $request, Closure $next)
    {
        $this->response = $next($request);

        $shouldIndex = $this->shouldIndex($request);

        if (is_bool($shouldIndex)) {
            return $this->responseWithRobots($shouldIndex ? 'all' : 'none');
        }

        if (is_string($shouldIndex)) {
            return $this->responseWithRobots($shouldIndex);
        }

        throw InvalidIndexRule::requiresBooleanOrString();
    }

    protected function responseWithRobots($contents)
    {
        $this->response->headers->set('x-robots-tag', $contents, false);

        return $this->response;
    }

    /**
     * @return string|bool
     */
    protected function shouldIndex(Request $request)
    {
        return true;
    }
}
