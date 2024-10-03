<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {

            return response()->json(['error' => 'Invalid Credentials'], 401);
        } else {

            $user = auth('api')->user();

            return $this->sendUser($token, $user);
        }


    }

    protected function sendUser($token, $user): JsonResponse
    {
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'access_token' => $token,
        ]);
    }


}
