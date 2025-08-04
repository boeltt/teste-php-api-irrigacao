<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate(['username' => 'required', 'password' => 'required']);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'user succesfully registred'], 201);
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid login'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => JWTAuth::user()
        ]);
    }
}