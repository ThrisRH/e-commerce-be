<?php

namespace App\Containers\AppSection\Authentication\Middlewares;

use App\Ship\Helper\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckTokenMiddlewares
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('api')->user();

        if (! $user) {
            return ApiResponse::error('Unauthorized: Token invalid or missing', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
