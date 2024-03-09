<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VreifiedHeaderRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('accept') !== 'application/vnd.api+json') {
            return response()->json(['error' =>[
                "status" => 406,
                "title" => "Invalid Header",
                "detail" => "Accept header must be application/vnd.api+json",
                "source" => ["pointer" => "header"]
            ] ], 406);
        }
        if($request->isMethod('post') || $request->isMethod('patch') || $request->isMethod('delete')) {
            if ($request->header('content-type') !== 'application/vnd.api+json') {
                return response()->json(['error' =>[
                    "status" => 415,
                    "title" => "Invalid Header",
                    "detail" => "Content-Type header must be application/vnd.api+json",
                    "source" => ["pointer" => "header"]
                ] ], 415);
            }
        }
        return $next($request);

        
    }
}
