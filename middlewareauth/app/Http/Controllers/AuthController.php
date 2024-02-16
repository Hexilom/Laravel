<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'status' => 'true',
            'message' => 'usuario creado exitosamente',
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ],200);
    }

    public function loginUser(LoginRequest $request){
        if (!Auth::uttempt($request->only(['email','password']))){
            return response()->json([
                'status' => 'false',
                'message' => 'email or password does not match',
            ],401);
        }

        $user = User::where('email', $request->email)->first();
        return response()->json([
            'status' => 'true',
            'message' => 'User Login successfully',
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ],200);
    }
}
