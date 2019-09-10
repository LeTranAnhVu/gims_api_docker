<?php

namespace App\Http\Controllers\Api;

use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Illuminate\Http\Request;
use JWTAuth;
use Neomerx\JsonApi\Document\Error;

class AuthController extends JsonApiController
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            $error = new Error(null, null, '404', null, 'Login Fail', 'Email or password incorect', null, null);
            return $this->reply()->error($error);
        }

        return $this->respondWithToken($token);
    }

    public function validate()
    {
        return $this->reply()->content(JWTAuth::user());
    }

    public function logout()
    {
        auth()->logout();
        return $this->reply()->meta([
            'message' => "logout success!"
        ]);
    }

    public function respondWithToken($token)
    {
        return $this->reply()->meta([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
