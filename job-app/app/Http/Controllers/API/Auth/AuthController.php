<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $input = $request->only('email', 'password');

        try {
            $jwt_token = app('AuthService')::createToken($input);

            return response()->json([
                'success'   => true,
                'token'     => $jwt_token,
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('auth.failed'),
            ], 401);
        }
    }

    public function logout()
    {
        try {
            app('AuthService')::destroyToken(request()->bearerToken());

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ], 200);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function user()
    {
        try {
            $user = app('AuthService')::currentUserByToken(request()->bearerToken());

            return response()->json([
                'user'   => $user,
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => trans('auth.failed'),
            ], 401);
        }
    }
}
