<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Auth as ServicesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');

        if(ServicesAuth::userExists($request->email)) { // checks if email exist in the database
            Auth::attempt($credentials, $remember);
            return redirect()->intended();
        } else {
            $this->errorMessage('User not found');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}
