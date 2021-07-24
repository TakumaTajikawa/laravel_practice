<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = rand(0, count(\MyService::allData()));
        \MyService::setId($id);
        $mergeData = [
            'id' => $id,
            'msg' => \MyService::say(),
            'allData' => \MyService::allData(),
        ];
        $request->merge($mergeData);
        return $next($request);
    }
}
