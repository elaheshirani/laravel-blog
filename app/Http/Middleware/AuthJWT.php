<?php
/**
 * Created by PhpStorm.
 * User: IranRoute
 * Date: 12/17/2017
 * Time: 8:35 AM
 */

namespace App\Http\Middleware;

use App\Utils\Constants;
use App\Utils\Utils;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::toUser($request->header('token'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return Utils::response(Constants::$TOKEN_IS_INVALID, 'Token is invalid', null, null);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return Utils::response(Constants::$TOKEN_IS_EXPIRED, 'Token is Expired', null, null);
            } else {
                return Utils::response(Constants::$OTHER_ERROR_FOR_TOKEN, $e->getMessage(), null, null);
            }
        }
        return $next($request);
    }
}