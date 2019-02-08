<?php
namespace App\Services;

use JWTAuth;

class AuthService
{
    static function createToken($input)
    {
        return JWTAuth::attempt($input);
    }

    static function currentUserByToken($token)
    {
        return JWTAuth::authenticate($token);
    }

    static function destroyToken($token)
    {
        return JWTAuth::invalidate($token);
    }
}
