<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has("api_key")) {
          return response()->json([
            'status' => 401,
            'message' => 'No API Key',
          ], 401);
        }

        if ($request->has("api_key")) {
          if ($request->input("api_key") != config('app.api_key')) {
            return response()->json([
              'status' => 401,
              'message' => 'Wrong API key',
            ], 401);
          }
        }

        return $next($request);
    }
}
