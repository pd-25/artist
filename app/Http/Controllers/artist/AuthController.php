<?php

namespace App\Http\Controllers\artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userlogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            $data = $request->all();
        if(Auth::guard('artists')->attempt(["email" => $request->email, "password" => $request->password])){
            return redirect()->route('artists.dashboard');
        }
        else
        {
            return back()->with("msg", "Invalid credentials");
        }
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with("msg", throw $th);
        }
    }
}
