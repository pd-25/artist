<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function loginUser(Request $request) {
    try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=> $request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $token =$user->createToken('loginUser')->plainTextToken;
             return response()->json([
                'status' => true,
                'msg' => 'Artist logged in successfully',
                'data' => $user,
                'token' => $token
             ],200);
        }else {
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
}
