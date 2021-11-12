<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\User as ServicesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * 
     * Successful registration creates a resume. See App/Observers/UserObserver
     *
     * @param  \Illuminate\Http\RegisterRequest  $request
     * @return mixed
     */

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated()); 
        Auth::login($user);
        return redirect()->intended();
    }
}
