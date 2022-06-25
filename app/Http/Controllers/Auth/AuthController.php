<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Auth;

class AuthController extends Controller
{
    public function doLogin(LoginRequest $request)
    {
        try {
            if(Auth::attempt($request->validated())) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Email or Password invalid');
            }
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('login')->with('error', 'Internal server error');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
