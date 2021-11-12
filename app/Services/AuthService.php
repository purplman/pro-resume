<?php

namespace App\Services;

use App\Models\User;

class AuthService {

    /**
     * Check if email is registered.
     *
     * @param  String $email
     * @return boolean
     */
    public static function userExists($email) 
    {
        $user = User::where('email', $email)->first();
        return $user ? true : false;  
    }

}