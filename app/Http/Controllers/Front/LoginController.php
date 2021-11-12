<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Login user with credentials.
     *
     * @param  \Illuminate\Http\LoginRequest  $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');

        if(AuthService::userExists($request->email)) {
            Auth::attempt($credentials, $remember);
            return redirect()->intended();
        } else {
            $this->errorMessage('User not found');
            return back();
        }
    }

     /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}
