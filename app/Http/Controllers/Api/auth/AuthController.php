<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('loginUser')->plainTextToken;
                return response()->json([
                    'status' => true,
                    'msg' => 'Artist logged in successfully',
                    'data' => $user,
                    'token' => $token
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'These credentials do not match our records.'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // $token = $user->createToken('loginUser')->plainTextToken;
        if($user) {
            return response()->json([
                'status' => true,
                'msg' => 'Artist Registered Successfully'
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'Some Error Occured!'
            ]);
        }
        
    }
}
