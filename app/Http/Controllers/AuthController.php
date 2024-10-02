<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if(!$token = auth('api')->attempt($credentials)) {

            return response()->json(['error' => 'Unauthorized Access'], 401);
        }
        return $this->sendToken($token);
    }

    protected function sendToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }


}
